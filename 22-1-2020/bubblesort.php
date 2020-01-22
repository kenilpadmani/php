<?php


$array =[64, 34, 25, 12, 22, 11, 90];
echo "Before sorted array : ";
foreach ($array as $arrayValue) {
    echo $arrayValue." ";
}
echo "<br>";
    
for ($outerLoopVariable = 0 ; $outerLoopVariable < count($array); $outerLoopVariable++) {
    for ($innerLoopVariable = 0; $innerLoopVariable < count($array) - $outerLoopVariable -1; $innerLoopVariable++) {
        if ($array[$innerLoopVariable] > $array[$innerLoopVariable + 1]) {
            $temp = $array[$innerLoopVariable];
            $array[$innerLoopVariable] = $array[$innerLoopVariable + 1];
            $array[$innerLoopVariable + 1] = $temp;
            } 
        }
    }

echo "After sorted array : ";
foreach ($array as $arrayValue) {
    echo $arrayValue." ";
}


?>