
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
        .hide{
            display: none;
        }
    </style>


</head>

<body>

    <div id="js-preloader" class="js-preloader">

        <div class="preloader-inner"> <span class="dot"></span> 
            <div class="dots"> <span></span> <span></span> <span></span> </div>
        </div>
    </div>




    <?php include "header.php"; ?>



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
        if(!isset($_SESSION["id"]) || $_SESSION["id"] ==  "" || empty($_SESSION["id"]))
        {
            header("location: index.php");
            exit;
        }
        ?>
        <?php 
        if(isset($_SESSION['id'])){

            $customer = "SELECT * FROM `registration` WHERE `id`='".$_SESSION["id"]."' ";
            $customer_res = mysqli_query($con, $customer);
            $customer_row = mysqli_fetch_row($customer_res);
            if(mysqli_num_rows($customer_res)==0) {
                header("location: index.php");
                exit;
            } 
        }else {
            header("location: index.php");
            exit;
        }

        ?>
    <div class="container">
        <h1 align="center">Profile</h1>
        <hr>
        <div class="row">
            <div class="col-sm-2">
                <div class="row mb-5"><button class="btn btn-success orders">Orders</button></div>
                <div class="row"><button class="btn btn-success profiles">profile</button></div>
            </div>
            <div class="col-sm-8 show profile">
                <table class="table table-hover"> 
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?= $customer_row[1] ?></td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td><?= $customer_row[3] ?></td>
                        </tr>
                        <tr>
                            <th>reg-date</th>
                            <td><?= $customer_row[5] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php 

            $orders = "SELECT * FROM `order` WHERE `cid`='".$_SESSION["id"]."' ";
            $orders_res = mysqli_query($con, $orders);
          
            ?>
            <div class="col-sm-8 hide order">
                <table class="table table-hover"> 
                    <tbody>
                        <tr>
                            <th>id</th>
                            <th>pid</th>
                            <th>price</th>
                            <th>fullname</th>
                            <th>contact</th>
                            <th>city</th>
                            <th>state</th>
                            <th>pin</th>
                            <th>method</th>
                        </tr>
                        <?php while($row = mysqli_fetch_object($orders_res)){ ?>
                            <tr>
                                <th><?php echo  $row->id ;?></th>
                                <th><a href="car-details.php?id="<?= $row->pid ?>>
                                    <?php
                                    $img =  "SELECT * FROM `tblphoto` WHERE `id`= $row->pid ";
                                    $img_res = mysqli_query($con, $img);
                                    $img_row = mysqli_fetch_row($img_res);
                                     ?>
                                     <img src="./admin/<?= $img_row[1]?>" width="50">
                                    </a>       
                                </th>
                                <th><?php echo  $row->price ;?></th>
                                <th><?php echo  $row->full_name ;?></th>
                                <th><?php echo  $row->contact ;?></th>
                                <th><?php echo  $row->city ;?></th>
                                <th><?php echo  $row->state ;?></th>
                                <th><?php echo  $row->pin ;?></th>
                                <th><?php echo  $row->method ;?></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>    
</body>

<script type="text/javascript">
    $(".profiles").click(function(){
        $(".profile").show();
        $(".profile").addClass("show");
        $(".profile").removeClass("hide");
        $(".order").hide();
    });
 $(".orders").click(function(){
        $(".order").show();
        $(".order").addClass("show");
        $(".order").removeClass("hide");
        $(".profile").hide();
    });

</script>



<script src="assets/js/jquery-2.1.0.min.js"></script>


<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/mixitup.js"></script> 
<script src="assets/js/accordions.js"></script>


<script src="assets/js/custom.js"></script>
</html>  
