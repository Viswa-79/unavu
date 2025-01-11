<?php
include "../config.php";
if(!empty($_GET['id']))
{
 

   

    $sql = "SELECT * FROM employee WHERE id = '".$_GET['id']."' ";
    //  echo $sql;
  
    $result = mysqli_query($conn, $sql);
        $count=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result); 
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['name'] = $row['name'];
      
    
        
    }
 
    //returns data as JSON format
    echo json_encode($data);
}
?>