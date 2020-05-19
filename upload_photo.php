<?php
require_once __DIR__ . '\..\config\main.php';
$dbConfig = include CONFIG_DIR  . "db.php";

    function upload_file($file){
        if ($file['error'] != 0) {
            echo 'Ошибка загрузки изображения!';
            return;
        }
        if ($file['type'] == 'image/jpeg' ||
            $file['type'] == 'image/png' ||
            $file['type'] == 'image/jpg' ||
            $file['type'] == 'image/gif') {
                move_uploaded_file($file['tmp_name'], 'img/'.$file['name']);
            $dbConfig = include CONFIG_DIR  . "db.php";
                $originalName = $file['name'];
                $fileSize = $file['size'];
                $conn = mysqli_connect(
                $dbConfig['host'],
                $dbConfig['login'],
                $dbConfig['password'],
                $dbConfig['db_name']
                );
                //$sql = "INSERT INTO puki (name, path, size) VALUES ('{$originalName}','{$originalName}','{$fileSize}')";
               // mysqli_query($conn,$sql);
                header('Location: index.php');
        } else {
            header('Location: index.php');
            echo "Файл должен иметь расширение .gif, .jpeg или .png";
            return;
        }
    }


    if (isset($_FILES['photo'])) {
        upload_file($_FILES['photo']);
    }

    $sql = "SELECT * FROM products";
    $filess = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
    var_dump($files);

?>