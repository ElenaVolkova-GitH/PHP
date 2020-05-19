<?php

require_once 'main.php';
$dbConfig = include "db.php";

$conn = mysqli_connect(
    $dbConfig['host'],
    $dbConfig['login'],
    $dbConfig['password'],
    $dbConfig['db_name']
);

    $id1 = $_GET['id'];
    $sql1 = "SELECT * FROM products WHERE id='{$id1}'";
    $res1 = queryOne($sql1);
    var_dump($res1);
   // $resProd = mysqli_fetch_all($res1,MYSQLI_ASSOC);

mysqli_close($conn);
?>

<img width="300" src="img/<?=$res1['path']?>" alt="">
<h2><?=$res1['name']?></h2>
<h4><?=$res1['description']?></h4>
<h3><?=$res1['price']?></h3>
<h2>Отзыв</h2>
<h4><?=$res1['review']?></h4>

<?php include 'post_form.php';?>

