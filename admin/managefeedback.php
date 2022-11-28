<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>car wale</title>
<link rel="stylesheet" href="menuc.css" />
</head>

<body background="img/audicar.jpg">
	<div class="menu-bar">
		<ul>
		<li style="font-style:italic" ><h1>CarWale</h1></li>
			<li><a href="menu.php">Manage User</a></li>
			<li><a href="allcar.php">All Car</a></li>
			<li><a href="uploadfile.php">Add Car</a></li>
            <li class="active"><a href="managefeedback.php">Manage Feedback</a></li>
			<li><a href="carcategory.php">Manage Category</a></li>
			<li><a href="order.php">Order</a>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
		<label ><h1 align="center">Manage Feedback</h1></label>
  <?php
session_start();
if(isset($_SESSION["username"]))
{
include("dbcon.php");
$sql="select * From feedback";
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
	echo"<td><a href='deletefb.php?id=$row[0]' onclick='javascript:return confirm(\"do you want to delete this record?\")'>DELETE</a></td></tr>";
}
}else
{
header("location:index.php");
}	 
?>
</body>
</html>
