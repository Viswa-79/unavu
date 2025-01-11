<?php
include "../config.php";
$sid=base64_decode($_GET['cid']);
	
$tables = array("order2");
foreach($tables as $table) {

$sql = "DELETE FROM $table  where id='$sid'";
//echo $sql;
$result = mysqli_query($conn,$sql);

}
  

if($result)
{
  echo  "<script>alert('Deleted');window.location='../garmentlist.php';</script>";
}


?>