<form method="POST">
    Number :<input type="number" name="number"><br>
    <input type="submit">
</form>

<?php

if (isset($_POST['number']) && !empty($_POST['number'])) {
    $inputValue = $_POST['number'];
    echo "Input Number :  ".$inputValue."<br>";
    echo "Reverse Number is : ";
    while ($inputValue > 1) {
        $rem = (int)$inputValue % 10;
        echo $rem;
        $inputValue = (int)$inputValue / 10;
        
    }
    
}

?>