<?php
include "../config.php";
if(!empty($_GET['id']))
{
 $id=$_GET['id'];
    $data = array();
	if($id==1)
	{
		$pre='ADM0';
	}
	elseif($id==2)
	{
		$pre='EMP0';
	}
    $fg1="SELECT max(emp_id) as id from employee where userrole='$id'";
    // echo $fg1;
    $fg2=mysqli_query($conn,$fg1);
    $count=mysqli_num_rows($fg2);
    $fg3=mysqli_fetch_object($fg2);
    $enq=$pre.$fg3->id+1;
    $enq1=$fg3->id+1;

    if($count > 0 ){
       
        $data['sts'] = 'ok';
        $data['eid'] = $enq; 
        $data['eid1'] = $enq1; 
    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>