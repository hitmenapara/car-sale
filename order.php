
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



    <!-- ***** Call to Action End ***** -->
<?php 
	if(isset($_GET["id"])){
		$select = "SELECT * FROM `tblphoto` WHERE `id` = '".$_GET['id']."'" ;
		$result = mysqli_query($con, $select);
		$car_row =  mysqli_fetch_row($result);

		if(mysqli_num_rows($result)==0) {
			header("location: car2.php");
			exit;
		} 
	}
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-sm">
			<h3>Details</h3>
			<div class="row">
				<img src="./admin/<?= $car_row[1] ?> " style="max-width: 500px;">
			</div>
			<div class="col-sm">
				<div class="row">
					NAME : <?= $car_row[5] ?><br>
					MODEL : <?= $car_row[2] ?><br>
					PRICE : <?= $car_row[3] ?><br>
				</div>
			</div>
		</div>
		<div class="col-sm">
				<h3>Address</h3>
			<form method="POST">
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="full_name">Full Name</label>
					</div>
					<div class="col-sm">
						<input type="hidden" name="pid" value="<?=$car_row[0]?>" >
						<input type="hidden" name="price"  value="<?=$car_row[3]?>">
						<input class="form-control" type="text" name="full_name" id="full_name" required /><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="contact">Contact</label>
					</div>
					<div class="col-sm">
						<input class="form-control" type="number" name="contact" id="contact"/ required >
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="address">Address</label>
					</div>
					<div class="col-sm">
						<textarea class="form-control" name="address" cols="25" rows="3" required ></textarea><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="city">City</label>
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="city" id="city" required /><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="state">State</label>
					</div>
					<div class="col-sm">
						<input class="form-control" type="text" name="state" id="state" required /><br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="form-label" for="pin">Pin</label>
					</div>
					<div class="col-sm">
						<input class="form-control" type="number" name="pin" id="pin" required  /><br>
					</div>
				</div>
				<div class="row">
					<label for="cod">Payment Method</label><br>
					<div class="col-sm-3">
						<input class="form-control" type="radio" name='method'  value="cod" id="cod" required >
						<label class="form-label" for="cod">COD</label>
					</div>
					<div class="col-sm">
						<input class="form-control" type="radio" name='method' value="pod" id="pod" required>
						<label class="form-label" for="pod">POD</label> <br>
					</div>
				</div>
				<input class="btn btn-success" type="submit" name="order_now" value="Order Now">
			</form>
		</div>
	</div>
</div>           
<?php
	if(isset($_POST["order_now"]))
	{
		$insert = "INSERT INTO `order`(`id`,`cid`,`pid`,`price`,`full_name`,`contact`,`address`,`city`,`state`,`pin`,`method`) 
		VALUES(NULL,'".$_SESSION["id"]."','".$_POST["pid"]."','".$_POST["price"]."','".$_POST["full_name"]."','".$_POST["contact"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["pin"]."','".$_POST["method"]."')";
		mysqli_query($con, $insert);
		$last_id = mysqli_insert_id($con);
		echo "<script type='text/javascript'> window.location='thankyou.php?id=".$last_id."'; </script>";
	}
?>
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