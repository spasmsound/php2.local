<?php

namespace App\Controllers;

class News extends Controller
{

    protected function actionDefault()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

}