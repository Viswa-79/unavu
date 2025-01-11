<?php
include "../config.php";
if(!empty($_GET['orderno']))
{
    $orderno=$_GET['orderno'];
   echo "<option value=''>Select</option>";
  $sql1 = "SELECT * FROM material_resource1 c4 left join material_resource c on c4.cid=c.id left join product_master q on c4.productname=q.id where orderno='$orderno' ";
   $result1 = mysqli_query($conn, $sql1);
   while($row1 = mysqli_fetch_array($result1))
   {
		echo "<option value='".$row1['id']."'>".$row1['productname']."</option>";
   }	
}

?>