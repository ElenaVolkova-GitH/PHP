<?php
    require_once 'main.php';
    $dbConfig = include "db.php";

    //$directory = 'img';
    //$files = scandir($directory);

    $conn = mysqli_connect(
        $dbConfig['host'],
        $dbConfig['login'],
        $dbConfig['password'],
        $dbConfig['db_name']
    );

//    foreach ($files as $name) {
//        if ($name == '.' || $name == '..') {
//            continue;
//        }
//        //$sqlInsert = "INSERT INTO products (name,path,description,price) VALUES ('Кот','$name','Продается породистый котенок','5500')";
//        //mysqli_query($conn,$sqlInsert);
//    }

    $sql = "SELECT * FROM products";
    $res = mysqli_query($conn,$sql);
    $resArray = mysqli_fetch_all($res,MYSQLI_ASSOC);

    foreach($resArray as $image) { ?>
        <a href="photo.php?id=<?=$image['id']?>" target="_blank">
            <div>
                <img src="img/<?=$image['path']?>" height="200">
                <h4><?=$image['name']?></h4>
                <h4><?=$image['price']?></h4>
            </div>
        </a>
    <?php }

    mysqli_close($conn);

?>

