<?php
include 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';

$c = new UserC();
$tab = $c->listUsers();

?>

<center>
    <h1>List of Users</h1>
    <h2>
        <a href="addUser.php">Add User</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>IdUser</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $user) {
    ?>

        <tr>
            <td><?= $user['idUser']; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['password']; ?></td>
            <td align="center">
                <form method="POST" action="updateUser.php" >
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $user['idUser']; ?> name="idUser">
                </form>
            </td>
            <td>
                <a href="deleteUser.php?id=<?php echo $user['idUser']; ?>">Delete</a>
            </td>
        
        </tr>
    <?php
    }
    ?>
</table>