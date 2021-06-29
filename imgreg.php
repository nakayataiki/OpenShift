<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With");

$ini = parse_ini_file('config.ini');
$data = array(
	'apikey'        => $ini['apikey'],
	'response_type' => $ini['response_type'],
	'grant_type'    => $ini['grant_type']
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ini['token_url']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$result = curl_exec($ch);
if (curl_errno($ch)) {
	echo 'Error:' . curl_error($ch);
	return;
}
curl_close($ch);
$result_str = json_decode($result, true);

//$image = $_POST['image'];
$image = file_get_contents('./test.txt');

if(strstr($image, 'data:image/jpeg;base64,')) {
	
    $headerlessimg = str_replace('data:image/jpeg;base64,', '', $image);
	$image = base64_decode($headerlessimg);
}
$dirName = date('Ymd');
$fileName = date('YmdHis');

$ch2 = curl_init();
//curl_setopt($ch2, CURLOPT_URL, $ini['bucket_url'] . $dirName . '/' . $fileName . '.jpeg');
curl_setopt($ch2, CURLOPT_URL, $ini['bucket_url']);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch2, CURLOPT_POSTFIELDS, $image);
$headers = array();
$headers[] = 'Authorization: bearer ' . $result_str["access_token"]; 
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

$result2 = curl_exec($ch2);
if (curl_errno($ch2)) {
	echo 'Error:' . curl_error($ch2);
	return;
}
curl_close($ch2);
$errcode = "00";
echo $errcode . PHP_EOL;
