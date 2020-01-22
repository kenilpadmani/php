<?php

for ($outerLoopVariable = 0; $outerLoopVariable < 8; $outerLoopVariable++) {
    for ($innerLoopVariable = 0; $innerLoopVariable < 15; $innerLoopVariable++) {
        if ($outerLoopVariable <= ($innerLoopVariable - $outerLoopVariable)) {
            echo  "*";
        } else {
            echo " ";
        }
    }
    echo "<br>";
}


//patteren 123456
for ($outerLoopVariable = 0; $outerLoopVariable < 8; $outerLoopVariable++) {
    $incrementVariable = 1;
    for ($innerLoopVariable = 0; $innerLoopVariable < 8; $innerLoopVariable++) {
        if ($outerLoopVariable <= $innerLoopVariable) {
            echo  $incrementVariable." ";
            $incrementVariable++;
        } else {
            echo " ";
        }
    }
    echo "<br>";
}


//pateren **

for ($outerLoopVariable = 0; $outerLoopVariable < 9; $outerLoopVariable++) {
    for ($innerLoopVariable = 0; $innerLoopVariable < 9; $innerLoopVariable++) {
        if ($outerLoopVariable >= $innerLoopVariable) {
            echo  "*";
        } else {
            echo " ";
        }
    }
    echo "<br>";
}

for ($outerLoopVariable = 0; $outerLoopVariable < 8; $outerLoopVariable++) {
    $incrementVariable = 1;
    for ($innerLoopVariable = 0; $innerLoopVariable < 8; $innerLoopVariable++) {
        if ($outerLoopVariable >= $innerLoopVariable) {
            echo  $incrementVariable." ";
            $incrementVariable++;
        } else {
            echo " ";
        }
    }
    echo "<br>";
}

for ($outerLoopVariable = 0; $outerLoopVariable < 4; $outerLoopVariable++) {
    $incrementVariable = $outerLoopVariable;
    for ($innerLoopVariable = 0; $innerLoopVariable < 3; $innerLoopVariable++) {
        $incrementVariable ++;
        echo  $incrementVariable." ";
        $incrementVariable += 3; 
    }
    echo "<br>";
}

for ($outerLoopVariable = 0; $outerLoopVariable < 5; $outerLoopVariable++) {
    if(($outerLoopVariable == 0) || ($outerLoopVariable == 4)) {
        for ($innerLoopVariable = 0; $innerLoopVariable < 5; $innerLoopVariable++) {
            echo "*";
        }
    } else {
        for ($innerLoopVariable = 0; $innerLoopVariable < 5; $innerLoopVariable++) {
            if (($innerLoopVariable == 0) || ($innerLoopVariable == 4)) {
                echo "*";
            } else {
                echo "&nbsp ";
            }
        }
    }
    echo "<br>";
}
$incrementVariable = 1;
for ($outerLoopVariable = 0; $outerLoopVariable < 5; $outerLoopVariable++) {
    for ($innerLoopVariable = 0; $innerLoopVariable < 5; $innerLoopVariable++) {
        if ($outerLoopVariable >= $innerLoopVariable) {
            echo  $incrementVariable." ";
            $incrementVariable++;
        } else {
            echo " ";
        }
    }
    echo "<br>";
}

?>
