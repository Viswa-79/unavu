<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
  $form=$_GET['q'];
    $sql1 = "SELECT * FROM $form WHERE refno = '".$_GET['id']."'";
  $result1 = mysqli_query($conn, $sql1);
  $count1=mysqli_num_rows($result1);

  $sts=1;
     $sql = "SELECT * FROM fabric_outward WHERE refno = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result); 
 
 

}
?>