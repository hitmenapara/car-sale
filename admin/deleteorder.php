<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
session_start();
if(isset($_SESSION["username"]))
{
include("dbcon.php");
if(isset($_REQUEST["id"]))
{
echo "'".$_REQUEST["id"]."'";
$sql="DELETE FROM `order` WHERE `oid`=".$_REQUEST["id"];
$res=mysqli_query($con,$sql);
header("Location:order.php");
}
}else
{
header("location:index.php");
}
?>

</body>
</html>