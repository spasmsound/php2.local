<?php

namespace App\Models;

use App\Model;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{

    public const TABLE = 'authors';

    /**
     * @property $id
     */
    public $id;

    /**
     * @property $name
     */
    public $name;

}