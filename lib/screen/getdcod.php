<?php
include "../config.php";
if(!empty($_GET['id']))
{?><option value="">---Select---</option><?php
 $sql = "SELECT * from fabric_outward e left join  fabric_outward1 a on e.id=a.cid  where refno='".$_GET['id']."' order by orderno desc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['orderno'];?>"><?php echo $row['orderno'];?></option><?php
}
}

?>
