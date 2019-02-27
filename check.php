<?php
// このファイルでは投稿内容のエラーの判別と、
// 投稿されたデータのデータベースへの登録をする
// バリデーションしてから、データベースに登録できるようにする


// getリクエストを弾く処理
if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    // ここにバリデーション処理とデータベースへの投稿を記述した関数を入れる
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
        print_r($post);
        $name = $post["name"];
        $password = $post["password"];
        $product = $post["product"];
        $price = (int)$post["price"];
        $date = $post["date"];

        // このif文でケタ数が多いときにリダイレクトさせる
        if (strlen($price) <=  3) {
            return;
            // ここに直接データベースへの登録を記述して行く予定
            require_once("./db.php");
        } else {
            // リダイレクトするときに情報を追加して送ってalertを出させる
            header('location: index.php?digits_error="true"');
            exit;
        }
    }
