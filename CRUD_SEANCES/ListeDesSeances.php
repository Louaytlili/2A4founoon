<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les séances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"> 
        <h2>La liste des séances</h2>
        <a class="btn btn-primary" href="/CRUD_SEANCES/AjouterUneSeance.php" role="button">Ajouter une séance</a>
        <br> 
        <table class="table"> 
            <thead>
                <tr>
                    <th>ID_Séance</th>
                    <th>ID_Artiste_Associé</th>
                    <th>Date</th>
                    <th>Lieu</th>
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

                    $stmt = $pdo->query("SELECT * FROM seances");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                                <td>{$row['id_seance']}</td>
                                <td>{$row['id_artiste_associe']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['lieu']}</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='/CRUD_SEANCES/ModifierUneSeance.php?id_seance={$row['id_seance']}' role='button'>Modifier</a>
                                    <a class='btn btn-danger btn-sm' href='/CRUD_SEANCES/SupprimerUneSeance.php?id_seance={$row['id_seance']}' role='button'>Supprimer</a>
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


