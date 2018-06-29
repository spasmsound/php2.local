<?php

namespace App\Models;

use App\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    /**
     * Константа TABLE, описывающая имя таблицы, из которой будут браться данные
     */
    public const TABLE = 'users';

    /**
     * @property $email
     */
    public $email;

    /**
     * @property $name
     */
    public $name;

}