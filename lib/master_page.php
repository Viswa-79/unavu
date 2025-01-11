<?php include "config.php"; ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php" ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!--Masters -->
              <section class="section-py first-section-pt">
      <div class="container">
        <h2 class="text-center mb-2">Master Categories</h2>
        
     <!--   <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
          <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
            <span class="switch-label">Monthly</span>
            <input type="checkbox" class="switch-input price-duration-toggler" checked />
            <span class="switch-toggle-slider">
              <span class="switch-on"></span>
              <span class="switch-off"></span>
            </span>
            <span class="switch-label">Annual</span>
          </label>
          <div class="mt-n5 ms-n5 d-none d-sm-block">
            <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
            <span class="badge badge-sm bg-label-primary">Save up to 10%</span>
          </div>
        </div> --><br>

        <div class="row mx-0 gy-3 px-lg-5">
          <!-- Basic -->
          <div class="col-lg mb-md-0 mb-4">
            <div class="card border rounded shadow-none">
              <div class="card-body">
              <div class="my-3 pt-2 text-center">
                  <img
                    src="../assets/img/illustrations/page-misc-under-maintenance.png"
                    alt="Standard Image"
                    height="140" />
                </div>
                
                <ul class="ps-0 my-4 pt-2 circle-bullets">
            <!--    <a href="product_brand.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Brand Master</li></a>
				<a href="product_print.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Print Master</li></a>-->
				<a href="product_gsm.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>GSM Master</li></a>
				<a href="product_color.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Color Master</li></a>
				<a href="quality_master.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Quality Master</li></a>
				
			   

                </ul>
				<a href="item.php" class="btn btn-label-success d-grid w-100">ITEM MASTER</a>
               
              </div>
            </div>
          </div>

          <!-- Pro -->
          <div class="col-lg mb-md-0 mb-4">
            <div class="card border-primary border shadow-none">
              <div class="card-body position-relative">
                
                <div class="my-3 pt-2 text-center">
                  <img
                  src="../assets/img/illustrations/page-pricing-standard.png"
                    alt="Standard Image"
                    height="140" />
                </div>
                
                <ul class="ps-0 my-4 pt-2 circle-bullets">
               
					
					<a href="currency.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Currency Master</li></a>
					
					<a href="product_group.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Product Group</li></a>
					<a href="product_master.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Product Master</li></a>
				<!--	<a href="product_fabric.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Fabric Master</li></a>
					<a href="size.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Size Master</li></a>-->
                    <a href="cutpanel_master.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Cutpanel Master</li></a>
                                        
                </ul>

                <a href="party_master.php" class="btn btn-label-success d-grid w-100">PARTY MASTER</a>
              </div>
            </div>
          </div>

          <!-- Enterprise -->
          <div class="col-lg">
            <div class="card border rounded shadow-none">
              <div class="card-body">
                <div class="my-3 pt-2 text-center">
                  <img
                  src="../assets/img/illustrations/auth-register-illustration-dark.png"
                    
                    alt="Enterprise Image"
                    height="140" />
                </div>
                
                <ul class="ps-0 my-4 pt-2 circle-bullets">
					
				
				<a href="location_master.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Location Master</li></a>
                
				<a href="product_designation.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Designation Master</li></a>
				<a href="staff_master.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Staff Master</li></a>
					
			    <!--<a href="product_category.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Category Master</li></a>

                <a href="product_fabric.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Fabric Master</li></a>
					
				<a href="product_season.php"><li class="mb-0 d-flex align-items-center">
                    <i class="ti ti-point ti-lg"></i>Season Master</li></a>-->

                    
                   

                </ul>

                 <a href="product_process.php" class="btn btn-label-success d-grid w-100">PROCESS MASTER</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
