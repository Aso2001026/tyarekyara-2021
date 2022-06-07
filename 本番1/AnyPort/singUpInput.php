<?php
session_start();

$title = '新規登録';
require './header.php';
?>
<p class="BreadcrumbTrail">ホーム > 新規登録</p>
<div class="singUpInput">
  <h2 class="singUpInputTitle">お客様情報の入力</h2>
  <p class="singUpNotes">下記の項目を入力してください。<br>※は必須項目です。</p>
    <form action="singUpCheck.php" method="post">
        <div class="singUpForm">
          <p class="singUpName">
              <label>氏名</label>
                  <input type="text" name="surname" placeholder="姓">
                  <input type="text" name="name" placeholder="名">
          </p>
            <p class="singUpKanaName"><label>氏名(カナ)</label>
                <input type="text" name="kana-Surname" placeholder="セイ">
                <input type="text" name="kana-Name" placeholder="メイ">
            </p>
          <p class="singUpMail"><label>メールアドレス</label><input type="text" name="singUpMail"></p>
          <div class="singUpPassword">
              <p class="singUpPasswordBox">
                  <label>パスワード</label><input type="password" name="passInput">
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
    <a href="login.php" class="beforePage">前のページへ戻る</a>
</div>

<?php require './footer.php'?>


