<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "oeuvres";
$connection = new mysqli($servername,$username,$password,$database);


$id = "";
$rating = "";
$descO = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST["id"];
    $rating = $_POST["rating"];
    $descO = $_POST["descO"];
    do{
        if(empty($id) || empty($rating) || empty($descO)) {
            $errorMessage = "All the fields are required";
            break;
        }
        //Ajout oeuvre ldatabase
        $sql ="INSERT INTO oeuvres(rating,descO)" . "VALUES ( '$rating' , '$descO')";
        $result = $connection->query($sql);
        if(!$result){
            $errorMessage = "query invalide !" . $connection->error;
            break;
        }
        $id = "";
        $rating = "";
        $descO = "";
        $successMessage = "Oeuvre ajoutée";
        header("location: listoeuvres.php");
        exit;


    } while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oeuvres</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script> src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"</script>
</head>
<body>
    <div class="container my-5">
        <h2>Nouveau oeuvre</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role ='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Fermer'>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">ID</label>
                <div>
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Rating</label>
                <div>
                    <input type="text" class="form-control" name="rating" value="<?php echo $rating; ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-lable">Description</label>
                <div>
                    <input type="text" class="form-control" name="descO" value="<?php echo $descO; ?>">

                </div>
            </div>
            <?php
            if (!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert aria-lable='Fermer'>
                        </div>
                    </div>
                </div>
                    ";
            }
            ?>
           <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Confrimer</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/projet/Model/listoeuvres.php" role="button">Annuler</a>
                </div>
           </div>
        </form>
    </div>
    
</body>
</html>