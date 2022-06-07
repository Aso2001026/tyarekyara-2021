<?php
session_start();

$title = 'パスワードリセット';
require './header.php';
?>
<h2 class="completionTitle">メールアドレス送信フォーム</h2>
<div class="mailInput">
    <form method="post" action="formSend.php">
        <p class="singUpMail"><label>メールアドレス</label><input type="text" name="singUpMail"></p>
        <p class="singUpCheckButton"><button type="submit" name="singUpCheckButton">フォームを送信</button></p>
    </form>
</div>
<?php require './footer.php'?>
