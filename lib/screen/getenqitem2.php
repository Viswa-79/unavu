<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
    $ordertype=$_GET['q2'];
    $itemno=$_GET['id'];

    $sql = "SELECT *,s.quality as quality,s1.quality as fabqty FROM item_master s left join quality_master s1 on s.fabqty=s1.id WHERE s.id='$itemno'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	
	  if($count > 0){
       
        $data['sts'] = 'ok';
        $data['itemno'] = $row['code'];
        $data['descr'] = $row['descr'];
        $data['label'] = $row['label'];
        $data['print'] = $row['print'];
        
        $data['size'] = $row['size'];
        $data['unit'] = $row['unit'];
        $data['pack'] = $row['pack'];
        if($ordertype=='Madeups')
        $data['quality'] = $row['quality'];
    else
    $data['quality'] = $row['fabqty'];

       
    }	

    //returns data as JSON format
    echo json_encode($data);
}
?>