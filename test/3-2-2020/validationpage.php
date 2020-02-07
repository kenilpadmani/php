<?php
    require_once "connectionfile.php";

    function getValue($section, $fieldname) {
        return isset($_POST[$section][$fieldname]) ? $_POST[$section][$fieldname] : "";
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
                
                $data['CreatedAt'] = date('D:M:Y h:i:s', time());
                foreach($_POST[$section] as $key => $value) {
                    switch($key) {
                        case 'Prefix':
                            $data[$key] = $value;
                        break;
                        case 'FirstName':
                            $data[$key] = $value;
                        break;
                        case 'LastName':
                            $data[$key] = $value;
                        break;
                        case 'Mobile':
                            $data[$key] = $value;
                        break;
                        case 'Email':
                            $data[$key] = $value;
                            $_SESSION['emailregister'] = $value;
                        break;
                        case 'PasswordHash':
                            $data[$key] = $value;
                        break;
                        case 'Information':
                            $data[$key] = $value;
                        break;
                    }
                }
                if(isset($_POST['submit'])) {
                    if(emailvalidation()) {
                        echo insertData('user', $data);
                        header('Location: login.php');
                    } else {
                        echo "Mail already exits";
                    }
                }
            } 
            if($section == 'addnewcategory') {

                $data['ParentCategoryId'] = $_SESSION['loginId'];
                $data['CreatedAt'] = date('D:M:Y h:i:s', time());
                $data['Image'] = fileuploading($_FILES['image'], 'files/');
                foreach($_POST[$section] as $key => $value) {
                    switch($key) {
                        case 'Title':
                            $data[$key] = $value;
                        break;
                        case 'MetaTitle':
                            $data[$key] = $value;
                        break;
                        case 'Url':
                            $data[$key] = $value;
                        break;
                        case 'Content':
                            $data[$key] = $value;
                        break;
                        case 'categoryName':
                            $insertquery = "INSERT INTO parentcategory($key) VALUES('$value')";
                            echo (mysqli_query(openConnection(), $insertquery)) ? "Record enter successfully" : "error";
                        break;
                        
                    }
                }
                
                if(isset($_POST['update']) && isset($_SESSION['editId'])) {
                    updateData($_SESSION['editId'], 'category', $data, 'categoryid');
                    header('Location: blogcategory.php');
                }
                if(isset($_POST['submit'])) {
                    fileuploading($_FILES['image'], 'files/');
                    insertData('category', $data);
                    header('Location: blogcategory.php');
                }
            }
            if($section == 'addnewblog') {

                $data['userid'] = $_SESSION['loginId'];
                $data['CreatedAt'] = date('D:M:Y h:i:s', time());
                $data['Image'] = fileuploading($_FILES['Imagename'], 'blogimage/');
                foreach($_POST[$section] as $key => $value) {
                    switch($key) {
                        case 'Title':
                            $data[$key] = $value;
                        break;
                        case 'PublishedAt':
                            $data[$key] = $value;
                        break;
                        case 'Url':
                            $data[$key] = $value;
                        break;
                        case 'Content':
                            $data[$key] = $value;
                        break;
                    }
                }
                
                if(isset($_POST['update']) && isset($_SESSION['editId'])) {
                    updateData($_SESSION['editId'], 'blogpost', $data, 'blogid');
                    header('Location: blogpost.php');
                }
                if(isset($_POST['submit'])) {
                    echo fileuploading($_FILES['Imagename'] , 'blogimage/');
                    echo insertData('blogpost', $data);
                    header('Location: blogpost.php');
                }
            }
        }
    }

    function validation($key, $value) {
        switch($key) {
            case 'FirstName':
            case 'LastName':
                return preg_match('/^[a-zA-Z]+$/', $value) ? true : false;
            break;
            case 'Email':
                return preg_match('/^[a-zA-Z-0-9.]+\@[a-zA-Z-0-9.]+\.[a-z]{2,3}$/', $value) ? true : false;
            break;
            case 'Mobile':
                return preg_match('/^[0-9]{10}$/', $value) ? true : false;
            break;
            case 'PasswordHash':
                return preg_match('/^[a-zA-Z-0-9]*\w*[a-zA-Z-0-9]$/', $value) ? $_SESSION['password']=$value : false;
            break;
            case 'confirmpassword':
                if(preg_match('/^[a-zA-Z-0-9]*\w*[a-zA-Z-0-9]$/', $value)) {
                    echo $_SESSION['conformpassword'] = $value;
                    if($_SESSION['conformpassword'] == $_SESSION['password']) {
                        echo "password is same";
                        return true;
                    } 
                } else {
                    return false;
                }
            break;
            default:
                return true;
        break;
        }
    }

    function emailvalidation() {
        $selectQuery = "SELECT Email from user where Email = '$_SESSION[emailregister]'";
        $result = mysqli_query(openConnection(), $selectQuery);
        $rows = mysqli_num_rows($result);
        if($rows >= 1) {
            return false;
        } else {
            return true;
        }
    }

    if(isset($_POST['register'])) {
        dataSameAsSqlStroe('register');
    }

    if(isset($_POST['addnewcategory'])) {
        dataSameAsSqlStroe('addnewcategory');
    }
    if(isset($_POST['addnewblog'])) {
        dataSameAsSqlStroe('addnewblog');
    }

    if(isset($_GET['delete'])) {
        $id = array_search('delete', $_GET['delete']);
        deleteDataForCategory($id, 'category');
    }
    if(isset($_GET['delete'])) {
        $id = array_search('delete', $_GET['delete']);
        deleteData($id, 'blogpost');
    }
?>