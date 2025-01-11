<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $sql1 = "SELECT * FROM order1 WHERE enq_no = '".$_GET['id']."'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
if($count1==0){
 
   
    $sql = "SELECT * FROM enquiry WHERE enq_no = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
		
        $data['sts'] = '1';
        $data['partyname'] = $row['partyname'];
        $data['currency'] = $row['currency'];
        $data['ordertype'] = $row['ordertype'];
       
       
    }
   
}
else
{
    $data['sts'] = '0';
}
echo json_encode($data);
}
?>