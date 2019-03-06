<?php
include_once('./layout.php');

// セッション作成、セッションの中に新規登録postのnameを送信してる
// 入ってたらリダイレクトするよ
session_start();
if (!isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
} else {
    header("Location: ./index.php");
    exit;
}

?>



<p>新規登録</p>
<form id="signupForm" action="register.php" method="post" class="form" name="postForm">
    <p>ユーザー名</p>
    <input type="text" id="name" name="name" placeholder="ユーザー名10文字まで" maxlength="10">
    <input type="password" id="password" name="password" placeholder="パスワード4文字" maxlength="4" minlength="4">
    <button calss="form_control" type="submit" onclick="return signupCheck()">Sign Up</button>
</form>