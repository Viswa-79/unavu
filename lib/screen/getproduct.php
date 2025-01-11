<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM product_master WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['productgroup'] = $row['productgroup'];
        $data['hsn'] = $row['hsn'];
        $data['productcode'] = $row['productcode'];
        $data['productname'] = $row['productname'];
        $data['supplier'] = $row['supplier'];
        $data['size'] = $row['size'];
        $data['price'] = $row['price'];
        $data['pcs'] = $row['pcs'];
        $data['unit'] = $row['unit'];
        $data['gstno'] = $row['gstno'];
        $data['specification'] = $row['specification'];
        $data['decription'] = $row['decription'];
        

    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>