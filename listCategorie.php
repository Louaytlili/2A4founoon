<!-- list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Categories</title>
</head>
<body>
    <?php
        // Instantiate the controller
        $categorieC = new CategorieC();

        // Fetch and display the list of categories
        $categories = $categorieC->listCategorie();

        foreach ($categories as $category) {
            echo '<p>' . $category['Visual'] . ' - ' . $category['Abstract'] . ' - ' . $category['Futurism'] . '</p>';
        }
    ?>
</body>
</html>
