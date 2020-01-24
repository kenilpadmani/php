<?php

$time = time();
$actualTime = date('d M Y @ h : i : s', $time);
$modifyTime = date('d M Y @ h : i : s', strtotime("+1 week 2 hours 10 minutes"));
echo "Actual time : ".$actualTime."<br>";
echo "modify time : ".$modifyTime;



?>