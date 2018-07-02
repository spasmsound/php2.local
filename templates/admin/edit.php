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

<h2>Редактирование новости №<?php echo $this->article->id ?></h2>
<h5>
    <i>Заголовок: <?php echo $this->article->title ?> </i>
    <br>
    <i>Текст: <?php echo $this->article->content ?></i>
    <br>
    <i>Автор: <?php echo $this->article->author->name ?></i>
</h5>

<form method="post" action="/admin/save.php?id=<?php echo $this->article->id?>">
    <p>Редактирование заголовка новости</p>
    <textarea name="title" cols="30" rows="10"><?php echo $this->article->title ?></textarea>
    <br>
    <p>Редактирование текста новости</p>
    <textarea name="content" cols="30" rows="10"><?php echo $this->article->content; ?></textarea>
    <br>
    <button type="submit">Изменить</button>
</form>

</body>
</html>