<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../config.php');

if(isset($_POST['save_product_btn']))
{
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_POST['product_image'];
    $price = $_POST['price'];
    $category_id= $_POST['category_id'];

    $query = "INSERT INTO product (product_name, product_desc, product_image, price, category_id) VALUES (:product_name, :product_desc, :product_image, :price, :category_id)";
    $query_run = $conn->prepare($query);

    $data = [
        ':product_name' => $product_name,
        ':product_desc' => $product_desc,
        ':product_image' => $product_image,
        ':price' => $price,
        ':category_id' => $category_id
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: ../View/listOeuvre.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: ../View/listOeuvre.php');
        exit(0);
    }
}

?>