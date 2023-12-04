<?php
if (isset($_GET["id_categorie"])) {
    $id_categorie = $_GET["id_categorie"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "education_artistique";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM categories WHERE id_categorie = ?");
        $stmt->execute([$id_categorie]);

        echo "Catégorie supprimée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de la catégorie : " . $e->getMessage();
    }
}

header("Location: \CRUD_CATEGORIES\ListeDesCategories.php");
exit();
?>
