<?php
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
$userC = new UserC();
$userC->deleteUser($_GET["id"]);
header('Location:listUsers.php');
?>