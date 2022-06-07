<?php session_start() ?>
<?php
//https://www.webdevqa.jp.net/ja/php/url%E3%83%91%E3%83%A9%E3%83%A1%E3%83%BC%E3%82%BF%E3%83%BC%E3%81%A8%E3%81%97%E3%81%A6%E9%85%8D%E5%88%97%E3%82%92%E6%B8%A1%E3%81%99/969034808/
$cnt = $_GET['cnt'];




//出力処理
//sessionに入ってるのを変数に移し、unset
$result = $_SESSION;
//$result = serialize($result);
//$result = unserialize($result);　文字列から配列に戻す
session_unset();
$_SESSION = $result;

$count = 0;
$data = [];
foreach ($result['Feature'] as $row){
    $data[$count] = $row;
    $count++;
}
//$output変数に出すものを入れる

//試しに何が入ってるかを出力
/*
 * echo '<pre>';
 * var_dump($data[$cnt]);
 * echo '</pre>';
 */

//あるものとないものがあるためifで判定をする
//Telver
if(isset($data[$cnt]['Property']['Tel1'])){
    $tel = $data[$cnt]['Property']['Tel1'];
} else {
    $tel = "登録されておりません";
}
//アクセス方法ver
if(isset($data[$cnt]['Property']['Access1'])){
    $access = $data[$cnt]['Property']['Access1'];
}else {
    $access = "詳細なアクセス方法はありません。。";
}
//キャッチコピーver
if(isset($data[$cnt]['Property']['CatchCopy'])){
    $catchcopy = $data[$cnt]['Property']['CatchCopy'];
} else {
    $catchcopy = "キャッチコピー情報はありません。";
}

$output = "
    <h1>{$data[$cnt]['Name']}</h1>
    <p class='detail'>
        住所：{$data[$cnt]['Property']['Address']}<br/>
        電話番号：{$tel}<br/>
        アクセス：{$access}<br/>
        キャッチコピー<br/>
        {$catchcopy}
    </p>
    <p id='image'><img src=".$data[$cnt]['Property']['LeadImage']."></p>
";
$result = "ok";

//戻るボタンの処理
$result = serialize($result);
$return = "
    <form action='ydlp_in.php' method='post'>
        <button name='result' value='.{$result}.'>戻る</button>
    </form>
";

//口コミAPIの処理開始
//Find Place requestsを使って住所から特定の一店舗を検索
$key = "AIzaSyD756fOGZoQkH4WL5B266Ivy8h6GtSDsIU";
$url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json";

$address = $data[$cnt]['Name'];
$params = [
    "input" => $address,
];



$query = http_build_query($params);
$request = $url . '?&' .$query.'&key='.$key;

//curlセッション初期化
$ch = curl_init();

//URLとオプションを指定する
curl_setopt($ch,CURLOPT_URL,$request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//URLの情報を取得
$response = curl_exec($ch);
//$json=file_get_contents($request);

$resultList = mb_convert_encoding($response, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//$result = json_decode($result,JSON_PRETTY_PRINT);
$resultList = json_decode($resultList,true);
curl_close($ch);

//試しに何が入ってるかを出力
/*
echo '<pre>';
var_dump($resultList);
echo '</pre>';
*/
?>


<?php require './../header.php'?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/ydlp_out.css">
</head>
<body>
<?=$return?>
<?=$output?>
</body>
</html>

