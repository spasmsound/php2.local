<?php
/**
 * Created by PhpStorm.
 * User: SPASM
 * Date: 29.06.2018
 * Time: 20:02
 */

namespace App;


trait MagicTrait
{
    /**
     * @property $data
     */
    protected $data = [];

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name) : bool
    {
        return isset($this->data[$name]);
    }

}