<?php
if (isset($_GET["id_seance"])) {
    $id_seance = $_GET["id_seance"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "education_artistique";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM seances WHERE id_seance = ?");
        $stmt->execute([$id_seance]);

        echo "Séance supprimée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de la séance : " . $e->getMessage();
    }
}

header("Location: \admin_panel\adminView\viewProductSizes.php");
exit();
?>
