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

          
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->

            <div id="mydiv" class="container-xxl flex-grow-1 container-p-y">
             
              <div class="card mb-4">
                <h5 class="card-header">DOCUMENTS EXBID</h5>
                <div class="card-body text-nowrap table-responsive">
                <table class="  table table-bordered">
                    <thead>
                    <tr >
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv&nbsp;No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Doc&nbsp;Sub&nbsp;Date</th>
						 <th >Bank&nbsp;Ref</th>
					    <th >Inv&nbsp;Amt</th>
						 <th >Currency</th>
						 <th >INR&nbsp;Value</th>
						  <th >Acceptance&nbsp;Date</th>
						   <th >FC&nbsp;Details</th>
						     <th >ETA</th>
	</tr>
                    </thead>
                    <tbody>
                        
                   <td colspan="9" style="text-align:center"><strong>TOTAL :</strong></td>  
                   <td></td>  
                </tbody>
                  </table>
</div>
              </div>
              <div class="card mb-4">
                <h5 class="card-header">DOCUMENTS SENT ON COLLECTION BASIS</h5>
                <div class="card-body text-nowrap table-responsive">
                <table class=" table table-bordered " >
                <thead >
                  <tr >
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv&nbsp;No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Doc&nbsp;Sub&nbsp;Date</th>
						 <th >Bank&nbsp;Ref</th>
					    <th >Inv&nbsp;Amt</th>
						<th >Currency</th>
						 <th >INR&nbsp;Value</th>
						  <th >Acceptance&nbsp;Date</th>
						   <th >FC&nbsp;Details</th>
						   <th >ETA</th>
	</tr>
                </thead>
                <tbody>
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
            </tbody>
                <tbody>
               <td colspan="9" style="text-align:center"><strong>TOTAL :</strong></td>      
               <td></td>      
              
            </tbody>
             </table>
</div>
              </div>
              <div class="card mb-4">
                <h5 class="card-header">DOCUMENTS IN HAND</h5>
                <div class="card-body text-nowrap table-responsive">
                <table  class=" table table-bordered " >
                <thead >
                  <tr >
                    <th >S.No</th>
					<th>Date</th>
                    <th >Inv&nbsp;No.</th>
					  <th >Buyer</th>
					   <th >Tenor</th>
					    <th >Inv&nbsp;Amt</th>
						<th >Currency</th>
						 <th >INR&nbsp;Value</th>
						 <th >ETA</th>
	</tr>
                </thead>
                <tbody>
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               <td></td>      
               
            </tbody>
                <tbody>
               <td colspan="7" style="text-align:center"><strong>TOTAL :</strong></td>      
               <td></td>      
              
            </tbody>
</table> 


<div class="col-xs-12">
              
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4">Print</button>
<button type="submit" class="btn btn-primary mt-4">Send</button>
<button class="btn btn-success mt-4" onclick="tableToExcel('mydiv', 'MEIS REPORT')">Export To Excel</button>
            </div>
                </div>
              </div>

     

            
            </div>
            <!-- / Content -->

          

            <div class="content-backdrop fade"></div>
          </div> </div>
          <!-- Content wrapper -->
         
          
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
function delfabric(id) {

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
  window.location='fabriclist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delfabric.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>