<?php

namespace App;


class Config
{

    public $data;
    protected static $instance;

    private function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }

    public static function instance()
    {
        if (static::$instance !== null) {
            return static::$instance;
        }
        static::$instance = new static();
        return static::$instance;
    }

}