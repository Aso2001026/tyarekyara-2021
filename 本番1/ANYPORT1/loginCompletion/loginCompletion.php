<?php
session_start();
$title = 'ログイン完了';
require '../header.php';
?>

<h2 class="completionTitle">ログイン完了</h2>
<div class="completion">
    <p>ログインが完了しました。</p>
    <a href="http://keen-akune-3587.bambina.jp/AnyPort/toppage.php" class="toppageButton">トップページはこちら</a>
</div>

<?php require '../footer.php'?>