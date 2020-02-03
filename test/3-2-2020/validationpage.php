<?php

session_start();

require_once "connectionfile.php";
echo "connection successfully";

function getValue($section, $fieldName) {
    return isset($_POST[$section][$fieldName]) ? $_POST[$section][$fieldName] : "";
}

function setSession($section, $fieldName) {
    return isset($_POST[$section][$fieldName]) ? ($_SESSION[$section][$fieldName] = $_POST[$section][$fieldName]) : [];
}

function getSession($section, $fieldName) {
    return isset($_SESSION[$section][$fieldName]) ? $_SESSION[$section][$fieldName] : "";
}

function dataSameAsSqlStroe($section) {
    $errorMessage = [];
    foreach($_POST[$section] as $key => $value) {
        if(!validation($key, $value)) {
            echo $key." Invalid Format<br>";
            array_push($errorMessage,$key);
        } 
    }
    if (empty($errorMessage)) {
        $data = [];
        if($section == 'register') {
            foreach($_POST[$section] as $key => $value) {
                switch($key) {
                    case 'Prefix':
                        $data[$key] = $value;
                    break;
                    case 'First Name':
                        $data[$key] = $value;
                    break;
                    case 'Last Name':
                        $data[$key] = $value;
                    break;
                    case 'Mobile':
                        $data[$key] = $value;
                    break;
                    case 'Email':
                        $data[$key] = $value;
                    break;
                    case 'Password Hash':
                        $data[$key] = $value;
                    break;
                    case 'Information':
                        $data[$key] = $value;
                    break;
                }
            }
            if(isset($_POST['submit'])) {
                echo insertData('user', $data);
            }
        }
    }
}




function validation($key, $value) {
    switch($key) {
        case 'First Name':
        case 'Last Name':
            return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
        break;
        case 'Email':
            return preg_match('/^[a-zA-Z-0-9.]+\@[a-zA-Z-0-9.]+\.[a-z]{2,3}$/', $value) ? true : false;
        break;
        case 'Mobile':
            return preg_match('/^[0-9]{10}$/', $value) ? true : false;
        break;
        case 'Password Hash':
            return preg_match('/^[a-zA-Z-0-9]*$/', $value) ? true : false;
        break;
        default:
            return true;
    break;
    }
}
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<br>";
if(isset($_POST['register'])) {
    echo dataSameAsSqlStroe('register');
}

?>