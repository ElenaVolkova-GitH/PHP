<?php
require_once __DIR__ . '\..\config\main.php';
require VENDOR_DIR . "funcImgResize.php";
require ENGINE_DIR . "base.php";
require ENGINE_DIR . "files.php";
require ENGINE_DIR . "gallery.php";

$menu = [
    "Главная",
    "Каталог",
    "Корзина",
];
$imagesDir = PUBLIC_DIR . "/img/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!file_exists($imagesDir)) {
        mkdir($imagesDir);
    }

    $originalName =  $_FILES['my_file']['name'];
    $filename = $imagesDir . $originalName;
    $fileSize = $_FILES['my_file']['size'];
    if (uploadFile($filename, 'my_file')) {
        img_resize($filename, $imagesDir . "/small/" . $originalName, 200, 150);
        saveImage($originalName, $originalName, $fileSize);
    }

    redirect("/gallery.php");
}

$files = getGalleryFiles();

//include VIEWS_DIR . "menu.php";
include VIEWS_DIR . "gallery.php";
include VIEWS_DIR . "upload_form.php";
?>




