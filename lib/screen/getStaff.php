<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM staff WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['name'] = $row['name'];
        $data['department'] = $row['department'];
        $data['designation'] = $row['designation'];
        $data['mobile'] = $row['mobile'];
        $data['email'] = $row['email'];
        $data['joiningdate'] = $row['joiningdate'];
        $data['idproofnumber'] = $row['idproofnumber'];
        $data['uploadidproof'] = $row['uploadidproof'];
        $data['address'] = $row['address'];
        

    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>