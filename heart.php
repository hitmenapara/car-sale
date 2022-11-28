<?php
include("dbcon.php");
if(isset($_POST['id']))
{
    $select ="SELECT * FROM `fev` WHERE `car_id` = '".$_POST['id']."' AND
     `cid`='".$_POST['ssid']."' ";
    $res = mysqli_query($con, $select);
    if(mysqli_num_rows($res)==0)
    {
        $insert = "INSERT INTO `fev`(`id`, `car_id`,`cid`) VALUES (NULL,'".$_POST["id"]."',     '".$_POST["ssid"]."') ";
        mysqli_query($con, $insert);

    }
    if(mysqli_num_rows($res)==1)
    {
        $delete ="DELETE FROM `fev` WHERE `car_id` = '".$_POST["id"]."'";
        mysqli_query($con, $delete);   
    }
    $sele = "SELECT `id` FROM `fev` WHERE `cid` ='".$_POST['ssid']."' ";
     $resul = mysqli_query($con, $sele);
     echo mysqli_num_rows($resul);
}
?>