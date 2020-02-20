<?php
namespace App\Models;
use PDO;
class Post extends \Core\Model {
    public static function getAll($tableName) {
        try {
            $db = static::getDB();
            $selectQuery = $db->query("SELECT * FROM $tableName");
            $result = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function insertdata($tableName, $data) {
        try {
            $db = static::getDB();
            $keys = implode(', ', array_keys($data));
            $values = implode("','", $data);
            echo $insertQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
            $insertData = $db->exec($insertQuery);
            return $db->lastInsertId();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getValueForDatabase($id, $tableName, $tableId) {
        try {
            $db = static::getDB();
            $selectQuery = "SELECT * FROM $tableName WHERE $tableId = '$id'";
            $temp = $db->query($selectQuery);
            $result = $temp->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    function updateData($id, $tableName, $data, $tableId) {
        try {
            $db = static::getDB();
            $tempData = "";
            foreach($data as $key => $value) {
                $tempData .= $key. "='" .$value."',";
            }
            $updateData = substr($tempData, 0, strlen($tempData)-1);
            echo $updateQuery = "UPDATE $tableName SET $updateData WHERE $tableId = '$id'";
            $result = $db->exec($updateQuery);
            echo "update data successfully";
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function deleteData($id, $tableName, $tableId) {
        try {
            $db = static::getDB();
            $deleteQuery = "DELETE FROM $tableName WHERE $tableId = '$id'";
            $delete = $db->exec($deleteQuery);
            echo "delete successfully";
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getCategoriesData($tableName) {
        try {
            $db = static::getDB();
            $selectQuery = "SELECT categoryName,categoryid FROM $tableName WHERE parentcategoryId != 0";
            $row = $db->query($selectQuery);
            $result = $row->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getProductsData($tableName) {
        try {
            $db = static::getDB();
            $selectQuery = "SELECT categoryid,categoryName FROM $tableName WHERE parentcategoryId = 0 ";
            $row = $db->query($selectQuery);
            $result = $row->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getDataBaseFormJoin($id) {
        try {
            $db = static::getDB();
            $selectQuery = "SELECT categoryid FROM products_categories WHERE productid = '$id'";
            $row = $db->query($selectQuery);
            $result = $row->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function categoryDataFormCategory($tableName) {
        try {
            $db = static::getDB();
            $selectQuery = "SELECT parentcategoryid,categoryName FROM $tableName";
            $row = $db->query($selectQuery);
            $result = $row->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>