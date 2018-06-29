<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    foreach ($this->articles as $article) : ?>
        <a href="/article.php?id=<?php echo $article->id; ?>"><h1><?php echo $article->title ?></h1></a>
            <?php echo $article->content ?>
        <hr>
   <?php endforeach; ?>
</body>
</html>