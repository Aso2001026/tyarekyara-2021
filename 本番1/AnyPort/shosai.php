<?php 
session_start();

require './header.php'; ?>
<head>
    <link rel="stylesheet"href="css/style1.css">
</head>

<div class="sample1"><h1>基本情報</h1></div>
<h2>イベントの名前</h2>
<img src="image/イメージ画像のアイコン素材.jpeg" align="left" vspace="30" hspace="30">
<table align="left" border="1">
    <tr>
        <th>所在地</th>
        <td>〒000-0000 ○○県○○市○区<br>
        </td>
    </tr>
    <tr>
        <th>問い合わせ先</th>
        <td>○○○○○
            　<br>
            TEL 000-0000-0000
            <br>
        </td>
    </tr>
    <tr>
        <th>開催日・開催時間</th>
        <td>2021年9月14日～19日　<br>
        </td>
    </tr>
    <tr>
        <th>アクセス</th>
        <td>○○○駅徒歩10分
            　<br>
            詳しくはホームページをご覧ください。<br>
        </td>
    </tr>
    <tr>
        <th>料金</th>
        <td>無料<br>
        </td>
    </tr>
    <tr>
        <th>開催地</th>
        <td>河川敷周辺　<br>
        </td>
    </tr>
</table>
<div class="d">
    <h3>口コミ</h3>
    <a href="test16.php">口コミを投稿する</a>
</div>


<ul class="simple-list">
    <li>
        <a href="">口コミ1<br /><span>とてもきれいでした。<br>2021/9/10  10:48</span></a>
    </li>
    <li>
        <a href="">口コミ2<br /><span>楽しかったです<br>また行きたいと思います。<br>2021/9/1  11:23</span></a>
    </li>
    <li>
        <a href="">口コミ3<br /><span>迫力がすごかったです<br>2021/7/3  13:30</span></a>
    </li>
    <li>
        <a href="">口コミ4<br /><span>めっちゃきれいでした<br>2021/6/3  20:15</span></a>
    </li>
</ul>
<?php require './footer.php';?>
