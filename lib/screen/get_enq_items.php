<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $sql1 = "SELECT * FROM sampleenq WHERE enq_no = '".$_GET['id']."'";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
if($count1==0){
  $sts=1;
    $sql = "SELECT * FROM enquiry WHERE enq_no = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
	  $row = mysqli_fetch_array($result); 
   
    if($count > 0){
      $cid = $row['id'];	
		echo $sts;?>???<?php echo "<option value=''>Select</option>";
    $sql = "SELECT * FROM enquiry1 o2 left join item_master im on o2.itemno=im.id WHERE cid = '$cid'";
    $result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value='".$row['itemno']."'>".$row['code']."</option>";
	}
}
else
  {
    $sts=2;
     echo $sts;
  }
}
else
  {
    $sts=0;
     echo $sts;
  }
}

?>