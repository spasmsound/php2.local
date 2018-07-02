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

    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        }

        die('Нет Доступа');
    }

    abstract protected function handle();

}