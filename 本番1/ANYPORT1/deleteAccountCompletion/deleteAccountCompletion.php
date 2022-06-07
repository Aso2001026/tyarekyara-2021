<?php
session_start();
$title = '削除完了';
require '../header.php';
?>
    <h2 class="completionTitle">削除完了</h2>
    <div class="completion">
        <p>削除が完了しました。</p>
        <a href="test.php" class="toppageButton">トップページはこちら</a>
    </div>
<?php require '../footer.php'?>