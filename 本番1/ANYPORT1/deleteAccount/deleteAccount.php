<?php
session_start();

$flag = false;

if(isset($_SESSION['user'])){
    $flag = true;
}

if(!$flag){
    header("Location: http://keen-akune-3587.bambina.jp/AnyPort/toppage.php");
}


if (!empty($_POST['delete'])) {


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

    // 入力情報をデータベースに登録
    $statement = $pdo->prepare("DELETE FROM `m_users` WHERE user_id=?");
   $deleteFlag = $statement->execute(array(
        $_SESSION['user']['id']
    ));

   if($deleteFlag){
       $_SESSION = array();   // セッションを破棄
       session_destroy();
       //クッキーの削除
       if (isset($_COOKIE["PHPSESSID"])) {
           setcookie("PHPSESSID", '', time() - 1800, '/');
       }
       header("Location: ../deleteAccountCompletion/deleteAccountCompletion.php");
       exit();
   }

}

$title = 'アカウント削除';
require '../header.php';
?>
<h2 class="completionTitle">アカウント削除</h2>
<div class="completion">
    <p>アカウントを削除しますか？</p>
    <form action="" method="post">
        <input type="hidden" value="1" name="delete">
        <button type="submit">削除</button>
    </form>
</div>
<?php
$pdo = null;
require '../footer.php'?>
