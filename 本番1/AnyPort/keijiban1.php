<?php
session_start();

require './header.php';
?>

    <link rel="stylesheet" href="./css/keijiban1.css">
    
    <div class="back">
    <?php
    if($_POST['up']==='send'){

  // 日付取得
    date_default_timezone_set('Japan');
    $date=date('Y-m-d');
  $pdo = new PDO(
    'mysql:host=mysql154.phy.lolipop.lan;
dbname=LAA1353460-charekyra;charaset=utf8',
    'LAA1353460',
    'PassChare1019');
    $sql=$pdo->prepare("insert into t_bulletinBoard(user_id,bulletinBoard_title,bulletinBoard_coment,reg_date) values(?,?,?,?)");
    if($sql->execute([$_SESSION['user']['id'],$_POST['title'],$_POST['coment'],$date])){
      //成功
      echo '<p>投稿しました</p>';
      $_POST['up']=null;
    }else{
      //失敗
      echo '<p>もう一度お試しください</p>';
    }
  }

  ?>
     <h2 class="keiji">掲示板</h2>
     <hr class="cp_hr01" />
      <div class="toukoo">
        <form method="post" class="toukou">
            <?php
          echo '<p>おなまえ<br><input type="text" name="name" class="name" value="',$_SESSION['user']['name'],'"  ></p>';
          ?>
          <p>タイトル<br><input type="text" name="title" class="name"></p>
            
          <p class="coment_all">コメント<br><textarea rows="5" cols="20" name="coment" class="coment"></textarea></p>

          <p> <button type="submit" name="up" value="send" class="botan">投稿</button></p>
   
        </form>
    </div>
     <hr class="cp_hr01" />
    <div class="kensaka">
    <form method="post" class=kensaku>
        
    <input type="text" name="kensaku" class="textbox" placeholder="キーワードを入力してください。">
        <button type="submit" name="saku" value="send">検索</button>
    </form>
        </div>
<div class="box1">
<!--
    <ul class="list">
        <li class="this">1</li>
        <li><a href=2>2</a></li>
        <li><a href=3>3</a></li>
        <li class=>・・・</li>
        <li><a href=15>15</a></li>
    </ul>
-->

<table class="table">
    <tr>
        <th>投稿者</th>
        <th>トピック</th>
        <th>投稿日</th>
    </tr>
    <?php

  $pdo = new PDO(
    'mysql:host=mysql154.phy.lolipop.lan;
dbname=LAA1353460-charekyra;charaset=utf8',
    'LAA1353460',
    'PassChare1019');
    foreach($pdo->query('select t_bulletinBoard.bulletinBoard_id,t_bulletinBoard.bulletinBoard_title,t_bulletinBoard.bulletinBoard_coment,t_bulletinBoard.reg_date,m_users.user_name from t_bulletinBoard,m_users where t_bulletinBoard.user_id=m_users.user_id')as $row){
      echo '<tr>';
      echo '<td><a href="http://keen-akune-3587.bambina.jp/AnyPort/keijiban2.php?id=',$row['bulletinBoard_id'],'">',$row['user_name'],'</td>';
      echo '<td>',$row['bulletinBoard_title'],'</td>';
      echo '<td>',$row['reg_date'],'</td></a>';
      echo '</tr>';
    }
  ?>
</table>

   <!--
    <ul class="list">
        <li class="this">1</li>
        <li><a href=2>2</a></li>
        <li><a href=3>3</a></li>
        <li>・・・</li>
        <li><a href=15>15</a></li>
    </ul>
    -->
        </div>
    </div>
    
</body>
</html>

