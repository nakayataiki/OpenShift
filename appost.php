<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With");

//$postParam = $_POST['postParam'];
//$errorCode = "00";
//echo $errorCode;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://s3.direct.jp-tok.cloud-object-storage.appdomain.cloud/4d135723cf2a4555ac2474948404495a:1ecc5e8b-fe42-4d19-9475-e928a2566db2:bucket:test-storage-cos-standard-4hq/test');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, "test");

$accessKey = "ycZ0G85rB0eECfjlfIbM1nm90wqzGvOxQN3CWe07TmpN";
// セッションの初期化 $chにはcURLハンドルが格納される。 
$ch = curl_init($url);

// 転送用の様々なオプションを設定
$headers = [
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Authorization: Bearer ' . $accessKey;
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

echo $result . PHP_EOL;
