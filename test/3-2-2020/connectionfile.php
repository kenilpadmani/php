<?php

function openConnection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databaseName = "blogapplication";

    $connection = @mysqli_connect($servername, $username, $password, $databaseName);
    if(!$connection) {
        die("Connection Failed".mysqli_connect_error());
    }

    return $connection;
}

function insertdata($tableName, $data) {
    $keys = implode(', ', array_keys($data));
    $values = implode("','", $data);
    $insertQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
    if(mysqli_query(openConnection(), $insertQuery)){
        echo "Record enter successfully<br>";
    }
    else {
        echo "error for insert<br>";
    }
    return $insertQuery."<br>";
}

function lastId($fieldName, $tableName) {
    $query = "SELECT MAX($fieldName) from $tableName";
    if($result = mysqli_query(openConnection(), $query)) {
        $rows = mysqli_fetch_assoc($result);
        return $rows;
    }
}

function updateData($id, $tableName, $data) {
    $tempData = "";
    foreach($data as $key => $value) {
        $tempData .= $key. "='" .$value."',";
    }
    $updateData = substr($tempData, 0, strlen($tempData)-1);
    $updateQuery = "UPDATE $tableName SET $updateData WHERE blogid = '$id'";
    if (mysqli_query(openConnection(), $updateQuery)) {
        echo "update successfully";
    } else {
        echo "error for update data";
    }

}

function deleteData($id, $tableName) {
    $deleteQuery = "DELETE FROM $tableName WHERE blogid = '$id'";
    if (mysqli_query(openConnection(), $deleteQuery)) {
        echo "delete successfully";
    } else {
        echo "error for delete data";
    }
}

function displayDataForcategory() {
    echo $query = "SELECT ca.categoryid,c.categoryName,ca.CreatedAt FROM category ca JOIN parentcategory c";
    if ($result = mysqli_query(openConnection(), $query)) {
        return $result;
    } else {
        echo "error for display data";
    }
}


function displayDataForblogpost() {
    $query = "SELECT p.blogid,c.categoryName,p.Title,p.PublishedAt FROM blogpost p JOIN parentcategory c";
    if ($result = mysqli_query(openConnection(), $query)) {
        return $result;
    } else {
        echo "error for display data";
    }

}

function fileuploading() {
        $fileName = $_FILES['Image']['name'];
        $fileExtension = substr($fileName, strpos($fileName, '.')+1);
        $fileExtensionLower = strtolower($fileExtension);
        $extensionArray = ['jpeg', 'jpg', 'png'];
        $tempName = $_FILES['file']['tmp_name'];
        echo "File name : ".$fileName."<br>";
        echo "Temp file name : ".$tempName."<br>";
        if (isset($fileName)) {
            if (!empty($fileName)) {
                if(in_array($fileExtensionLower, $extensionArray)) {
                    $location = 'files/';
                    if (move_uploaded_file($tempName, $location.$fileName)) {
                        return true;
                        echo "upload successfully";
                    } else {
                        return false;
                        echo "Not Upload";
                    }
                }
            } else {
                echo "file extension allowed jpeg,jpg,png";
            }
        } else {
            echo "please the fill";
        }
    }

?>