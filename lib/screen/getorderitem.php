<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
 $orderno=$_GET['q2'];
  $itemno=$_GET['id'];
     $sql = "SELECT * FROM order2 o2 left join order1 o1 on o2.cid=o1.id  WHERE ord_no = '$orderno' and itemno='$itemno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_array($result);   
    //get user data from the database
    $sql1 = "SELECT * FROM fabric_computation1 e left join fabric_computation w on e.cid=w.id   WHERE w.orderno = '$orderno' and e.itemno='$itemno'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);

    $row1 = mysqli_fetch_array($result1); 
    if($count > 0){
       
        $data['sts'] = 'ok';
      
        $data['itemno'] = $row['itemno'];
        $data['pono'] = $row['pono'];
        $data['descr'] = $row['itemdesc'];
        $data['label'] = $row['label'];
        $data['print'] = $row['print'];
        $data['quality'] = $row['quality'];
        $data['clwidth'] = $row['clwidth'];
        $data['size'] = $row['size'];
        $data['unit'] = $row['unit'];
        $data['pack'] = $row['pack'];
        $data['quantity'] = $row['quantity'];
		$data['pono'] = $row['pono'];
		$data['price'] = $row['price'];
        
    }
    elseif($count1 > 0){
      $data['sts'] = 'ok';
      $data['color'] = $row1['color'];
    }
    //returns data as JSON format
    echo json_encode($data);
}
?>