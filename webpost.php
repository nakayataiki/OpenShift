<?php

// POST�p�����[�^�ҏW
$postParam = "test";
$sendParameters = array(

    'postParam'    => $postParam,
);

// ����ҏW
$url = "";

// cURL������
$ch = curl_init();

// cURL�I�v�V�����ݒ�
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, $sendParameters);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// cURL���s
$errorCode      = curl_exec($ch);
$cURLerrorNum   = curl_errno($ch);
$cURLerrorMsg   = curl_error($ch);

// cURL�N���[�Y
curl_close($ch);

echo $errorCode;