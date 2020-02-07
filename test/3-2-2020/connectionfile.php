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

    function updateData($id, $tableName, $data, $tableId) {
        $tempData = "";
        foreach($data as $key => $value) {
            $tempData .= $key. "='" .$value."',";
        }
        $updateData = substr($tempData, 0, strlen($tempData)-1);
        $updateQuery = "UPDATE $tableName SET $updateData WHERE $tableId = '$id'";
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

    function deleteDataForCategory($id, $tableName) {
        $deleteQuery = "DELETE FROM $tableName WHERE categoryid = '$id'";
        if (mysqli_query(openConnection(), $deleteQuery)) {
            echo "delete successfully";
        } else {
            echo "error for delete data";
        }
    }

    function displayDataForcategory() {
        $query = "SELECT ca.categoryid,ca.Title,ca.Image,ca.CreatedAt FROM category ca";
        if ($result = mysqli_query(openConnection(), $query)) {
            return $result;
        } else {
            echo "error for display data";
        }
    }


    function displayDataForblogpost() {
        $query = "SELECT p.blogid,p.selectedcategory,p.Title,p.PublishedAt FROM blogpost p where p.userid = '$_SESSION[loginId]'";
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

    function getValueForDatabase($fieldName, $tableName, $tableId) {
        if($tableName == 'user' && isset($_SESSION['loginId'])){
            $selectQuery = "SELECT $fieldName FROM $tableName WHERE $tableId = '$_SESSION[loginId]'";
            $result = mysqli_query(openConnection(), $selectQuery); 
            while($rows = mysqli_fetch_assoc($result)) {
            return $rows[$fieldName];
        }
        } else if((isset($_SESSION['loginId'])) && (isset($_SESSION['editId']))) {
                $selectQuery = "SELECT $fieldName FROM $tableName WHERE $tableId = '$_SESSION[editId]'";
                $result = mysqli_query(openConnection(), $selectQuery); 
        while($rows = mysqli_fetch_assoc($result)) {
            return $rows[$fieldName];
        }
            } 
        
    }

    
?>