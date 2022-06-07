<?php
session_start();

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

$passFlag = false;
$idFlag = false;
$flag = false;

if(!empty($_POST)){
    $mail = htmlspecialchars($_POST['mail']);
    $pass = htmlspecialchars($_POST['pass']);
    $statement = $pdo->prepare("select user_pass from m_users where user_mail=? ");
    $statement->execute(array(
        $mail,
    ));
    foreach ($statement as $row) {
        $hash = $row['user_pass'];
        $idFlag = true;
        $passFlag = password_verify($pass,$hash);
    }

    if($idFlag && $passFlag){
        $statement = $pdo->prepare("select * from m_users where user_mail=?");
        $statement->execute(array(
            $mail
        ));
        foreach ($statement as $row) {
            $_SESSION['user']=[
                'id'=>$row['user_id'],
                'name'=>$row['user_name'],
                'country_code' =>$row['country_code'],
                'language_code'=>$row['language_code'],
                'mail' => $row['user_mail']
            ];
            $flag = true;
        }
    }
}

if($flag && isset($_SESSION['user'])){
    header("Location: ../loginCompletion/loginCompletion.php");
    // URL変更
}

$title = 'ログイン';
require '../header.php';
?>
<?php if (empty($_POST))  : ?>
<div class="login">
    <form action="" method="post">
        <h2 class="loginTitle">ログイン</h2>
        <p class="mailAddress"><label>メールアドレス</label><input type="text" name="mail"></p>
        <div class="password">
            <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
            <p class="forgetPassword"><a href="../forgotPassword/forgotPassword.php">パスワードをお忘れですか？</a></p>
        </div>
        <p class="loginButton"><button type="submit" name="loginButton">ログイン</button></p>
    </form>
</div>
<div class="singUp">
        <h2 class="singUpTitle">新規登録</h2>
        <div class="termsOfService">
        <p>【個人情報の取り扱いについて】<br>
当社はお客様の信頼を第一と考え、お客様の個人情報をご希望に添って取り扱うとともに、正確性・機密性の保持に努めています。</p>
        </div>
        <a href="../singUpMail/singUpMail.php" class="singUpButton">新規登録</a>
</div>
<?php else: ?>
<?php if (!$flag) : ?>
<div class="login">
    <form action="" method="post">
        <h2 class="loginTitle">ログイン</h2>
        <p class="mailAddress">ログインが失敗しました。もう一度入力してください</p>
        <p class="mailAddress"><label>メールアドレス</label><input type="text" name="mail"></p>
        <div class="password">
            <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
            <p class="forgetPassword"><a href="../forgotPassword/forgotPassword.php">パスワードをお忘れですか？</a></p>
        </div>
        <p class="loginButton"><button type="submit" name="loginButton">ログイン</button></p>
    </form>
</div>
<div class="singUp">
    <h2 class="singUpTitle">新規登録</h2>
    <div class="termsOfService">
<p>【個人情報の取り扱いについて】<br>
当社はお客様の信頼を第一と考え、お客様の個人情報をご希望に添って取り扱うとともに、正確性・機密性の保持に努めています。</p>
    </div>
    <a href="../singUpMail/singUpMail.php" class="singUpButton">新規登録</a>
</div>
<?php endif; ?>

<?php endif; ?>

<?php
$pdo = null;
require '../footer.php'?>

