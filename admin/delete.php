<?php
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if (!isset($_GET['id'])) {
    die('ID не передан!');
}

$article = Article::findById($_GET['id']);
$article->delete();

header('Location: /admin/index.php');