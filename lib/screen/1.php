<?php
 include "../config.php";
if(!empty($_GET['id']))
{

  $sql = "SELECT * FROM depart  WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
   $count=mysqli_num_rows($result);
	  $row = mysqli_fetch_array($result); 

    if($count > 0){
   $depart = $row['id'];echo "<option value=''>Select</option>";
   $sql = "SELECT * FROM employee  WHERE depart = '$depart'  ORDER BY name ASC ";
    $result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
	}
}

}

?>
