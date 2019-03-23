<?php
// ログインするためのページ

require_once("./layout.php");


?>

</p>

<p>ログイン</p>
<form id="loginForm" action="../loginCheck.php" method="post" class="form" name="postForm">
    <p>ユーザー名</p>
    <input type="text" id="name" name="name" placeholder="ユーザー名10文字まで" maxlength="10">
    <input type="password" id="password" name="password" placeholder="パスワード4文字" maxlength="4" minlength="4">
    <button calss="form_control" type="submit" onclick="return loginCheck()">Login</button>
</form>
<form id="signupForm">
    <p>新規登録はこちら↓</p>
    <a href="./signup.php">Sign up</a>

</form>