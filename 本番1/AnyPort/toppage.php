<?php 
session_start();

require './header.php'; ?>
    <head>
        <link rel="stylesheet"href="css/toppage.css">
    </head>
<div class="box">
    <div class="box-title">お知らせ</div>
    <p>2021.11.10　<a href="#" >お知らせが表示されます。</a></p>
    <p>2021.12.24　<a href="#" >お知らせが表示されます。</a></p>
    <p>2021.12.30　<a href="#" >お知らせが表示されます。</a></p>
</div>



<form class="form" action="kensaku.php">
    <input class="textbox" name="s" type="text" placeholder="キーワードを入力">
    <button type="submit" class="button">検索</button>
</form>
<div class="sample">
    <div class="item"><h1><a href="kensaku.php">グルメ</a></h1>郷土料理、ご当地<br>グルメなど</div>
    <div class="item"><h1><a href="kensaku.php">イベント</a></h1>花火、祭りなど</div>
    <div class="item"><h1><a href="kensaku.php">遊び</a></h1>キャンプ場、スポーツ<br>リゾート施設など</div>
    <div class="item"><h1><a href="kensaku.php" >文化歴史</a></h1>公園、博物館<br>世界遺産</div>
    <div class="item"><h1><a href="kensaku.php" >自然</a></h1>山、海岸風景<br>植物など</div>
    <div class="item"><h1><a href="kensaku.php" >ショッピング</a></h1>ショッピングセンター<br>伝統工芸品、特産品など</div>
</div>
<?php require './footer.php';?>