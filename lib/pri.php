<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(5));
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
function get_item_details(id,value) {
//alert("hello");
  var c=id.substr(6);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#itemdesc'+c).val(data.descr);
$('#label'+c).val(data.label);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#clwidth'+c).val(data.clwidth);					
$('#size'+c).val(data.size);
$('#unit'+c).val(data.unit);
$('#pack'+c).val(data.pack);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php"; ?>
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
          <?php
		  $f1="select max(id) as id from enquiry";
		  $f2=mysqli_query($conn,$f1);
		  $f3=mysqli_fetch_object($f2);
		  $f4=$f3->id;
          $cid='SI0'.$f4;
		  
		   $fg1="select max(enq_no) as id from enquiry";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-info">Enquiry</button>
                      <a href="enquirylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Enquiry
                          </a>
                    </div>

                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                  
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ENQUIRY</span>
                            <span class="bs-stepper-subtitle">Basic info for the Order</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#fabric_process" >
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ITEM DETAILS</span>
                            <span class="bs-stepper-subtitle">Style Details</span>
                          </span>
                        </button>
                      </div><div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#loi">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DOCUMENT UPLOAD</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
                          </span>
                        </button>
                      </div>
                       
                    <!--  <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>  
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Time & Action</span>
                            <span class="bs-stepper-subtitle">Time allotment for the Process.</span>
                          </span>
                        </button>
                      </div> -->
                    </div>

                    
                    <div class="bs-stepper-content">
                      <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">

                          <label class="form-label" for="ecommerce-product-barcode">Enquiry No.</label>
                          <input
                            type="text"
                            class="form-control"
                            id="enq_no"
                            placeholder=""
                            name="enq_no"
                            value="<?php echo $enq; ?>"
                            readonly
                            aria-label="Product barcode" />  
                             </div>
                          <div class="col-md-2">
                          <label class="form-label" for="formtabs-country">Ref No</label>
                              <input
                              type="text"
                              class="form-control"
                              id="partyref"
                              placeholder=""
                              name="partyref"
                              aria-label="Product barcode" />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="formtabs-country">Date</label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo date("Y-m-d");?>"
                              aria-label="Product barcode" />
                            </div>
                         <!-- <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Party Name</label>
                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
          
                <option value="Box">Yes</option>
                 <option value="Box">No</option>
                 
                 
             </select>
                          </div> -->
                          <div class="col-md-2">
                          <label class="form-label" for="ecommerce-product-barcode">Party Name</label>
                            <select name="partyname" id="partyname" class="select2 form-select" data-allow-clear="true" required>
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
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Currency</label>
                            <select name="currency" id="currency" class="select2 form-select" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM currency order by currency asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>

                          <div class="col-md-2">
                          <label class="form-label" for="ecommerce-product-barcode">Type</label>
                            <select name="ordertype" id="ordertype" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Fabrics">Fabrics </option>
                                <option value="Medeups">Medeups</option>
                                
                              </select>
                          </div>
                          
                        </div>
                         <br>
                     
              <div class="row">
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Cartoon Box size</strong></label>
                          <textarea
                            class="form-control"
                            id="boxsize"
                            name="boxsize"
                            rows="3"></textarea>
                        </div>
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Remarks</strong></label>
                          <textarea
                            class="form-control"
                            id="remarks"
                            name="remarks"
                            rows="3"></textarea>
                        </div>
              </div>
                       <br>
                      
                            <div class="table-responsive" >
                    
                            
                             <div class="col-12 d-flex justify-content-between">
                               <a href="dashboard.php" class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Home</span>
                              </a>
                              <button class="btn btn-primary btn-next" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            
                            </div>
                       </div> </div>
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="card">
                        <div class="table-responsive">
                            <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Item&nbsp;No</th>
                                  <th>Item&nbsp;Description</th>
                                  <th>Label/Handtag</th>
                                  <th>Print</th> 
                                  <th>Quality</th>
                                  <th>Size</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  <th>Price</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                                   <td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:100px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                      name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i;?>"
                                name="unit[]"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    step="0.01"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                name="price[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                             <div align="center"><?php echo $sno;?></div>
                </td>
                                 
                                   <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:100px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                         name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                   name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                   name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                   name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                   name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                   name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i;?>"
                                   name="unit[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    step="0.01"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                   name="price[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                     
                                </tr>          
<?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
                
              </div>
                          <br><div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>    
                        </div>
                        
                        <!-- Account Details -->
                        <div id="loi" class="content">
                         <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            alt="wizard-create-deal"
                            data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png"
                            width="650"
                            
                            class="img-fluid" />
                        </div>
                            
                           <br> 
                          <div class="row g-3">
                          
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 1</label>
                        <input class="form-control" type="file" id="file1" name="doct1" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 2</label>
                        <input class="form-control" type="file" id="file2" name="doct2" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 3</label>
                        <input class="form-control" type="file" id="file3" name="doct3" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 4</label>
                        <input class="form-control" type="file" id="file4" name="doct4" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-dark btn-prev" disabled>
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                             
                              <button class="btn btn-success" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span>
                              </button>
                            </div>
                          </div>  
                        </div>
                       
                    
                        </form>
                    </div>
                  </div>
                </div>
               
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
</html>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>


<?php
if (isset($_POST['submit'])) {


 
  $enq_no = $_POST['enq_no'];
  $partyref = $_POST['partyref'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $currency = $_POST['currency'];
  $ordertype = $_POST['ordertype'];
  $boxsize = $_POST['boxsize'];
  $remarks = $_POST['remarks'];

  if ($partyref != '') {
    $sql = "INSERT into enquiry (enq_no,partyref,date,partyname,currency,ordertype,boxsize,remarks) 
 values ('$enq_no','$partyref','$date','$partyname','$currency','$ordertype','$boxsize','$remarks')";
    $result = mysqli_query($conn, $sql);
  }

  $sq="select max(id) as id from enquiry";
  $res = mysqli_query($conn,$sq);
  $rw = mysqli_fetch_array($res);
  $cid=$rw['id'];

  foreach ($_POST['itemdesc'] as $key => $val) {
    
    

    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $label = $_POST['label'][$key];
    $print = $_POST['print'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
   
    if ($itemdesc != '') {
      $sql = "INSERT into enquiry1 (itemno,cid,itemdesc,label,print,quality,size,quantity,unit,price) 
 values ('$itemno','$cid','$itemdesc','$label','$print','$quality','$size','$quantity','$unit','$price')";
      $result = mysqli_query($conn, $sql);
    }
  }

    $p1 = $_FILES['doct1']['name'];
    $p_tmp1 = $_FILES['doct1']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  
    $p2 = $_FILES['doct2']['name'];
    $p_tmp2 = $_FILES['doct2']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
    $p3 = $_FILES['doct3']['name'];
    $p_tmp3 = $_FILES['doct3']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
  
    $p4 = $_FILES['doct4']['name'];
    $p_tmp4 = $_FILES['doct4']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
    if ($p2 != '') {
    $sql = "insert into enquiry2 (cid,doct1,doct2,doct3,doct4) values('$cid','$p1','$p2','$p3','$p4')";
    $result = mysqli_query($conn, $sql);
    }

  if ($result) {

  echo "<script>alert('Enquiry Registered successfully');window.location='enquiry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
