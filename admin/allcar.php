<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>car wale</title>
<link rel="stylesheet" href="menuc.css" />
</head>

<body style="background-image: url(img/kia.jpg);  background-position: center; background-attachment: fixed;">
	<div class="menu-bar">
		<ul>
		<li style="font-style:italic" ><h1>CarWale</h1></li>
			<li><a href="menu.php">Manage User</a></li>
			<li class="active"><a href="allcar.php">All Car</a></li>
			<li><a href="uploadfile.php">Add Car</a></li>
            <li><a href="managefeedback.php">Manage Feedback</a></li>
			<li><a href="carcategory.php">Manage Category</a></li>
			<li><a href="order.php">Manage Order</a>
			<li><a href="logout.php">LogOut</a></li>
		</ul>
	</div>
    <label><h1 align="center"> ALL CAR</h1></label>
<?php
session_start();
if(isset($_SESSION["username"]))
{
include("dbcon.php");
$sql = "SELECT * FROM `tblphoto`";
$res1=mysqli_query($con,$sql);
echo "<table width='100%' bgcolor='#CCCCFF' border='1'>";
echo "<TR>";
$finfo=mysqli_fetch_fields($res1);
foreach($finfo as $val)
{
  echo"<Th >",$val->name,"</Th>";
}
echo "<th>Delete</th><th>Edit</th></TR>";

while($row=mysqli_fetch_row($res1))
{
      echo "<TR bgcolor='white'>";
	  foreach($row as $k=>$v)
	  {
	      if($k==1)
		  {
		  echo "<TD><img src='",$v,"' height=100 width=100></td>";
		  }
		  else
		  {
		  echo "<TD>",$v,"</td>";
		  }
		  
	  }
	  echo "<td><a href='deletecar.php?id=$row[0]' onclick='javascript:return confirm(\"do you want to delete this record?\")'>DELETE</a></td><TD><a href='edit.php?id=$row[0]'>EDIT</a></TD></TR>";
}
echo "</table>";
}else
{
header("location:index.php");
}
?>

</body>
</html>

