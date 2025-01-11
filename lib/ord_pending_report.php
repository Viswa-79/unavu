<?php include "config.php"; ?>

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
                
                      <button class="btn btn-label-primary">Order Pending Report </button>
                     
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="ord_pending_report1.php" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <!-- <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">From&nbsp;Date&nbsp;</label>
                            <input
                              type="date"
                              id="from"
                              value="<?php echo date("Y-m-01");?>"
                              name="fromdate"
                              
                              class="form-control"
                               />
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">To&nbsp;Date&nbsp;</label>
                            <input
                              type="date"
                              id="date"
                              name="todate"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div> -->
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;</label>
                            <select name="partyname" id="partyname" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Type&nbsp;</label>
                            <select name="ordertype" id="ordertype" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Fabrics">Fabrics </option>
                                <option value="Garments">Garments </option>
                                <option value="Madeups">Madeups</option>
                                
                              </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;</label>
                            <select name="orderno" id="orderno" class="select form-select" onchange="get_items(this.value)" >
                            <option value="">Select</option>
                             <?php 
			             	$sql11 = "SELECT * FROM order1 order by ord_no asc ";
                                $result11 = mysqli_query($conn, $sql11);
                                while($rw11 = mysqli_fetch_array($result11))
			             	{ ?>
                                     <option value="<?php echo $rw11['ord_no'];?>"><?php echo $rw11['ord_no'];?>
			             		 </option>
			             	<?php } ?>
                                        </select>
                                      </div>
                        

                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Item&nbsp;No&nbsp;</label>
                            <select name="itemno" id="itemno" class="select form-select"  >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?>
						 </option>
					<?php } ?>
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
                              <button class="btn btn-success ">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Report</span>
                                <i class="ti ti-arrow-right me-sm-1 me-0"></i>
          </button>
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

  <script>
function get_items(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;

//alert(r);

    document.getElementById('itemno').innerHTML =r;

        
           
      }
    };
    xmlhttp.open("GET","ajax/get_orditem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>