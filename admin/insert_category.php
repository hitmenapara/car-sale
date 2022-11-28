<?php
session_start();
if(isset($_SESSION["username"]))
{ 
?><html>
  <head>
    <link rel="stylesheet" href="categoryc.css">
  </head>
<body>
  <div class="container">
    <h1>Insert Category</h1>
    <form action="" method="post">
        <label>id</label>
        <div class="form-field">  
          <input type="text" name="id" />
        </div>
        <label>category</label>
        <div class="form-field">
          <input type="text" name="category" required/>
        </div>
       
          <input type="submit" name="submit" value="click here" class="btn"/>
          <input type="reset" name="reset" value="reset" class="btn"/>
		 
        
    </form>
  </div>
<?php 
include "dbcon.php";
if(isset($_POST["submit"]))
{
   $n=$_POST["id"];
   $s=$_POST["category"];
  
   
 $i="insert into category values('$n','$s')";
 
   
   $a=mysqli_query($con,$i);
   if($a)
   {
     echo "<script>alert('record inserted')</script>";
	 header("location:carcategory.php");
	 	 }

	 else
	 {
	   echo "<script> alert('something wrong')</script>";
	   }
	   }
	   }
	   else
	   {
	   header("location:index.php");
	   }
?>
   </body>
   </html>
   