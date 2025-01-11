<?php
include "../config.php";
if(!empty($_GET['id']))
{
   $form=$_GET['q'];
   $sql = "SELECT * FROM order1 WHERE ord_no = '".$_GET['id']."'";
  $result = mysqli_query($conn, $sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {

  $sql1 = "SELECT * FROM $form WHERE orderno = '".$_GET['id']."'";
  $result1 = mysqli_query($conn, $sql1);
  $count1=mysqli_num_rows($result1);
if($count1==0){
  $sts=1;	
  echo $sts;
  		
}
else {
    $sts=0;	
    echo $sts;
            
  }
}
else
  {
    $sts=2;
     echo $sts;
  }

}
?>