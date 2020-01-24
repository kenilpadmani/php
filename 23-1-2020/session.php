<?php

session_start();
if (isset($_POST['name']) && isset($_POST['password'])) {
    $userName = $_POST['name'];
    $userPassword = $_POST['password'];
    $_SESSION['storeName'] = $userName;
    $_SESSION['storePassword'] = $userPassword;

}

?>


<form method="post">
    <input type="text" name="name"><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>