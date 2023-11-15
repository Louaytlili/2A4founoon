<?php
if (isset($_GET["idH"])) {
    $idH = $_GET["idH"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "oeuvres";
    $connection = new mysqli($servername,$username,$password,$database);
    $sql = "DELETE FROM oeuvres WHERE idH=$idH";
    $connection->query($sql);  
}

header("location : /projet/Model/listoeuvres.php");
exit;
?>