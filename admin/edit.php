<?php
require __DIR__ . '/../autoload.php';
use App\Models\Article;

if (!isset($_GET['id'])) {
    die ('ID не передан!');
}


$id = $_GET['id'];
$article = Article::findById($id);

include __DIR__ . '/../templates/admin/edit.php';
