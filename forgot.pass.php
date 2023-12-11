<?php
require 'C:\xampp\htdocs\FOUNOON\View\config.php';
error_reporting(E_ALL);
ini_set('display_errors', 0); // Set to 0 to hide PHP errors from being displayed

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    try {
        $pdo = config::getConnexion();

        $sql = "UPDATE user
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE email = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token_hash, $expiry, $email]);

        if ($stmt->rowCount()) {
            $mail = require __DIR__ . "/mailer.php";
            $mail->SMTPDebug = 0; 
            $mail->setFrom("souleima.gharbi27@gmail.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body = <<<END
            Click <a href="http://localhost/FOUNOON/view/resetpass.php?token=$token">here</a> 
            to reset your password.
            END;

            try {
                $mail->send();
                echo "<script>alert('Message sent, please check your inbox.');</script>";
            } catch (Exception $e) {
                echo "<script>alert('Message could not be sent.');</script>";
            }
        }
    } catch (PDOException $e) {
        // Log the error or handle it appropriately
        // Do not display sensitive information directly to the user
        echo "<script>alert('An error occurred. Please try again later.');</script>";
    }
} 
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Forgot password </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen"  />
  </head>
  <body>
    <form method="post" action="#">
      <h1> Reset Password </h1>
        <label for="email" id="titre"> Enter your Email :  </label>
        <input type="email" name="email" id="email" placeholder="Enter your email.">
        <button >Send</button>
    </form>
  </body>
</html>
<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}

body {
  background: #f6f5f7;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}

h1{
    padding-bottom: 50px;
    color: #096a09;
}


#p1{
  font-size: 20px;
  line-height: 10px;
  margin: 1px;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #020202;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}


button {
  border-radius: 20px;
  border: 1px solid #096a09;
  background-color: #096a09;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
  cursor: pointer;
  margin-top: 30px;
  width: 200px
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

.overlay button {
  background-color: transparent;
  border-color: #FFFFFF;
}

form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 200px;
  height: 70%;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
    0 10px 10px rgba(0, 0, 0, 0.22);
}

input {
  background-color: #eee;
  border:2px solid black;
  padding: 12px 10px;
  margin: 10px 0;
  width: 170%;
  border-radius: 20px;
  font-weight: bold;
}

.container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}

.form-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in {
  z-index: 2;
}

.sign-up {
  z-index: 1;
}

.container.right-panel-active .sign-in {
  transform: translateX(100%);
}

.container.right-panel-active .sign-up {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}
#titre{
    color: #096a09;
    font-weight: bold;
    font-size: 20px;
}

@keyframes show {

  0%,
  49.99% {
    opacity: 0;
    z-index: 1;
  }

  50%,
  100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container {
  transform: translateX(-100%);
}

.overlay {
  background: #096a09;
  background: -webkit-linear-gradient(to right,#92e967, #096a09);
  background: linear-gradient(to right,#92e967, #096a09);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

label{
    font-weight: bold;
    color: #096a09;
    margin-left: -300px;
}

</style>