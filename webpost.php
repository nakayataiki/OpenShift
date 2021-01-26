<?php

// POSTパラメータ編集
$postParam = "test";
$sendParameters = array(

    'postParam'    => $postParam,
);

// 宛先編集
// $url = "172.17.57.114:8080";
$url = "172.17.57.114:8080/appost.php";

// cURL初期化
$ch = curl_init();

// cURLオプション設定
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, $sendParameters);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// cURL実行
$errorCode      = curl_exec($ch);
$cURLerrorNum   = curl_errno($ch);
$cURLerrorMsg   = curl_error($ch);

// cURLクローズ
curl_close($ch);

echo $errorCode . PHP_EOL;
