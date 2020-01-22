<form method="POST">
    Number : <input type="number" name="number" required><br>
    <input type="submit" name="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    $firstNumber = 0;
    $secondNumber = 1;
    echo "Fibonaci Series : ".$firstNumber." ".$secondNumber." ";
    for($loopVarible = 2; $loopVarible < $inputValue; $loopVarible++) {
        $addNumber = $firstNumber + $secondNumber;
        echo  $addNumber." ";
        $firstNumber = $secondNumber;
        $secondNumber = $addNumber;
    }
}

?>