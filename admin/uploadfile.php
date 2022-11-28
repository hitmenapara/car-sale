<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="menuc.css" />
<link rel="stylesheet" href="uploadc.css" />
</head>

<body background="img/audicar.jpg">
	<div class="menu-bar">
		<ul>
		<li style="font-style:italic" ><h1>CarWale</h1></li>
			<li><a href="menu.php">Manage User</a></li>
			<li><a href="allcar.php">All Car</a></li>
			<li class="active"><a href="uploadfile.php">Add Car</a></li>
            <li><a href="managefeedback.php">Manage Feedback</a></li>
			<li><a href="carcategory.php">Manage Category</a></li>
			<li><a href="#">Order</a>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
<div align="center" class="wrapper">
	<div class="title">
		Add Car
	</div>
	<div class="form">
	<form name="frm" method="post" action="#" enctype="multipart/form-data">
		<div class="input_field">
			<label>	upload image: </label>
			<input type='file' name='myfile' class="input" required>
		</div>
		<div class="input_field">
			<label>model:</label>
			<input type="text" name="model" class="input" required />
		</div>
		<div class="input_field">
		   	<label>	price:</label>
		    <input type="text" name="price" class="input" required>
		</div>
		<div class="input_field">
			<label>Description</label>
				<textarea rows=5 cols=20 name='ptext' class="textarea" required></textarea>
		</div>
		<div class="input_field">
			<label>category:</label>
			<?php 
			include "dbcon.php";
				$sql="SELECT * FROM `category`";
			
			$res1=mysqli_query($con,$sql);
			?>
        <div class="custom_select"> 
          <select name="category">
            <?php
		
			
			while($row=mysqli_fetch_row($res1))
				{?>
					<option value="<?php echo $row[1]?>"><?php echo $row[1]?></option>
				
			<?php }?>
          </select>
        </div>
		</div>
		<div class="input_field">
			<input type='submit' name='upload' value='upload' class="btn">
		</div>
	</form>
	</div>
</div>
<?php
if(isset($_SESSION["username"]))
{
include("dbcon.php");

if(isset($_POST["upload"]))
{
$str="/image/img".time().".jpg";
$x=move_uploaded_file($_FILES["myfile"]["tmp_name"],$str);
echo($x==true)?"image uploaded":"image not uploaded";
$sql = "INSERT INTO tblphoto(id,photo,model,price,ptext,category)VALUES(NULL, '".$str."', '".$_POST["model"]."','".$_POST["price"]."','".$_POST["ptext"]."','".$_POST["category"]."');";
$res=mysqli_query($con,$sql);
echo (mysqli_affected_rows($con)>0)? header("Location:allcar.php"):"not inserted";
}
}
else
{
header("location:index.php");
}
?>
</body>
</html>
