<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $id_seance = $_POST['id_seance'];
        $id_artiste_associe= $_POST['id_artiste_associe'];
        $date = $_POST['date'];
        $lieu = $_POST['lieu'];

         $insert = mysqli_query($conn,"INSERT INTO seances
         (id_seance,id_artiste_associe,date,lieu) VALUES ('$id_seance','$id_artiste_associe','$date','$lieu')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?variation=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?variation=success");
         }
     
    }
        
?>