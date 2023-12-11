<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "swiss_collection";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}

?>