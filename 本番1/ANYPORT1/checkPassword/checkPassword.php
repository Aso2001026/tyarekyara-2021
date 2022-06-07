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

$sessionFlag = false;

if(isset($_SESSION['user'])){
    $sessionFlag = true;
}

if(!$sessionFlag){
    header("Location: http://keen-akune-3587.bambina.jp/AnyPort/toppage.php");
}

$passFlag = false;
$idFlag = false;
$flag = false;

if(!empty($_POST)){
    $mail = $_SESSION['user']['mail'];
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
                $_SESSION['passCheck'] = $_POST;
                $flag = true;
    }
}

if($flag && isset($_SESSION['user'])){
    header("Location: ../myInformationChange/myInformationChange.php");
    // URL変更
}

$title = 'ログイン';
require '../header.php';
?>
<?php if (empty($_POST))  : ?>
    <div class="login">
        <form action="" method="post">
            <h2 class="loginTitle">パスワード入力</h2>
            <div class="password">
                <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
                <p class="forgetPassword"><a href="../forgotPassword/forgotPassword.php">パスワードをお忘れですか？</a></p>
            </div>
            <p class="loginButton"><button type="submit" name="loginButton">確定</button></p>
        </form>
    </div>
<?php else: ?>
    <?php if (!$flag) : ?>
        <div class="login">
            <form action="" method="post">
                <h2 class="loginTitle">パスワード入力</h2>
                <p class="mailAddress">ログインが失敗しました。もう一度入力してください</p>
                <div class="password">
                    <p class="passwordBox"><label>パスワード </label><input type="password" name="pass"></p>
                    <p class="forgetPassword"><a href="../forgotPassword/forgotPassword.php">パスワードをお忘れですか？</a></p>
                </div>
                <p class="loginButton"><button type="submit" name="loginButton">確定</button></p>
            </form>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php
$pdo = null;
require '../footer.php'?>

