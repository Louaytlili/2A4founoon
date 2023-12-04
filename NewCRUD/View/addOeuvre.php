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
                        <h3>Insert data into database using PDO in PHP</h3>
                            <a href="listOeuvre.php" class="btn btn-danger float-end"> Go Back</a>
                    </div>
                    <div class="card-body">
                        
                        <form action="../Module/Oeuvreaddcode.php" method="POST">
                            <div class="mb-3">
                                <label>Art name :</label>
                                <input type="text" name="product_name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Art description :</label>
                                <input type="text" name="product_desc" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Price :</label>
                                <input type="number" name="price" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="file">Choose art image:</label>
                                <input type="file" class="form-control-file" id="product_image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_product_btn" class="btn btn-primary">Confirm</button>
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
<script>
        function validateForm() {
            let Productname = document.getElementById("product_name").value;
            let Productdesc = document.getElementById("product_desc").value;


            if (Productname === "" || Price === "" || Productdesc === "" || CategoryID === "") {
                alert("Fill all placeholders !");
                return false;
            }

            if (Produtdesc.length > 255) {
                alert("The description must not exceed 255 characters long.");
                return false;
            }

            return true;
        }
</script>

