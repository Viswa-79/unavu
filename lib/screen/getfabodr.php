<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    $refno=$_GET['q2'];
$orderno=$_GET['id'];
    $sql = "SELECT * FROM fabric_outward1 e left join fabric_outward a on e.cid=a.id  WHERE refno ='$refno' and orderno = '$orderno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['itemno'] = $row['itemno'];
        $data['quality'] = $row['quality'];
        $data['color'] = $row['color'];
        $data['pcs'] = $row['pcs'];
        $data['mtrs'] = $row['mtrs'];
        $data['descr'] = $row['descr'];
        $data['fold'] = $row['fold'];
        $data['bundle'] = $row['bundle'];
        $data['stockloc'] = $row['stockloc'];
        $data['width'] = $row['width'];
        $data['bale'] = $row['bale'];
        $data['ref'] = $row['ref'];
   
     
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>