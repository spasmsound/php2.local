<?php
require __DIR__ . '/autoload.php';

if (empty($_GET['id'])) {
    die('Неверный запрос');
} else {
    $id = $_GET['id'];
    $article = \App\Models\Article::findById($id);
    if (false == $article) {
        die ('Новость не найдена');
    } else {
        include __DIR__ . '/templates/article.php';
    }
}