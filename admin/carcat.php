<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include("dbcon.php");

    if(isset($_POST["edit"]))
	{
	

	 $sql = "UPDATE `category` SET `category` = 'lamborghini' WHERE `category`.`id` =".$_REQUEST["cid"];
		$resa=mysqli_query($con,$sql);
		 if(isset($resa))
   {
      echo "<script language='javascript'>
	  alert('Record updated');</script>";
	  header("Location:carcategory.php");
   }
   else
   {
      echo "<script language='javascript'>
	  alert('Record not updated');</script>";
   }
	}
   

?>
</body>
</html>
