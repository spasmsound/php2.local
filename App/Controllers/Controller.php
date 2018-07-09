<?php

namespace App\Controllers;

use App\View;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access()
    {
        return true;
    }

    public function action($action)
    {
        if ($this->access()) {
            $method = 'action' . $action;
            $this->$method();
        } else {
            die('Доступ закрыт');
        }

    }

}