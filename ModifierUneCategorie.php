<?php
$id_categorie = "";
$nom_categorie = "";
$description = "";
$image = "";

$error_msg = "";
$success_msg = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "education_artistique";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_GET["id_categorie"])) {
            header("Location: /CRUD_CATEGORIES/ListeDesCategories.php");
            exit;
        }

        $id_categorie = $_GET["id_categorie"];
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id_categorie = ?");
        $stmt->execute([$id_categorie]);
        $row = $stmt->fetch();

        if (!$row) {
            header("Location: /CRUD_CATEGORIES/ListeDesCategories.php");
            exit;
        }

        $nom_categorie = $row["nom_categorie"];
        $description = $row["description"];
        $image = $row["image"];
    } else {
        $id_categorie = $_POST["id_categorie"];
        $nom_categorie = $_POST["nom_categorie"];
        $description = $_POST["description"];
        $image = $_POST["image"];

        if (empty($id_categorie) || empty($nom_categorie) || empty($description) || empty($image)) {
            $error_msg = "Tous les champs doivent être remplis";
        } else {
            $stmt = $pdo->prepare("UPDATE categories SET nom_categorie = ?, description = ?, image = ? WHERE id_categorie = ?");
            $result = $stmt->execute([$nom_categorie, $description, $image, $id_categorie]);

            if (!$result) {
                $error_msg = "Erreur de requête : " . $pdo->errorInfo()[2];
            } else {
                $success_msg = "Les champs de la séance ont été modifiés correctement";
                header("Location: /CRUD_CATEGORIES/ListeDesCategories.php");
                exit;
            }
        }
    }
} catch (PDOException $e) {
    $error_msg = "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Catégories des séances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Modifier une catégorie</h2>
        <?php
        if (!empty($error_msg)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$error_msg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id_categorie" value="<?php echo $id_categorie ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de la catégorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_categorie" value="<?php echo $id_categorie ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom de la catégorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom_categorie" value="<?php echo $nom_categorie ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image" value="<?php echo $image ?>">
                </div>
            </div>
            <?php
            if (!empty($success_msg)) {
                echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$success_msg</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/CRUD_CATEGORIES/ListeDesCategories.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
