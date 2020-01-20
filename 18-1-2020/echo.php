<?php
//variable
$a = 5;
$_1354353 = "ke";
$_as_1541 = "abc";

//Assignment operator  
echo "Assignment operator use<br> ";
$number1 = 20;
$number1 += 10;
echo $number1."<br>";

//string functions

echo "string functions<br>";
$string = "Hello How Are You";
echo strlen($string);
echo "<br>Number of Word:".str_word_count($string);
echo "<br>Revese of String:".strrev($string);
echo "<br>String Postion:".strpos($string,"How");
echo "<br>String Replace :".str_replace("Are","Fine",$string);


//echo 
$name = "<br>kenil";
echo $name."<br>";

$number = 5;
echo $number."<br>";


echo "this","is","string","multiple parameter<br>";
echo "this"."is"."string"."con cadiation<br>";

$some_var =  "true";
($some_var) ? print 'true<br>' : print 'false<br>';

echo "this is $name $number <br>";

echo ($some_var) ? 'true<br>' : 'false';



echo "hello",isset($name1)?$name1:"john doe",'!';



?>