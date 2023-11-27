<!-- forum_topic_1.php -->
<?php
$pageTitle = "FOUNOON - Forum Topic 1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <!-- Include your existing meta tags, stylesheets, and scripts here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&amp;display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">FOUNOON</a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <!-- Your existing navigation links -->
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Your existing navigation icons -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Forum Topic Content -->
    <div class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-12">
                <h1 class="h1">Forum Topic 1</h1>
                <!-- Add any specific content for the forum topic here -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <img src="\PROJECT1\assets\img\category_img_01.jpg" class="img-fluid border" alt="Forum Topic 1">
                <!-- Add any specific content for the forum topic here -->
            </div>
            <div class="col-12 col-md-6">
                <div class="mt-3">
                    <h5 class="text-center mb-3">Comments Section</h5>
                    <!-- Add a form or any structure for the comments section here -->
                    <div class="mb-3">
                        <!-- Sample comment -->
                        <div class="bg-light p-3 mb-2">
                            <p><strong>User1:</strong> </p>
                        </div>
                        <!-- Add more comments as needed -->
                    </div>
                    <!-- Comment form -->
                    <form>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Write a comment:</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Forum Topic Content -->

     <!-- Start Footer -->
     <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2023 FOUNOON. All rights reserved.</p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Include your existing scripts here -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
