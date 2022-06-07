<?php
session_start();

$flag = false;

if(isset($_SESSION['user']) || isset($_SESSION['change'])){
    $flag = true;
}

if(!isset($_SESSION['passCheck'])){
    $flag = false;
}


if(!$flag){
    header("Location: http://keen-akune-3587.bambina.jp/AnyPort/toppage.php");
}

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
    }elseif(strlen($_POST['passInput']) < 5 || strlen($_POST['passInputCheck']) < 5){
        $error['password'] = 'length';
    }

    if(!isset($error)){
        if($_SESSION['user']['mail'] != $_POST['singUpMail']){
            $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_mail=?');
            $member->execute(array(
                $_POST['singUpMail']
            ));
            $record = $member->fetch();
            if ($record['cnt'] > 0) {
                $error['email'] = 'duplicate';
            }
        }

        /* エラーがなければ次のページへ */
        if (!isset($error)) {
            $_SESSION['change'] = $_POST;   // フォームの内容をセッションで保存
            header('Location:../myInformationChangeCheck/myInformationChangeCheck.php');
            exit();
        }
    }

}

$title = '登録情報変更';
require '../header.php';
?>
<?php if (!$flag):?>

<?php else :?>

        <div class="singUpInput">
            <h2 class="singUpInputTitle">お客様情報の入力</h2>
            <p class="singUpNotes">下記の項目を入力してください。<br>※は必須項目です。</p>
            <form action="" method="post">
                <div class="singUpForm">
                    <p class="singUpName">
                        <label>ユーザーネーム</label>
<input type="text" name="name" placeholder="ユーザーネーム" value="<?php echo $_SESSION['user']['name'] ?>">
                        <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
                    <p class="error">＊ユーザーネームを入力してください</p>
                    <?php endif ?>

                    </p>
<p class="singUpMail"><label>メールアドレス</label><input type="text" name="singUpMail" value="<?php echo $_SESSION['user']['mail'] ?>" readonly></p>
                    <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                        <p class="error">＊メールアドレスを入力してください</p>
                    <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                        <p class="error">＊このメールアドレスはすでに登録済みです</p>
                    <?php endif ?>
                    <div class="singUpPassword">
                        <p class="singUpPasswordBox">
<label>パスワード</label><input type="password" name="passInput" value="<?php echo $_SESSION['passCheck']['pass'];?>">
                            <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                        <p class="error">＊パスワードを入力してください</p>
                        <?php endif ?>
                        <?php if (!empty($error["password"]) && $error['password'] === 'notSame'): ?>
                            <p class="error">＊パスワードが一致しません</p>
                        <?php elseif  (!empty($error["password"]) && $error['password'] === 'length'): ?>
                            <p class="error">＊パスワードは5桁以上にしてください</p>
                        <?php endif ?>

                        </p>
                        <p class="singUpPasswordCheckBox">
<label>確認用</label><input type="password" name="passInputCheck" value="<?php echo $_SESSION['passCheck']['pass']; ?>">
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
            <a href="../login/login.php" class="beforePage">前のページへ戻る</a>
        </div>
<?php endif; ?>
<?php
$pdo = null;
require '../footer.php'?>


