<?php include "config.php"; ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php"; ?>

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                
                      <button class="btn btn-label-primary">Fabric </button>
                      <a href="fabriclist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">From Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="from"
                              value="<?php echo date("Y-m-d");?>"
                              name="from"
                              value=""
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">To Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Party Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select"  onchange="get_party_details(this.value);" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Report Type</label>
                            <select style="width:100%;" name="rtype" id="rtype" class="select form-select" data-allow-clear="true">

<option value="">Select</option>
<option value="All Orders">All Orders</option>
<option value="Fabric Planning Pending Report">Fabric Planning Pending Report</option>

</select>
                          </div>
                          </div>
                       
                  </div>
                </div>
                 
            </div>
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <a class="btn btn-success btn-next" href="sales_report1.php" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Report</span>
                                <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                              </a>
                            </div>   
                    
                        </form>
                   
                   
            </div>
            </div>    
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>
</html>


<?php
if (isset($_POST['submit'])) {

  $book = $_POST['book'];
  $date = $_POST['date'];
  $ref = $_POST['ref'];
  $follow = $_POST['follow'];
  $deliverydt = $_POST['deliverydt'];
  $orderno = $_POST['orderno'];
  $checking = $_POST['checking'];
  $reorder = $_POST['reorder'];
  $instruction = $_POST['instruction'];
  $remarks = $_POST['remarks'];
  $prepared = $_POST['prepared'];

  $sql = "INSERT into fabric (book,date,ref,follow,deliverydt,orderno,checking,reorder,instruction,remarks,prepared) 
 values ('$book','$date','$ref','$follow','$deliverydt','$orderno','$checking','$reorder','$instruction','$remarks','$prepared')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['itemdesc'] as $key => $val) {
    
    
    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $print = $_POST['print'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    
    
    if ($quality != '') {
    echo $sql1 = "INSERT into fabric1 (cid,quality,pono,itemno,itemdesc,print,size,quantity,unit) 
    values ('$cid','$quality','$pono','$itemno','$itemdesc','$print','$size','$quantity','$unit')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

    echo "<script>alert('Fabric Registered successfully');window.location='fabric.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>