<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location:http://keen-akune-3587.bambina.jp/AnyPort/toppage.php');
}



$title = 'マイページ';
require '../header.php';

?>
<nav class="MyInformationNav">
    <ul>
        <li><a href="../mypage/mypage.php">登録情報</a></li>
        <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/okiniiri.php">お気に入り</a></li>
        <li><a href="http://keen-akune-3587.bambina.jp/charekyara/AnyPort/Shin.php">検索履歴</a></li>
        <li><a href="../changeMail/changeMail.php">メールアドレス変更</a></li>
        <li><a href="../deleteAccount/deleteAccount.php">アカウント削除</a></li>
    </ul>
</nav>

<h2 class="MyInformationTitle">登録情報</h2>
<div class="MyInformation">
    <table>
        <tr>
<th>ユーザーネーム</th><td><?php echo $_SESSION['user']['name']; ?></td>
        </tr>
        <tr>
<th>メールアドレス</th><td><?php echo $_SESSION['user']['mail']; ?></td>
        </tr>
        <tr>
            <th>パスワード</th> <td>*******</td>
        </tr>
        <tr>
            <th>使用言語</th> <td>日本語</td>

        </tr>
        <tr>
            <th>お住まいの国・地域</th> <td>日本語</td>
        </tr>
    </table>
    <p>パスワードは実際の文字数と異なる場合があります。</p>
    <a href="../checkPassword/checkPassword.php" class="MyInformationButton">情報変更</a>
</div>
<?php require '../footer.php'?>
