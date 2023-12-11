<?php 
include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@founoon.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">+(216) 71 256 896</a>
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

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Founoun
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="validate.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galleryuser.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="front.html">Events</a>
                        </li>
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
                    
                </div>
            </div>

        </div>
    </nav>
	<center>
	<form>
		<form>
			<fieldset>
			  <legend>Choose your preferred form of art:</legend>
			  <div>
				<input type="radio" id="idAll" name="contact" value="all" />
				<label for="contactChoice1">All</label>

				<input type="radio" id="idPaintings" name="contact" value="paintings" />
				<label for="contactChoice2">Paintings</label>
		  
				<input type="radio" id="idPhotographs" name="contact" value="photographs" />
				<label for="contactChoice3">Photographs</label>
		  
				<input type="radio" id="idSculptures" name="contact" value="sculptures" />
				<label for="contactChoice5">Sculptures</label>

				<input type="radio" id="idWritings" name="contact" value="writings" />
				<label for="contactChoice6">Writings</label>
			  </div>
			  <!--<div>
				<button type="submit">Submit</button>
			  </div>-->
			</fieldset>
		  </form>
	</center>
	
    <div class="container-fluid">
    	<div class="row">
    		<div class="card-columns"	>
            <?php
                                    $query = "SELECT * FROM product";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result){
                                        foreach($result as $row){
                                        ?>
                                        <div class="card card-pin">
    				                        <img class="card-img" src="<?= $row->product_image; ?>" alt="Card image">
    				                        <div class="overlay">
    					                        <h2 class="card-title title"><?= $row->product_name; ?></h2>
    					                        <div class="more">
                                                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true" name="test" value="<?= $row->product_id; ?>"></i> More </a>
    						                        <a href="post.php">
    						                        <!--<i class="fa fa-arrow-circle-o-right" aria-hidden="true" name="test" value="<?= $row->product_id; ?>"></i> More </a>-->
    					                         </div>
    				                         </div>
    			                        </div>	
                                        <?php
                                        }
                                    }
            ?>
    		</div>
    	</div>
	</div>
    <!-- Close Header -->
    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Founoon Gallery</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            124 Ariana Soghra 2810 ,Ariana.
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">+(216) 71 256 896</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">info@founoon.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 Founoon.Inc 
                            | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">Buddies</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
	<script>
		const AllButton = document.getElementById('idAll'); // Get element in document
		const PaintingsButton = document.getElementById('idPaintings'); 
		const PhotographsButton = document.getElementById('idPhotographs'); 
		const SculpturesButton = document.getElementById('idSculptures'); 
		const WritingsButton = document.getElementById('idWritings'); 


		function check_radio() {
			if (AllButton.checked == true) {
				alert("All arts are shown !") // Logs "checked"
			}
			if(PaintingsButton.checked == true){
				alert("Paintings are shown !")
			}
			if(PhotographsButton.checked == true){
				alert("Photographs are shown !")
			}
			if(SculpturesButton.checked == true){
				alert("Sculptures are shown !")
			}
			if(WritingsButton.checked == true){
				alert("Writings are shown !")
			}
		}

	</script>