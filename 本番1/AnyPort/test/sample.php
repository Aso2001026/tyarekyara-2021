<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  // 日付取得
    date_default_timezone_set('Japan');
    $date=date('Y-m-d');
  $pdo = new PDO(
    'mysql:host=mysql154.phy.lolipop.lan;
dbname=LAA1353460-charekyra;charaset=utf8',
    'LAA1353460',
    'PassChare1019');
    $sql=$pdo->prepare("insert into t_bulletinBoard(user_id,bulletinBoard_title,reg_date) values(?,?,?)");
    if($sql->execute(["2","テスト","$date"])){
      //成功
      echo '成功';
    }else{
      //失敗
      echo '失敗';
    }
  ?>
</body>
</html>