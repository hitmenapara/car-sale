
<?php 

include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>
    <script src="assets/js/jquery-2.1.0.min.js"></script>
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
if(isset($_GET['cid'])){
    $select ="SELECT * FROM `fev` WHERE `car_id` = '".$_GET['cid']."' AND `cid`= '".$_SESSION['id']."' ";
    $res = mysqli_query($con, $select);
    if(mysqli_num_rows($res)==1)
    {
        $delete ="DELETE FROM `fev` WHERE `car_id` = '".$_GET['cid']."'";
        mysqli_query($con, $delete);
    }
    header("location: fev.php");
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

<div class="container">
    <h1>Fev List</h1>
    <div class="row mb-5 mt-5">
        <div class="col-sm-1">
            <h4>No</h4>
        </div>
        <div class="col-sm-2">
            <h4>image</h4>
        </div>
        <div class="col-sm-5">
            <h4>price & name</h4>
        </div>
        <div class="col-sm">
            <h4>remove fevlist</h4>
        </div>
    </div>
    <?php

    $select = "SELECT `car_id` FROM `fev` WHERE `cid` = '".$_SESSION['id']."' ";
    $result = mysqli_query($con, $select);    
    $i = 1;
    if(mysqli_num_rows($result)!=0)
    {

    while($row = mysqli_fetch_row($result)) 
    {
        $car = "SELECT * FROM `tblphoto` WHERE `id` = '".$row[0]."'";
        $car_res = mysqli_query($con, $car);
        $car_row = mysqli_fetch_row($car_res);
    ?>
    <div class="row">
        <div class="col-sm-1">
            <?= $i ?>
        </div>
        <div class="col-sm-2">
            <a href="car-details.php?id=<?= $car_row[0]?>">
                <img width="150" src="./admin/<?= $car_row[1] ?>">
            </a>
        </div>
        <div class="col-sm-5">
            <h4>Car Name :- <?= $car_row[5] ?></h4>
            <h4>Price :- <?= $car_row[3] ?></h4>
        </div>
        <div class="col-sm">
            <a href="fev.php?cid=<?=$car_row[0]?>">remove</a>
        </div>
    </div>


<?php $i++; } 
    }
    else{
        echo '<div class="row"><div class="col" style="text-align: center;font-size: 24px; ">empty</div></div>';
    }

?>
</div>    
    
    
     </body>
</html>  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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

