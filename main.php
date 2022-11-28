<?php
        session_start();
        if(isset($_SESSION["id"]))
        {
                header("location: index.php");
                exit;
        }
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include 'dbcon.php';
        $pass = md5($_POST["password"]);
        $sql = "SELECT * FROM `registration` WHERE username='".$_POST["username"]."' AND password ='".$pass."'";
     	$result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        // echo $count;         
        // echo "<pre>";
        // var_dump($result);
        // echo "<br>".$pass; 
        // echo "<br>ba9bf11c64c8f2d3cc0bd12a57089e69";
        // echo "</pre>";
        if($count == 1)
        {  
	        $_SESSION["username"] = $_POST["username"];
                $_SESSION["id"]=$row['id'];
                $_SESSION['message'] = "Welcome".$_SESSION["username"];
	        header("Location:index.php");
        }  
        else
        {  
                $_SESSION['errormessage'] = "<b style='color:red'>Username and Password is Invalid</b>";
        	header("Location:login.php");
        }   
?>