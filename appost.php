<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With");

// POSTパラメータ受信
$postParam = $_POST['postParam'];

$errorCode = "00";

echo $errorCode;