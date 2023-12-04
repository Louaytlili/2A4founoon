<?php 
include('../config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ART LIST</title>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of arts : </h3>
                            <a href="addOeuvre.php" class="btn btn-primary float-end">Add art</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Art ID</th>
                                    <th>Art name</th>
                                    <th>Art Description</th>
                                    <th>Art</th>
                                    <th>Price</th>
                                    <th>Category ID</th>
                                    <th>Upload date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM product";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row->product_id; ?></td>
                                                <td><?= $row->product_name; ?></td>
                                                <td><?= $row->product_desc; ?></td>
                                                <td><img height='100px' src='../<?=$row->product_image?>'></td>
                                                <td><?= $row->price; ?></td>
                                                <td><?= $row->category_id; ?></td>
                                                <td><?= $row->uploaded_date; ?></td>
                                                <td>
                                                    <a href="updateOeuvre.php?id=<?= $row->product_id; ?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="../code.php" method="POST">
                                                        <button type="submit" name="delete_category" value="<?=$row->product_id;?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>