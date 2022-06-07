<?php
session_start();
require '../header.php'; ?>
<head>
    <link rel="stylesheet"href="../css/style.css">
    <link rel="stylesheet"href="../css/myPageNav.css">

</head>
<nav class="MyInformationNav">
    <ul>
        <li><a href="../mypage/mypage.php">登録情報</a></li>
        <li><a href="../test9/test9.php">お気に入り</a></li>
        <li><a href="../Shin/Shin.php">検索履歴</a></li>
    </ul>
</nav>
<div class="c">
    <h2 id="title">お気に入り結果一覧</h2>　表示された情報は10件です。
</div>
<ul class="list">
    <li><a href="test3.php">1</a></li>
    <li><a href="test10.php">2</a></li>
    <li><a href="test11.php">3</a></li>
    <li><a href="test12.php">4</a></li>
    ・・・
    <li><a href="test13.php">10</a></li>
</ul>

<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">グルメ1</a></h3>
        <p class="text_excerpt">スイーツ<br>場所　：○○県○○市○区</p>
    </div>
</article>
<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">グルメ2</a></h3>
        <p class="text_excerpt">フレンチ<br>場所　：○○県○○市○区</p>
    </div>
</article>
<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">グルメ3</a></h3>
        <p class="text_excerpt">肉料理<br>場所　：○○県○○市○区</p>
    </div>
</article>
<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">フルーツ</a></h3>
        <p class="text_excerpt">期間　：2021年9月20日～9月22日<br>場所　：○○県○○市○区</p>
    </div>
</article>
<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">郷土料理</a></h3>
        <p class="text_excerpt">期間　：2021年8月6日～9月19日<br>場所　：○○県○○市○区</p>
    </div>
</article>
<article>
    <figure>
        <img src="image/イメージ画像のアイコン素材.jpeg" alt="画像">
    </figure>
    <div class="text_content">
        <h3><a href="#"target="_blank">居酒屋</a></h3>
        <p class="text_excerpt">期間　：2021年7月1日～7月31日<br>場所　：○○県○○市○区</p>
    </div>
</article>

<?php require '../footer.php';?>
