<?php
session_start();

$title = 'ログイン';
require './header.php';
?>
<div class="checkPassword">
    <form action="myInformationChange.php" method="post">
        <h2 class="loginTitle">パスワード確認</h2>
        <div class="password">
            <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
            <p class="forgetPassword"><a href="forgotPassword.php">パスワードをお忘れですか？</a></p>
        </div>
        <p class="loginButton"><button type="submit" name="loginButton">確定</button></p>
    </form>
</div>

<?php require './footer.php'?>

