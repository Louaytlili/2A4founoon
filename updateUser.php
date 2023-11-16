<?php

include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
include 'C:\xampp\htdocs\FOUNOON\Model\User.php';
$error = "";

// create client
$user = null;
// create an instance of the controller
$userC = new UserC();


if (
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST['username']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $user = new User(
            null,
            $_POST['username'],
            $_POST['email'],
            $_POST['password']
        );
        var_dump($user);
        var_dump($_POST['idUser']);
        
        $userC->updateUser($user, $_POST['idUser']);

        header('Location:listUsers.php');
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
    <button><a href="listUsers.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idUser'])) {
        $user = $userC->showUser($_POST['idUser']);
        
    ?>

        <form method="POST" action="updateUser.php?id=<?php echo $user['idUser']; ?>" >
            <table>
            <tr>
                    <td><label for="username">idUser :</label></td>
                    <td>
                        <input type="text" id="idUser" name="idUser" value="<?php echo $_POST['idUser'] ?>" readonly />
                        <span id="erreurUsername" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="username">Username :</label></td>
                    <td>
                        <input type="text" id="username" name="username" value="<?php echo $user['username'] ?>" />     
                        <span id="erreurUsername" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" /> 
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td>
                        <input type="password" id="password" name="password" value="<?php echo $user['password'] ?>" /> 
                        <span id="erreurPassword" style="color: red"></span>
                    </td>
                </tr>


                <td>
                <button type="submit" >Update</button>
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