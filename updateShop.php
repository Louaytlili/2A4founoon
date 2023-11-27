<?php

include 'C:\xampp2\htdocs\Shop\controller\ShopC.php';
include 'C:\xampp2\htdocs\Shop\model\Shop.php';
$error = "";

// create client
$Shop = null;
// create an instance of the controller
$ShoprC = new ShopC();


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
        !empty($_POST['prix']) &&
        !empty($_POST['artist']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["status"]) &&
        !empty($_POST["type"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $Shop = new Shop(
            null,
            $_POST['nom'],
            $_POST['prix'],
            $_POST['artist'],
            $_POST['description'],
            $_POST['status'],
            $_POST['type']
        );
        var_dump($Shop);
        
        $ShopC->updateShop($Shop, $_POST['idShop']);

        header('Location:listShop.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listShop.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idShop'])) {
        $Shop = $ShopC->showShop($_POST['idShop']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">IdShop :</label></td>
                    <td>
                        <input type="text" id="idShop" name="idShop" value="<?php echo $_POST['idShop'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $Shop['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">Prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $Shop['prix'] ?>" />
                        <span id="erreurPrix" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="artist">Artist :</label></td>
                    <td>
                        <input type="text" id="artist" name="artist" value="<?php echo $Shop['artist'] ?>" />
                        <span id="erreurartist" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">Descriptione :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $Shop['description'] ?>" />
                        <span id="erreurdescription" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="status">status :</label></td>
                    <td>
                        <input type="text" id="status" name="status" value="<?php echo $Shop['status'] ?>" />
                        <span id="erreurstatus" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">Type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $Shop['type'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>