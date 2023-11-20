<?php
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
include 'C:\xampp\htdocs\FOUNOON\Model\User.php';
$error = "";

// create client
$user = null;
// create an instance of the controller
$userC = new UserC();

if (
    isset($_POST["idUser"]) &&
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST["idUser"]) &&
        !empty($_POST['username']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])
    ) {
        $registered_at = isset($_POST['registered_at']) ? $_POST['registered_at'] : date("Y-m-d");
        $isAdmin = isset($_POST['isAdmin']) ? $_POST['isAdmin'] : 0;

        $user = new User(
            $_POST['idUser'],
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            $registered_at,
            $isAdmin
        );

        $userC->updateUser($user, $_POST['idUser']);

        header('Location:listUsers.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
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
                    <td><label for="idUser">idUser :</label></td>
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
                <tr>
                    <td><label for="registered_at">Registered At :</label></td>
                    <td>
                        <input type="text" id="registered_at" name="registered_at" value="<?php echo $user['registered_at'] ?>" readonly />
                        <span id="erreurRegisteredAt" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="isAdmin">isAdmin :</label></td>
                    <td>
                        <input type="text" id="isAdmin" name="isAdmin" value="<?php echo $user['isAdmin'] ?>" readonly />
                        <span id="erreurIsAdmin" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <button type="submit">Update</button>
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