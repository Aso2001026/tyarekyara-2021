<?php
session_start();


$title = '登録情報確認';
require './header.php';
?>
<h2 class="MyInformationTitle">登録情報確認</h2>
<div class="MyInformation">
    <table>
        <tr>
            <th>名前</th> <td><?php echo $_POST['surname'],"　",$_POST['name']?></td>
        </tr>
        <tr>
            <th>名前(カナ)</th> <td><?php echo $_POST['kana-Surname'],"　",$_POST['kana-Name']?></td>
        </tr>
        <tr>
            <th>メールアドレス</th> <td><?php echo $_POST['singUpMail']?></td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <?php
                $cnt = strlen($_POST['passInput']);
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
                echo $language[$_POST['language']];
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
                echo $country[$_POST['country']];
                ?>
            </td>
        </tr>
    </table>
    <a href="singUpCompletion.php" class="MyInformationButton">登録</a>
    <a href="singUpInput.php" class="beforePage">前のページへ戻る</a>
</div>
<?php require './footer.php'?>
