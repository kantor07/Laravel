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
    //    include ('C:/Server/data/htdocs/myNewsSite/resources/views/menu.php');
        include __DIR__ . '../menu.php';
    ?>
</header>    
    <h1>Все новости</h1>

    <?php
        foreach($newsCategoryList as $key=>$newsCategory): ?>
        <div style ="border: 1px solid green;">
            <h2><a href="<?=route('news.index', ['id'=>$key])?>"><?=$newsCategory['title']?></a></h2>
        </div><br><hr>
<?php endforeach; ?>
</body>
</html>
