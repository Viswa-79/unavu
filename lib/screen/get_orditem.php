<?php
include "../config.php";
if(!empty($_GET['id']))
{
   echo "<option value=''>Select</option>";
  $sql1 = "SELECT * FROM order2 c4 left join order1 c on c4.cid=c.id left join item_master m on c4.itemno=m.id where ord_no='".$_GET['id']."' ";
   $result1 = mysqli_query($conn, $sql1);
   while($row1 = mysqli_fetch_array($result1))
   {
		echo "<option value='".$row1['id']."'>".$row1['code']."</option>";
   }	
}

?>