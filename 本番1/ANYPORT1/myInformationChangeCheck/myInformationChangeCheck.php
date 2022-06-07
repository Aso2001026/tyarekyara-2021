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

if (!isset($_SESSION['change'])) {
    header('Location: http://keen-akune-3587.bambina.jp/AnyPort/toppage.php');
    exit();
}

if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['change']['passInput'], PASSWORD_BCRYPT);
    date_default_timezone_set('Asia/Tokyo');
    $date = date('Y-m-d H:i:s');

    // 入力情報をデータベースに登録
    $statement = $pdo->prepare("update m_users SET user_name=?, user_mail=?, country_code=?,language_code=?,user_pass=?,upd_date=? where user_id=?");
    $flag =  $statement->execute(array(
        $_SESSION['change']['name'],
        $_SESSION['change']['singUpMail'],
        $_SESSION['change']['country'],
        $_SESSION['change']['language'],
        $hash,
        $date,
        $_SESSION['user']['id']
    ));

    if($flag){
        $_SESSION['user']=[
            'name'=>$_SESSION['change']['name'],
            'country_code' =>$_SESSION['change']['country'],
            'language_code'=>$_SESSION['change']['language'],
            'mail' => $_SESSION['change']['singUpMail'],
        ];
        unset($_SESSION['change']);   // セッションを破棄
        unset($_SESSION['passCheck']);   // セッションを破棄
        header('Location: ../myInformationChangeCompletion/myInformationChangeCompletion.php');   // thank.phpへ移動
        exit();
    }

}

$title = '登録情報確認';
require '../header.php';

?>
<h2 class="MyInformationTitle">登録情報確認</h2>
<div class="MyInformation">
    <table>
        <tr>
            <th>ユーザーネーム</th> <td><?php echo htmlspecialchars($_SESSION['change']['name'], ENT_QUOTES);?></td>
        </tr>
        <tr>
            <th>メールアドレス</th> <td><?php echo htmlspecialchars($_SESSION['change']['singUpMail'], ENT_QUOTES);?></td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <?php
                $cnt = strlen($_SESSION['change']['passInput']);
                for($i = 0;$i<$cnt;$i++){
                    echo '*';
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>使用言語</th>
            <td>
                <?php
                $language = array(
                    'ja'=>'日本語','en'=>'英語'
                );
                if($_SESSION['change']['language'] !== null ){
                    echo $language[$_SESSION['change']['language']];
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>お住まいの国・地域</th>
            <td>
                <?php
                $country = array(
                    'JPN'=>'日本','USA'=>'アメリカ'
                );
                echo $country[$_SESSION['change']['country']];
                ?>
            </td>
        </tr>
    </table>
    <form action="" method="post">
        <input type="hidden" name="check" value="true">
        <button class="MyInformationButton">変更</button>
    </form>
    <a href="../myInformationChange/myInformationChange.php" class="beforePage">前のページへ戻る</a>
</div>
<?php
$pdo = null;
require '../footer.php'?>
