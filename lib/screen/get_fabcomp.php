<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['orderno'];
    $itemno=$_GET['id'];

    
   $sql1 = "SELECT * FROM fabric_computation e left join fabric_computation1 p on e.id=p.cid WHERE orderno = '$orderno' and p.itemno = '$itemno'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
	$row = mysqli_fetch_array($result1);
	
	
    $data=array();
    if($count1 > 0)
	{
        $data['sts'] = '1';
        $data['totalmeters'] = $row['totalmeters'];
		//$data['mtrs'] = $row2['mtrs'];
       
    }
   
   
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>