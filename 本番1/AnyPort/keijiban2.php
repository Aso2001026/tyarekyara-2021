<?php
session_start();

if(isset($_POST['delete'])){
    $pdo = new PDO('mysql:host=mysql154.phy.lolipop.lan;
                dbname=LAA1353460-charekyra;charset=utf8',
        'LAA1353460',
        'PassChare1019');
    $sql = 'delete from t_bulletinBoard WHERE user_id = ? and bulletinBoard_id = ?';
    $result = $pdo -> prepare($sql);
    $result -> bindValue(1,$_SESSION['user']['id']);
    $result -> bindValue(2,$_GET['id']);
    $result -> execute();

    header("Location: http://keen-akune-3587.bambina.jp/charekyara/AnyPort/keijiban1.php");
}
require './header.php';
?>

    
<link rel="stylesheet" href="./css/keijiban2.css">
    <h2><?php
echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
?></h2>
    <?php

$pdo = new PDO(
  'mysql:host=mysql154.phy.lolipop.lan;
dbname=LAA1353460-charekyra;charaset=utf8',
  'LAA1353460',
  'PassChare1019');
  $sql=$pdo->prepare('select t_bulletinBoard.user_id,t_bulletinBoard.bulletinBoard_title,t_bulletinBoard.bulletinBoard_coment,t_bulletinBoard.reg_date,m_users.user_name from t_bulletinBoard,m_users where t_bulletinBoard.bulletinBoard_id=? and t_bulletinBoard.user_id=m_users.user_id');
  $sql->execute([$_GET['id']]);
  foreach($sql as $row){
    echo '<div class="title-box3">';
    echo '<div class="title-box3-title">',$row['bulletinBoard_title'],'</div>';
    echo '<h1>',$row['user_name'],'</h1>';
    echo '<p>',nl2br($row['bulletinBoard_coment']),'</p></a>';
    if($row['user_id'] == $_SESSION['user']['id']){
        echo '<form action="" method="post">';
        echo '<input value="',$_GET['id'],'" type="hidden" name="delete">';
        echo '<button type="submit">書き込み削除</button>';
        echo '</form>';
    }
    echo '</div>';

  }
  

?>

<?php require './footer.php'; ?>