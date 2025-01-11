<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  
  <?php include "head.php"?>

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
            <div class="row">
                <!-- Statistics -->
                <div class="col-lg-8 mb-4 col-md-12">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title mb-0">MASTERS</h5>
                      <small class="text-muted">Master is listed here..</small>
                    </div>
                    <div class="card-body pt-2">
                      <div class="row gy-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                              <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">230k</h5>
                              <small>Orders</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                              <i class="ti ti-users ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">8.549k</h5>
                              <small>Customers</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                              <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">1.423k</h5>
                              <small>Products</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                              <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">$9745</h5>
                              <small>Revenue</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Orders -->
                <div class="col-lg-2 col-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body text-center">
                      <div class="badge rounded-pill p-2 bg-label-dark mb-2">
                        <i class="ti ti-home ti-sm"></i>
                      </div>
                      <h5 class="card-title mb-2">97.8k</h5>
                      <small>Company</small>
                    </div>
                  </div>
                </div>

                <!-- Reviews -->
                <div class="col-lg-2 col-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body text-center">
                      <div class="badge rounded-pill p-2 bg-label-success mb-2">
                        <i class="ti ti-server ti-sm"></i>
                      </div>
                      <h5 class="card-title mb-2">3.4k</h5>
                      <small>Backup</small>
                    </div>
                  </div>
                </div>

             
                <!-- Cards with few info -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_brand.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0"> 
                        <h5 class="mb-0 me-2">86%</h5>
                        <small>Brand Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                          <i class="ti ti-package ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"> <a href="product_category.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">1.24gb</h5>
                        <small>Category Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-success rounded-pill p-2">
                          <i class="ti ti-server ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"> <a href="product_color.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">0.2%</h5>
                        <small>Color Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                          <i class="ti ti-chart-pie-2 ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_fabric.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">128</h5>
                        <small>Fabric Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-secondary rounded-pill p-2">
                          <i class="ti ti-layout ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_print.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">86%</h5>
                        <small>Print Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-dark rounded-pill p-2">
                          <i class="ti ti-printer ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_gsm.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">1.24gb</h5>
                        <small>GSM Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-warning rounded-pill p-2">
                          <i class="ti ti-ruler ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_season.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">0.2%</h5>
                        <small>Season Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-info rounded-pill p-2">
                          <i class="ti ti-cloud ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"> <a href="size.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">128</h5>
                        <small>Size Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                          <i class="ti ti-chart-bar ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_dia.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">86%</h5>
                        <small>Dia Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                          <i class="ti ti-pin ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_count.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">1.24gb</h5>
                        <small>Count Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-success rounded-pill p-2">
                          <i class="ti ti-quote ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="currency.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">0.2%</h5>
                        <small>Currency Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                          <i class="ti ti-currency-dollar"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"> <a href="staff_master.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">128</h5>
                        <small>Staff Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-secondary rounded-pill p-2">
                          <i class="ti ti-briefcase ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="product_process.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">86%</h5>
                        <small>Process Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-info rounded-pill p-2">
                          <i class="ti ti-reload ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="party_master.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">1.24gb</h5>
                        <small>Party Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-warning rounded-pill p-2">
                          <i class="ti ti-users ti-sm"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card h-100"><a href="usermaster.php">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">0.2%</h5>
                        <small>User Master</small>
                      </div>
                      <div class="card-icon">
                        <span class="badge bg-label-info rounded-pill p-2">
                          <i class="ti ti-user"></i>
                        </span>
                      </div>
                    </div></a>
                  </div>
                </div>
                
                <!--/ Cards with few info -->



               
                <!--/ Cards with charts & info -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
           <?php include "footer.php" ?>
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

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-crm.js"></script>
  </body>
</html>
