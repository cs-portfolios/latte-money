<!-- 新規投稿と、投稿一覧のページ -->
<!-- 上の方に新規投稿、その下に今までの投稿一覧 -->
<!-- 最初にログインしてあるかどうかを診断して、そのアカウントの投稿をfetchで一覧表示させる -->

<?php
session_start();
if (!isset($_SESSION['loginName'])) {
    header("Location:./login.php");
    exit();
}

$title = "投稿一覧";
include_once('./layout.php');
include_once('../config.php');

// ログイン中のname
$loginName = $_SESSION['loginName'];
$loginName = htmlspecialchars($loginName, ENT_QUOTES);


// 桁数が多いときのエラーの際にだけalertを出させる処理
$digitsError = $_GET["digits_error"];
if ($digitsError==true) {
    echo('<script type="text/javascript">alert("ケタ数は3ケタまでです");</script>');
} else {
}

include_once('./header.html');
?>

<!-- 投稿フォーム -->
<div class="row">

    <div class="col-md-8 mr-auto ml-auto">
        <p class="h4 mt-3"><?= $loginName ?>さん、何を買いましたか？
        </p>
        <div class="form-group">
            <form action="../check.php" method="post" class="form" name="postForm">
                <input type="hidden" class="form-control" name="post[name]" id="name"
                    value="<?=$loginName ?>">
                <label>商品:</label>
                <input type="text" class="form-control" name="post[product]" id="product" placeholder="買った商品">
                <label>値段:</label>
                <input type="number" class="form-control" name="post[price]" id="price" placeholder="3ケタまで">
                <label>日付:</label>
                <input type="date" class="form-control" name="post[date]" id="date" value="today">
                <div class="row">
                    <button class="btn btn-primary mt-3 ml-3" type="submit" onclick="return postCheck()">Post</button>
                    <!-- ログアウトボタン -->
                    <input class="btn btn-danger mt-3 mr-3 ml-auto" type="button" value="Log out"
                        onclick="location.href='../logout.php?logout'">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 今までの投稿分を表示するrow -->
<div class="row justify-content-center">
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

      $stmt = $db->query("SELECT post_id, posts.* FROM posts WHERE name = '$loginName'");
      $rows = $stmt->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
      $rows = array_reverse($rows);
      $totalPrice = 0;

      //   foreachでrowごとのデータをひとまとめにした配列を作ろう
      foreach ($rows as $row) {
          //   合計金額を計算
          $totalPrice += $row['price'];
          //   クラスとかは最後に調節する
          echo <<<EOD
          <div class="card col-md-3 col-5 bg-light border-secondary m-1 ">
          <p class="product" style="margin-top:1rem;">商品:{$row['product']}</p>
          <p class="price">値段:{$row['price']}円</p>
          <p class="date">日付:{$row['date']}</p>
          <div class="row justify-content-around">
                <form action="updateView.php" method="post">
                <input type="hidden" name="post_id" value={$row['post_id']}>
                    <button class="btn" type="submit"><i class="far fa-edit"></i></button>
                </form>
                <form action="../delete.php" method="post">
                <input type="hidden" name="post_id" value={$row['post_id']}>
                    <button class="btn" type="submit" onclick="return deleteAlert()"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
          </div>

EOD;
      }
  } catch (PDOException $e) {
      echo "データベースに接続できませんでした:".$e->getMessage();
  }
?>
</div>


<!-- 合計金額のrow -->
<div class="row">
    <div class="col-12 mt-3 mb-3" style="text-align:center;">
        <p class="h4">これまでのラテマネーの合計は<span style="color:#7b5544
;" class="h3"><?= $totalPrice ?>円</span>です。
        </p>
    </div>
</div>

<?php include('./footer.html');
