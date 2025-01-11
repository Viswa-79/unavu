<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM shift WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['shiftname'] = $row['shiftname'];
        $data['ftime'] = $row['ftime'];
        $data['totime'] = $row['totime'];
        $data['gracetime'] = $row['gracetime'];
        $data['break'] = $row['break'];
        $data['duration'] = $row['duration'];
        $data['lunch'] = $row['lunch'];
        $data['lunchduration'] = $row['lunchduration'];
        $data['break2'] = $row['break2'];
        $data['break2_dur'] = $row['break2_dur'];
        

    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>