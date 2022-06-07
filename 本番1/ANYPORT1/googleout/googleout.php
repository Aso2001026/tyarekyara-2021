<?php
session_start();
$title = 'マップ';
require './header.php';
?>
<h2 class="googleMapTitle">マップ</h2>
<div class="googleMap">
    <p>目的地周辺を表示します</p>
    <?php
    echo '<a href="https://www.google.com/maps/dir/?api=APIkey&destination=',$_POST['mokuteki'],'">mapへ移動</a>';
    ?>
</div>
<?php require './footer.php'; ?>
