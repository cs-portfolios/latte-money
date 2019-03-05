<?php
// データベースに関してのテストファイル
// あとで消しておく

include_once('./config.php');

try {
    $db = new PDO(
        // dsn,username,passwordの順番に入ってる
        DSN,
        USERNAME,
        PASSWORD
    );
    // 属性の付与（エラーレポートと、エラーの例外を投げる)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // テーブルの作成query
    $query = $db->exec("INSERT INTO posts(product, price, date) VALUES ('ココア', 40, '2020-05-06')");
} catch (PDOException $e) {
    echo "データベースに接続できませんでした:".$e->getMessage();
}
