<?php

namespace App\Controllers;

class Index extends Controller
{
    public function __invoke()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

}