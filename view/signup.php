<?php
session_start();
$title = "新規登録";
include_once('./layout.php');
include_once('./header.html');

// 同じ名前の時にエラーを出させる処理
$nameError = $_GET["name_error"];
if ($nameError == true) {
    echo('<script type="text/javascript">alert("その名前は使われています。");</script>');
} else {
}

?>


<div class="row" style="min-height: 100vh;">
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

<?php include_once('./footer.html');
