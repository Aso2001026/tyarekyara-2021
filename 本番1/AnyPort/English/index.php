<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="icon"　type="image/svg+xml" href="../image/logo.png">

  <!-- グーグルフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
  <title>
    <?php
    if(isset($title)){
        echo $title;
    }else{
       echo 'AnyPort';
    }
    ?>
</title>
</head>
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
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/ANYPORT/yahooYolp/ydlp_input.php">トップページ</a></li>
                <li><a href="../googleMap.php">Map</a></li>
                <li><a href="../rate.php">通貨レート</a></li>
		<li><a href="http://keen-akune-3587.bambina.jp/charekyara/ANYPORT/translate/translate.php">翻訳</a></li>
                <li><a href="../keijiban1.php">掲示板</a></li>
                <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/English/">定型文</a></li>
            </ul>
        </nav>
        <div class="accountMenu">
            <?php if (!isset($_SESSION['user']))  : ?>
            <a href="http://keen-akune-3587.bambina.jp/charekyara/ANYPORT/login/login.php" class="newRegister_login">新規登録/ログイン</a>
<?php else :?>
            <a href="http://keen-akune-3587.bambina.jp/charekyara/ANYPORT/logout/logout.php" class="newRegister_login">ログアウト</a>
            <a href="http://keen-akune-3587.bambina.jp/charekyara/ANYPORT/mypage/mypage.php" class="myPage">マイページ</a>
<?php endif; ?>
      </div>
  </div>

</header>
<!-- header終わり -->
<body>
  <main>
    <form method="post">
      <div class="cp_ipselect cp_sl02">
        <select name="choose" required>
          <option value="" hidden>Choose</option>
          <option value="道の利き方">道の利き方</option>
          <option value="定員さんへの挨拶から">定員さんへの挨拶から</option>
          <option value="お会計">お会計</option>
          <option value="代金を支払う時">代金を支払う時</option>
          <option value="チェックイン">チェックイン</option>
          <option value="">全部</option>
        </select>
        </div>
        <button type="submit"　title="Choice">選択(クリックしてください)</button>
    </form>
    <table>

    <?php
    $word=$_POST['choose'];
  $pdo=new PDO('mysql:host=mysql152.phy.lolipop.lan;dbname=LAA1353460-teikeibun;charset=utf8','LAA1353460','aso202109');

  foreach($pdo->query("select*from word WHERE tag LIKE '%$word%'")as $row){
    echo '<tr>';
    echo '<td>';
    echo '<p class="word">',nl2br($row['Q']),'</p>';
    echo '<p class="word-j">',nl2br($row['QJ']),'</p>';
    echo '</td>';
    echo '</tr>';
    if(isset($row['A'])){
      echo '<tr>';
      echo '<td>';
      echo '<p class="word">',nl2br($row['A']),'</p>';
      echo '<p class="word-j">',nl2br($row['AJ']),'</p>';
      echo '</td>';
      echo '</tr>';
    }
  }
    $pdo=null;
  
  ?>
    </table>
  </main>
</body>
</html>