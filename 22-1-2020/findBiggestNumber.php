<?php

$array = [10,20,30,40,50];
echo "Array Value :";
foreach ($array as $arrayValue) {
    echo $arrayValue." ";
}
echo "<br>";
$maxValue = $array[0];
for ($loopVariable = 1; $loopVariable < count($array); $loopVariable++) {
    if ($array[$loopVariable] > $maxValue) {
        $maxValue = $array[$loopVariable];
    }
}
echo "Maximum value is : ".$maxValue;

?>