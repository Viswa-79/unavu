<?php
session_start();
require("config.php");
error_reporting(0);
//Start our session.

 
//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 60;
 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
		header("Location:../index.php"); /* Redirect browser */
exit();
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

?>

<?php
$user_id=$_SESSION["login_user_omtex"];
 $query = "SELECT * FROM users u left join user_role r on u.userrole=r.id WHERE u.id = '$user_id'";
$result = mysqli_query($conn, $query);
$rz1=mysqli_fetch_array($result);
$user_role=$rz1['userrole'];
$role=$rz1['role'];
$user_name=$rz1['name'];
 $department=$rz1['department'];
	  ?>
<html
lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Truezor Soft</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="../assets/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/dropzone/dropzone.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
   <link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/bs-stepper/bs-stepper.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/sweetalert2/sweetalert2.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/animate-css/animate.css" />


    <link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="../assets/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>


  
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
 
    <link rel="stylesheet" href="../assets/vendor/css/pages/app-calendar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/fullcalendar/fullcalendar.css" />
  

    <link rel="stylesheet" href="../assets/vendor/libs/swiper/swiper.css" />
     <link rel="stylesheet" href="../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />


    <link rel="stylesheet" href="../assets/vendor/css/pages/cards-advance.css" />

 <!--DataTables--->
<link href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" rel="stylesheet">
 
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>



<script>
$(document).ready(function() {
	$('#myTable').DataTable();
} );
</script>
    
</head>