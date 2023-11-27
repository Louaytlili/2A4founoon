<?php
include 'C:\xampp2\htdocs\Shop\controller\ShopC.php';

        // Code to delete the record goes here
        $ShopC = new ShopC();
        $ShopC->deleteShop($_GET["id"]);
        header('Location:listShop.php');
?>