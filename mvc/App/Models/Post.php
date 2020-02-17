<?php
namespace App\Models;
use PDO;
class Post extends \Core\Model {
    public static function getAll() {
        try {
            $db = static::getDB();
            $selectQuery = $db->query("SELECT * FROM parentcategory");
            $result = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
            //print_r($result);
            return $result;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>