<?php
session_start();
// アカウントの新規登録をするための処理がこのファイル

include_once('./config.php');

// Postで送られてきたnameとpasswordを変数に代入する処理
// passwordはハッシュ化する

$name = $_POST['name'];
$name = htmlspecialchars($name, ENT_QUOTES);
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

try {
    $db = new PDO(
        DSN,
        USERNAME,
        PASSWORD
    );
    // 属性の付与（エラーレポートと、エラーの例外を投げる)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // この下にQueryを書いてexecさせる
    $db->exec("INSERT INTO users(name, password) VALUE ('$name','$password')");
    $_SESSION['loginName'] = $name;
    header("Location: ./view/index.php");
    exit;
} catch (PDOException $e) {
    header('Location: ./view/signup.php?name_error="true"');
    exit;
}

