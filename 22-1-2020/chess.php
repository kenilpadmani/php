<?php

echo "<table border='1' >";
for ($outerLoopVariable = 0; $outerLoopVariable < 8; $outerLoopVariable++) {
    if ($outerLoopVariable % 2 == 0) {
        echo "<tr>";
        for($innerLoopVariable = 0; $innerLoopVariable < 8; $innerLoopVariable++) {
            if ($innerLoopVariable % 2 == 0) {
                echo "<td style='background-color:white'; height = 50px; width = 50px;></td>";
            } else {
                echo "<td style='background-color:black'; height = 50px; width = 50px;></td>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr>";
        for($innerLoopVariable = 0; $innerLoopVariable < 8; $innerLoopVariable++) {
            if ($innerLoopVariable % 2 == 1) {
                echo "<td style='background-color:white'; height = 50px; width = 50px;></td>";
            } else {
                echo "<td style='background-color:black'; height = 50px; width = 50px;></td>";
            }
        }
        echo "</tr>";
    }
}
echo "</table>";


?>