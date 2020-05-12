<?php

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
                header('Location: index.php');
        } else {
            echo "Файл должен иметь расширение .gif, .jpeg или .png";
            return;
        }
    }


    if (isset($_FILES['photo'])) {
        upload_file($_FILES['photo']);
    }

?>