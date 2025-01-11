<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $orderno=$_GET['orderno'];
    $itemno=$_GET['id'];

    $sql2 = "SELECT * FROM fabric_inward e left join fabric_inward1 p on e.id=p.cid WHERE orderno = '$orderno' and itemno = '$itemno'";
    $result2 = mysqli_query($conn, $sql2);
    $count2=mysqli_num_rows($result2);
	$row2= mysqli_fetch_array($result2);

    $data=array();
    if($count2 > 0)
	{
        $data['sts'] = '1';
		$data['mtrs'] = $row2['mtrs'];
       
    }
   
   
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>