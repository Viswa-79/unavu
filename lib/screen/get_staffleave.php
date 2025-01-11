<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
    $data = array();
    
    $sql = "SELECT * FROM leave_req WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database

     $sql2 = "SELECT * FROM employee WHERE id = '".$row['staff']."'";
    $result2 = mysqli_query($conn, $sql2);
    $count=mysqli_num_rows($result2);

    $row2 = mysqli_fetch_assoc($result2);   
    //get user data from the database


    $sql3 = "SELECT * FROM leave_type WHERE id = '".$row['leavetype']."'";
    $result3 = mysqli_query($conn, $sql3);
    $count=mysqli_num_rows($result3);

    $row3= mysqli_fetch_assoc($result3);   
    
    if($count > 0 ){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['name'] = $row2['name'];
        $data['leavename'] = $row3['leavename'];
        $data['fdate'] = date ('d M Y ',strtotime($row['fdate']));
        $data['todate'] =date ('d M Y ',strtotime($row['todate']));
        $data['nod'] = $row['nod'];
        $data['remarks'] = $row['remarks'];
        $data['status'] = $row['status'];
  
        

    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>