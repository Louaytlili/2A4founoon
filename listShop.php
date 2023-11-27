<?php
include 'C:\xampp2\htdocs\Shop\controller\ShopC.php';

$c = new ShopC();
$tab = $c->listShop();

?>

<center>
    <h1>List of Shoppy</h1>
    <h2>
        <a href="addShop.php">Add Shoppy</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>idShop</th>
        <th>nom</th>
        <th>prix</th>
        <th>artist</th>
        <th>description</th>
        <th>status</th>
        <th>type</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $Shop) {
    ?>

        <tr>
            <td><?= $Shop['idShop']; ?></td>
            <td><?= $Shop['nom']; ?></td>
            <td><?= $Shop['prix']; ?></td>
            <td><?= $Shop['artist']; ?></td>
            <td><?= $Shop['description']; ?></td>
            <td><?= $Shop['status']; ?></td>
            <td><?= $Shop['type']; ?></td>
            <td align="center">
                <form method="POST" action="updateShop.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $Shop['idShop']; ?> name="idShop">
                </form>
            </td>
            <td>
                <a href="deleteShop.php?id=<?php echo $Shop['idShop']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>