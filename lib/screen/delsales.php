<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "DELETE FROM salesinvoice WHERE id = '".$_GET['id']."'";
    $result=mysqli_query($conn ,$sql);
    
    $sql1 = "DELETE FROM salesinvoice1 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);
    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>