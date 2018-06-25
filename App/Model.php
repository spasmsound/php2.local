<?php

namespace App;

abstract class Model
{

    public const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql,static::class);
    }

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

    public function delete()
    {
        //DELETE FROM news WHERE id=:id;
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $data = [':id' => $this->id];

        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (null == $this->id) {
            $this->insert();
        }
        $this->update();
    }
}