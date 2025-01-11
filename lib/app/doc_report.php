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
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Documents Exbid</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="#.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  Tools
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item"> <label ><input type="search"
                       class="form-control"
                       placeholder ="Search"
                       
                       aria-controls="DataTables_Table_0"  >
                       
                      </label></a>
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>
 <br>
          <div class="card">
            <div class="col-xs-12 table-responsive" id="mydiv" style="height:650px;overflow:auto;">
            <h2 class="page-header">
                <small class="text-align: right">Date: <?php echo date('d/m/Y');?></small>
              </h2>

			    <h5 style="padding-left:10px" class="page-header">
            DOCUMENTS EXBID</h5>
			  <hr>
			     <table class="table table-bordered table-striped  table-hover" border="1px solid black" style="border-collapse:collapse;border:1px solid black;" >
                <thead class="thead-inverse">
                  <tr style="border:1px solid black;">
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Doc Sub Date</th>
						 <th >Bank Ref</th>
					    <th >Inv Amt</th>
						 <th >Currency</th>
						 <th >INR Value</th>
						  <th >Acceptance Date</th>
						   <th >FC Details</th>
						     <th >ETA</th>
	</tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td align="center"></td>
					<td></td>
                   <td align="center"></td>
				   
				   <td></td>
				    <td></td>
					<td></td>
					<td></td>
					 <td align="right"></td>
					 <td align="right"></td>
					  <td align="right"></td>
		<td></td>
		<td></td>
	
		<td></td>
				  
             
                  </tr>
             
                 
		   <tr style="font-size:18px;">
                    <td colspan="9" align="center"><strong><?php echo "Total";?></strong></td>
                <td align="right"><strong></strong></td>
 
          <td colspan="3" align="center"></td>
                  </tr>
                </tbody>
              </table>
			  
		
			    <h5 style="padding-left:10px" class="page-header">
            DOCUMENTS SENT ON COLLECTION BASIS</h5>
			  
			     <table class="table table-bordered table-striped  table-hover" border="1px solid black" style="border-collapse:collapse;border:1px solid black;" >
                <thead class="thead-inverse">
                  <tr style="border:1px solid black;">
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Doc Sub Date</th>
						 <th >Bank Ref</th>
					    <th >Inv Amt</th>
						<th >Currency</th>
						 <th >INR Value</th>
						  <th >Acceptance Date</th>
						   <th >FC Details</th>
						   <th >ETA</th>
	</tr>
                </thead>
                <tbody>
       
                  <tr>
                    <td align="center"><?php echo $sno;?></td>
					<td><?php echo $date1;?></td>
                   <td align="center"><a target="_blank" href="salesinvoice_details.php?cid=<?php echo base64_encode($row['cid']);?>" target="blank" ><?php echo $row['invoiceno'];?></a></td>
				   
				   <td><?php echo $row['name'];?></td>
				    <td><?php echo $row['terms'];?></td>
					<td><?php echo $date2;?></td>
					<td><?php echo $row['bankrefno'];?></td>
					 <td align="right"><?php echo $row['netamt'];?></td>
					 <td align="right"><?php echo $row['currency'];?></td>
					  <td align="right"><?php echo $row['invinrvalue'];?></td>
		<td><?php echo $date3;?></td>
		<td><?php echo $row['fcdetails'];?></td>
	
		<td><?php echo $date4;?></td>
				  
             
                  </tr>
            
                 
                 
		   <tr style="font-size:18px;">
                    <td colspan="9" align="center"><strong><?php echo "Total";?></strong></td>
                <td align="right"><strong><?php echo $tamt1;?></strong></td>
 
          <td colspan="3" align="center"></td>
                  </tr>
                </tbody>
              </table>
			  
			    <h5 style="padding-left:10px;" class="page-header">
            DOCUMENTS IN HAND</h5>
			  
              <table class="table table-bordered table-striped  table-hover" border="1px solid black" style="border-collapse:collapse;border:1px solid black;" >
                <thead class="thead-inverse">
                  <tr style="border:1px solid black;">
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Inv Amt</th>
						<th >Currency</th>
						 <th >INR Value</th>
						 <th >ETA</th>
	</tr>
                </thead>
                <tbody>
              
                  <tr>
                    <td align="center"><?php echo $sno;?></td>
					<td><?php echo $date1;?></td>
                   <td align="center"><a target="_blank" href="salesinvoice_details.php?cid=<?php echo base64_encode($row['cid']);?>" target="blank" ><?php echo $row['invoiceno'];?></a></td>
				   
				   <td><?php echo $row['name'];?></td>
				    <td><?php echo $row['terms'];?></td>
					 <td align="right"><?php echo $row['netamt'];?></td>
					  <td align="right"><?php echo $row['currency'];?></td>
					  <td align="right"><?php echo $row['invinrvalue'];?></td>
		
				  <td><?php echo $date4;?></td>
             
                  </tr>
              
                 
                 
		   <tr style="font-size:18px;">
                    <td colspan="7" align="center"><strong><?php echo "Total";?></strong></td>
                <td align="right"><strong><?php echo $tamt;?></strong></td>
 <td></td>
      
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
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


<script>
function delpurchaseorder(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
  var cid=document.getElementById('cid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='purchaseorderlist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delpurchaseorder.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>