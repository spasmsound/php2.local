<?php
require __DIR__ . '/../autoload.php';
use App\Models\Article;
if (!isset($_GET['id'])) {
    die ('ID не передан!');
}
$id = $_GET['id'];
$view = new \App\View();
$view->article = Article::findById($id);
$view->display(__DIR__ . '/../templates/admin/edit.php');