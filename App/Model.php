<?php

namespace App;

/**
 * Class Model
 * @package App
 */
abstract class Model
{

    /**
     * Константа TABLE, описывающая имя таблицы, из которой будут браться данные
     */
    public const TABLE = '';

    /**
     * @property $id
     */
    public $id;

    /**
     * @return array
     * Ищет все новости из БД
     */
    public static function findAll() : array
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql,static::class);
    }

    /**
     * @param $id
     * @return mixed
     * Ищет новсоть по ID из БД
     */
    public static function findById($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';

        $data = $db->query($sql, static::class, [':id' => $id]);

        if (empty($data) || $data === false) {
            return false;
        }
        return $data[0];
    }

    /**
     * Метод для вставки данных в БД
     */
    protected function insert()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sqlParts = [];
        $sqlParts['part1'] = 'INSERT INTO ' . static::TABLE;
        $sqlParts['part2'] = ' (' . implode(',', $cols) . ')';
        $sqlParts['part3'] = ' VALUES (' . implode(',', array_keys($data)) . ') ';

        $sql = $sqlParts['part1'] . $sqlParts['part2'] . $sqlParts['part3'];
        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->getLastId();
    }

    /**
     * Метод для редактирования данных в БД
     */
    protected function update()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        //UPDATE news SET title = :title, content = :content WHERE id=:id
        foreach ($fields as $name => $value)
        {
            if ('id' !== $name) {
                $cols[] = $name . '=:' . $name;
            }
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $cols).  ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * Метод для удаления данных из БД
     */
    public function delete()
    {
        //DELETE FROM news WHERE id=:id;
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $data = [':id' => $this->id];

        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * Метод, сохраняющий данные в БД
     */
    public function save()
    {
        if (null == $this->id) {
            $this->insert();
        }
        $this->update();
    }

}