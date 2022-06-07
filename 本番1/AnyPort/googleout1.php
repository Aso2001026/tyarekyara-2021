<?php
$title = 'マップ';
require './header.php';
?>
    <h2 class="googleMapTitle">マップ</h2>

<?php
echo '<div class="btn"><a href="https://www.google.com/maps/dir/?api=1&origin=現在地&destination=',$_POST['mokuteki'],'\" target="_blank"  rel="noopener noreferrer">mapへ移動</a></div>';
?>
<?php require './footer.php'; ?>