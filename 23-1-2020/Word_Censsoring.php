<?php

if ((isset($_POST['user_input'])) && !empty($_POST['user_input'])) {
    $inputValue = $_POST['user_input'];
    echo "user input String : ".$inputValue."<br>";
} else {
    echo "please fill textarea<br>";
} 
if ((isset($_POST['find'])) && !empty($_POST['find'])) {
    $findValue = $_POST['find'];
    echo "Find Word : ".$findValue."<br>";
} else {
    echo "please fill find field<br>";
}

if ((isset($_POST['replace'])) && !empty($_POST['replace'])) {
    $replaceValue = $_POST['replace'];
    echo "Replace Word : ".$replaceValue."<br>";
} else {
    echo "please fill replace field";
}

echo "replace String : ".str_replace($findValue, $replaceValue, $inputValue);


?>

<form action="Word_Censsoring.php" method="post">
    <textarea name="user_input" rows="10" cols="20"></textarea><br>
    find:<input type="text" name="find"><br>
    replace:<input type="text" name="replace"><br>
    <input type="submit" name="submit">
</form>