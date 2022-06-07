<?php
session_start();
$title = 'マップ';
require './header.php';
?>
<h2 class="googleMapTitle">マップ</h2>
<div class="googleMap">
    <p>目的地周辺を表示します</p>
    <?php
    echo '<a href="https://www.google.com/maps/dir/?api=AIzaSyD756fOGZoQkH4WL5B266Ivy8h6GtSDsIU&destination=',$_POST['mokuteki'],'">mapへ移動</a>';
    ?>
</div>
<?php require './footer.php'; ?>