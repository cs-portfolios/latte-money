<?php
include_once('./config.php');

// このページではupdateのsqlの実行をする

$post = $_POST;
// formから送られてきた内容を変数に保存する
// 二次元配列なので、中身をforeachで回して取得している
foreach ($post as $row) {
    $changeId = $row['post_id'];
    $newProduct = $row['product'];
    $newPrice = $row['price'];
    $newDate = $row['date'];
    $name = $row['name'];
}

// idに基づいてupdateをする処理をかく
// nameは変更する必要がないので、sql文で書かなくても良さげ

try {
    $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql文の作成
    $sql = "UPDATE posts SET product = :product, price = :price, date = :date, name = :name WHERE post_id=:post_id";
    // 実行準備
    $stmt = $db->prepare($sql);
    // 配列の作成
    $newPost = [':product'=>$newProduct,':price'=>$newPrice,':date'=>$newDate,':name'=>$name,':post_id'=>$changeId];
    $stmt->execute($newPost);
    header('Location:./view/index.php');
    exit();
} catch (PDOException $e) {
    echo "データベースに接続できませんでした:".$e->getMessage();
}
