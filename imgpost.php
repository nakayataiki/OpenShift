<?php

$image = $_POST['image'];

$sendParameters = array(

    'image'         => $image
);

//$json_sendParameters = json_encode($sendParameters);
$url = "ap-190125:8080/imgreg.php";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $sendParameters);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
//$cURLerrorNum = curl_errno($ch);
//$cURLerrorMsg = curl_error($ch);

curl_close($ch);

echo $result;
