<?php
include "../config.php";
if(!empty($_GET['dates']))
{
    $data = array();
    
    $sql = "DELETE FROM attendance_report WHERE dates = '".$_GET['dates']."'";
    $result=mysqli_query($conn ,$sql);
    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>