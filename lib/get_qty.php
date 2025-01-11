<?php
include "../config.php";
if(!empty($_GET['id']))
{
     $orderno=$_GET['orderno'];
    $itemno=$_GET['id'];
   echo "<option value=''>Select</option>";
   $sql1 = "SELECT *,q.id as id,q.quality as quality FROM costing4 c4 left join costing c on c4.cid=c.id left join costing5 c5 on c5.cid=c.id left join quality_master q on c4.quality=q.id where orderno='$orderno' and c5.itemno='$itemno' group by q.id";
   $result1 = mysqli_query($conn, $sql1);
   while($row1 = mysqli_fetch_array($result1))
   {
		echo "<option value='".$row1['id']."'>".$row1['quality']."</option>";
   }		
}

?>