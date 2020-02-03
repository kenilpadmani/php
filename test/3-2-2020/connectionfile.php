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
    echo $insertQuery = "INSERT INTO $tableName($keys) VALUES('$values')";
    if(mysqli_query(openConnection(), $insertQuery)){
        echo "Record enter successfully<br>";
    }
    else {
        echo "error for insert<br>";
    }
    return $insertQuery."<br>";
}



?>