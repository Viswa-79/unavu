<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
   echo $sql = "SELECT * FROM programme_entry1 o2 left join programme_entry im on o2.cid=im.id WHERE orderno = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['yarnqty'] = $row['yarnqty'];
        $data['yarnprice'] = $row['ratekgs'];
        
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>