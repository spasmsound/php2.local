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

<h2>Редактирование новости №<?php echo $article->id ?></h2>
<h5>
    <i>Заголовок: <?php echo $article->title ?> </i>
    <br>
    <i>Текст: <?php echo $article->content ?></i>
</h5>

<form method="post" action="/admin/save.php?id=<?php echo $article->id?>">
    <p>Редактирование заголовка новости</p>
    <textarea name="title" cols="30" rows="10"><?php echo $article->title ?></textarea>
    <br>
    <p>Редактирование текста новости</p>
    <textarea name="content" cols="30" rows="10"><?php echo $article->content; ?></textarea>
    <br>
    <button type="submit">Изменить</button>
</form>

</body>
</html>