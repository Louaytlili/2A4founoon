<?php
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';

$c = new UserC();
$tab = $c->listUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style2.css" />
</head>
<body>

    <h1><center><strong>-List of Users-</strong></center></h1>
    <table border="1" align="center" width="70%">
        <tr>
            <th>IdUser</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Registered_at</th>
            <th>IsAdmin</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $user) { ?>
            <tr>
                <td><?= $user['idUser']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
                <td><?= $user['registered_at']; ?></td>
                <td><?= $user['isAdmin']; ?></td>

                <td align="center">
                    <form method="POST" action="updateUser.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $user['idUser']; ?>" name="idUser">
                    </form>
                </td>
                <td>
                    <a href="deleteUser.php?id=<?= $user['idUser']; ?>">Delete</a>
                </td>
            </tr>
        <?php 
        }
        ?>
    </table>

</body>
</html>
