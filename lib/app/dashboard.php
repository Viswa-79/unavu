

  
  <?php include "head.php"?>

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

          <?php include "header.php" ?>

          <!-- / Navbar -->
		  <?php
require("config.php");
$today=date("Y-m-d");
$cyear=date("Y");



$t0="select * from enquiry";
$t1=mysqli_query($conn,$t0);
$cnt0=mysqli_num_rows($t1);

$t0="select * from order1 where ordertype='Madeups'";
$t1=mysqli_query($conn,$t0);
$cnt11=mysqli_num_rows($t1);

$t0="select * from order1 where ordertype='Fabrics'";
$t1=mysqli_query($conn,$t0);
$cnt12=mysqli_num_rows($t1);

$t0="select * from order1 where ordertype='Garments'";
$t1=mysqli_query($conn,$t0);
$cnt13=mysqli_num_rows($t1);

$cnt1=$cnt11+$cnt12+$cnt13;

$t0="select * from costing";
$t1=mysqli_query($conn,$t0);
$cnt2=mysqli_num_rows($t1);

$t0="select * from salesinvoice";
$t1=mysqli_query($conn,$t0);
$cnt3=mysqli_num_rows($t1);

$t0="select * from purchaseorder";
$t1=mysqli_query($conn,$t0);
$cnt4=mysqli_num_rows($t1);

$t0="select * from material_resource";
$t1=mysqli_query($conn,$t0);
$cnt5=mysqli_num_rows($t1);

$t0="select * from purchaseorder where approve='1'";
$t1=mysqli_query($conn,$t0);
$cnt41=mysqli_num_rows($t1);

$t0="select * from purchaseorder where approve='0'";
$t1=mysqli_query($conn,$t0);
$cnt42=mysqli_num_rows($t1);

$cost_pending=$cnt1-$cnt2;
$sales_pending=$cnt1-$cnt3;

$t0="select * from material_resource where bookno NOT IN (select mrp from purchaseorder)";
$t1=mysqli_query($conn,$t0);
$po_pending=mysqli_num_rows($t1);
?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
       

               
              <!-- Revenue Growth -->
                <div class="col-xl-4 col-md-8 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                          <div class="card-title mb-auto">
                            <h5 class="mb-1 text-nowrap">SALES ORDERS</h5>
                            
                          </div>
                          <div class="chart-statistics">
                            <h3 class="card-title mb-1"><?php echo $cnt1;?></h3>
                            <span class="badge bg-label-primary">Madeups - <?php echo $cnt11;?></span>
							<span class="badge bg-label-secondary">Fabrics - <?php echo $cnt12;?></span>
							<span class="badge bg-label-info">Garments - <?php echo $cnt13;?></span>
                          </div>
                        </div>
                        <div id="revenueGrowth"></div>
                      </div>
                    </div>
                  </div>
                </div>
				
				    <!-- Revenue Growth -->
                <div class="col-xl-4 col-md-8 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                          <div class="card-title mb-auto">
                            <h5 class="mb-1 text-nowrap">PURCHASE ORDERS</h5>
                            
                          </div>
                          <div class="chart-statistics">
                            <h3 class="card-title mb-1"><?php echo $cnt4;?></h3>
							<span class="badge bg-label-danger">MRP-<?php echo $cnt5;?></span>
							  <span class="badge bg-label-primary">To be Order-<?php echo $po_pending;?></span>
                            <span class="badge bg-label-success">Approved-<?php echo $cnt41;?></span>
							<span class="badge bg-label-warning">Pending-<?php echo $cnt42;?></span>
                          </div>
                        </div>
                        <div id="revenueGrowth"></div>
                      </div>
                    </div>
                  </div>
                </div>
				
				         <!-- Sales last year -->
                <div class="col-xl-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5 class="card-title mb-0">COSTING</h5>
                      <small class="text-muted">&nbsp;</small>
                    </div>
                    <div id="salesLastYear"></div>
                    <div class="card-body pt-0">
                      <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0"><?php echo $cnt2;?></h4>
                 
                      </div>
                    </div>
                  </div>
                </div>
				
                <!-- Sessions Last month -->
                <div class="col-xl-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5 class="card-title mb-0">SALES</h5>
                      <small class="text-muted">&nbsp;</small>
                    </div>
                    <div class="card-body">
                      <div id="sessionsLastMonth"></div>
                      <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0"><?php echo $cnt3;?></h4>
						 
                       
                      </div>
                    </div>
                  </div>
                </div>


            

             <?php if($department == '1' || $department == '6'){  ?>

                <!-- Earning Reports Tabs-->
                <div class="col-12 col-xl-12 mb-4">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-0">Menu Shortcuts</h5>
                        <small class="text-muted"></small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="earningReportsTabsId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                       
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                        <li class="nav-item">
                          <a
                            href="enquirylist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center"
                            >
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-files ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">Enquiries</h6>
                          </a>
                        </li>
						<li class="nav-item">
                          <a
                            href="orderlist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center"
                            >
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-files ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">Orders</h6>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a
                            href="action_formlist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center"
                            >
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-clock ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">T & A</h6>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a
                            href="material_resourcelist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="fa fa-inr tf-icons ti ti-package"style="font-size:18px"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">MRP</h6>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a
                            href="costinglist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="fa fa-inr menu-icon tf-icons"style="font-size:18px"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">Costing</h6>
                          </a>
                        </li>
						<li class="nav-item">
                          <a
                            href="fabric_computationlist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti-sm ti ti-shirt"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">Fab.Comp</h6>
                          </a>
                        </li>
						<li class="nav-item">
                          <a
                            href="purchaseorderlist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">PO</h6>
                          </a>
                        </li>
						<li class="nav-item">
                          <a
                            href="purchaseentrylist.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">GRN</h6>
                          </a>
                        </li>
						<li class="nav-item">
                          <a
                            href="sales_invoice_list.php"
                            class="nav-link btn active d-flex flex-column align-items-center justify-content-center">
                            <div class="badge bg-label-secondary rounded p-2">
                              <i class="ti ti-clipboard ti-sm"></i>
                            </div>
                            <h6 class="tab-widget-title mb-0 mt-2">Sales</h6>
                          </a>
                        </li>
						
				
						
                       
                      </ul>
                      <div class="tab-content p-0 ms-0 ms-sm-2">
                        <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                          <div id="earningReportsTabsOrders"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                          <div id="earningReportsTabsSales"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                          <div id="earningReportsTabsProfit"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                          <div id="earningReportsTabsIncome"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
			 <?php } ?>
                
                <!-- Browser States -->
                <div class="col-xl-4 col-md-6 mb-4" style="display:none;">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Browser States</h5>
                        <small class="text-muted">Counter April 2022</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="employeeList"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1 align-items-center">
                          <img
                            src="../assets/img/icons/brands/chrome.png"
                            alt="Chrome"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Google Chrome</h6>
                              </div>

                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">90.4%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="secondary" data-series="85"></div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1 align-items-center">
                          <img
                            src="../assets/img/icons/brands/safari.png"
                            alt="Safari"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Apple Safari</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">70.6%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="success" data-series="70"></div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1 align-items-center">
                          <img
                            src="../assets/img/icons/brands/firefox.png"
                            alt="Firefox"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Mozilla Firefox</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">35.5%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="primary" data-series="25"></div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1 align-items-center">
                          <img
                            src="../assets/img/icons/brands/opera.png"
                            alt="Opera"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Opera Mini</h6>
                              </div>

                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">80.0%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="danger" data-series="75"></div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1 align-items-center">
                          <img
                            src="../assets/img/icons/brands/edge.png"
                            alt="Edge"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Internet Explorer</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">62.2%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="info" data-series="60"></div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center">
                          <img
                            src="../assets/img/icons/brands/brave.png"
                            alt="Brave"
                            height="28"
                            class="me-3 rounded" />
                          <div class="d-flex w-100 align-items-center gap-2">
                            <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                              <div>
                                <h6 class="mb-0">Brave</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-2">
                                <h6 class="mb-0">46.3%</h6>
                              </div>
                            </div>
                            <div class="chart-progress" data-color="warning" data-series="45"></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Project Status -->
                <div class="col-12 col-xl-4 mb-4 col-md-6" style="display:none;">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="mb-0 card-title">Project Status</h5>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="projectStatusId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectStatusId">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-start">
                        <div class="badge rounded bg-label-warning p-2 me-3 rounded">
                          <i class="ti ti-currency-dollar ti-sm"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                          <div class="me-2">
                            <h6 class="mb-0">$4,3742</h6>
                            <small class="text-muted">Your Earnings</small>
                          </div>
                          <p class="mb-0 text-success">+10.2%</p>
                        </div>
                      </div>
                      <div id="projectStatusChart"></div>
                      <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Donates</h6>
                        <div class="d-flex">
                          <p class="mb-0 me-3">$756.26</p>
                          <p class="mb-0 text-danger">-139.34</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between mb-3 pb-1">
                        <h6 class="mb-0">Podcasts</h6>
                        <div class="d-flex">
                          <p class="mb-0 me-3">$2,207.03</p>
                          <p class="mb-0 text-success">+576.24</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Active Projects -->
                <div class="col-xl-4 col-md-6 mb-4" style="display:none;">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-0">Active Project</h5>
                        <small class="text-muted">Average 72% Completed</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="activeProjects"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="mb-3 pb-1 d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/laravel-logo.png"
                              alt="laravel-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">Laravel</h6>
                              <small class="text-muted">eCommerce</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-danger"
                                role="progressbar"
                                style="width: 54%"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">54%</span>
                          </div>
                        </li>
                        <li class="mb-3 pb-1 d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/figma-logo.png"
                              alt="figma-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">Figma</h6>
                              <small class="text-muted">App UI Kit</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-primary"
                                role="progressbar"
                                style="width: 86%"
                                aria-valuenow="86"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">86%</span>
                          </div>
                        </li>
                        <li class="mb-3 pb-1 d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/vue-logo.png"
                              alt="vue-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">VueJs</h6>
                              <small class="text-muted">Calendar App</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-success"
                                role="progressbar"
                                style="width: 90%"
                                aria-valuenow="90"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">90%</span>
                          </div>
                        </li>
                        <li class="mb-3 pb-1 d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/react-logo.png"
                              alt="react-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">React</h6>
                              <small class="text-muted">Dashboard</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-info"
                                role="progressbar"
                                style="width: 37%"
                                aria-valuenow="37"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">37%</span>
                          </div>
                        </li>
                        <li class="mb-3 pb-1 d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/bootstrap-logo.png"
                              alt="bootstrap-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">Bootstrap</h6>
                              <small class="text-muted">Website</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-primary"
                                role="progressbar"
                                style="width: 22%"
                                aria-valuenow="22"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">22%</span>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="d-flex w-50 align-items-center me-3">
                            <img
                              src="../assets/img/icons/brands/sketch-logo.png"
                              alt="sketch-logo"
                              class="me-3"
                              width="35" />
                            <div>
                              <h6 class="mb-0">Sketch</h6>
                              <small class="text-muted">Website Design</small>
                            </div>
                          </div>
                          <div class="d-flex flex-grow-1 align-items-center">
                            <div class="progress w-100 me-3" style="height: 8px">
                              <div
                                class="progress-bar bg-warning"
                                role="progressbar"
                                style="width: 29%"
                                aria-valuenow="29"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted">29%</span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Last Transaction -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title m-0 me-2">Recent Sales Orders</h5>
			 <?php if($department == '1'){  ?>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="teamMemberList"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
                          <a class="dropdown-item" href="orderlist.php">View More</a>
                        
                        </div>
                      </div>
			 <?php } ?>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                          <tr>
                           <th>Order&nbsp;No</th>
                            <?php if($department == '1' || $department == '6'){  ?> <th>Buyer&nbsp;Name</th><?php } ?>
                          <th>Order&nbsp;type</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						   $sql = " SELECT *,e.id as id FROM order1 e left join partymaster p on e.partyname=p.id   ORDER by e.ord_no desc LIMIT 5" ;
                         $result =mysqli_query($conn, $sql);
                                             
                         while($rows=mysqli_fetch_array($result))
                         { ?>
                          <tr>
                          
                            <td>
                              <div class="d-flex flex-column">
                                <p class="mb-0 fw-medium"><?php echo $rows['ord_no']; ?></p>
                                <small class="text-muted text-nowrap"><?php echo date('d-m-Y',strtotime($rows['date'])); ?></small>
                              </div>
                            </td>
							    <?php if($department == '1' || $department == '6'){  ?> <td><?php echo substr($rows['name'], 0, 20); ?>..</td> <?php } ?>
                            <td><span class="badge bg-label-primary" style="width:120px;"><?php echo $rows['ordertype']; ?></span></td>
                           
                          </tr>
						 <?php } ?>
						</tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Activity Timeline -->
                  <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <h5 class="card-title m-0 me-2">Recent Purchase Orders</h5>
					  <?php if($department == '1'){  ?>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="teamMemberList"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
                          <a class="dropdown-item" href="purchaseorderlist.php">View More</a>
                        
                        </div>
                      </div>
					  <?php } ?>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                          <tr>
                           <th>Order&nbsp;No</th>
                         <th>Supplier&nbsp;Name</th>
                          <th>Approval&nbsp;Status</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						  $sql = " SELECT *,b.id as id FROM purchaseorder b left join partymaster c on b.supplier=c.id ORDER by b.id desc LIMIT 5" ;
                         $result =mysqli_query($conn, $sql);
                                             
                         while($rows=mysqli_fetch_array($result))
                         { 
					  if($rows['approve']==1)
							 {
								 $status="Approved";
								 $clr="Success";
							 }
							 else
							 {
								 $status="Approval Pending";
								 $clr="Warning";
							 }?>
                          <tr>
                          
                            <td>
                              <div class="d-flex flex-column">
                                <p class="mb-0 fw-medium"><?php echo $rows['purchaseno']; ?></p>
                                <small class="text-muted text-nowrap"><?php echo date('d-m-Y',strtotime($rows['date'])); ?></small>
                              </div>
                            </td>
							 <td><?php echo substr($rows['name'], 0, 20); ?>..</td> 
                            <td><span class="badge bg-label-<?php echo $clr;?>" style="width:150px;"><?php echo $status; ?></span></td>
                           
                          </tr>
						 <?php } ?>
						</tbody>
                      </table>
                    </div>
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

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-crm.js"></script>
   
  </body>