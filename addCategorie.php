<!-- add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categorie</title>
</head>
<body>
    <form action="addCategorie.php" method="post">
        <!-- Add form fields for Categorie data -->
        <tr>
            <select>
                <option value="type">--Please choose an option--</option>
                <option value="Visual Art" id="visual">visual</option>
                <option value="Abstract Art" id="abstract">abstract</option>
                <option value="Futurism Art" id="futurism">futurism</option>
           </select>
            </tr>
        <button type="submit">Add Categorie</button>
    </form>
</body>
</html>
