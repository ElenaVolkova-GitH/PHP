<?php
    $dbConfig = include "db.php";
    $conn = mysqli_connect(
        $dbConfig['host'],
        $dbConfig['login'],
        $dbConfig['password'],
        $dbConfig['db_name']
    );

    $review = $_REQUEST['review'];

    $sql = "INSERT INTO products (review) VALUES ('{$review}')";
    mysqli_query($conn,$sql);
?>

<h3>Оставить отзыв</h3>
<form action="" enctype="multipart/form-data" method="request">
    <input width="300" height="300" type="text" name = "review">
    <input type="submit">
</form>
