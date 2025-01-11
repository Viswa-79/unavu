<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['orderno'];
    $itemno=$_GET['itemno'];
    $quality=$_GET['id'];

    
   $sql1 = "SELECT sum(reqqty) as reqqty FROM fabric_inward e left join fabric_inward1 p on e.id=p.cid WHERE orderno = '$orderno' and p.itemno = '$itemno' and p.quality='$quality'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
	$row = mysqli_fetch_array($result1);
	
    
    $sql = "SELECT sum(mtrs) as mtrs FROM fabric_outward s left join fabric_outward1 m on s.id=m.cid WHERE orderno = '$orderno' and m.itemno = '$itemno' and m.quality='$quality'";
    $result = mysqli_query($conn, $sql);
	$row1 = mysqli_fetch_array($result); 
   
	
    $data=array();
    if($count1 > 0)
	{
        $data['sts'] = '1';
        $data['reqqty'] = $row['reqqty'] - $row1['mtrs'];
		//$data['mtrs'] = $row2['mtrs'];
       
    }
   
   
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>