<?php
include "../config.php";
if(!empty($_GET['orderno']))
{
    
    $orderno=$_GET['orderno'];
    $productname=$_GET['productname'];
    $sql = "SELECT * FROM purchaseorder1 m left join purchaseorder k on k.id=m.cid WHERE k.purchaseno='$orderno' and productname ='$productname'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['quantity'] = $row['quantity'];
        $data['unit'] = $row['unit'];
        $data['rate'] = $row['rate'];
       
        
    }
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>