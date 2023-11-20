<?php

require 'C:\xampp\htdocs\FOUNOON\config1.php';

class UserC
{

    public function listUsers()
    {
        $sql = "SELECT * FROM user";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($ide)
    {
        $sql = "DELETE FROM user WHERE idUser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
  
    
    function addUser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL,:username, :email, :password, :registered_at, :isAdmin)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'registered_at' => $user->getRegisteredAt(),
                'isAdmin' => $user->getIsAdmin(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * from user where idUser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateUser($user, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    username = :username, 
                    email = :email, 
                    password = :password,
                    registered_at = :registered_at,
                    isAdmin = :isAdmin
                WHERE idUser= :id'
            );
            
            $query->execute([
                'id' => $id,            
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'registered_at' => $user->getRegisteredAt(),
                'isAdmin' => $user->getIsAdmin()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function authenticateUser($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':username', $username);
            $query->bindParam(':password', $password);
            $query->execute();
            
            $user = $query->fetch();

            // Return user details on successful authentication
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}