<?php
session_start();
$title = 'フォーム送信完了';


try {
    $pdo = new PDO(
        'mysql:host=mysql154.phy.lolipop.lan;
    dbname=LAA1353460-charekyra;charaset=utf8',
        'LAA1353460',
        'PassChare1019');
}catch(PDOException $e){
    echo "データベース接続エラー :".$e->getMessage();
    $error['db'] = $e->getMessage();
};

if (!isset($_POST['singUpMail'])) {
    header('Location:http://keen-akune-3587.bambina.jp/AnyPort/toppage.php');
    exit();
}


date_default_timezone_set('Asia/Tokyo');
    $date = date('Y-m-d H:i:s');
$mail = $_POST['singUpMail'];

$statement = $pdo->prepare("INSERT INTO t_passMail SET mail=?, reg_date=?");
    $statement->execute(array( 
        $mail,       
        $date
    ));

require '../header.php';
?>

<h2 class="completionTitle">送信完了</h2>
<div class="completion">
    <p>送信が完了しました。後日メールにて連絡いたします。</p>
    <a href="http://keen-akune-3587.bambina.jp/AnyPort/toppage.php" class="toppageButton">トップページはこちら</a>
</div>
<?php require '../footer.php'?>
