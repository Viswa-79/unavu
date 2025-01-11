<?php include 'config.php' ;?>
<?php include 'session.php';?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="dashboard.php" class="app-brand-link">
              <span >
                <a href="/">
                <img width="45" height="45" margin-left="none" fill="none"
                  
                  src="../assets/img/favicon/logo3.png"
                  />
              </a>
              </span>
              <span ><img width="140" height="30" margin-left="none"
                  
                  src="../assets/img/favicon/log6.png"
                  /></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
			
          </div>
			
          <!-- <div class="menu-inner-shadow"></div>
<span class="badge bg-label-primary" id=salute ></span> -->
          <ul class="menu-inner py-1">
          
		   <br>
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
               
              </a>
           
            </li>
			     <!-- Masters -->
          

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Masters</span>
            </li>
			   <?php
             if($department == '1' ||  $department == '6'){
              ?>
           
            <li class="menu-item">
              <a href="master_page.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Masters">Masters</div>
              </a>

            </li>
			 <?php } 
             if($department == '2' || $department == '3' || $department == '5'){
              ?>
	
           
            <li class="menu-item">
              <a href="party_master.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Party Master">Party Master</div>
              </a>

            </li><?php } ?>
				     <!-- Transactions -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Transactions</span>
            </li>

            <?php
             if($department == '1' || $department == '6'){
              ?>
              <!-- Front Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Order">Order</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="enquiry.php" class="menu-link" >
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sampleenquiry.php" class="menu-link" >
                    <div data-i18n="Sample Enquiry">Sample Enquiry</div>
                  </a>
                </li>
               
                <li class="menu-item">
                  <a href="order_confirm.php" class="menu-link" >
                    <div data-i18n="Order - Madeups">Order - Madeups</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="garments.php" class="menu-link" >
                    <div data-i18n="Order - Garments">Order - Garments</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sample.php" class="menu-link" >
                    <div data-i18n="Sample">Sample</div>
                  </a>
                </li>
               </ul>
            </li>
			
				   <!--Time & Action-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-clock"></i>
                <div data-i18n="Time & Action">Time & Action</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="action_form.php" class="menu-link" >
                    <div data-i18n="Time & Action">Time & Action</div>
                  </a>
                </li>
               </ul>
            </li>
			
					   <!--Costing-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fa fa-inr" style="font-size:20px"></i>
                <div data-i18n="Costing">Costing</div>
              </a>
              <ul class="menu-sub">
			  
                <li class="menu-item">
                  <a href="costing.php" class="menu-link" >
                    <div data-i18n="Costing">Costing</div>
                  </a>
                </li>
               </ul>
            </li>
			 <?php
			 }
             if($department == '1' || $department == '5' || $department == '6'){
              ?>
			<!-- Front Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout"></i>
                <div data-i18n="Planning">Planning</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="fabric.php" class="menu-link" >
                    <div data-i18n="Fabric Plan">Fabric Plan</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="fabric_computation.php" class="menu-link" >
                    <div data-i18n="Fabric Computation">Fabric Computation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stitching.php" class="menu-link" >
                    <div data-i18n="Stitching Plan">Stitching Plan</div>
                  </a>
                </li>
				<li class="menu-item">
                    <a href="material_resource.php" class="menu-link" >
                        <div data-i18n="Material Resource Plan">Material Resource Plan</div>
                    </a>
                </li>
            
                <li class="menu-item">
                  <a href="printing.php" class="menu-link" >
                    <div data-i18n="Printing Plan">Printing Plan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="packing.php" class="menu-link" >
                    <div data-i18n="Packing Plan">Packing Plan</div>
                  </a>
                </li>
				
               </ul>
            </li>
		
<?php  }
             if($department == '1' || $department == '3' ||  $department == '5' || $department == '6'){
              ?>
            <!--Purchase-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Stores">Stores</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="purchase_order1.php" class="menu-link" >
                    <div data-i18n="Purchase Order">Purchase Order</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="purchase_orderlist.php" class="menu-link" >
                    <div data-i18n="Purchase Entry">Purchase Entry</div>
                  </a>
              </li>
              <li class="menu-item">
                <a href="stockoutward.php" class="menu-link" >
                  <div data-i18n="Accessories Outward">Accessories Outward</div>
                </a>
              </li>
              <!-- <li class="menu-item">
                  <a href="stockreturn.php" class="menu-link" >
                    <div data-i18n="Accessories Return">Accessories Return</div>
                  </a>
                </li> -->
               </ul>
            </li>
		
		
				<?php
             }
             if($department == '2' ||  $department == '5' || $department == '6')
			 {
            
            ?>
			   <!--Fabric & Inward/Outward-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shirt"></i>
                <div data-i18n="Fabric">Fabric</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="fabric_inward.php" class="menu-link" >
                    <div data-i18n="Fabric Inward">Fabric Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_outward.php" class="menu-link" >
                    <div data-i18n="Fabric Outward">Fabric Outward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_stock_inward.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Inward">Fabric Stock Inward</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="fabric_stock.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Transfer">Fabric Stock Transfer</div>
                  </a>
                </li>
	
             
               </ul>
            </li>
			
			
            <?php
       }
             if($department =='5' || $department == '6'){
              ?>
			
			   <!--Fabric Processing-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-repeat"></i>
                <div data-i18n="Processing">Processing</div>
              </a>
              <ul class="menu-sub">
              
				<li class="menu-item">
                  <a href="process_po.php" class="menu-link" >
                    <div data-i18n="Process Po">Process Po</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="process_outward.php" class="menu-link" >
                    <div data-i18n="Process Outward">Process Outward</div>
                  </a>
                </li>
                	<li class="menu-item">
                  <a href="process_inward.php" class="menu-link" >
                    <div data-i18n="Process Inward">Process Inward</div>
                  </a>
                </li>
              
             
               </ul>
            </li>
            <?php
             }
             if($department == '2' || $department == '6'){
              ?>
			
			 <!--Cutting-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-cut"></i>
                <div data-i18n="Cutting">Cutting</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="cutting_inward.php" class="menu-link" >
                    <div data-i18n="Cutting Inward">Cutting Inward</div>
                  </a>
                </li>
               
                <li class="menu-item">
                  <a href="cutting.php" class="menu-link" >
                    <div data-i18n="Cutting">Cutting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="cutpanel_outward.php" class="menu-link" >
                    <div data-i18n="Cutpanel Outward">Cutpanel Outward</div>
                  </a>
                </li>
			    <!-- <li class="menu-item">
                  <a href="cutpanel_inward.php" class="menu-link" >
                    <div data-i18n="Cutpanel Inward">Cutpanel Return</div>
                  </a>
                </li> -->
				</ul>
            </li>
			<?php
       } 
       if($department == '4' || $department == '6'){
        ?>
			<!--Printing Inward/Outward-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-printer"></i>
                <div data-i18n="Printing">Printing</div>
              </a>
              <ul class="menu-sub">
               
                <li class="menu-item">
                  <a href="printing_inward.php" class="menu-link" >
                    <div data-i18n="Printing Inward">Printing Inward</div>
                  </a>
                </li>
			    <li class="menu-item">
                  <a href="printing_outward.php" class="menu-link" >
                    <div data-i18n="Printing Outward">Printing Outward</div>
                  </a>
                </li>
				</ul>
            </li>
            <?php
       }
             if($department == '2' || $department == '6'){
              ?>
		    <!--Sewing Inward/Outward-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Sewing">Sewing</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="sewing_inward.php" class="menu-link" >
                    <div data-i18n="Sewing Inward">Sewing Inward</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="sewing_outward.php" class="menu-link" >
                    <div data-i18n="Sewing Outward">Sewing Outward</div>
                  </a>
                </li>   
         
				</ul>
            </li>
			
		    <!--Checking Inward/Outward-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-reload"></i>
                <div data-i18n="Checking">Checking</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="checking_inward.php" class="menu-link" >
                    <div data-i18n="Checking Inward">Checking Inward</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="checking_outward.php" class="menu-link" >
                    <div data-i18n="Checking Outward">Checking Outward</div>
                  </a>
                </li>   
                <li class="menu-item">
                  <a href="ocr_entry.php" class="menu-link" >
                    <div data-i18n="OCR Entry">OCR Entry</div>
                  </a>
                </li>   
				</ul>
            </li>
			
            
			<!--Packing Inward/Outward-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Packing">Packing</div>
              </a>
              <ul class="menu-sub">
               
              <li class="menu-item">
                  <a href="packing_inward.php" class="menu-link" >
                    <div data-i18n="Packing Inward">Packing Inward</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="packing_entry.php" class="menu-link" >
                    <div data-i18n="Packing Entry">Packing Entry</div>
                  </a>
                </li>
			  </ul>
            </li>
        <?php
			 }
 if($department == '1' || $department == '6')
			 { ?>
			  <!--Invoice-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-clipboard"></i>
                <div data-i18n="Invoice">Invoice</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="sales_invoice.php" class="menu-link" >
                    <div data-i18n="Export Invoice">Export Invoice</div>
                  </a>
                </li>
           
			
               </ul>
            </li>
          <?php } ?>  
          
         
					<!--Reports-->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>
	<?php
          
             if($department == '2'){
              ?>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-receipt"></i>
                <div data-i18n="Order Reports">Order Reports</div>
              </a>
              <ul class="menu-sub">
            <li class="menu-item">
                  <a href="order_history_report.php" class="menu-link" >
                    <div data-i18n="Order History Report">Order History Report</div>
                  </a>
                </li>

            <li class="menu-item">
                  <a href="order_tracking_report.php" class="menu-link" >
                    <div data-i18n="Order Tracking Report">Order Tracking Report</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="ord_complete_report.php" class="menu-link" >
                    <div data-i18n="OCR Report">OCR Report</div>
                  </a>
                </li>
                </ul>
			</li>
                <?php }
                ?> 
			<?php
            // echo $department;
             if($department == '1' || $department == '6'){
              ?>
           
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-receipt"></i>
                <div data-i18n="Order Reports">Order Reports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="sales_report.php" class="menu-link" >
                    <div data-i18n="Sales Order">Sales Order</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="ord_pending_report.php" class="menu-link" >
                    <div data-i18n="Order Pending">Order Pending</div>
                  </a>
                </li>
				
                <li class="menu-item">
                  <a href="order_tracking_report.php" class="menu-link" >
                    <div data-i18n="Order Tracking Report">Order Tracking Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pre_production_report.php" class="menu-link" >
                    <div data-i18n="Pre Production Report">Pre Production Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="order_history_report.php" class="menu-link" >
                    <div data-i18n="Order History Report">Order History Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="enquiry_report.php" class="menu-link" >
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sample_report.php" class="menu-link" >
                    <div data-i18n="Sample">Sample</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ord_complete_report.php" class="menu-link" >
                    <div data-i18n="OCR Report">OCR Report</div>
                  </a>
                </li>
                <!-- <li class="menu-item">
                  <a href="complaint_report.php" class="menu-link" >
                    <div data-i18n="Complaint Report">Complaint Report</div>
                  </a>
                </li> -->
              
               
				</ul>
			</li>
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Planning Reports">Planning Reports</div>
              </a>
              <ul class="menu-sub">
			
                <li class="menu-item">
                  <a href="fabric_plan_report.php" class="menu-link" >
                    <div data-i18n="Fabric Plan">Fabric Plan</div>
                  </a>
                </li>
				  <li class="menu-item">
                  <a href="mrp_report.php" class="menu-link" >
                    <div data-i18n="MRP Report">MRP Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stitching_report.php" class="menu-link" >
                    <div data-i18n="Stitching">Stitching</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="printing_report.php" class="menu-link" >
                    <div data-i18n="Printing">Printing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="packing_report.php" class="menu-link" >
                    <div data-i18n="Packing">Packing</div>
                  </a>
                </li>
			</ul>
			</li>
		<?php
             }
             ?>
             <?php
            if($department == '1' || $department == '3' || $department == '5'  || $department == '6'){
             ?>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Purchase Reports">Purchase Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="pur_ord_report.php" class="menu-link" >
                    <div data-i18n="Purchase Order">Purchase Order</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pur_entry_report.php" class="menu-link" >
                    <div data-i18n="Purchase Entry">Purchase Entry</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stock_inward_report.php" class="menu-link" >
                    <div data-i18n="Stock Inward">Stock Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stock_out_report.php" class="menu-link" >
                    <div data-i18n="Stock Outward">Stock Outward</div>
                  </a>
                </li>
              </ul>
            </li>
			  <?php
			}
            if($department == '1' || $department == '2' || $department == '5' || $department == '6'){
             ?>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shirt"></i>
                <div data-i18n="Fabric Reports">Fabric Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="fabric_inward_report.php" class="menu-link" >
                    <div data-i18n="Fabric Inward">Fabric Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_outward_report.php" class="menu-link" >
                    <div data-i18n="Fabric Outward">Fabric Outward</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="process_outward_report.php" class="menu-link" >
                    <div data-i18n="Process Outward">Process Outward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="process_inward_report.php" class="menu-link" >
                    <div data-i18n="Process Inward">Process Inward</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="ledger.php" class="menu-link" >
                    <div data-i18n="Process Ledger Report">Process Ledger Report</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="stock_transfer_report.php" class="menu-link" >
                    <div data-i18n="Stock Transfer Report">Stock Transfer Report</div>
                  </a>
                </li>
               
              </ul>
            </li>
			  <?php
			}
            if($department == '1' || $department == '2' || $department == '3' || $department == '5' || $department == '6'){
             ?>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-database"></i>
                <div data-i18n="Stock Reports">Stock Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="stockreport.php" class="menu-link" >
                    <div data-i18n="Accessories Stock">Accessories Stock</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="qualityreport.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Report">Fabric Stock Report</div>
                  </a>
                </li>
                
               
              </ul>
            </li>
      <?php
             }
             ?>
			  <?php
			
            if($department == '1' || $department == '2' || $department == '3' || $department == '5' || $department == '6'|| $department == '4'){
             ?>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-arrows-vertical"></i>
                <div data-i18n="I O Reports">I O Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="inward_report.php" class="menu-link" >
                    <div data-i18n="Inward Report">Inward Report</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="outward_report.php" class="menu-link" >
                    <div data-i18n="Outward Report">Outward Report</div>
                  </a>
                </li>
                
               
              </ul>
            </li>
      <?php
             }
             ?>
             <?php
              if($department == '1' || $department == '6'){
                ?>
				<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Document Reports">Document Reports</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="sales_invoice_report.php" class="menu-link" >
                    <div data-i18n="Sales Invoice Report">Sales Invoice Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sales_register_report.php" class="menu-link" >
                    <div data-i18n="Sales Register Report">Sales Register Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="drawback.php" class="menu-link" >
                    <div data-i18n="Drawback Report"> Drawback Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="rodtep_rep.php" class="menu-link" >
                    <div data-i18n="RODTEP Report">RODTEP Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="rosctl.php" class="menu-link" >
                    <div data-i18n="ROSCTL Report">ROSCTL Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="export_statement_rep.php" class="menu-link" >
                    <div data-i18n="Export Statement">Export Statement</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ecgc_report.php" class="menu-link" >
                    <div data-i18n="ECGC Report">ECGC Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="rex_report.php" class="menu-link" >
                    <div data-i18n="Rex Report">Rex Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="brc_rep.php" class="menu-link" >
                    <div data-i18n="BRC Report">BRC Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="despatch_rep.php" class="menu-link" >
                    <div data-i18n="Despatch Report">Despatch Report</div>
                  </a>
                </li>
                
               
                <li class="menu-item">
                  <a href="shipment_report.php" class="menu-link" >
                    <div data-i18n="Shipment Report">Shipment Report</div>
                  </a>
                </li>
               
              </ul>
            </li>
			<!--<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
            <a href="calc.php" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
</li>
</ul>
</li>-->
    
        <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Settings</span>
            </li>
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="usermaster.php" class="menu-link">
                    <div data-i18n="List">List</div>
                  </a>
                </li>
              </ul>
            </li>
             <li class="menu-item">
              <a href="https://truezor.com/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
           
            </li>
			  <?php } ?>
			  <!-- Report end  -->

			  <!-- Settings -->
            
           
            
         
          </ul>
        </aside>
		
		

<script>function clock(){var date=new Date();var weekday=date.getDay();var year=date.getYear();var month=date.getMonth();var day=date.getDate();var hour=date.getHours();var minute=date.getMinutes();var second=date.getSeconds();var days=new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" );var months=new Array("January","February","March","April","May","June","July","August","September","October","November","december");var monthname=months[month];var dayname=days[weekday];var ap;var sal;if(year<1000){year=year+1900} if(hour<12 &&minute<60 &&second<60){sal='Hi, Good Morning';} if(hour>=12 &&hour<17 &&minute<60 &&second<60 ){sal='Hi, Good Afternoon';} if(hour>=17 &&hour<24 &&minute<60 &&second<60 ){sal='Hi, Good Evening';} if(hour>=12){hour=hour-12;ap='PM';}else{ap='AM';} if(minute<10){minute="0"+minute} if(second<10){second="0"+second};

document.getElementById('salute').innerHTML=sal;setTimeout("clock()",60000)}

window.onload=function(){clock();

}
window.setInterval(function(){
 clock();
}, 1001);
// Widget Code by https://widgetcodes.com/
</script>