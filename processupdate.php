<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'C:\xampp\htdocs\FOUNOON\Model\User.php';
require 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : null;

    if ($userId !== null) {
        $userController = new UserC();
        $currentUser = $userController->getUserById($userId);
        $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : $currentUser['username'];
        $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : $currentUser['email'];
        
        // Check if 'currentUsername' is set in $_POST
        $currentUsername = isset($_POST['currentUsername']) ? $_POST['currentUsername'] : $currentUser['username'];

        if ($username === $currentUsername) {
            $user = new User($userId, $username, $email, '', '', 0);
            $userController->updateUserEmail($user, $userId);
        } elseif ($email === $currentUser['email']) {
            $user = new User($userId, $username, $email, '', '', 0);
            $userController->updateUserUsername($user, $userId);
        } else {
            $user = new User($userId, $username, $email, '', '', 0);
            $userController->updateUser($user, $userId);
        }

        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();

        if (isset($_POST['update'])) {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script>window.location.href = 'userprofile.php';</script>";
            exit(); // Add an exit to stop further execution
        }
    }
}
?>
