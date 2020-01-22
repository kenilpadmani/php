<form method="POST">
    Number :<input type="number" name="number"><br>
    <input type="submit">
</form>


<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    $flag =  0;
    echo "Input Number :  ".$inputValue."<br>";
    $inputValueSquareroot=sqrt($inputValue);
    for ($loopVariable = 2; $loopVariable <= $inputValueSquareroot; $loopVariable++) {
        if($inputValue % $loopVariable == 0) {
            echo "Number is not prime<br>";
            $flag = 1;
            break;
        }
    }
    if ($flag == 0) {
        echo "Number is prime<br>";
    }
}

?>