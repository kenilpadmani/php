<?php declare(strict_types=1);

function addNumber(int $number1, int $number2) {
    return $number1 + $number2;
}

echo addNumber(10, 20);


//echo addNumber("20 days", "30"); 

//defult argument functions

function setHeight($height = 50) {
    echo "<br>This is user height $height<br>";
}

setHeight();

//return type declarations

function addNumberAlsoReturnType1(float $number1, float $number2) : float {
    return $number1 + $number2;
}

echo addNumberAlsoReturnType1(5.2, 7.5);
echo "<br>";

function addNumberAlsoReturnType(float $number1, float $number2) : int {
    return (int)($number1 + $number2);
}

echo addNumberAlsoReturnType(5.2, 7.5);


?>

<?php

$number1 = 10;
$number2 = 20;

function Add() {
    $GLOBALS["z"] = $GLOBALS["number1"] + $GLOBALS["number2"];
}

Add();
echo "<br>".$z;

?>