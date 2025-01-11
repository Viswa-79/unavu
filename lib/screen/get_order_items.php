<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
  $form=$_GET['q'];
  $sql1 = "SELECT * FROM $form WHERE orderno = '".$_GET['id']."'";
  $result1 = mysqli_query($conn, $sql1);
  $count1=mysqli_num_rows($result1);

  $sts=1;
    $sql = "SELECT * FROM order1 WHERE ord_no = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result); 
 
    if($count > 0){
      $cid = $row['id'];	
			echo $sts;?>???<?php echo "<option value=''>Select</option>";
    $sql = "SELECT * FROM order2 o2 left join item_master im on o2.itemno=im.id WHERE cid = '$cid'";
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
?>