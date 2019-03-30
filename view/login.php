<?php
// ログインするためのページ
$title = "ログイン";
include_once("./layout.php");
include_once('./header.html');



?>

<div class="row" style="min-height:100vh;">
    <div class="col-md-8 ml-auto mr-auto mt-2">
        <form id="loginForm" action="../loginCheck.php" method="post" class="form-group" name="postForm">
            <label>ログインユーザー名</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="ユーザー名10文字まで" maxlength="10">
            <label class="mt-2">パスワード</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="パスワード4文字"
                maxlength="4" minlength="4">
            <button class="btn btn-success mt-3" type="submit" onclick="return loginCheck()">Login</button>
        </form>
        <div class="row">
            <div class="col-12">
                <form id="signupForm">
                    <p>新規登録はこちら↓</p>
                    <a class="btn btn-info" href="./signup.php">Sign up</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('./footer.html');
