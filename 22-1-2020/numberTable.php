<?php

echo "<table border='1'>";
for ($outerLoopVariable = 1; $outerLoopVariable < 7; $outerLoopVariable++) {
    echo "<tr>";
    for($innerLoopVariable = 1; $innerLoopVariable < 6; $innerLoopVariable++) {
        $result = $innerLoopVariable * $outerLoopVariable;
        echo "<td>".$outerLoopVariable."*".$innerLoopVariable."=".$result."</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<br>";




echo "<table border='1'>";
for ($outerLoopVariable = 1; $outerLoopVariable < 11; $outerLoopVariable++) {
    echo "<tr>";
    for($innerLoopVariable = 1; $innerLoopVariable < 11; $innerLoopVariable++) {
        $result = $innerLoopVariable * $outerLoopVariable;
        echo "<td>".$result."</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>