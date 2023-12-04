<?php
$error_msg = "";
$success_msg = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "education_artistique";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_categorie = $_POST['id_categorie'];
        $nom_categorie = $_POST['nom_categorie'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        if (empty($id_categorie) || empty($nom_categorie) || empty($description) || empty($image)) {
            $error_msg = 'Tous les champs doivent être remplis !';
        } else {
            // Validation des types de données et longueur des champs
            if (!is_numeric($id_categorie)) {
                $error_msg = "Les identifiants doivent être des nombres.";
            } else if (strlen($description) > 255) {
                $error_msg = "Le champ description ne doit pas dépasser 255 caractères.";
            } else {
                // Nettoyage et insertion dans la base de données
                $stmt = $pdo->prepare("INSERT INTO categories (id_categorie, nom_categorie, description, image) VALUES (?, ?, ?, ?)");
                $stmt->execute([$id_categorie, $nom_categorie, $description, $image]);

                $success_msg = "Catégorie ajoutée avec succès !";
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
    <title>Nouvelle Catégorie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nouvelle Catégorie</h2>
        <?php
        if (!empty($error_msg)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$error_msg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        } else if (!empty($success_msg)) {
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$success_msg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>
        <form id="categorieForm" method="post" onsubmit="return validateForm()">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de la catégorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_categorie" id="id_categorie">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom de la catégorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom_categorie" id="nom_categorie">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" id="description">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image de la catégorie</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image" id="image">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function validateForm() {
            let idCategorie = document.getElementById("id_categorie").value;
            let nomCategorie = document.getElementById("nom_categorie").value;
            let descrption = document.getElementById("descrption").value;
            let image = document.getElementById("image").value;

            if (id_categorie === "" || nom_categorie === "" || descrption === "" || image === "") {
                alert("Tous les champs doivent être remplis !");
                return false;
            }

            if (isNaN(id_categorie)) {
                alert("Les identifiants doivent être des nombres.");
                return false;
            }

            if (descrption.length > 255) {
                alert("Le champ description ne doit pas dépasser 255 caractères.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
