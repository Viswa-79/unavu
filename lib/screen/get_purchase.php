<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['id'];
    $sts=1;echo $sts;?>???<option value="">Select</option><?php $sql = "SELECT * FROM purchaseorder1 c4 left join purchaseorder c on c4.cid=c.id left join product_master q on c4.productname=q.id where purchaseno='$orderno'  ";
    $result = mysqli_query($conn, $sql);
    while($row1 = mysqli_fetch_array($result))
    {
         echo "<option value='".$row1['id']."'>".$row1['productname']."</option>";
    }	
    	
}
?>