<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>login</title>
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
	<?php session_start();
	if(isset($_SESSION["id"]))
	{
		header("location: index.php");
		exit;
	}
	if(isset($_SESSION['message'])) : ?>
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
<div class="container">
	<div class="row">
		<form action="main.php" method="POST" id="login">
			<h1 class="text-center">Login form</h1>
				<label for="username">Username</label>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="username" placeholder="Enter your Username" name="username">

			</div>
			<label for="password">Password</label>
			<div class="form-floating mb-3">
				<input type="password" class="form-control password" id="myInput" placeholder="Enter Your Password" name="password">
				<div class="input-group-text">
					<input type="checkbox" onClick="myFunction()" id="pass" style="margin-right: 5px;"><label for="pass">Show Password</label>
				</div>
				
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
			    <a href="login.php" class="btn btn-danger">Clear</a>
			    <input type="submit" name="submit" value="Login" class="btn btn-primary">
			</div>
		</form>
		<a href="register.php" class="text-decoration-none"> don't have any account?</a>
	</div>
	<div class="row"> 
		<?php
			if(isset($_REQUEST["err"]))
			{echo "<font color='red'>Username or password is wrong....'Jasmin@123'</font> "; }
			
		?>
		<script type="text/javascript">
			console.log("Jasmin@123");	
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
</div>	
</body>
</html>