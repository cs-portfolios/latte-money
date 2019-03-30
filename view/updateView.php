<?php

// 編集したい投稿にbuttonをセットしてそこからこのページにpostでidキーを送り込む
// そのidを使ってデータの取得と、編集をする
$title ="編集画面";
include_once('./layout.php');
include_once('../config.php');
include_once('./header.html');


$post_id = $_POST['post_id'];

$db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      $stmt = $db->query("SELECT post_id, posts.* FROM posts WHERE post_id = '$post_id'");
      $rows = $stmt->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
      foreach ($rows as $row) {
          $currentProduct = $row['product'];
          $currentPrice = $row['price'];
          $currentDate = $row['date'];
          $currentName = $row['name'];
      }
?>
<div class="row" style="min-height:100vh;">
    <div class="col-md-8 ml-auto mr-auto">
        <div class="form-group">
            <form action="../update.php" method="post" class="form" name="postForm">
                <!-- todo -->
                <!-- formの中には元々は入っていたデートを入力しておいて、それを削除して中身を入れてからprimary keyのidを使って上書きさせるようにする
        なので、全部のvalueが更新されるようなquery文を書く必要がある -->
                <input type="hidden" class="form-control" name="post[post_id]"
                    value="<?= $post_id ?>">
                <input type="hidden" class="form-control" name="post[name]"
                    value="<?= $currentName?>">
                <label>商品:</label>
                <input type="text" class="form-control" name="post[product]" id="product"
                    value="<?= $currentProduct?>">
                <label>値段:</label>
                <input type="number" class="form-control" name="post[price]" id="price"
                    value="<?= $currentPrice?>">
                <label>日付:</label>
                <input type="date" class="form-control" name="post[date]" id="date"
                    value="<?= $currentDate?>">
                <button class="btn btn-primary mt-3" type="submit" onclick="return
    postCheck()">Edit</button>
            </form>
        </div>
    </div>
</div>

<?php include_once('./footer.html');
