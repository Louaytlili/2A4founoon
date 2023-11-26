<?php
    include_once "../config/dbconnect.php";

    $id_seance=$_POST['is_seance'];
    $id_artiste_associe= $_POST['id_artiste_associe'];
    $date= $_POST['date'];
    $lieu= $_POST['lieu'];
   
    $updateSeance = mysqli_query($conn,"UPDATE product_size_variation SET 
        product_id=$product, 
        size_id=$size,
        quantity_in_stock=$qty 
        WHERE variation_id=$v_id");


    if($updateItem)
    {
        echo "true";
    }
?>