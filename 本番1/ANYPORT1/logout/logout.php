<?php
session_start();

$_SESSION = array();
//クッキーの削除
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}
//セッションを破棄する
session_destroy();


$title = 'ログアウト';
require '../header.php';
?>

    <h2 class="completionTitle">ログアウト完了</h2>
    <div class="completion">
        <p>ログアウト完了しました。</p>
        <a href="http://keen-akune-3587.bambina.jp/AnyPort/toppage.php" class="toppageButton">トップページはこちら</a>
    </div>
<?php require '../footer.php'?>