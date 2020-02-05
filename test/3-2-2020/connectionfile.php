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

// function lastId($fieldName, $tableName) {
//     $query = "SELECT MAX($fieldName) from $tableName";
//     if($result = mysqli_query(openConnection(), $query)) {
//         $rows = mysqli_fetch_assoc($result);
//         return $rows;
//     }
// }

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

function deleteDataForParentCategory($id, $tableName) {
    $deleteQuery = "DELETE FROM $tableName WHERE ParentCategoryId = '$id'";
    if (mysqli_query(openConnection(), $deleteQuery)) {
        return true;
        echo "delete successfully";
    } else {
        echo "error for delete data";
    }
}

function deleteDataForCategory($id, $tableName) {
    $deleteQuery = "DELETE FROM $tableName WHERE categoryid = '$id'";
    if (mysqli_query(openConnection(), $deleteQuery)) {
        echo "delete successfully";
    } else {
        echo "error for delete data";
    }
}

function displayDataForcategory() {
    $query = "SELECT ca.categoryid,c.categoryName,ca.Image,ca.CreatedAt FROM category ca JOIN parentcategory c 
                    WHERE ca.ParentCategoryId = c.ParentCategoryId";
    if ($result = mysqli_query(openConnection(), $query)) {
        return $result;
    } else {
        echo "error for display data";
    }
}


function displayDataForblogpost() {
    $query = "SELECT p.blogid,c.categoryName,p.Title,p.PublishedAt FROM blogpost p JOIN parentcategory c 
                ON p.blogid = c.ParentCategoryId";
    if ($result = mysqli_query(openConnection(), $query)) {
        return $result;
    } else {
        echo "error for display data";
    }

}

function fileuploading($image, $folderName) {
        $fileName = $image['name'];
        $fileExtension = substr($fileName, strpos($fileName, '.')+1);
        $fileExtensionLower = strtolower($fileExtension);
        $extensionArray = ['jpeg', 'jpg', 'png'];
        $tempName = $image['tmp_name'];
        if (isset($fileName)) {
            if (!empty($fileName)) {
                if(in_array($fileExtensionLower, $extensionArray)) {
                    $location = $folderName;
                    if (move_uploaded_file($tempName, $location.$fileName)) {
                        return $location.$fileName;
                        echo "upload successfully";
                    }
                }
            } else {
                echo "file extension allowed jpeg,jpg,png";
            }
        } else {
            echo "please the fill";
        }
    }

    function fetchCategoryName() {
        $select = "SELECT categoryName FROM parentcategory";
        $result = mysqli_query(openConnection(), $select);
        while($rows = mysqli_fetch_assoc($result)) {
        echo "<option value= $rows[categoryName]>".$rows['categoryName'];
        echo "</option>";
        }
    } 



?>