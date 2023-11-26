<?php
$id_seance = "";
$id_artiste_associe = "";
$date = "";
$lieu = "";

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
        if (!isset($_GET["id_seance"])) {
            header("Location: /CRUD_SEANCES/ListeDesSeances.php");
            exit;
        }

        $id_seance = $_GET["id_seance"];
        $stmt = $pdo->prepare("SELECT * FROM seances WHERE id_seance = ?");
        $stmt->execute([$id_seance]);
        $row = $stmt->fetch();

        if (!$row) {
            header("Location: /CRUD_SEANCES/ListeDesSeances.php");
            exit;
        }

        $id_artiste_associe = $row["id_artiste_associe"];
        $date = $row["date"];
        $lieu = $row["lieu"];
    } else {
        $id_seance = $_POST["id_seance"];
        $id_artiste_associe = $_POST["id_artiste_associe"];
        $date = $_POST["date"];
        $lieu = $_POST["lieu"];

        if (empty($id_seance) || empty($id_artiste_associe) || empty($date) || empty($lieu)) {
            $error_msg = "Tous les champs doivent être remplis";
        } else {
            $stmt = $pdo->prepare("UPDATE seances SET id_artiste_associe = ?, date = ?, lieu = ? WHERE id_seance = ?");
            $result = $stmt->execute([$id_artiste_associe, $date, $lieu, $id_seance]);

            if (!$result) {
                $error_msg = "Erreur de requête : " . $pdo->errorInfo()[2];
            } else {
                $success_msg = "Les champs de la séance ont été modifiés correctement";
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
    <title>Les séances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Modifier une séance</h2>
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
            <input type="hidden" name="id_seance" value="<?php echo $id_seance ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de la séance</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_seance" value="<?php echo $id_seance ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Identifiant de l'artiste associé</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_artiste_associe" value="<?php echo $id_artiste_associe ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date" value="<?php echo $date ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lieu</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lieu" value="<?php echo $lieu ?>">
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
                    <a class="btn btn-outline-primary" href="/CRUD_SEANCES/ListeDesSeances.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
