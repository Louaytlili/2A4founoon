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
    <link rel="stylesheet" type="text/css" media="screen" href="stylelist.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <div class="container">
        <h1>List of Users</h1>
        <div class="search-container">
            <input type="text" name="search" id="search" placeholder="Search by username" class="form-control">
        </div>
        <table border="1" id="myTable">
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
                    <td><?= htmlspecialchars($user['idUser']); ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>********</td> <!-- Hide or obfuscate the password -->
                    <td><?= htmlspecialchars($user['registered_at']); ?></td>
                    <td><?= htmlspecialchars($user['isAdmin']); ?></td>
    
                    <td align="center">
                        <form method="POST" action="updateUser.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= htmlspecialchars($user['idUser']); ?>" name="idUser">
                        </form>
                    </td>
                    <td>
                        <a href="deleteUser.php?id=<?= htmlspecialchars($user['idUser']); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                search_table($(this).val());
            });

            function search_table(value) {
                $('#myTable tr').each(function() {
                    var found = false;
                    $(this).find('td').each(function() {
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                            found = true;
                        }
                    });
                    if (found) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
</body>
</html>
