<?php
session_start();
$title = "新規登録";
include_once('./layout.php');
include_once('./header.html');

?>


<div class="row">
    <div class="col-md-8 ml-auto mr-auto mt-2">
        <p class="h4">新規登録</p>
        <form id="signupForm" action="../register.php" method="post" class="form-group" name="postForm">
            <label>ユーザー名</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="ユーザー名10文字まで" maxlength="10">
            <label class="mt-2">パスワード</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="パスワード4文字"
                maxlength="4" minlength="4">
            <button class="btn btn-info mt-3" type="submit" onclick="return signupCheck()">Sign Up</button>
        </form>
    </div>
</div>