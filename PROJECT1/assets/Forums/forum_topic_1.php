<!-- forum_topic_1.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Topic 1</title>
    <!-- Add your stylesheets and scripts here as needed -->
</head>
<body>
    <header>
        <h1>Forum Topic 1</h1>
        <p>Description: ndsjklwjdskqldjsk</p>
    </header>
    
    <!-- Add a section for comments -->
    <section class="comments container py-5">
        <!-- Add comment form here if users can leave comments -->
        <h2>Comments</h2>
        <!-- Add existing comments or create a form for users to leave comments -->

        <?php
        // Example PHP code for handling comments
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process and store the submitted comment
            $comment = htmlspecialchars($_POST["comment"]);
            // Save the comment to a database or file, or perform other actions
            // Note: This is a simple example and may not be secure for production use
            echo "<p>User Comment: $comment</p>";
        }
        ?>

        <form method="post">
            <label for="comment">Leave a comment:</label>
            <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </section>

    <!-- Add your footer or any other elements as needed -->

</body>
</html>

