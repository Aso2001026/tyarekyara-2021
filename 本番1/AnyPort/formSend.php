<?php
session_start();

$title = 'フォーム送信完了';
require './header.php';
?>
<h2 class="completionTitle">送信完了</h2>
<div class="completion">
    <p>送信が完了しました。後日メールにて連絡いたします。</p>
    <a href="test.php" class="toppageButton">トップページはこちら</a>
</div>
<?php require './footer.php'?>
