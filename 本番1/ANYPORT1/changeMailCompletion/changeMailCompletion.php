<?php
session_start();

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

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



$result = false;
$sResult = false;

if(!empty($_GET)) {
    //GETデータを変数に入れる
    $urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : NULL;
    //メール入力判定
    if ($urltoken == ''){
        $error['urltoken'] = "トークンがありません。";
    }else{
        try{

            $id  = "";
            $mail  = "";
            // DB接続
            //flagが0の未登録者 or 仮登録日から24時間以内
            $sql = "SELECT pre_user_mail, user_id FROM m_pre_users WHERE pre_user_token=(:pre_user_token) AND flag =2 AND reg_date > now() - interval 24 hour";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':pre_user_token', $urltoken, PDO::PARAM_STR);
            $stm->execute();


            //レコード件数取得
            $row_count = $stm->rowCount();

            //24時間以内に仮登録され、本登録されていないトークンの場合
            if( $row_count ==1){
                $mail_array = $stm->fetch();
                $mail = $mail_array["pre_user_mail"];
                $id = $mail_array["user_id"];
            }else{
                $error['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。";
            }

            if($id != "" && $mail != ""){
                $sql = "update m_users set user_mail=(:user_mail) where user_id=(:user_id)";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':user_mail', $mail, PDO::PARAM_STR);
                $stm->bindValue(':user_id', $id, PDO::PARAM_STR);
                $result =  $stm->execute();

            }

            if($result){
                unset($_SESSION['user']);
                $sql = "select * from m_users where user_id=(:user_id)";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':user_id', $id, PDO::PARAM_STR);
                $stm->execute();

                foreach ($stm as $row){
                    $_SESSION['user']=[
                        'id'=>$row['user_id'],
                        'name'=>$row['user_name'],
                        'country_code' =>$row['country_code'],
                        'language_code'=>$row['language_code'],
                        'mail' => $row['user_mail']
                    ];
                    $sResult = ture;
                }
            }

            //データベース接続切断
            $stm = null;
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
    }
}else{

}

$title = '新規登録';
require '../header.php';

?>
<?php if (!empty($_GET)):?>
    <?php if (isset($error['urltoken'])) :?>
        <div class="singUpInMail">
            <h2 class="singUpInputTitle">エラー</h2>
            <p class="singUpNotes"><?=$error['urltoken']?></p>
            <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
        </div>
    <?php elseif (isset($error['urltoken_timeover'])  ): ?>
        <div class="singUpInMail">
            <h2 class="singUpInputTitle">エラー</h2>
            <p class="singUpNotes"><?=$error['urltoken_timeover']?></p>
            <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
        </div>
    <?php elseif (!$result): ?>
        <div class="singUpInMail">
            <h2 class="singUpInputTitle">エラー</h2>
            <p class="singUpNotes">変更できませんでした。もう一度お試しください</p>
            <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
        </div>
    <?php elseif (!$sResult): ?>
        <div class="singUpInMail">
            <h2 class="singUpInputTitle">エラー</h2>
            <p class="singUpNotes">メールアドレスの変更はできましたが、ログインが解除されました。</p>
            <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
        </div>
    <?php else :?>
        <div class="singUpInMail">
            <h2 class="singUpInputTitle">変更完了</h2>
            <p class="singUpNotes">変更が完了しました。</p>
            <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php
$pdo = null;
require '../footer.php'
?>
