<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les catégories des séances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"> 
        <h2>La liste des catégories des séances</h2>
        <a class="btn btn-primary" href="/CRUD_CATEGORIES/AjouterUneCategorie.php" role="button">Ajouter une catégorie</a>
        <br> 
        <table class="table"> 
            <thead>
                <tr>
                    <th>ID_Catégorie</th>
                    <th>Nom de la catégorie</th>
                    <th>Déscription</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "education_artistique";

                try {
                    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $pdo->query("SELECT * FROM categories");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>{$row['id_categorie']}</td>
                                <td>{$row['nom_categorie']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['image']}</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='/CRUD_CATEGORIES/ModifierUneCategorie.php?id_categorie={$row['id_categorie']}' role='button'>Modifier</a>
                                    <a class='btn btn-danger btn-sm' href='/CRUD_CATEGORIES/SupprimerUneCategorie.php?id_categorie={$row['id_categorie']}' role='button'>Supprimer</a>
                                </td>
                            </tr>
                        ";
                    }
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


