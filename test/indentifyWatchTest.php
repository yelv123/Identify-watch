<?php
require_once '../vendor/autoload.php';
$appId="1";
$appKey="1V2QuRQqCRAPIa2zYKI6mhaGHHbkJEgV";
$secretKey="GDb0exY20DGwtnjOqYQmfGUT8ZYjzJoF";

$identifyWatch=new identifyWatch\identifyWatch($appId,$appKey,$secretKey);
$result=$identifyWatch->getAccessToken();
echo $result['access_token']."\r\n";
echo $result['expiration_time']."\r\n";
