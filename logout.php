<?php
session_start();
if(isset($_SESSION['username']))
{
    session_destroy();
    echo"<script>location.href='addUser.php'</script>";
}
else{
    session_destroy();
    echo"<script>location.href='addUser.php'</script>";
}
?>