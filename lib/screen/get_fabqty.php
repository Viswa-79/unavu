<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['orderno'];
    $itemno=$_GET['itemno'];

    $sql2 = "SELECT sum(mtrs) as mtrs FROM fabric_inward e left join fabric_inward1 p on e.id=p.cid WHERE orderno = '$orderno' and itemno = '$itemno' and quality = '".$_GET['id']."'";
    $result2 = mysqli_query($conn, $sql2);
    $count2=mysqli_num_rows($result2);
	$row2= mysqli_fetch_array($result2);
    
   $sql1 = "SELECT sum(totalmeters) as totalmeters FROM fabric_computation e left join fabric_computation1 p on e.id=p.cid WHERE orderno = '$orderno' and p.itemno = '$itemno' and quality = '".$_GET['id']."'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
	$row = mysqli_fetch_array($result1);
	
	
    $data=array();
    if($count1 > 0)
	{
        $data['sts'] = '1';
        $data['totalmeters'] = $row['totalmeters']-$row2['mtrs'] ;
		//$data['mtrs'] = $row2['mtrs'];
       
    }
   
   
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>