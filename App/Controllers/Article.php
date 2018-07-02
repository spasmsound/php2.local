<?php

namespace App\Controllers;

class Article
{
    public function action()
    {
        $view = new View();
        $view->article = \App\Models\Article::findById($_GET['id']);
        $view->display(__DIR__ . '/../../templates/index.php');
    }

}