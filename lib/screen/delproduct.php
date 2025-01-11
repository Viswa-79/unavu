<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "DELETE FROM product_master WHERE id = '".$_GET['id']."'";
    $result=mysqli_query($conn ,$sql);
    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>