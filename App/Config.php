<?php

namespace App;

/**
 * Class Config
 * @package App
 * Является синглтоном
 */
class Config
{

    /**
     * @property $data
     */
    public $data;

    protected static $instance;

    private function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }

    /**
     * @return mixed
     */
    public static function instance()
    {
        if (static::$instance !== null) {
            return static::$instance;
        }
        static::$instance = new static();
        return static::$instance;
    }

}