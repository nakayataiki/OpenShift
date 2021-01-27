<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With");

$image = $_POST['image'];

$dirName = date('Ymd');
$fileName = date('YmdHis');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://s3.direct.jp-tok.cloud-object-storage.appdomain.cloud/test-storage-cos-standard-qxx/' . $dirName . '/' . $fileName . '/' . 'txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, $image);

$headers = array();
$headers[] = 'Authorization: bearer eyJraWQiOiIyMDIxMDEyMDE4MzUiLCJhbGciOiJSUzI1NiJ9.eyJpYW1faWQiOiJpYW0tU2VydmljZUlkLTY3ZTIxYmFlLWJlZmUtNGRhOC05NDQzLWVlNzZkMmNjNzZkOCIsImlkIjoiaWFtLVNlcnZpY2VJZC02N2UyMWJhZS1iZWZlLTRkYTgtOTQ0My1lZTc2ZDJjYzc2ZDgiLCJyZWFsbWlkIjoiaWFtIiwianRpIjoiYTkwYWFlNzctYWNlMy00NWQ1LWJmNWUtODM1MWJkOGJjZDk0IiwiaWRlbnRpZmllciI6IlNlcnZpY2VJZC02N2UyMWJhZS1iZWZlLTRkYTgtOTQ0My1lZTc2ZDJjYzc2ZDgiLCJuYW1lIjoidGVzdC1zdG9yYWdlLWNvcy1zdGFuZGFyZC1xeHgiLCJzdWIiOiJTZXJ2aWNlSWQtNjdlMjFiYWUtYmVmZS00ZGE4LTk0NDMtZWU3NmQyY2M3NmQ4Iiwic3ViX3R5cGUiOiJTZXJ2aWNlSWQiLCJhY2NvdW50Ijp7InZhbGlkIjp0cnVlLCJic3MiOiI0ZDEzNTcyM2NmMmE0NTU1YWMyNDc0OTQ4NDA0NDk1YSIsImZyb3plbiI6dHJ1ZX0sImlhdCI6MTYxMTc0NDM1NSwiZXhwIjoxNjExNzQ3OTU1LCJpc3MiOiJodHRwczovL2lhbS5jbG91ZC5pYm0uY29tL2lkZW50aXR5IiwiZ3JhbnRfdHlwZSI6InVybjppYm06cGFyYW1zOm9hdXRoOmdyYW50LXR5cGU6YXBpa2V5Iiwic2NvcGUiOiJpYm0gb3BlbmlkIiwiY2xpZW50X2lkIjoiZGVmYXVsdCIsImFjciI6MSwiYW1yIjpbInB3ZCJdfQ.Q_zdHlzEVYgBH8UkY9Xu9U0RaP7PndzamCAzhRXdBZvK3-ArmfK6QbO91TybVJwySGq8MBuW73zFXulokvok2NaTBMIGob6qKmO51d9d9Me1PBlZV2j-m81eZdBuVENW80pvYUk1zD6S0yNpB9z9KLEQE6PNq6t9VsQYPAVH5Vw50ZN5cE638fgAoL3OurgvSSSpU39x5jPQWgzxY1JpSgZQytds9hciVTLH4QPDJ7PSblwzHO7fCwi-no6XGybvsO660nJkQdJNCDcY9ucsokHVuljrSBodTO28twE_wSkQaKwTM7g9GxZcGexgqVAUHPvs8Xme20ecGBclRFQX9Q';
// $headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$errorCode = "00";

echo $errorCode;