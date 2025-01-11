<?php
 include "../config.php";
if(!empty($_GET['id']))
{

  $sql = "SELECT * FROM state  WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($connection, $sql);
   $count=mysqli_num_rows($result);
	  $row = mysqli_fetch_array($result); 

    if($count > 0){
   $state_id = $row['id'];echo "<option value=''>Select</option>";
   $sql = "SELECT * FROM city  WHERE state_id = '$state_id'  ORDER BY city ASC ";
    $result = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value='".$row['id']."'>".$row['city']."</option>";
	}
}

}

?>