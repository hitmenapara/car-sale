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
            <li><a href="managefeedback.php">Manage Feedback</a></li>
			<li class="active"><a href="#">Manage Category</a></li>
			<li><a href="order.php">Order</a>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<label ><h1 align="center">Manage Category</h1></label><div align="center"><button><h3><a href="insert_category.php"> insert category</a></h3></button></div>
	<div align="center">
	 <?php
	session_start();
if(isset($_SESSION["username"]))
{
include("dbcon.php");
$sql = "SELECT * FROM `category`";
$res1=mysqli_query($con,$sql);
echo "<table border=2 width='50%'>";
echo "<TR>";
$finfo=mysqli_fetch_fields($res1);
foreach($finfo as $val)
{
  echo"<Th bgcolor='white'>",$val->name,"</Th>";
}
echo "<th bgcolor='white'>delete</th><th bgcolor='white'>edit</th></TR>";

while($row=mysqli_fetch_row($res1))
{
      echo "<TR bgcolor='#CCCCFF'>";
	  foreach($row as $k=>$v)
	  {
	      echo "<TD>",$v,"</td>";
	  }
	  echo "<td><a href='deletecat.php?id=$row[0]' onclick='javascript:return confirm(\"do you want to delete this record?\")'>DELETE</a></td><TD><a href='editcat.php?cid=$row[0]'>EDIT</a></TD></TR>";
}
echo "</table>";
}else
{
header("location:index.php");
}
?>
</div>
</body>
</html>

