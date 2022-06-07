<?php
session_start();

$title = 'マップ';
require './header.php';
?>
<h2 class="googleMapTitle">マップ</h2>
<div class="hama">
<div class="googleMap">
    <p>目的地周辺を表示します</p>
    <?php
    echo '<a href="https://www.google.com/maps/dir/?api=1&origin=現在地&destination=',$_POST['mokuteki'],'"">mapへ移動</a>';
    ?>
</div>
</div>
<?php require './footer.php'; ?>