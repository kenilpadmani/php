<form method="POST">
    Number :<input type="number" name="number"><br>
    <input type="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    echo "Input Number :  ".$inputValue."<br>";
    $firstNumberFactors = [];
    $incrementVariable = 0;
    for ($loopVariable = 1; $loopVariable <= $inputValue; $loopVariable++) {
        if ($inputValue % $loopVariable == 0) {
            $firstNumberFactors[$incrementVariable++] = $loopVariable;
        }
    }
    echo "First Number factors : ";
    foreach ($firstNumberFactors as  $factors) {
        echo $factors.",";
    }
}

?>