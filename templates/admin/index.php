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
<h1>Админ-панель</h1>
<br><br>
<?php

foreach ($articles as $article): ?>
    <h4>
        <?php echo $article->title; ?>
        <a href="/admin/edit.php?id=<?php echo $article->id; ?>"> РЕДАКТИРОВАТЬ</a>
        <a href="/admin/delete.php?id=<?php echo $article->id; ?>">УДАЛИТЬ</a>
    </h4>
        <?php echo $article->content; ?>
    <p>
        <i>Новость №:<?php echo $article->id; ?></i><br>
        <i>Автор: <?php echo $article->author->name ?? 'Без автора'; ?></i>
    </p>
    <hr>
<?php endforeach; ?>

<h3>Добавить новость</h3>
<form method="post" action="/admin/create.php">
    <p>Заголовок</p>
    <textarea name="title" id="" cols="30" rows="10"></textarea>
    <br>
    <p>Текст</p>
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <button type="submit">Добавить</button>
</form>

</body>
</html>
