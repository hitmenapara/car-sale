<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <script src="assets/js/jquery-2.1.0.min.js"></script>
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
                        <p>buy car and get the top service.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

	</body>
</html>

    <!-- ***** Call to Action End ***** -->
	<br>
           
	<?php

	
$disp="select * from tblphoto";
  $res=mysqli_query($con,$disp);
  $c=0;
	echo"<table align=center>";
	
  while($row=@mysqli_fetch_row($res))
  {
	  if($c%3==0)
			{ ?>
<tr align='center'>
	<td>
		<img src='./admin/<?= $row[1]?>' height='300'  width='300' /> <br>
		<i><b><?= $row[2] ?></b></i> <br>
		<i> <b> <font color='#ed563b' size='4px'> <lable>Price:&nbsp;&nbsp; <?= $row[3] ?> </lable> </font> </b> </i>
		<br><br>
		<form action='car-details.php?id=<?=$row[0]?>' method='POST'>
			<?php 
				if(isset($_SESSION["id"])){
					$select = "SELECT * FROM `fev` ";
					$result = mysqli_query($con, $select); ?>
					<i class='fa fa-heart heart 
					<?php 
					if(mysqli_num_rows($result)>0){
						while($rows=mysqli_fetch_row($result)){
							if($row[0]==$rows[1]) 
								echo" active-heart";
							}
						} ?>
					'onclick='fev(<?= $row[0] ?>, this)' ></i><?php } ?>
			<a href="<?php if(isset($_SESSION["id"])){?>order.php?id=<?=$row[0]?> <?php } ?>" class="bookbtn">Order Now</a>
				
			<input type=submit value='view car' class='bookbtn'>
		</form></td>
			<?php
			} else { ?>
				<td>
					<img src='./admin/<?= $row[1]?>' height='300'  width='300'/>
					<br> <i><b><?= $row[2] ?></b></i> 
					<br> <i><b> <font color='#ed563b' size='4px'> <lable>Price:&nbsp;&nbsp; <?=$row[3]?> </lable> </font> </b> </i>
					<br><br> 
					<form action='car-details.php?id=<?= $row[0]?>' method='POST'>
						<?php
							if(isset($_SESSION["id"])){
								$select = "SELECT * FROM `fev` ";
								$result = mysqli_query($con, $select); ?>
								<i class='fa fa-heart heart 
									<?php
									if(mysqli_num_rows($result)>0){
										while($rows=mysqli_fetch_row($result)){
										if($row[0]==$rows[1]) 
											echo "active-heart";
									}
						} ?>
					'onclick='fev(<?= $row[0] ?>, this)' ></i><?php } ?>
			<a href="<?php if(isset($_SESSION["id"])){?>order.php?id=<?=$row[0]?> <?php } ?>" class="bookbtn">Order Now</a>
				
			<input type=submit value='view car' class='bookbtn'>
		</form></td>
		<?php
			}
			$c++;	
	}
	echo"</table>";

?>
	
<script type="text/javascript">
	function fev(id, val)
	{
		ssid = <?= $_SESSION['id'] ?>;
		id = id ;
		$.post("heart.php", { id: id, ssid:ssid  }, function(data) { 
			$("#count").html(data);
		} );
		if($(val).hasClass("active-heart"))
		{
			$(val).removeClass("active-heart")	
		}else{
			$(val).addClass("active-heart")	
		}
	}

</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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

  