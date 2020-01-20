<?php

//Implementation of preg_match() function
$text = "Hello World";
if(preg_match("/Hello/", $text)) {
    echo  "Match is found<br>";
}
else {
    echo "Match is not found<br>";
}

//Implementation of preg_quote() function
echo preg_quote( "http://", "/" );  
echo "<br>";


// Implementaion of preg_split() function
$inputstrVal  = 'Geeksarticle';  
$result = preg_split('//', $inputstrVal, -1, PREG_SPLIT_DELIM_CAPTURE); 
print_r($result); 
echo "<br>";


//Implementation of preg_replace function
$inputstrVal  = 'Geeksarticle';  
$result = preg_replace('/Geek/', 'Hi', $inputstrVal); 
echo $result;


?>