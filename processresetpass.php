<?php
if (!isset($_POST["token"])) {
    die("Token not found");
}

$token = $_POST["token"];
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
    die("<script>alert('Token not found');</script>");

}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("<script>alert('Token has expired');</script>");

}

if (strlen($_POST["password"]) < 8) {
    die("<script>alert('Password must be at least 8 characters');</script>");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("<script>alert('Password must contain at least one letter');</script>");

}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("<script>alert('Password must contain at least one number');</script>");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("<script>alert('Passwords must match');</script>");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE user
        SET password_hash = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE idUser = ?";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(1, $password_hash, PDO::PARAM_STR);
$stmt->bindParam(2, $user["idUser"], PDO::PARAM_INT);

$stmt->execute();

echo "<script>alert('Password updated. You can now signin.');</script>";
echo "<script>window.location.href = 'adduser.php';</script>";

?>