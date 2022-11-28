<?php
session_start();

if(isset($_SESSION["username"]))
{

			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>car wale</title>
<link rel="stylesheet" href="menuc.css" />
</head>

<body style="background-image:url(img/rolls_royce.jpg); background-attachment: fixed;">
	<div class="menu-bar">
    <div align="left">
		<?php $_SESSION['message'] = "Welcome".$_SESSION["username"];
			echo "<h3>wel-come ".$_SESSION["username"].".</h3>";  ?>
            </div>
        <ul>
		<li style="font-style:italic" ><h1>CarWale</h1></li>
			<li class="active"><a href="menu.php">Manage User</a></li>
			<li><a href="allcar.php">All Car</a></li>
			<li><a href="uploadfile.php">Add Car</a></li>
            <li><a href="managefeedback.php">Manage Feedback</a></li>
			<li><a href="carcategory.php">Manage Category</a></li>
			<li><a href="order.php">Order</a>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<label ><h1 align="center">Manage User</h1></label>
	<div style="background:url(bgpic.jpg);background-repeat:repeat;">
    <?php
   
include("dbcon.php");
$sql="select * From registration";
$res=mysqli_query($con,$sql);
echo"<table border=2 width='100%'>";
echo "<TR bgcolor='white'>";
$finfo=mysqli_fetch_fields($res);
foreach($finfo as $val)
{
  echo"<Th>",$val->name,"</Th>";
}
echo "<th>Delete</th></TR>";
while($row = mysqli_fetch_row($res))
{
	echo"<tr bgcolor='#CCCCFF'>";
	foreach($row as $k=>$v)
	{
		echo"<td>",$v,"</td>";
	}
	echo"<td><a href='deleteuser.php?id=$row[0]' onclick='javascript:return confirm(\"do you want to delete this record?\")'>DELETE</a></td></tr>";
}	
} else
{
header("location:index.php");
}
?>
</div>
</body>
</html>