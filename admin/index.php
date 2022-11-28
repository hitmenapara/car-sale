<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="loginc.css">
</head>
</html>
<!-- <div class="bg"></div> -->
<div class="container">
    <h1>Admin Login</h1>
<form name="login"  action="#" method="post">
<div class="form-field">
    <input type='text' name='username' placeholder="Enter user name"><BR> 
</div>

<div class="form-field">
	<input type="password" id="myInput" placeholder="Enter Your Password" name="password">
</div>
	<div class="form-field">
	<input type="checkbox" onClick="myFunction()" id="pass"><label>Show Password</label>
	</div>
    <div>	
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
<div class="form-field">
    <input type='submit' name='login' value='SIGN IN' class="btn"> 
</div>
</form> 

<?php
 session_start();
       if(isset($_POST["login"]))
	   {
        include 'dbcon.php';
       
        $sql = "SELECT * FROM `admin` WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'";
        $result = mysqli_query($con, $sql);  

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
      
        if($count == 1)
        {  
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["id"]=$row['id'];
            
            header("Location:menu.php");
    		
		}
        else
        {  
            echo "<b  align='center' style='color:red;'>Username and Password is Invalid</b>";
        }  
}
?>
</div>