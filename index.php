<?php

require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById(4);
$article->delete();
die;
$data = \App\Models\Article::findLastArticles();

include __DIR__ . '/templates/index.php';