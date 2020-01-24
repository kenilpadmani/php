<?php

require 'visitorHeader.php';

foreach ($ipBlocked as $ip) {
    if($ip == $ipAddress) {
        die("Your ip Address ".$ipAddress." is blocked");
    }
}


?>