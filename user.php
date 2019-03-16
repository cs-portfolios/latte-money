<?php
session_start();
// 試しのページ
include_once './config.php';
// if (!isset($_SESSION['name'])) {
//     header("Location: index.php");
// }
$name = $_SESSION['loginName'];


// try {
//     $db = new PDO(
//                     DSN,
//                     USERNAME,
//                     PASSWORD
//                              );
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//     $sql = "SELECT * FROM users where name = ".$_SESSION['loginName']."";
//     // クエリを実行してnameをデータベースから持ってくる
//     $result = $db->query($sql)->fetchALL(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
//     foreach ($result as $row) {
//         $name = $row['name'];
//     }
// } catch (PDOException $e) {
//     echo "データベースに接続できませんでした:".$e->getMessage();
// }
?>


<p>こんにちは<?= $name ?>さん</p>
<?=
var_dump($_SESSION);
