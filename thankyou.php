
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
	
<style>
.bookbtn{
	
	padding:15px;
	background-color:#ed563b;
    color: black;
	font-size: 16px;
	border: 0px solid;
    border-radius:10px;
    cursor: pointer;
	margin-top:1px;
}
.img{
	margin-top:50px;
}
.f{
	margin-top:105px;
}
.heart{
	font-size: 30px;
    margin-right: 5px;
    margin-top: 6px;
}
.heart:hover{
	color: red;
}
.active-heart{
	color: red;
}
</style>


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
<?php 
    if(!isset($_SESSION["id"]) || $_SESSION["id"] ==  "" || empty($_SESSION["id"]))
    {
        header("location: index.php");
        exit;
    }
?>    
    <!-- ***** Header Area End ***** -->
 <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Cars</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php 
        if(isset($_GET['id'])){
            $select = "SELECT * FROM `order` WHERE `id`= '".$_GET["id"]."' AND `cid`= '".$_SESSION['id']."' ";
            $result = mysqli_query($con, $select);
            $order_row = mysqli_fetch_row($result);
            if(mysqli_num_rows($result)==0) {
                header("location: main1.php");
                exit;
            } 
            $customer = "SELECT * FROM `registration` WHERE `id`='".$_SESSION["id"]."' ";
            $customer_res = mysqli_query($con, $customer);
            $customer_row = mysqli_fetch_row($customer_res);
        }
    ?>
    <div class="container m-5 p-5">
        <h1 align="center" class="mb-2"> THANK YOU FOR ORDER </h1>
        <h5 align="center" class="mb-2">YOUR ORDER ID :  <?= $_GET['id']?></h5>
        <h5 align="center" class="mb-2">YOUR Car ID : <?= $order_row[1]?></h5>
        <h5 align="center" class="mb-2">YOUR ORDER PRICE : <?= $order_row[3] ?></h5>
        <h5 align="center" class="mb-2"><a href="car2.php" class="btn btn-success">Continue Shoping</a></h5>
    </div>


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