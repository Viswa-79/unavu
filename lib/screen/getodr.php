<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $sql1 = "SELECT * FROM order1 WHERE ord_no = '".$_GET['id']."'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
	$row = mysqli_fetch_array($result1);
    $data=array();
    if($count1 > 0)
	{
        $data['sts'] = '1';
        $data['partyname'] = $row['partyname'];
        $data['currency'] = $row['currency'];
        $data['ordertype'] = $row['ordertype'];
        $data['Destination'] = $row['Destination'];
        $data['payment'] = $row['payment'];
        $data['shipterm'] = $row['shipterm'];
        $data['loads'] = $row['loads'];
    }
   
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>