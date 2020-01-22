<?php

$firstString = "JOHNJONE";
$secondString = "SMITH";
if(strlen($firstString) < strlen($secondString)) {
    for ($loopVariable = 0; $loopVariable < strlen($firstString); $loopVariable++) {
        echo $firstString[$loopVariable];
        echo $secondString[$loopVariable];
    }
    for ($loopVariable = strlen($firstString); $loopVariable < strlen($secondString); $loopVariable++) {
        echo $secondString[$loopVariable]; 
    }
} else {
    for ($loopVariable = 0; $loopVariable < strlen($secondString); $loopVariable++) {
        echo $firstString[$loopVariable];
        echo $secondString[$loopVariable];
    }
    for ($loopVariable = strlen($secondString); $loopVariable < strlen($firstString); $loopVariable++) {
        echo $firstString[$loopVariable]; 
    }
}

?>