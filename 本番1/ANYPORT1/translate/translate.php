<?php
session_start();
$title = '翻訳';
require '../header.php';
?>
<?php


$fromText = "";
$toText = "";
if(isset($_POST["fromText"])){
    $fromText = $_POST["fromText"];
    $translate = $_POST['translate'];

    $token = getToken();//アクセストークンを取得します。１０分間のみ有効です。

    $key = "Bearer ". $token;
    $text =array(array("Text"=>$fromText));
    $body = json_encode($text,JSON_UNESCAPED_UNICODE);
    $url = "https://api-apc.cognitive.microsofttranslator.com/translate?api-version=3.0";
    $data = '';
    $url = $url."&to=".$translate;

    $headers = array(
        "Content-Type: application/json; charset=UTF-8",
        "Accept: application/jwt",
        "Ocp-Apim-Subscription-Key: e733001482414e8ba852c807832ce55a",
        "Content-Length: ". strlen($body),
        "Authorization: ". $key
    );



    $ch = curl_init(); // はじめ
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    $result =  curl_exec($ch);
    curl_close($ch);

    $result_array = json_decode($result,false);
    //print_r($result_array);

    $toText = $result_array[0]->translations[0]->text;
}

// Microsoft Tranlator テキスト APIを利用するためのトークンを取得する関数

function getToken(){



    $headers = array(
        "Content-Type: application/json",
        "Accept: application/jwt",
        "Ocp-Apim-Subscription-Key: e733001482414e8ba852c807832ce55a",
        "Content-Length: 0"
    );


    $url     = "https://japaneast.api.cognitive.microsoft.com/sts/v1.0/issueToken";
    $ch = curl_init(); // はじめ
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//ヘッダー追加オプション
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result =  curl_exec($ch);
    curl_close($ch);

    return $result;

}
?>
<h2 class="translateTitle">翻訳</h2>
<div class="translate">
    <form action="" method="post">
        <div class="text">
            <div class="translateInput">
                <p>入力スペース</p>
<textarea name="fromText" rows="5" cols="50"  placeholder="翻訳するテキストを入力してください。"><?php echo $fromText; ?></textarea>
            </div>
            <p class="rightArrow">→</p>
            <div class="translateOutput">
                <p>翻訳結果</p>
<textarea rows="5" cols="50" placeholder="翻訳後のテキストが表示されます。"><?php if($toText != ""){echo $toText;}?></textarea>
            </div>
        </div>
        <label>翻訳後言語</label>
        <select name="translate">
            <option value="ja">日本語</option>
            <option value="en">英語</option>
        </select>
        <input type="submit" value="翻訳">
    </form>
</div>

<?php require '../footer.php'?>
