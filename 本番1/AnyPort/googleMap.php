<?php
session_start();

$title = 'マップ';
require './header.php';
?>
    <h2 class="googleMapTitle">マップ</h2>
<div class="hama">
    <div class="googleMap">
        <p>目的地を入力して下さい</p>
        <form action="googleout.php" method="post">
            <input type="text" name="mokuteki">
            <input type="submit" value="確定">
        </form>
    <div>
    </div>
<?php require './footer.php'; ?>