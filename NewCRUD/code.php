
<?php
session_start();
include('config.php');

if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_POST['product_image'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $uploaded_date = $_POST['uploaded_date'];


    try {

        $query = "UPDATE product SET product_name=:product_name, product_desc=:product_desc, product_image=:product_image, price=:price, category_id=:category_id, uploaded_date=:uploaded_date WHERE product_id=:product_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':product_name' => $product_name,
            ':product_desc' => $product_desc,
            ':product_image' => $product_image,
            ':price' => $price,
            ':category_id' => $category_id,
            ':uploaded_date' => $uploaded_date,
            ':product_id' => $product_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: View/listOeuvre.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: View/listOeuvre.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>


<?php
include('config.php');

if(isset($_POST['delete_product']))
{
    session_start();

    $product_id = $_POST['delete_product'];

    try {

        $query = "DELETE FROM product WHERE product_id=:product_id";
        $statement = $conn->prepare($query);
        $data = [
            ':product_id' => $product_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: View/listOeuvre.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: View/listOeuvre.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>