<?php
 $q = $_GET['q'];

$conn = mysqli_connect('localhost','root','');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"company");
$sql="SELECT * FROM users WHERE name='$q'" ;
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>name</th>
<th>email</th>
<th>phnumber</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['phnumber'] . "</td>";

  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>