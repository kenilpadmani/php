<?php

$firstNumber = 10;
$secondNumber = 20;

echo "Before Swap first number :".$firstNumber.", second number :".$secondNumber."<br>";

function swap($firstArgument, $secondArgument) {
    $temp = $firstArgument;
    $firstArgument = $secondArgument;
    $secondArgument = $temp;
    echo "After swap first number :".$firstArgument.", second number : ".$secondArgument;
}

swap($firstNumber, $secondNumber);

?>