<form method="POST">
    Number :<input type="number" name="number"><br>
    <input type="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    echo "Input Number :  ".$inputValue;
    $temp = $inputValue;
    $sum = 0;
    while ($inputValue > 0) {
        $rem = $inputValue % 10;
        $sum += $rem * $rem * $rem;
        $inputValue = $inputValue / 10;
    }
    if($sum == $temp) {
        echo "<br>Number is armstrong";
    } else {
        echo "<br>Number is not armstrong";
    }

    
}


?>