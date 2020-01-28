<?php

session_start();


function getValue($section, $fieldName, $returnType ="") {
    return isset($_POST[$section][$fieldName]) ? $_POST[$section][$fieldName] : getValueForSession($section, $fieldName, $returnType); 
}

if(isset($_POST["submit"])) {
    function setValueForSession($section) {
        $errorMessage = [];
            foreach($_POST[$section] as $key => $value) {
                if(!validation($key, $value)) {
                    echo $key." Invalid Format<br>";
                    array_push($errorMessage,$key);
                } 
            }
            if (empty($errorMessage)) {
                return isset($_POST[$section]) 
                    ? ($_SESSION[$section] = $_POST[$section]) 
                    : [];
            }
    }
    
}


function getValueForSession($section, $fieldName, $returnType) {
    return isset($_SESSION[$section][$fieldName]) 
        ? $_SESSION[$section][$fieldName] 
        : $returnType;
}

function checkValueOfDropdown($value, $section, $fieldName) {
    return $selectd = in_array($value, [getValue($section, $fieldName,[])]) 
                                    ? 'selected = "selected"'
                                    : "";
}

function checkMultipleValueOfDropdown($value, $section, $fieldName) {
    return $selected = array_intersect([$value], getValue($section, $fieldName,[])) ? 'selected': "";
}



function checkValueForCheckboxAndRadio($value, $section, $fieldName) {
    return $selectd = in_array($value, [getValue($section, $fieldName,[])]) 
                                    ? 'checked = "checked"'
                                    : "";
}

function checkMultipleValueForCheckboxAndRadio($value, $section, $fieldName) {
    return $selectd = array_intersect([$value], getValue($section, $fieldName,[])) 
                                    ? 'checked'
                                    : "";
}


function validation($key, $value) {
    switch($key) {
        case 'firstname':
        case 'lastname':
            return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
        break;
        case 'email':
            return preg_match('/^[a-zA-Z-0-9.]+\@[a-zA-Z-0-9.]+\.[a-z]{2,3}$/', $value) ? true : false;
        break;
        case 'phonenumber':
            return preg_match('/^[0-9]{10}$/', $value) ? true : false;
        break;
        case 'addressLine1':
        case 'addressLine2':
            return preg_match('/^[a-zA-Z0-9 ]+$/', $value) ? true : false;
        break;
        case 'postalcode':
            return preg_match('/^[0-9]{6}$/', $value) ? true : false;
        break;
        case 'describeyourself':
            return preg_match('/^[a-zA-Z ]*$/', $value) ? true : false;
        default:
            return true;
    break;
    }
}


echo "<pre>";
print_r($_POST);
echo "<br>";
if(isset($_POST['account'])) {
    print_r(setValueForSession('account'));
}
if(isset($_POST['address'])) {
    print_r(setValueForSession('address'));
}
if(isset($_POST['otherinformation'])){
    print_r(setValueForSession('otherinformation'));
}
echo "</pre>";

?>