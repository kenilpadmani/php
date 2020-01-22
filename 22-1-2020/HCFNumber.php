<form method="POST">
    Enter firstNumber :<input type="number" name="firstnumber"><br>
    Enter secondNumber :<input type="number" name="secondnumber"><br>
    <input type="submit">
</form>

<?php

if (isset($_POST['firstnumber']) && !empty($_POST['firstnumber'])) {
    if (isset($_POST['secondnumber']) && !empty($_POST['secondnumber']))
    $firstNumber = $_POST['firstnumber'];
    $secondNumber = $_POST['secondnumber'];
    echo "First Number :  ".$firstNumber."<br>";
    $firstNumberFactors = [];
    $incrementVariable = 0;
    for ($loopVariable = 1; $loopVariable <= $firstNumber; $loopVariable++) {
        if ($firstNumber % $loopVariable == 0) {
            $firstNumberFactors[$incrementVariable++] = $loopVariable;
        }
    }
    echo "First Number factors : ";
    foreach ($firstNumberFactors as  $factors) {
        echo $factors.",";
    }
    echo "<br>";

    //second factors
    echo "Second Number : ".$secondNumber."<br>";
    $secondNumberFactors = [];
    $incrementVariable = 0;
    for ($loopVariable = 1; $loopVariable <= $secondNumber; $loopVariable++) {
        if ($secondNumber % $loopVariable == 0) {
            $secondNumberFactors[$incrementVariable++] = $loopVariable;
        }
    }
    echo "Second Number factors : ";
    foreach ($secondNumberFactors as  $factors) {
        echo $factors.",";
    }
    
    //commmon factor
    $commonFactors = [];
    $incrementVariable = 0;
    if (count($firstNumberFactors) > count($secondNumberFactors)) {
        for ($loopVariable = 0; $loopVariable < count($firstNumberFactors); $loopVariable++) {
            for ($j = 0; $j < count($secondNumberFactors); $j++) {
                if($firstNumberFactors[$loopVariable] == $secondNumberFactors[$j]) {
                    $commonFactors[$incrementVariable++] = $firstNumberFactors[$loopVariable];
                }
            }
        }
    } else {
        for ($loopVariable = 0; $loopVariable < count($secondNumberFactors); $loopVariable++) {
            for ($j = 0; $j < count($firstNumberFactors); $j++) {
                if($secondNumberFactors[$loopVariable] == $firstNumberFactors[$j]) {
                    $commonFactors[$incrementVariable++] = $firstNumberFactors[$loopVariable];
                }
            }
        }
    }
    echo "<br> Common Factors :";
    foreach ($commonFactors as  $factors) {
        echo $factors.",";
    }
    echo "<br>";



    //Highest Common Factors
    $maxValue = $commonFactors['0'];
    for ($loopVariable = 1; $loopVariable < count($commonFactors); $loopVariable++) {
        if ($commonFactors[$loopVariable] > $maxValue) {
            $maxValue = $commonFactors[$loopVariable];
        }
    }
    echo "HCF is : ".$maxValue;

}

?>