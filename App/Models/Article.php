<?php

namespace App\Models;

use App\Db;
use App\Model;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{

    /**
     * Константа TABLE, описывающая имя таблицы, из которой будут браться данные
     */
    public const TABLE = 'news';

    /**
     * @property $title
     */
    public $title;

    /**
     * @property $content
     */
    public $content;

    /**
     * @property $authorId
     */
    public $authorId;

    /**
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        return Author::findById($this->authorId) ?? null;
    }

    /**
     * @return array
     * Ищет последние 3 новости
     */
    public static function findLastArticles() : array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER bY id DESC LIMIT 3';
        return $db->query($sql, static::class, []);
    }

}