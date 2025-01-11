<?php
 include "../config.php";
if(!empty($_GET['id']))
{
	$id = $_GET['id'];


     $sql = "SELECT sum(monthleave) as monthleave from leave_req where staff=$id ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $monthleave=$row['monthleave'];
    
      $sql = "SELECT sum(nod) as nod from leave_req where staff=$id ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $nod=$row['nod'];
    
     echo $leave_remain=$monthleave-$nod;

   }?>