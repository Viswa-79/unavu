<?php
include "../config.php";
if(!empty($_GET['id']))
{
 

 $sql = "SELECT * FROM cutpanel_outward WHERE refno = '".$_GET['id']."' ";
//  echo $sql;
    $result = mysqli_query($conn, $sql);
        $count=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result); 
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['date'] = $row['date'];
        $data['process'] = $row['process'];
        $data['partyname'] = $row['partyname'];
        $data['vehicleno'] = $row['vehicleno'];
        $data['dvrname'] = $row['dvrname'];

    
        
    }
 
    //returns data as JSON format
    echo json_encode($data);
}
?>