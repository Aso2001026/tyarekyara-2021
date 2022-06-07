<?php
session_start();

$title = 'マイページ';
require './header.php';
?>
<nav class="MyInformationNav">
    <ul>
        <li><a href="mypage.php">登録情報</a></li>
        <li><a href="test9.php">お気に入り</a></li>
        <li><a href="Shin.php">検索履歴</a></li>
    </ul>
</nav>

<h2 class="MyInformationTitle">登録情報</h2>
<div class="MyInformation">
    <table>
        <tr>
            <th>名前</th> <td>山田　太郎</td>
        </tr>
        <tr>
            <th>名前(カナ)</th> <td>ヤマダ　タロウ</td>
        </tr>
        <tr>
            <th>メールアドレス</th> <td>test@test.jp</td>
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
    <a href="checkPassword.php" class="MyInformationButton">情報変更</a>
</div>
<?php require './footer.php'?>
