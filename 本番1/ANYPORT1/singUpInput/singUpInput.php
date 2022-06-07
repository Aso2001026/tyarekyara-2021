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

$flag = false;

if(empty($_GET)) {

  if(isset($_SESSION['join']['token'])){
        if ($_SESSION['join']['token'] == ''){
            $error['urltoken'] = "トークンがありません。";
        }else{
            try{
                // DB接続
                //flagが0の未登録者 or 仮登録日から24時間以内
                $sql = "SELECT pre_user_mail FROM m_pre_users WHERE pre_user_token=(:pre_user_token) AND flag =0 AND reg_date > now() - interval 24 hour";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':pre_user_token', $_SESSION['join']['token'], PDO::PARAM_STR);
                $stm->execute();


                //レコード件数取得
                $row_count = $stm->rowCount();

                //24時間以内に仮登録され、本登録されていないトークンの場合
                if( $row_count ==1){
                    $mail_array = $stm->fetch();
                    $mail = $mail_array["pre_user_mail"];
                    $_SESSION['mail'] = $mail;
                    $urltoken = $_SESSION['join']['token'];
                    $flag = true;

                }else{
                    $error['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。";
                }
                //データベース接続切断
                $stm = null;
            }catch (PDOException $e){
                print('Error:'.$e->getMessage());
                die();
            }
        }
    }else{
      header("Location: http://keen-akune-3587.bambina.jp/AnyPort/toppage.php");
      exit();
    }
}else{
    //GETデータを変数に入れる
    $urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : NULL;
    //メール入力判定
    if ($urltoken == ''){
        $error['urltoken'] = "トークンがありません。";
    }else{
        try{
            // DB接続
            //flagが0の未登録者 or 仮登録日から24時間以内
            $sql = "SELECT pre_user_mail FROM m_pre_users WHERE pre_user_token=(:pre_user_token) AND flag =0 AND reg_date > now() - interval 24 hour";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':pre_user_token', $urltoken, PDO::PARAM_STR);
            $stm->execute();


            //レコード件数取得
            $row_count = $stm->rowCount();

            //24時間以内に仮登録され、本登録されていないトークンの場合
            if( $row_count ==1){
                $mail_array = $stm->fetch();
                $mail = $mail_array["pre_user_mail"];
                $_SESSION['mail'] = $mail;
            }else{
                $error['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。";
            }
            //データベース接続切断
            $stm = null;
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
    }
}

if(!empty($_POST)){
    if($_POST['name'] === ""){
        $error['name'] = 'blank';
    }
    if($_POST['singUpMail'] === ""){
        $error['email'] = 'blank';
    }
    if($_POST['passInput'] === "" || $_POST['passInputCheck'] === "" ){
        $error['password'] = 'blank';
    }elseif(strcmp($_POST['passInput'], $_POST['passInputCheck'])){
        $error['password'] = 'notSame';
    }

    if(!isset($error)){
        $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_mail=?');
        $member->execute(array(
            $_POST['singUpMail']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }

        /* エラーがなければ次のページへ */
        if (!isset($error)) {
            $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
            if(!isset($_SESSION['join']['token'])){
                $_SESSION['join']['token'] = $urltoken;
            }
            header('Location:../singUpCheck/singUpCheck.php');
            exit();
        }
    }

}

$title = '新規登録';
require '../header.php';

?>
<?php if (!empty($_GET) || $flag):?>
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
<?php else :?>
<div class="singUpInput">
  <h2 class="singUpInputTitle">お客様情報の入力</h2>
  <p class="singUpNotes">下記の項目を入力してください。<br>※は必須項目です。</p>
    <form action="" method="post">
        <div class="singUpForm">
          <p class="singUpName">
              <label>ユーザーネーム</label>
                  <input type="text" name="name" placeholder="ユーザーネーム">
              <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
            <p class="error">＊ユーザーネームを入力してください</p>
            <?php endif ?>

            </p>
<p class="singUpMail"><label>メールアドレス</label><input type="text" name="singUpMail" value="<?php echo $mail ?>" readonly></p>
            <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                <p class="error">＊メールアドレスを入力してください</p>
            <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                <p class="error">＊このメールアドレスはすでに登録済みです</p>
            <?php endif ?>
          <div class="singUpPassword">
              <p class="singUpPasswordBox">
                  <label>パスワード</label><input type="password" name="passInput">
                  <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
              <p class="error">＊パスワードを入力してください</p>
              <?php endif ?>
              <?php if (!empty($error["password"]) && $error['password'] === 'notSame'): ?>
            <p class="error">＊パスワードが一致しません</p>
        <?php endif ?>

              </p>
              <p class="singUpPasswordCheckBox">
                  <label>確認用</label><input type="password" name="passInputCheck">
              </p>
          </div>
          <div>
              <p class="singUpLanguage">
                  <label>使用言語</label>
                  <select name="language">
                      <option value="ja">日本語</option>
                      <option value="en">英語</option>
                  </select>
              </p>
          </div>
          <div>
              <p class="singUpCountry">
                  <label>お住まいの国・地域</label>
                  <select name="country">
                      <option value="JPN">日本</option>
                      <option value="USA">アメリカ</option>
                  </select>
              </p>
          </div>


        </div>
        <p class="singUpCheckButton"><button type="submit" name="singUpCheckButton">ご登録内容のご確認へ</button></p>
    </form>
</div>
<?php endif; ?>
<?php endif; ?>
<?php
$pdo = null;
require '../footer.php'
?>
