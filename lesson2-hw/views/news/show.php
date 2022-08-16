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
    <h1>Новость</h1> 
       
    <div style ="border: 1px solid green;">
        <h2><?=$news['title']?></h2>
        <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?></p>
        <p><?=$news['description']?></p>
    </div>
</body>
</html>