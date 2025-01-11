<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['id'];
   echo "<option value=''>Select</option>";
   $sql1 = "SELECT * FROM order1 e left join order2 q on e.id=q.cid left join item_master w on q.itemno=w.id where e.ord_no='$orderno' ";
   $result1 = mysqli_query($conn, $sql1);
   while($row1 = mysqli_fetch_array($result1))
   {
		echo "<option value='".$row1['id']."'>".$row1['code']."</option>";
   }	
}

?>