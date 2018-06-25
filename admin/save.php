<?php
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if (!isset($_GET['id'])) {
    die('ID не передан!');
}

if (!$_POST['title'] || !$_POST['content']) {
    die('Новость не передана!');
}

$id = $_GET['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$article = Article::findById($id);

$article->title = $title;
$article->content = $content;
$article->save();
header('Location: /admin/index.php');