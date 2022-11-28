<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include("dbcon.php");
session_start();

    if(!isset($_SESSION["id"]) || $_SESSION["id"] ==  "" || empty($_SESSION["id"]))
    {
        header("location: index.php");
        exit;
    }

echo "";
if(isset($_POST["submit"]))
{
	
$sql = "INSERT INTO `feedback`(`id`, `name`, `email`, `subject`, `message`) 
VALUES(null,'".$_REQUEST["name"]."' ,'".$_REQUEST["email"]."' ,
'".$_REQUEST["subject"]."','".$_REQUEST["message"]."');";

$res=mysqli_query($con,$sql);
if(isset($res))
{
header("Location:contact.html");
}
else 
{
echo"feed back is not send";
}
}
?>
</body>
</html>