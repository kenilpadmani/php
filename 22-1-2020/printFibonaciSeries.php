<?php

$firstNumber = 0;
$secondNumber = 1;
echo "Fibonaci Series : ".$firstNumber." ".$secondNumber." ";
for($loopVarible = 2; $loopVarible < 10; $loopVarible++) {
    $addNumber = $firstNumber + $secondNumber;
    echo  $addNumber." ";
    $firstNumber = $secondNumber;
    $secondNumber = $addNumber;
}

?>