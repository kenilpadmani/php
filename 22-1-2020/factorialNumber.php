<form method="POST">
    Number : <input type="number" name="number" required><br>
    <input type="submit" name="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    function factorial($variable) {
        if($variable == 0) {
            return 1;
        } else {
            return $variable * factorial($variable - 1);
        }
    }
    echo "Number <strong>".$inputValue."</strong> Factorial is :".factorial($inputValue);
} else {
    echo "please fill the field";
}



?>