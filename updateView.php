<?php

// 編集したい投稿にbuttonをセットしてそこからこのページにpostでidキーを送り込む
// そのidを使ってデータの取得と、編集をする

include_once('./layout.php');
include_once('./config.php');


$post_id = $_POST['post_id'];

  $db = new PDO(
                    DSN,
                    USERNAME,
                    PASSWORD
                             );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      $stmt = $db->query("SELECT post_id, posts.* FROM posts WHERE post_id = '$id'");
      $rows = $stmt->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
      foreach ($rows as $row) {
          $currentProduct = $row['product'];
          $currentPrice = $row['price'];
          $currentDate = $row['date'];
      }
?>

<div class="form-group">
    <form action="update.php" method="post" class="form" name="postForm">
        <!-- todo -->
        <!-- formの中には元々は入っていたデートを入力しておいて、それを削除して中身を入れてからprimary keyのidを使って上書きさせるようにする
        なので、全部のvalueが更新されるようなquery文を書く必要がある -->
        <input type="hidden" class="form-control" name="post[name]" id="post_id"
            value="<?=$post_id ?>">
        <label>Product</label>
        <input type="text" class="form-control" name="post[product]" id="product"
            value="<?= $currentProduct?>">
        <label>Price</label>
        <input type="number" name="post[price]" id="price"
            value="<?= $currentPrice?>">
        <label>Date</label>
        <input type="date" class="form-control" name="post[date]" id="date"
            value="<?= $currentDate?>">
        <button class="form-control" type="submit" onclick="return
    postCheck()">編集する</button>
    </form>
</div>