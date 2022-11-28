<?php
session_start();
if(isset($_SESSION["username"]))
{ 
?><html>
  <head>
  <link rel="stylesheet" href="categoryc.css">
  </head>
<body>
<?php
include "dbcon.php";

$disp="select *from category where id=".$_REQUEST["cid"];
  $res=mysqli_query($con,$disp);
  while($r=@mysqli_fetch_row($res))
  {
  ?>

<div class="container">
    <h1>Edit Category</h1>
      <form action="" method="post">
        <label>id</label>
        <div class="form-field">  
          <input type="text" name="id" value="<?php echo $r[0];?> " />
        </div>
        <label>category</label>
        <div class="form-field">
        <input type="text" name="cat" value="<?php echo $r[1];?>"/> 
        </div>
        <input type="submit" name="submit" value="submit" class="btn"/>
</form>
</div>
<?php
}
if(isset($_POST["submit"]))
{
  $u="update category set category='".$_POST["cat"]."'where id=".$_REQUEST["cid"];
  
  $a=mysqli_query($con,$u);
   if($a)
   {
     echo "<script>alert('record updated')</script>";
	 	 }

	 else
	 {
	   echo "<script> alert('something wrong')</script>";
	   }
	   
	    header("location:carcategory.php");
  
  
}
}
else
{
header("location:index.php");
}
?>


</body>
</html>
