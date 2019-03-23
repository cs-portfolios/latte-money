<?php
session_start();
// logout.phpに飛んでくる時にlogoutという属性？をvalueに持っていたらif文が発火する
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['loginName']);
    header("Location: ./view/index.php");
} else {
    header("Location: ./view/index.php");
}
