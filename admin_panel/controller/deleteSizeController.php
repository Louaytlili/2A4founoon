<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['id_seance'];
    $query="DELETE FROM seances WHERE id_seance='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>