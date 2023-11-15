<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oeuvres</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5" >
        <h2>Liste des oeuvres :</h2>
        <a class="btn btn-primary" href="/projet/View/ajoutoeuvres.php" role="button">Ajouter oeuvre</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rating</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "oeuvres";
                $connection = new mysqli($servername,$username,$password,$database);
                if($connection->connect_error){
                    die("Connection failed : ". $connection->connect_error);
                }
                //ya9ra ldata mn ldatabase table
                $sql = "SELECT * FROM oeuvres";
                $result = $connection->query($sql);
                if(!$result){
                    die("Invalid query: ". $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[rating]</td>
                        <td>$row[descO]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/projet/View/editoeuvres.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/projet/View/deleteoeuvres.php?id=$row[id]'>Effacer</a>
                        </td>
                    </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>    
</body>
</html>