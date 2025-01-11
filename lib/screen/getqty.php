<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM quality_master WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['code'] = $row['code'];
        $data['warp'] = $row['warp'];
        $data['weft'] = $row['weft'];
        $data['reed'] = $row['reed'];
        $data['pick'] = $row['pick'];
        $data['width'] = $row['width'];
        $data['ends'] = $row['ends'];
        $data['quality'] = $row['quality'];
      
        

    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>