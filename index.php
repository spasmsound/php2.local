<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();
$article->title = 'Заголовок';
$article->content = 'Опять чето там';
$article->insert();
die;
$data = \App\Models\Article::findLastArticles();

include __DIR__ . '/templates/index.php';