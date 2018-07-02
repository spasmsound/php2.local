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

<h1><?php echo $this->article->title; ?></h1>
<hr>
<p><?php echo $this->article->content; ?></p>
<p><?php echo 'Автор: ' . ($this->article->author->name ?? 'Без автора') ?></p>

</body>
</html>