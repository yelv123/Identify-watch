<?php
require_once '../vendor/autoload.php';
$appId="";
$appKey="";
$secretKey="";

$identifyWatch=new identifyWatch\identifyWatch($appId,$appKey,$secretKey);
$result=$identifyWatch->getAccessToken();
echo $result['access_token']."\r\n";
echo $result['expiration_time']."\r\n";
