<?php

$array = [200,100,300,400,50];
echo "Array Value :";
foreach ($array as $arrayValue) {
    echo $arrayValue." ";
}
echo "<br>";
$minValue = $array[0];
for ($loopVariable = 1; $loopVariable < count($array); $loopVariable++) {
    if ($array[$loopVariable] < $minValue) {
        $minValue = $array[$loopVariable];
    }
}
echo "Minimum value is : ".$minValue;

?>