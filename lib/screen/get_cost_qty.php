<?php
include "../config.php";
if(!empty($_GET['id']))
{
   
    $sql = "SELECT sum(quantity) as qty FROM order2 s2 left join order1 s1 on s2.cid=s1.id WHERE ord_no = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result); 

    $sql1 = "SELECT sum(reqcost) as qty FROM costing WHERE orderno = '".$_GET['id']."'";
    $result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($result1); 
   
   
    
    if($count > 0){
        $data['sts'] = 'ok';
        $data['qty'] = $row['qty'] - $row1['qty'];
        echo json_encode($data);
}
}
?>