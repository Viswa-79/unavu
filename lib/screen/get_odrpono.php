<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
  $orderno=$_GET['id'];
     $sql = "SELECT * FROM order2 o2 left join order1 o1 on o2.cid=o1.id  WHERE ord_no = '$orderno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_array($result);   
    //get user data from the database

    if($count > 0){
       
        $data['sts'] = 'ok';
      
        $data['itemno'] = $row['itemno'];
        $data['pono'] = $row['pono'];
        
        
    }
  
    //returns data as JSON format
    echo json_encode($data);
}
?>