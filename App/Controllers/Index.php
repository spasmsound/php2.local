<?php

namespace App\Controllers;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

}