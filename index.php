<!-- 新規投稿と、投稿一覧のページ -->
<!-- 上の方に新規投稿、その下に今までの投稿一覧 -->
<!-- 最初にログインしてあるかどうかを診断して、そのアカウントの投稿をfetchで一覧表示させる -->

<?php

$title = "投稿一覧";
require_once("./layout.php");


// 桁数が多いときのエラーの際にだけalertを出させる処理
$digits_error = $_GET["digits_error"];
if ($digits_error==true) {
    echo('<script type="text/javascript">alert("ケタ数は3ケタまでです");</script>');
} else {
}

?>


<!-- 投稿フォーム -->
<div class="form-group">
    <form action="check.php" method="post" class="form" name="postForm">
        <!-- todo -->
        <!-- ログイン機能が完成したらnameとpasswordも投稿させるようにする -->
        <!-- post[name]にはログイン中の名前を変数でvalueで入れるようにする -->
        <label>Product</label>
        <input type="text" class="form-control" name="post[product]" id="product" placeholder="買った商品">
        <label>Price</label>
        <input type="number" name="post[price]" id="price" placeholder="3ケタまで">
        <label>date</label>
        <input type="date" class="form-control" name="post[date]" id="date" value="today">
        <button class="form-control" type="submit" onclick="return postCheck()">投稿する</button>
    </form>
</div>