<?php

    include_once " C:/xampp/htdocs/admin_panel/config/dbconnect.php";
    
    $id=$_POST['id_seance'];
    $query="DELETE FROM seances where id_seance='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Seance supprimée";
    }
    else{
        echo"Not able to delete";
    }
    
?>