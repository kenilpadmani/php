<?php

require 'header.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $_POST['name'] = "hello kenil";
        echo $inputValue = $_POST['name'];
    } else {
        echo "Not set Value";
    }
}
else {
    echo "Cilck button ";
}



?>