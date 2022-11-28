<?php

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>carwale</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      
  <div class="preloader-inner"> <span class="dot"></span> 
    <div class="dots"> <span></span> <span></span> <span></span> </div>
  </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
     <?php include "header.php"; ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              
    <div class="carousel-inner"> 
      <div class="carousel-item active"> <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="First slide"> 
      </div>
      <div class="carousel-item"> <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Second slide"> 
      </div>
      <div class="carousel-item"> <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Third slide"> 
      </div>
    </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            <br>
            <br>

            <div class="row" id="tabs">
              
    <div class="col-lg-4"> 
      <ul>
        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
       
      </ul>
    </div>
              
    <div class="col-lg-8"> <section class='tabs-content' style="width: 100%;"> 
      <article id='tabs-1'> 
      <h4>Vehicle Specs</h4>
      <?php
	 include("dbcon.php");
$disp="SELECT  `photo`, `model`, `price`, `ptext`, `category` FROM `tblphoto` WHERE `id`=".$_REQUEST["id"];
  $res=mysqli_query($con,$disp);
	echo"<table align=center>";
	
  while($row=@mysqli_fetch_row($res))
  {
  	 echo "<TR>";
	  foreach($row as $k=>$v)
	  {
	      if($k==0)
		  {
		  echo "<img src='./admin",$v,"' height=300 width=300></br>";
		  }
		  else
		  {
		  echo "</br>",$v,"</br>";
		  }
		  

	  }
    
	}
	  ?>
	  </article> <article id='tabs-2'> 
      <h4>Vehicle Description</h4>
      <p>- Colour coded bumpers <br>
        - Tinted glass <br>
        - Immobiliser <br>
        - Central locking - remote <br>
        - Passenger airbag <br>
        - Electric windows <br>
        - Rear head rests <br>
        - Radio <br>
        - CD player <br>
        - Ideal first car <br>
        - Warranty <br>
        - High level brake light <br>
        </p>
      </article> </section> </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                
    <div class="col-lg-12"> 
      <p> Copyright © 2022 craeted by: HIT,UZER& URVISH </p>
    </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>