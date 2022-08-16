<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Агрегатор новостей</title>
</head>
<body>
<header>
    <?php
        include ('C:/Server/data/htdocs/myNewsSite/resources/views/sitePage/menu.php');
    //    include __DIR__ . '../menu.php';
    ?>
</header>    
    <h1>Новости</h1>

    <?php
        foreach($newsList as $key=>$news): ?>
        <div style ="border: 1px solid green;">
            <h2><a href="<?=route('news.show', ['id'=>$key])?>"><?=$news['title']?></a></h2>
            <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?></p>
            <p><?=$news['description']?></p>
        </div><br><hr>
<?php endforeach; ?>
</body>
</html>

