<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
 $orderno=$_GET['q2'];
  $itemno=$_GET['id'];
     $sql = "SELECT * FROM fabric_computation q left join fabric_computation1 w on w.cid=q.id  WHERE orderno = '$orderno' and w.itemno='$itemno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_array($result);  
    $sql4 = "SELECT * from item_master WHERE  id = '$itemno' ";
    //echo $sql4;
     $result4 = mysqli_query($conn, $sql4);
     $count=mysqli_num_rows($result4);
     $row4 = mysqli_fetch_array($result4); 
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['quality'] = $row['quality'];
		$data['process'] = $row['process'];
		$data['descr'] = $row4['descr'];

		$data['quantity'] = $row['quantity'];
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>