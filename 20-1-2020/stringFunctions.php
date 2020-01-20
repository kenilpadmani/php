<?php

$string = "This is my Name";
$string1 = "Hello world";

$string_suff = str_shuffle($string);
echo "Suffled String : ".$string_suff;

//reverse string
$string_rev = strrev($string);
echo "<br>Revese String : ".$string_rev;

//Count Word
$string_Word = str_word_count($string);
echo "<br>Count Word Of String : ".$string_Word;

//Length of string
$string_length = strlen($string);
echo "<br>Length of string : " .$string_length;

//Compare string
similar_text($string, $string1, $result) ;
echo "<br>Compare of string : ".$result;

//Replace string
$string_replace = str_replace("Name", "Kenil", $string);
echo "<br>Replace the word of String : ".$string_replace;

//Find the position of string
$string_position = strpos($string, "is");
echo "<br>".$string_position;

?>