<?php

if( isset($_POST['name']) && empty($_POST['name'])) {
    if (isset($_POST['password']) && empty($_POST['password'])) {
        setcookie('sessionName', $_POST['name'], time()+500);
        setcookie('sessionPassword', $_POST['password'], time()+500);
        echo "cookie store successfully";
    } else {
        echo "password field blank";
    }
} else {
    echo "name field blank";
}

?>
<a href='cookie.php'>go to login page </a>