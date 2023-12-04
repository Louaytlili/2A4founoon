<?php
include('../config.php');

if(isset($_POST['delete_category']))
{
    session_start();

    $category_id = $_POST['delete_category'];

    try {

        $query = "DELETE FROM category WHERE category_id=:category_id";
        $statement = $conn->prepare($query);
        $data = [
            ':category_id' => $category_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: listCategory.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: listCategory.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>