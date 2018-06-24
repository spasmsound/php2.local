<?php
require __DIR__ . '/../autoload.php';

$Db = new \App\Db();
$checkDb = $Db->execute('select * from news', [], \App\Models\User::class);
var_dump($checkDb);

$findById = \App\Models\User::findById(2);
var_dump($findById);

$findLastNews = \App\Models\Article::findLastArticles();
var_dump($findLastNews);
