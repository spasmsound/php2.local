<?php

namespace App\Controllers;

class Article extends Controller
{
    public function __invoke()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }

}