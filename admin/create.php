<?php
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if (!$_POST['title'] || !$_POST['content']) {
    die('Новость не передана!');
}

$title = $_POST['title'];
$content = $_POST['content'];

$article = new Article();
$article->title = $title;
$article->content = $content;
$article->save();

header('Location: /admin/index.php');