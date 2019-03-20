<?php

include_once('./config.php');


$id = $_POST['post_id'];
// var_dump($id);

try {
    $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $db->exec("DELETE FROM posts WHERE post_id = '$id'");
    header('Location:index.php');
    exit();
} catch (PDOException $e) {
    echo "データベースに接続できませんでした:".$e->getMessage();
}
