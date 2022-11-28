  <?php session_start(); 
  include("dbcon.php");
  ?>
  <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
    			<div class="col-12">
    			 	<nav class="main-nav"> 
      					<!-- ***** Logo Start ***** -->
      					<a href="index.php" class="logo">Car Dealer<em> Website</em></a> 
      					<!-- ***** Logo End ***** -->
      					<!-- ***** Menu Start ***** -->
					    <ul class="nav">
					        <li><a href="index.php" class="index">Home</a></li>
					        <li><a href="car2.php" class="car">Cars</a></li>
					        <li><a href="contact.php" class="contact">Contact</a></li>
					        <li><a href="about.php" class=" about">about</a></li>
					        <?php if(isset($_SESSION["id"])){ 
					        	$sele = "SELECT `id` FROM `fev` WHERE `cid` ='".$_SESSION['id']."' ";
									     $resul = mysqli_query($con, $sele);
									     $count = mysqli_num_rows($resul);
					        	?>
					        <li><a href="fev.php" class="fev">fev (<span id="count"><?= $count ?></span>)</a></li>
					        <li><a href="logout.php">log out</a></li>
					        <li><a href="profile.php" class="profile"><?= $_SESSION['username'] ?></a></li>
					        <?php } else { ?>
					        <li><a href="login.php">log in</a></li>
					        <?php }  ?>
				      	</ul>
      					<a class='menu-trigger'> <span>Menu</span> </a> 
      					<!-- ***** Menu End ***** -->
      				</nav>
       			</div>
            </div>
        </div>
    </header>
    <script type="text/javascript">
    	var url = window.location.href;  
			if (url.indexOf("index") != -1) {
			 	$(".index").addClass("active");
			}else if (url.indexOf("car2.php") != -1) {
			 	$(".car").addClass("active");
			} else if (url.indexOf("contact") != -1) {
			 	$(".contact").addClass("active");
			}  else if (url.indexOf("about") != -1) {
			 	$(".about").addClass("active");
			} else if (url.indexOf("fev") != -1) {
			 	$(".fev").addClass("active");
			} else if (url.indexOf("profile") != -1) {
			 	$(".profile").addClass("active");
		 	} 
    </script>
    <!-- class="active" -->
    
