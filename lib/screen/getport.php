<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM partymaster WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['Destination'] = $row['Destination'];
        $data['payment'] = $row['payment'];
        $data['tolerance'] = $row['tolerance'];
        $data['currency'] = $row['currency'];
        $data['shipterm'] = $row['shipterm'];
        $data['shipport'] = $row['shipport'];
        $data['agent'] = $row['agent'];
        
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>