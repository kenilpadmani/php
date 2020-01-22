<form method="POST">
    Enter Year :<input type="number" name="number"><br>
    <input type="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    echo "Input Number :  ".$inputValue."<br>";
    if($inputValue % 400 == 0) {
        echo $inputValue." is leap year";
    } elseif (($inputValue % 4 == 0) && ($inputValue % 100 != 0)) {
        echo $inputValue." is leap year";
    } else {
        echo $inputValue." is not leap year";
    }
}

?>