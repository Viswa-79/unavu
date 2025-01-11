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
        $data['party_group'] = $row['party_group'];
        $data['process'] = $row['process'];
        $data['name'] = $row['name'];
        $data['title'] = $row['title'];
        $data['cpname'] = $row['cpname'];
        $data['mobileno'] = $row['mobileno'];
        $data['telephone'] = $row['telephone'];
        $data['email'] = $row['email'];
        $data['address'] = $row['address'];
        $data['country'] = $row['country'];
        $data['state'] = $row['state'];
        $data['city'] = $row['city'];
        $data['pincode'] = $row['pincode'];
        $data['gstno'] = $row['gstno'];
        $data['Destination'] = $row['Destination'];
        $data['payment'] = $row['payment'];
        $data['tolerance'] = $row['tolerance'];
        $data['currency'] = $row['currency'];
        $data['shipterm'] = $row['shipterm'];
        $data['shipport'] = $row['shipport'];
        $data['agent'] = $row['agent'];
        $data['portofdischarge'] = $row['portofdischarge'];
       
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>