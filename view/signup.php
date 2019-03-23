<?php
session_start();
include_once('./layout.php');

// サインアップする時にはsessionを破棄してから再度sessionを作成して、
// 投稿一覧のページにリダイレクトさせる方が良さげに思う

// このページで破棄して、そのあとのregister.phpでsessionを発行させてみる

?>



<p>新規登録</p>
<form id="signupForm" action="../register.php" method="post" class="form" name="postForm">
    <p>ユーザー名</p>
    <input type="text" id="name" name="name" placeholder="ユーザー名10文字まで" maxlength="10">
    <input type="password" id="password" name="password" placeholder="パスワード4文字" maxlength="4" minlength="4">
    <button calss="form_control" type="submit" onclick="return signupCheck()">Sign Up</button>
</form>