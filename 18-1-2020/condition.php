<?php

$dateNumber = date("H");
if($dateNumber < 15) {
    echo "Have good day!<br>";
}


if (0){
    echo 'true';
}
else{
    echo 'false';
}


$number1 = 10;
$number2 = 20;

if($number1 == 10) {
    echo "Number is ten.";
}else if ($number2 == 20) {
    echo "Number is 20";
}else {
    echo "Number is not ten and 20";
}

$a = 1;
$b = 1;
$c = 1;
$d = 1;

if(($a ==1 || $b == 1) && ($c == 1 || $d == 1)) {
    echo "$a $b $c $d";
}


if ( 1 == 0 ) echo "Test 1."; echo "Test 2";

?>