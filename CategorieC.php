<?php

/// CategorieC.php
require 'Categorie.php'; // Include the model file
require 'config2.php';

class CategorieC
{
    public function listCategorie()
    {
        $sql = "SELECT * FROM Categorie";
        $db = config2::getConnexion();
        
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCategorie($id)
    {
        $sql = "DELETE FROM Categorie WHERE idCategorie = :id";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // Add other controller methods (addCategorie, showCategorie, updateCategorie)...
}

?>
