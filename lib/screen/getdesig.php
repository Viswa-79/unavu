<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM desig_master WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['designation'] = $row['designation'];
        

    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>