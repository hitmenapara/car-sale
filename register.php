<?php
	include 'dbcon.php';
	$status="ok";
	session_start();	
	if(isset($_SESSION["id"]))
	{
		header("location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>
		Registration
	</title>
	<script src="assets/js/jquery-2.1.0.min.js"></script>
	<style type="text/css">
		#pswd_info {
	background: #dfdfdf none repeat scroll 0 0;
	color: #fff;
	display: block;
	margin-left: 15px;
}
#pswd_info h4{
    background: black none repeat scroll 0 0;
    display: block;
    font-size: 16px;
    letter-spacing: 3;
    padding: 10px 0;
    text-align: center;
    text-transform: uppercase;
}
#pswd_info ul {
    list-style: outside none none;
}
#pswd_info ul li {
   padding: 5px 45px;
}
.valid {
	color: green;
	line-height: 21px;
	padding-left: 22px;
}

.invalid {
	color: red;
	line-height: 21px;
	padding-left: 22px;
}
#pswd_info {
    display:none;
}
	</style>
</head>
<body>
	<?php $sql = "CREATE TABLE IF NOT EXISTS `registration` (
            `id` int unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(30) NOT NULL,
            `username` varchar(30) NOT NULL,
            `email` varchar(50) NOT NULL,
            `password` varchar(50) NOT NULL,
            `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            )";
mysqli_query($con, $sql)
?>
		<?php if(isset($_SESSION['message'])) : ?>
			<div class="alert alert-success" id="successalert" role="alert">		
				<?php
					echo $_SESSION['message'];
	    			unset($_SESSION['message']);
	    		?>
    		</div>
		<?php endif; ?>
		<?php if(isset($_SESSION['errormessage'])) : ?>
			<div class="alert alert-danger" id="dangeralert" role="alert">		
				<?php
					echo $_SESSION['errormessage'];
	    			unset($_SESSION['errormessage']);
	    		?>
    		</div>
		<?php endif; ?>
	
	<div class="container ">
		<?php  
			$nameErr = $emailErr = $usernameErr = $passwordErr = $passwordlenErr = "";  
			$name = $email = $username = $password = "";  
			if(isset($_POST["submit"])) 
			{
			    if (empty($_POST["name"])) 
			    {  
					$name= isset($_POST["name"]) ? $_POST["name"] : "";
		        	$nameErr = "Name is required"; 
		        	$status="notok";
			    } 
			    else 
			    {  
					$name= isset($_POST["name"]) ? $_POST["name"] : "";
		        	$name = input_data($_POST["name"]);  
			        if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
			        {  
			          $nameErr = "Only alphabets and white space are allowed";
			          $status="notok";  
			        }  
			    } 
			    if (empty($_POST["username"])) 
			    {  
					$username= isset($_POST["username"]) ? $_POST["username"] : "";
		        	$usernameErr = "username is required";  
		        	$status="notok";
			    } 
			    else 
		    	{  
					$username= isset($_POST["username"]) ? $_POST["username"] : "";
		        	$username = input_data($_POST["username"]);      
			        if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
			        {  
			          	$usernameErr = "Only alphabets and white space are allowed"; 
			         	$status="notok";
			        }  
			    }
			    if (empty($_POST["email"])) 
			    {  
					$email= isset($_POST["email"]) ? $_POST["email"] : "";
		        	$emailErr = "Email is required"; 
		        	$status="notok";
			    } 
			    else 
			    {  
					$email= isset($_POST["email"]) ? $_POST["email"] : "";
		        	$email = input_data($_POST["email"]);   
			        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			        {  
			          	$emailErr = "Invalid email format";  
			        	$status="notok";
			        }  
			    }  
			    
			    if (empty($_POST["password"])) 
		      	{ 
					$password= isset($_POST["password"]) ? $_POST["password"] : "";
			        $passwordErr = "Password is required"; 
			        $status="notok";  
		    	} 
			    	else 
			    	{  
						$password= isset($_POST["password"]) ? $_POST["password"] : "";
						$password = input_data($_POST["password"]);  
						if(!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z]){2,}.{8,20}$/", $password)) 
						{  
							$passwordErr = "Password  not is strength  <br>";
							$status="notok"; 
						}
			    	}  
			    if (strlen ($password) < 8 ) 
			    { 
					$password= isset($_POST["password"]) ? $_POST["password"] : "";
					$passwordlenErr = "minimun 8  ";  
					$status="notok";
				} 
		     	if (strlen ($password) > 20 ) 
			    {  
					$password= isset($_POST["password"]) ? $_POST["password"] : "";
			       	$passwordlenErr = "maximum 20  ";  
		     		$status="notok";
		      	}    
			}
			function input_data($data) 
			{  
			  	$data = trim($data);  
			  	$data = stripslashes($data);  
			  	$data = htmlspecialchars($data);  
			  	return $data;  
			} 

		?>
		<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="register" >
				<h1 class="text-center">Registration form</h1>
				<label for="name">Name</label>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" value="<?php echo $name;?>" id="name" placeholder="Enter Your Name" name="name">
					
					 <span class="error" style="color:red"> <?php echo $nameErr;?></span>
				</div>
				<label for="username">Username</label>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="username" value="<?php echo $username;?>" placeholder="Enter Your Username" name="username">
					
					 <span class="error" style="color:red"> <?php echo $usernameErr;?>
					 <?php if(isset($_REQUEST["err"])) {echo "<br><font color='red'>Usename is already registered</font>"; } ?>
					 </span>

				</div>
					<label for="email">Email</label>
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="Enter Your Email" name="email">

					 <span class="error" style="color:red"> <?php echo $emailErr;?></span>
				</div>
				<label for="password">Password</label>
				<div class="form-floating mb-3">
					<input type="password" class="form-control password" id="myInput" value="<?php echo $password;?>" placeholder="Enter Your Password"  name="password">
					<div class="input-group-text">
					<input type="checkbox" id="pass" style="margin-right: 5px;" onClick="myFunction()"><label for="pass">Show Password</label>
							<script>
						function myFunction() {
						  var x = document.getElementById("myInput");
						  if (x.type == "password") {
							x.type = "text";
						  } else {
							x.type = "password";
						  }
						}
						</script>
					</div>
					
				</div>
					<span class="error" style="color:red"> <?php echo $passwordErr;?> <?php echo $passwordlenErr; ?> </span>
				<div id='pswd_info' class='row'>
				<h4>Password must be requirements</h4>
				<ul>
					<li id='letter' class='invalid'>At least <strong>One Letter</strong></li>
					<li id='capital' class='invalid'>At least <strong>One Capital letter</strong></li>
					<li id='number' class='invalid'>At least <strong>One number</strong></li>
					<li id='length' class='invalid'>Be at least <strong>8 characters</strong></li>
					<li id='space' class='invalid'>be<strong> use Special Symbol</strong></li>
				</ul>
			</div>	
				<div>
				    <a class="btn btn-danger" href="index.php">Clear </a>
				    <input type="submit" name="submit" value="Register" class="btn btn-primary">
				</div>
		</form>
		<a href="login.php" class="text-decoration-none">Already have an account?</a>
		<?php
		    if((isset($_POST["submit"])) && ($status==="ok"))
		    {
				$sql = "SELECT * FROM `registration` WHERE username='".$_POST["username"]."'";
		     	$result = mysqli_query($con, $sql);  
		      	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
		      	$count = mysqli_num_rows($result);  
		      	if(!($count == 1))
		      	{  
		      		$pass = md5($_POST["password"]);
					$sql = "INSERT  INTO  `registration` (`id`, `name`, `username`,`email`,`password`) 
					 		VALUES (NULL, '".$_POST["name"]."','".$_POST["username"]."','".$_POST["email"]."','".$pass."')";
						if (mysqli_query($con, $sql)) 
						{
					   		$_SESSION['message'] = "Record Registered";
					  		header("Location:login.php");
						} 
						else 
						{
						  echo "Error: " . $sql . "<br>" . mysqli_error();
						}            
			    }  
	        	else
	        	{
			   		$_SESSION['errormessage'] = "Username Name  is Alredy Registerd";
			  		header("Location:Registration.php");
	        	}
		    }
		?>
		<script type="text/javascript">
		
			$(document).ready(function()
		{		
			$("input[type='password']").keyup(function() 
			{
				var pswd = $(this).val();
				if ( pswd.length < 8 ) {
					$('#length').removeClass('valid').addClass('invalid');
				} else {
					$('#length').removeClass('invalid').addClass('valid');
				}
				if ( pswd.match(/[A-z]/) ) {
					$('#letter').removeClass('invalid').addClass('valid');
				} else {
					$('#letter').removeClass('valid').addClass('invalid');
				}
				if ( pswd.match(/[A-Z]/) ) {
					$('#capital').removeClass('invalid').addClass('valid');
				} else {
					$('#capital').removeClass('valid').addClass('invalid');
				}
				if ( pswd.match(/\d/) ) {
					$('#number').removeClass('invalid').addClass('valid');
				} else {
					$('#number').removeClass('valid').addClass('invalid');
				}
				if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
					$('#space').removeClass('invalid').addClass('valid');
				} else {
					$('#space').removeClass('valid').addClass('invalid');
				}
			}).focus(function() {
				$('#pswd_info').show();
			}).blur(function() {
				$('#pswd_info').hide();
			});	
		});	
		
	  </script> 
	</div>
</body>
</html>	