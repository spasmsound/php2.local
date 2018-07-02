<?php

namespace App\Controllers;

use App\View;

class Index
{
    public function action()
    {
        $view = new View();
        $view->articles = \App\Models\Article::findAll();
        $view->display(__DIR__ . '/../../templates/index.php');
    }
}