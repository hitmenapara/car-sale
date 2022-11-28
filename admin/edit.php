<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="menuc.css" />
<link rel="stylesheet" href="uploadc.css" />
</head>

<body style="background-image: url(img/audicar.jpg);">
	<div class="menu-bar">
		<ul>
		<li style="font-style:italic" ><h1>CarWale</h1></li>
			<li><a href="menu.php">Manage User</a></li>
			<li><a href="allcar.php">All Car</a></li>
			<li class="active"><a href="uploadfile.php">Add Car</a></li>
            <li><a href="managefeedback.php">Manage Feedback</a></li>
			<li><a href="carcategory.php">Manage Category</a></li>
			<li><a href="order.php">Order</a>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
<?php
session_start();
if(isset($_SESSION["username"]))
{
include "dbcon.php";
if(isset($_GET["id"])){
	$disp="select * from tblphoto where id=".$_REQUEST["id"];
  	$res=mysqli_query($con,$disp);
	$row = mysqli_fetch_row($res);
	}
	else{
	$row[0] = $row[1] = $row[2] = $row[3] = $row[4] = $row[5]= "";
	}
  ?>
  
<div align="center" class="wrapper">
	<div class="title">
		edit Car
	</div>
	<div class="form">
<form name='ecar' method='post' action='#' enctype="multipart/form-data">
<div class="input_field">
		   <input type='hidden' name='id' value="<?php echo $row[0];?>"/><BR>
		   </div>
		   <div class="input_field">
		   <label>photo</label>
           <input type='file' name='myfile' value="<?php echo $row[1];?>"/><BR>
		   </div>
		   <div class="input_field">
		   <label>model</label>
		   <input type='text' name='name' value="<?php echo $row[2];?>"/><BR>
		   </div>
		   <div class="input_field">
		   <label>price</label>
	      <input type='text' name='price' value="<?php echo $row[3];?>"/><BR>		   
		  </div>
		   <div class="input_field">
		  <label>Description</label>
		  <input type="text"  name='ptext' value="<?php echo $row[4];?>"/><BR>
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
			
			while($rows=mysqli_fetch_row($res1))
				{?>
					<option value="<?php echo $rows[1]?>" <?php if($row[5]==$rows[1]) {echo "selected";} ?>><?php echo $rows[1]?></option>
				
			<?php }?>
          </select>
        </div>
		</div>

		   <div class="input_field">
		  <input type='submit' name='edit' value='update' class="btn">
		  </div>
         </form>
		 </div>

<?php


include("dbcon.php");
if(isset($_SESSION["id"]))
{
    if(isset($_POST["edit"]))
	{
	$str="./image/img".time().".jpg";
$x=move_uploaded_file($_FILES["myfile"]["tmp_name"],$str);

	 $sql = "UPDATE tblphoto SET photo='".$str."',model= '".$_POST["name"]."',price
		= '".$_POST["price"]."',ptext= '".$_POST["ptext"].
		"',category='".$_POST["category"]."' WHERE id =".$_POST["id"];
		$res=mysqli_query($con,$sql);
		 if(isset($res))
   {
      echo "<script language='javascript'>
	  alert('Record updated');</script>";
	  header("Location:allcar.php");
   }
   else
   {
      echo "<script language='javascript'>
	  alert('Record not updated');</script>";
   }
	}
   
}
}else
{
header("location:index.php");
}

?>