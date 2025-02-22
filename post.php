<?php 
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - Pintereso Bootstrap Template</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">

</head>

<body>  
    <main role="main">
        
    
    <section class="bg-gray200 pt-5 pb-5">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-7">
    			<article class="card">
    			<img class="card-img-top mb-2" src="uploads/art6.jpg" alt="Card image">
    			<div class="card-body">
    				<h1 class="card-title display-4">
    				Michael Angelo , The creation of Adam. </h1>
    				<ul>
    					<li>The Creation of Adam is a fresco painting by Italian artist Michelangelo, which forms part of the Sistine Chapel's ceiling, painted c.1508_1512.</li>
    				</ul>
    				<small class="d-block"><a class="btn btn-sm btn-gray200" href="#"><i class="fa fa-external-link"></i> Visit Website</a></small>
    				<!-- Begin Comments -replace demowebsite with your own id
                    ================================================== -->
    				<div id="comments" class="mt-4">
    					<div id="disqus_thread">
    					</div>
    					<script type="text/javascript">
                            var disqus_shortname = 'demowebsite'; 
                            var disqus_developer = 0;
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
    					<noscript>
    					Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
    					</noscript>
    				</div>
    				<!--End Comments
                    ================================================== -->
    			</div>
    			</article>
    		</div>
    	</div>
    </div>
    <div class="container-fluid mt-5">
    	<div class="row">
    		<h5 class="font-weight-bold">More like this</h5>
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
														<a href="post.php">
														<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
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
    </section>
        
    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <footer class="footer pt-5 pb-5 text-center">
        
    <div class="container">
        
          <div class="socials-media">
    
            <ul class="list-unstyled">
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-facebook"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-twitter"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-instagram"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-google-plus"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-behance"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-dribbble"></i></a></li>
            </ul>
    
          </div>
    
          <p>©  <span class="credits font-weight-bold">        
            <a target="_blank" class="text-dark" href="https://www.wowthemes.net/pintereso-free-html-bootstrap-template/"><u>Pintereso Bootstrap HTML Template</u> by Cyber</a>
          </span>
          </p>
    
    
        </div>
        
    </footer>    
</body>
    
</html>