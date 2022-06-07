<?php
session_start();

$title = '通貨レート';
require './header.php';
?>
<?php
$currency = array(
        'JPY'=>'円','USD'=>'ドル'
);
$rate = 1;
$price = '';
$from = '';
$to = '';
$result ='';
if((isset($_POST['price']))&&(isset($_POST['from']))&&(isset($_POST['to']))){
    if((!empty($_POST['price']))&&(!empty($_POST['from']))&&(!empty($_POST['to']))){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $price = $_POST['price'];
        $url = "http://api.aoikujira.com/kawase/json/$from";
        $data = json_decode(file_get_contents($url), true);

        if($from != $to){
            $rate = $data[$to];
        }
        $result = $price * $rate;
    }else{
        $result = '値を入力してください';
    }
}else{
    $result = '入力にミスがあります';
}
?>
<h2 class="rateTitle">通貨レート</h2>
<div class="rate">
    <form action="" method="post" class="rateForm">
        <div class="ratePrice">
            <label><p style="color: white;">金額</p></label><br>
            <input type="number" value="100" name="price">
        </div>
        <div class="reteCurrency">
            <label><p style="color: white;">換算元通貨</p></label><br>
            <select class="rateFromCurrency" name="from">
                <option value="JPY" selected>JPY-日本円</option>
                <option value="USD">USD-ドル</option>
            </select>
            <label>→</label>
            <select name="to">
                <option value="JPY">JPY-日本円</option>
                <option value="USD" selected>USD-ドル</option>
            </select>
        </div>
        <button class="rateButton" type="submit">変換</button>
    </form>
    <div class="rateResult">
        <?php
        if(isset($_POST['price'])&&isset($_POST['from'])&&isset($_POST['to'])){
            if((!empty($_POST['price']))&&(!empty($_POST['from']))&&(!empty($_POST['to']))){
                echo '<p>',$price,' ',$currency[$from],'=<br><br>',$result,' ',
                $currency[$to],'</p>';
            }else{
                echo $result;
            }
        }else{
            echo '<p>金額の入力と換算元通貨の選択後、変換ボタンを押してください。</p>';
        }
        ?>
    </div>
</div>
<?php require './footer.php'?>
