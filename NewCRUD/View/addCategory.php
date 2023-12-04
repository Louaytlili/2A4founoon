<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Insert data into database using PDO in PHP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">

                <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>

                <div class="card">
                    <div class="card-header">
                        <h3>Add Category :</h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="addCategory.php" method="POST" onsubmit="return validateform()">
                            <div class="mb-3">
                                <label>Category name :</label>
                                <input type="text" name="category_name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_category_btn" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            let Categoryname = document.getElementById("category_name").value;


            if (Categoryname === "") {
                alert("Fill all placeholders !");
                return false;
            }

            if (Categoryname.length > 20) {
                alert("The description must not exceed 20 characters.");
                return false;
            }

            return true;
        }
</script>
</body>
</html>

<?php
// session_start();
include('../config.php');

if(isset($_POST['save_category_btn']))
{
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO category (category_name) VALUES (:category_name)";
    $query_run = $conn->prepare($query);

    $data = [
        ':category_name' => $category_name
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: listCategory.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: listCategory.php');
        exit(0);
    }
}

?>