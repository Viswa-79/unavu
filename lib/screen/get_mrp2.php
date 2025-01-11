<?php
include "../config.php";
if(!empty($_GET['orderno']))
{
    $orderno=$_GET['orderno'];
    $productname=$_GET['productname'];
    $sql1 = "SELECT * FROM material_resource1 c4 left join material_resource c on c4.cid=c.id left join product_master q on c4.productname=q.id where orderno='$orderno' and c4.productname='$productname'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    
   $sql = "SELECT sum(quantity) as quantity FROM purchaseorder e left join purchaseorder1 p on e.id=p.cid WHERE productname='$productname' ";
   $result = mysqli_query($conn, $sql);
   $count=mysqli_num_rows($result);
   $row = mysqli_fetch_array($result);
   
   $data=array();
   if($row1 > 0){
       
    $data['sts'] = 'ok';
    $data['excessqty'] = $row1['excessqty'];
    $data['excessqty'] = $row1['excessqty']-$row['quantity'];
    


}
else
{
    $data['sts'] = '0';
}
//returns data as JSON format
echo json_encode($data);
}

?>