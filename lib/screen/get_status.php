<?php
include "../config.php";
if(!empty($_GET['id']))
$id=$_GET['id'];
?>
<?php





if($id=='1'){
  $sql1="UPDATE details_entry SET approve='1' WHERE  id='$id'";

}else{
    $sql1="UPDATE details_entry SET approve='2' WHERE  id='$id'";

}
  $result2=mysqli_query($conn, $sql1);


  if ($result2) {
    echo "<script>
    Swal.fire({
      title: 'Success!',
      text: ' Department has been saved successfully.',
      icon: 'success',
      confirmButtonText: 'OK'
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'onboard2.php?cid=$cid'; // Corrected line
      }
    });
  </script>";
  } 
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the Onboard.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }

?>
                          
