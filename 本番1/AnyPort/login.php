<?php
session_start();

$title = 'ログイン';
require './header.php';
?>
<p class="BreadcrumbTrail">ホーム > 新規登録/ログイン</p>
<div class="login">
    <form action="loginCompletion.php" method="post">
        <h2 class="loginTitle">ログイン</h2>
        <p class="mailAddress"><label>メールアドレス</label><input type="text" name="mail"></p>
        <div class="password">
            <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
            <p class="forgetPassword"><a href="forgotPassword.php">パスワードをお忘れですか？</a></p>
        </div>
        <p class="nextLogin"><input type="checkbox" name="nextLogin">次回から自動的にログイン</p>
        <p class="loginButton"><button type="submit" name="loginButton">ログイン</button></p>
    </form>
</div>
<div class="singUp">
        <h2 class="singUpTitle">新規登録</h2>
        <div class="termsOfService">
            <p>【個人情報の取り扱いについて】
当社はお客様の信頼を第一と考え、以下のとおり、お客様の個人情報をご希望に添って取り扱うとともに、正確性・機密性の保持に努めています。</p>
        </div>
        <a href="singUpInput.php" class="singUpButton">新規登録</a>
</div>

<?php require './footer.php'?>

