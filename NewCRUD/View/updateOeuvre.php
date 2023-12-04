<?php
session_start();
include('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >


    <title>Edit & Update data into database using PHP PDO</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update data into database using PDO in PHP
                            <a href="listOeuvre.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['product_id']))
                        {
                            $product_id = $_GET['product_id'];

                            $query = "SELECT * FROM product WHERE product_id=:product_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':product_id' => $product_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
                        <form action="../code.php" method="POST">

                            <input type="hidden" name="product_id" value="<?=$result->product_id?>" />

                            <div class="mb-3">
                                <label>Art name :</label>
                                <input type="text" name="product_name" value="<?= $result->product_name; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Art description :</label>
                                <input type="text" name="product_desc" value="<?= $result->product_desc; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="price" value="<?= $result->price; ?>" class="form-control" />
                            </div>
                            </div>
                            <div class="form-group">
                                <img width='200px' height='150px' src='../<?=$result->product_image?>'>
                                <div>
                                    <label for="file">Choose Image:</label>
                                    <input type="text" id="existingImage" class="form-control" value="<?=$result->product_image?>" hidden>
                                    <input type="file" id="newImage" value="">
                                </div>
                             </div>     
                            <div class="mb-3">
                                <button type="submit" name="update_product_btn" class="btn btn-primary">Update art</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>