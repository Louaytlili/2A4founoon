<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['id_seance'];
    $query="DELETE FROM seances where id_seance='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>