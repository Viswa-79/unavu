<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>
<script>
function ee2(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

}

</script>
<script>
function get_product_details(id,value) {
//alert("hello");
  var c=id.substr(11);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#price'+c).val(data.price);
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<?php
		   $fg1="select max(receipt) as id from stockinward";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>

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
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Stock List</button>
                      <a href="stockinwardlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    
                      <h4 class="mb-0">Stock Inward</h4>
                     
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM stockinward WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3 mt-2">
                          <div class="col-md-4">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Receipt&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="receipt"
                              name="receipt"
                              readonly
                              value="<?php echo $wz1['receipt']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['supplier']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                        </div>
                         
                    </div><br><hr>
                      <div class="card mb-2 mt-4">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>PARTICULARS</th> 
                                  <th>QTY</th>
                                  <th>UNIT</th>
                                  <th>PRICE</th>
                                  <th>GST&nbsp;%</th>
                                  <th>AMOUNT</TH>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM stockinward1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

                <td style="padding: 0.3rem">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM product_master order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo   $rw1['productname'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>        
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    style="text-align:right"
                                    class="form-control"
                                    id="quantity"
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                <select name="unit[]" id="unit" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM unit_master order by unit asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>             
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    value="<?php echo $rw['price']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="gstno<?php echo $i;?>"
                                    name="gstno[]"
                                    value="<?php echo $rw['gstno']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="amount"
                                    name="amount[]"
                                    value="<?php echo $rw['amount']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
?>              
                              </tbody>
                            </table>
                          </div>
                
              </div><br><hr>
              <div class="row g-3 mt-2">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Sub&nbsp;Total</label>
                            <input
                              type="text"
                              id="subtotal"
                              style="text-align:right"
                              name="subtotal"
                              value="<?php echo $wz1['subtotal']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges</label>
                            <input
                              type="text"
                              id="othercharges"
                              style="text-align:right"
                              name="othercharges"
                              value="<?php echo $wz1['othercharges']; ?>"
                              class="form-control"/>
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Net&nbsp;Total</label>
                            <input
                              type="text"
                              id="nettotal"
                              style="text-align:right"
                              name="nettotal"
                              value="<?php echo $wz1['nettotal']; ?>"
                              class="form-control"/>
                          </div>
                          
                          
</div>


 </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-secondary btn-prev" href="stockinwardlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>    
                        </div>
                        </form>
                   
               
            </div>
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

  $cid = $_POST['cid'];
  $receipt = $_POST['receipt'];
  $date = $_POST['date'];
  $supplier = $_POST['supplier'];
  $subtotal = $_POST['subtotal'];
  $othercharges = $_POST['othercharges'];
  $nettotal = $_POST['nettotal'];


   $sql = "UPDATE stockinward SET receipt='$receipt',date='$date',supplier='$supplier',subtotal='$subtotal',othercharges='$othercharges',nettotal='$nettotal' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['quantity'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $productname = $_POST['productname'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
    $gstno = $_POST['gstno'][$key];
    $amount = $_POST['amount'][$key];

    if ($quantity != '') {
     $sql1 = "UPDATE stockinward1 SET productname='$productname',quantity='$quantity',unit='$unit',price='$price',gstno='$gstno',amount='$amount' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Stock Inward Updated Successfully');window.location='stockinwardlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


