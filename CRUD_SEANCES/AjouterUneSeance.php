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
        $id_seance = $_POST['id_seance'];
        $id_artiste_associe = $_POST['id_artiste_associe'];
        $date = $_POST['date'];
        $lieu = $_POST['lieu'];

        if (empty($id_seance) || empty($id_artiste_associe) || empty($date) || empty($lieu)) {
            $error_msg = 'Tous les champs doivent être remplis !';
        } else {
            // Validation des types de données et longueur des champs
            if (!is_numeric($id_seance) || !is_numeric($id_artiste_associe)) {
                $error_msg = "Les identifiants doivent être des nombres.";
            } else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                $error_msg = "Le format de la date est incorrect.";
            } else if (strlen($lieu) > 255) {
                $error_msg = "Le champ Lieu ne doit pas dépasser 255 caractères.";
            } else {
                // Nettoyage et insertion dans la base de données
                $stmt = $pdo->prepare("INSERT INTO seances (id_seance, id_artiste_associe, date, lieu) VALUES (?, ?, ?, ?)");
                $stmt->execute([$id_seance, $id_artiste_associe, $date, $lieu]);

                $success_msg = "Séance ajoutée avec succès !";
                header("Location: /CRUD_SEANCES/ListeDesSeances.php");
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
    <title>Nouvelle Séance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nouvelle séance</h2>
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
        <form id="seanceForm" method="post" onsubmit="return validateForm()">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de la séance</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_seance" id="id_seance">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de l'artiste associé</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_artiste_associe" id="id_artiste_associe">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" id="date">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lieu</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lieu" id="lieu">
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
            let idSeance = document.getElementById("id_seance").value;
            let idArtisteAssocie = document.getElementById("id_artiste_associe").value;
            let date = document.getElementById("date").value;
            let lieu = document.getElementById("lieu").value;

            if (idSeance === "" || idArtisteAssocie === "" || date === "" || lieu === "") {
                alert("Tous les champs doivent être remplis !");
                return false;
            }

            if (isNaN(idSeance) || isNaN(idArtisteAssocie)) {
                alert("Les identifiants doivent être des nombres.");
                return false;
            }

            if (!/^(\d{4})-(\d{2})-(\d{2})$/.test(date)) {
                alert("Le format de la date est incorrect.");
                return false;
            }

            if (lieu.length > 255) {
                alert("Le champ Lieu ne doit pas dépasser 255 caractères.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
