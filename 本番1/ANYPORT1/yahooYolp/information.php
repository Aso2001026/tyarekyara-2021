<?php
session_start();

require '../header.php';

?>

    
<link rel="stylesheet" href="../../AnyPort/css/keijiban2.css">
    <h2><?php
echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
?></h2>
    <?php

    $pdo = new PDO('mysql:host=mysql154.phy.lolipop.lan;
    dbname=LAA1353460-charekyra;charset=utf8',
    'LAA1353460',
    'PassChare1019');
  $sql = 'SELECT * FROM t_information where information_id = ?';
                $result = $pdo -> prepare($sql);
                
                $result -> execute([$_GET['id']]);  
  foreach($result as $row){
    echo '<div class="title-box3">';
    echo '<div class="title-box3-title">',$row['information_title'],'</div>';
    echo '<p>',nl2br($row['information_text']),'</p></a>';
    echo '</div>';
  }
  

?>

<?php require './footer.php'; ?>