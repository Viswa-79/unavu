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
            
           
              <!-- Complex Headers -->
              <div class="card">
                <h5 class="card-header" style="padding-bottom: 0px;"> DOCUMENTS EXBID</h5><hr>
                <div class=" text-nowrap table-responsive">
                  <table class=" text-nowrap table-responsive table table-bordered">
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
                  <br>
                  <h5 class="card-header" style="padding-bottom: 0px;">DOCUMENTS SENT ON COLLECTION BASIS</h5><hr>
                  
			     <table class=" table table-bordered table-responsive" >
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
             <br>
             <h5 class="card-header"style="padding-bottom: 0px;">DOCUMENTS IN HAND</h5><hr>
             <table  class=" table table-bordered table-responsive" >
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
                </div>
              </div> 
            </div>         

         
            <div class="content-backdrop fade"></div>
          </div> </div>
          
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
  
  $sq="select max(id) as id from fabric";
  $res = mysqli_query($conn,$sq);
  $rw = mysqli_fetch_array($res);
  $cid=$rw['id'];

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