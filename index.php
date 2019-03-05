<!-- 新規投稿と、投稿一覧のページ -->
<!-- 上の方に新規投稿、その下に今までの投稿一覧 -->
<!-- 最初にログインしてあるかどうかを診断して、そのアカウントの投稿をfetchで一覧表示させる -->

<?php

$title = "投稿一覧";
include_once('./layout.php');
include_once('./config.php');

// ログイン中のname
$login_name = "testくん";


// 桁数が多いときのエラーの際にだけalertを出させる処理
$digits_error = $_GET["digits_error"];
if ($digits_error==true) {
    echo('<script type="text/javascript">alert("ケタ数は3ケタまでです");</script>');
} else {
}

?>

<!-- 投稿フォーム -->
<div class="row">
    <div class="card" style="width: 25em">
        <div class="form-group">
            <form action="check.php" method="post" class="form" name="postForm">
                <!-- todo -->
                <!-- ログイン機能が完成したらnameとpasswordも投稿させるようにする -->
                <!-- post[name]にはログイン中の名前を変数でvalueで入れるようにする -->
                <input type="hidden" class="form-control" name="post[name]" id="name" value="<?=$login_name ?>">
                <label>Product</label>
                <input type="text" class="form-control" name="post[product]" id="product" placeholder="買った商品">
                <label>Price</label>
                <input type="number" name="post[price]" id="price" placeholder="3ケタまで">
                <label>Date</label>
                <input type="date" class="form-control" name="post[date]" id="date" value="today">
                <button class="form-control" type="submit" onclick="return postCheck()">投稿する</button>
            </form>
        </div>
    </div>
</div>

<?php

// 投稿一覧
// データベースの取得

  try {
      $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = "";//空の配列を作る
      $stmt = $db->query("SELECT * FROM posts WHERE name = '$login_name'");
      $rows = $stmt->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);

      //   foreachでrowごとのデータをひとまとめにした配列を作ろう
      foreach ($rows as $row) {
        //   クラスとかは最後に調節する
          echo <<<EOD
          <div class="post" style="background-color:moccasin">
          <p class="product">{$row['product']}</p>
          <p class="price">{$row['price']}</p>
          <p class="date">{$row['date']}</p>
          </div>

EOD;
      }
  } catch (PDOException $e) {
      echo "データベースに接続できませんでした:".$e->getMessage();
  }

// idをキーとした配列とその中の変数を出力するのにjqueryを使って見よう
// bootstrapなのでcol数が3やら4やらで割り切れるときには新規rowで改行？させるようにする
// ヒアドキュメントを使ってechoもしくはprintを使って出力させよう
