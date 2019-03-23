<?php
session_start();

include_once('./config.php');


if (!empty($_POST['name'] && !empty($_POST['password']))) {
    $name = $_POST['name'];
    $password = $_POST['password'];


    try {
        $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // 先にnameに一致するrowを探して、そのあとにhash化したパスワードと一致するかどうかを調べる
        // という流れでログイン機能を作成する
        $sql ="SELECT * FROM users WHERE name = '$name'";
        $result = $db->query($sql)->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        foreach ($result as $row) {
            $hashedPassword = $row['password'];
            $name = $row['name'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['loginName'] = $name;
                header("Location:./view/index.php");
            } else {
                echo 'パスワードが違うよ';
            }
        }



        // $resultの中にはnameに合致したrowが入ってる
    } catch (PDOException $e) {
        echo "データベースに接続できませんでした:".$e->getMessage();
    }
} else {
    echo "errorだよ";
}
