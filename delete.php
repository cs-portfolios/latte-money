<?php

include_once('./config.php');


$post_id = $_POST['post_id'];

try {
    $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $db->exec("DELETE FROM posts WHERE post_id = '$post_id'");
    header('Location:./view/index.php');
    exit();
} catch (PDOException $e) {
    echo "データベースに接続できませんでした:".$e->getMessage();
}
