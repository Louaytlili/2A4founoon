<?php

require 'C:\xampp2\htdocs\Shop\config.php';

class ShopC
{

    public function listShop()
    {
        $sql = "SELECT * FROM Shop";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteShop($ide)
    {
        $sql = "DELETE FROM Shop WHERE idShop = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addShop($Shop)
    {
        $sql = "INSERT INTO shop (nom, prix, artist, description,status,type) VALUES (NULL, :nom,:prix, :artist,:description,:status,:type)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $Shop->getnom(),
                'prix' => $Shop->getprix(),
                'artist' => $Shop->getartist(),
                'description' => $Shop->getdescription(),
                'status' => $Shop->getstatus(),
                'type' => $Shop->gettype(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showShop($id)
    {
        $sql = "SELECT * from Shop where idShop = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Shop = $query->fetch();
            return $Shop;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateShop($Shop, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Shop SET 
                    nom = :nom, 
                    prix = :prix, 
                    artist = :artist,
                    description = :description, 
                    status = :status,  
                    type = :type
                WHERE idShop= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $Shop->getnom(),
                'prix' => $Shop->getprix(),
                'artist' => $Shop->getartist(),
                'description' => $Shop->getdescription(),
                'status' => $Shop->getstatus(),
                'type' => $Shop->gettype(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
