<?php

//sleep function
echo "Before time is : ".date('h:i:s');
sleep(5);
echo "<br>After sleep time is : ".date('h:i:s')."<br>";

//die and exit function
@mysqli_connect("localhost", "root", " ") or die("Could not connect");

$site = " ";
fopen($site, "r") or exit("Unable to connect file.");


?>