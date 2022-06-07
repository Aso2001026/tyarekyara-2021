<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if(isset($title)){
            echo $title;
        }else{
           echo 'AnyPort';
        }
        ?>
    </title>
    <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../../ANYPORT/css/style.css">
</head>
<body>
<!-- header始まり -->
<header>
    <div class="siteTitle">
        <h1 class="siteName">Any Port</h1>
        <h2 class="siteSubTitle">〜アプリひとつで旅行へ〜</h2>
    </div>
    <div class="menu">
        <div class="logo">
            <img src="../image/logo.png" alt="チームロゴ">
        </div>

        <nav class="global-nav">
            <ul>
                <li><a href="../yahooYolp/ydlp_input.php">トップページ</a></li>
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/googleMap.php">Map</a></li>
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/rate.php">通貨レート</a></li>
                <li><a href="../translate/translate.php">翻訳</a></li>
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/keijiban1.php">掲示板</a></li>
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/English/">定型文</a></li>
            </ul>
        </nav>
        <div class="accountMenu">
<?php if (!isset($_SESSION['user']))  : ?>
            <a href="../login/login.php" class="newRegister_login">新規登録/ログイン</a>
<?php else :?>
            <a href="../logout/logout.php" class="newRegister_login">ログアウト</a>
            <a href="../mypage/mypage.php" class="myPage">マイページ</a>
<?php endif; ?>
        </div>
    </div>

</header>
<!-- header終わり -->
