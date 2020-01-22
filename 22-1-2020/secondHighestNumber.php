<?php

$number = [1,20,30,40];
$maxValue = $number[0];
for ($loopVariable = 1; $loopVariable < count($number); $loopVariable++) {
    if($number[$loopVariable] > $maxValue) {
        $second = $maxValue;
        $maxValue = $number[$loopVariable];
    }
}
echo "Second highest Number : ".$second;
?>