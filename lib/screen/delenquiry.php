<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "DELETE FROM enquiry WHERE id = '".$_GET['id']."'";
    $result=mysqli_query($conn ,$sql);
    
    $sql1 = "DELETE FROM enquiry1 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql2 = "DELETE FROM enquiry2 WHERE cid = '".$_GET['id']."'";
    $result2=mysqli_query($conn ,$sql2);
    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>