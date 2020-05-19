<?php
require_once ENGINE_DIR . "db.php";

function getGalleryFiles() {
    $sql = "SELECT * FROM products";
    return queryAll($sql);
}

function saveImage(string $name, string $path, int $size) {
    $sql = "INSERT INTO products (name, path, price, description ) VALUES ('{$name}', '{$path}', '{$price}','{$description}')";
    return execute($sql);
}

function getImage(int $id) {
    $sql = "SELECT * FROM products WHERE id = {$id}";
    return queryOne($sql);
}

//function incViewsCount($id) {
//    $sql = "UPDATE products SET views_count = views_count + 1 WHERE id = {$id}";
//    return execute($sql);
//}