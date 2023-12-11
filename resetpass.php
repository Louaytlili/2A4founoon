<?php
if (!isset($_GET["token"])) {
    die("Token not found");
}
$token = $_GET["token"];

$token_hash = hash("sha256", $token);

require_once __DIR__ . '/config.php';

$pdo = config::getConnexion();

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(1, $token_hash, PDO::PARAM_STR);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="processresetpass.php">
    <h1>Reset Password </h1>

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">Enter your new password :</label>
        <input type="password" id="password" name="password" placeholder="New Password">

        <label for="password_confirmation">Confirm your password :</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation" placeholder="Confirm Password">

        <button type="submit">Send</button>
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


p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
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
  font-size: 14px;
  font-weight: bold;
  padding: 12px 45px;
  margin-top: 30px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
  cursor: pointer;
  width: 200px;
}

::
button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 200px;
  height: 80%;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
    0 10px 10px rgba(0, 0, 0, 0.22);
}

input {
  background-color: #eee;
  border: 1px solid #000;
  padding: 12px;
  margin: 10px 0;
  width: 160%;
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

.overlay button {
  background-color: transparent;
  border-color: #FFFFFF;
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

.overlay {
  background: #096a09;
  background: -webkit-linear-gradient(to right, #92e967, #096a09);
  background: linear-gradient(to right, #92e967, #096a09);
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

.overlay-right {
  right: 0;
  transform: translateX(0);
}

label{
    font-weight: bold;
    color: #096a09;
    margin-left: -280px;
   
}

</style>

