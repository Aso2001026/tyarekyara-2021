<?php
session_start();

require './header.php';
?>
    <link rel="stylesheet" href="./css/keijiban3.css">
    
    <h3>コメント/返信</h3>
    <hr class="cp_hr01" />
    <form method="post" class="toukou">
        <textarea name="name" class="m-form-textarea" cols="200" rows="20"></textarea>
        <button type="button" class="button" onclick="location.href='http://aso2001190.sunnyday.jp/tyare/gamen3/keijiban2.php'">送信</button>
    </form>


<?php require './footer.php'; ?>