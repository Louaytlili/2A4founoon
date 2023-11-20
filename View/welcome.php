
<?php
session_start();
include 'C:\xampp\htdocs\FOUNOON\Model\User.php';
if(isset($_SESSION['username']))
{
    echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    echo "<br><a href='logout.php'><input type=button value=logout name=logout></a>";
}
else{
    $username = "Your username";
    $password = "Your password";

    if(isset($_POST['username']) && isset($_POST['password'])) {
        if($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['username'] = $username;
            echo "<script>location.href='welcome.php'</script>";
        }
        else {
            echo "<script>alert ('Username or Password incorrect!')</script>";
            echo "<script>location.href='addUser.php' </script>";
        }
    }
    else {
        echo "Session variables not set!";
    }
}
?>