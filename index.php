<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findLastArticles();

include __DIR__ . '/templates/index.php';