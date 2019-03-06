<?php
// このファイルでは投稿内容のエラーの判別と、
// 投稿されたデータのデータベースへの登録をする
// バリデーションしてから、データベースに登録できるようにする
// 最後にはindex.phpに飛ばすようにする

include_once('./config.php');

// getリクエストを弾く処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    postValidation();
} else {
    header('location: index.php');
    exit;
}


    // バリデーションする関数
    function postValidation()
    {
        // この変数たちはfunction外での定義も外からの参照もできないのでクラスを作ってその中での処理群の一つにすべきか？
        $post = $_POST["post"];
        $name = $post["name"];
        $product = $post["product"];
        $price = (int)$post["price"];
        $date = $post["date"];

        // このif文でケタ数が多いときにリダイレクトさせる
        if (strlen($price) <=  3) {
            // ここでデータベースへの登録
            try {
                $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->exec("INSERT INTO posts (name, product, price, date) VALUES ('$name','$product', '$price', '$date')");
                // リダイレクトが機能していないので機能するようにする
                header("Location:./index.php");
            } catch (PDOException $e) {
                echo "データベースに接続できませんでした:".$e->getMessage();
            }
        } else {
            // リダイレクトするときに情報を追加して送ってalertを出させる処理
            header('location: index.php?digits_error="true"');
            exit;
        }
    }
