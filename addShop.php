<?php
// Importations bécessaires
include 'C:\xampp2\htdocs\Shop\controller\ShopC.php';
include 'C:\xampp2\htdocs\Shop\model\Shop.php';

$error = "";

// create client
$Shop = null;

// create an instance of the controller
$ShopC = new ShopC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["artist"]) &&
    isset($_POST["description"]) &&
    isset($_POST["status"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["artist"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["status"]) &&
        !empty($_POST["type"])
        
        

    ) {
        $Shop = new Shop(
            null,
            $_POST['nom'],
            $_POST['prix'],
            $_POST['artist'],
            $_POST['description'],
            $_POST['status'],
            $_POST['type']
        );

        $ShopC->addShop($Shop);
        header('Location:listShop.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shop </title>
</head>

<body>
    <a href="listShop.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix">prix :</label></td>
                <td>
                    <input type="prix" id="prix" name="prix" />
                    <span id="erreurprix" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="artist">artist :</label></td>
                <td>
                    <input type="text" id="artist" name="artist" />
                    <span id="erreurartist" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                    <input type="description" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="status">statut :</label></td>
                <td>
                    <input type="status" id="status" name="status" />
                    <span id="erreurstatus" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="type">type :</label></td>
                <td>
                    <input type="type" id="type" name="type" />
                    <span id="erreurtype" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>