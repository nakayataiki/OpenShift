<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With");

$data = array(

        'apikey'        => 'ytQi1gPzzvb-V6JfsYKRqx7o9Jgv1QHbGkTPcn77QS1C',
        'response_type' => 'cloud_iam',
        'grant_type'    => 'urn:ibm:params:oauth:grant-type:apikey'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://iam.cloud.ibm.com/identity/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_setopt($ch, CURLOPT_WRITEFUNCTION, callback);
//curl_setopt($ch, CURLOPT_WRITEFUNCTION, $callback);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result_str = json_decode($result, true);

$image = $_POST['image'];
if(strstr($image, 'data:image/jpeg;base64,')) {
	
	$headerlessimg = str_replace('data:image/jpeg;base64,', '', $image);
	$image = base64_decode($headerlessimg);
}
$dirName = date('Ymd');
$fileName = date('YmdHis');

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, 'https://s3.direct.jp-tok.cloud-object-storage.appdomain.cloud/test-storage-cos-standard-qxx/' . $dirName . '/' . $fileName . '.jpeg');
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
	}
curl_close($ch2);
$errcode = "00";
echo $errcode . PHP_EOL;
