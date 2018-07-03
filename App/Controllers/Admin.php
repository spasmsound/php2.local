<?php

namespace App\Controllers;

class Admin extends Controller
{
    protected function actionDefault()
    {
        $this->view->articles = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/admin/index.php');
    }

    protected function actionEdit()
    {
        $id = $_GET['id'];
        $this->view->article = \App\Models\Article::findById($id);
        $this->view->display(__DIR__ . '/../../templates/admin/edit.php');
    }

    protected function actionSave()
    {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        if (empty($id)) {
            $article = new \App\Models\Article();
        } else {
            $article = \App\Models\Article::findById($id);
        }
        $article->title = $title;
        $article->content = $content;
        $article->save();
        header('Location: /admin/');
    }

    protected function actionDelete()
    {
        $id = $_GET['id'];
        $article = \App\Models\Article::findById($id);
        $article->delete();
        header('Location: /admin/');
    }
}