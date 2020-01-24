<?php

$ipAddress = $_SERVER['REMOTE_ADDR'];
echo $ipAddress;
$ipBlocked = ['::1', '192.168.10.1'];

echo $_SERVER['HTTP_CLIENT_IP'];
echo $_SERVER['HTTP_X_FORWARDED_FOR'];

?>