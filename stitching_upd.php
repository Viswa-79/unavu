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
function get_item_details(id,value) {
  var c=id.substr(6);
  
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#pono'+c).val(data.pono);  
$('#itemdesc'+c).val(data.descr);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#quantity'+c).val(data.quantity);
$('#unit1'+c).val(data.unit);
$('#pack'+c).val(data.pack);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
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
                
            
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Stitching</button>
                      <a href="stitchinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Stitching
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                   
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">STITCHING INSTRUCTION</span>
                            <span class="bs-stepper-subtitle">Basic info for the Order</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#loi">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DOCUMENT UPLOAD</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
                          </span>
                        </button>
                      </div>
                    </div> 
                    <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>

                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                         <?php
                              $sql4 = " SELECT * FROM stitching WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <div id="order_details" class="content">
                          <div class="row g-3">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                              <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="book"
                              placeholder=""
                              name="book"
                              value="<?php echo $wz1['book']; ?>"
                              readonly
                              aria-label="Product barcode" />                            
                          </div>
                          
                              <div class="col-md-2">
                              <label class="form-label" for="formtabs-country">Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo $wz1['date']; ?>"

                              aria-label="Product barcode" />
                            </div>
                            <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              value="<?php echo $wz1['orderno']; ?>"

                              class="form-control"/>
                          </div>
                              
                          <div class="col-md-2">
                              <label class="form-label" for="formtabs-country">Delivery&nbsp;Date</label>
                              <input
                              type="date"
                              class="form-control"
                              id="deliverydt"
                              placeholder=""
                              name="deliverydt"
                              value="<?php echo $wz1['deliverydt']; ?>"

                              aria-label="Product barcode" />
                            </div>
                           
                           
                          <div class="col-md-4">
                            <label class="form-label" for="ecommerce-product-barcode">To&nbsp;Stitching&nbsp;Unit</label>
                            <select name="tostitch" id="tostitch"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['tostitch']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          
						    
                        </div><hr><br>
                        <div class="card">
                        
                        <div class="table-responsive">

                            <table class="table table-border border-top table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Item&nbsp;No</th>
                                  <th>PO&nbsp;No</th>
                                  <th>Item&nbsp;Description</th>
                                  <th>Print</th> 
                                  <th>Quality</th>
                                  <th>Size</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  <th>Packing&nbsp;Method</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM stitching1 Where cid='$sid'";
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
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                  
                  <input
                                     type="text"
                                     class="form-control"
                                     id="pono"
                                     style="width:120px"
                                     name="pono[]"
                                     value="<?php echo $rw['pono']; ?>"
                                     aria-label="Product barcode"/>
                                        
                 </td>
                          
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                    value="<?php echo $rw['itemdesc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    style="width:120px"
                                    name="print[]"
                                    value="<?php echo $rw['print']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    
                                    name="quality[]"
                                    value="<?php echo $rw['quality']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    style="width:120px"
                                    name="size[]"
                                    value="<?php echo $rw['size']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                   style="text-align:right"
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit1<?php echo $i;?>"
                                    onKeyDown="ee1(this.id);"
                                    name="unit[]"
                                    style="width:120px"
                                    value="<?php echo $rw['unit']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack<?php echo $i;?>"
                                    onKeyDown="ee1(this.id);"
                                    name="pack[]"
                                    value="<?php echo $rw['pack']; ?>"
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
                        
                        <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="ecommerce-product-barcode">Checking&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="checking" id="checking" class="select form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="Normal Quality Checking" <?php if($wz1['checking']=='Normal Quality Checking'){ ?>Selected<?php } ?> >Normal Quality Checking  </option>
                                <option value="Strict Quality Checking" <?php if($wz1['checking']=='Strict Quality Checking'){ ?>Selected<?php } ?> >Strict Quality Checking </option>   
                              </select>
                            </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Repeat&nbsp;Order&nbsp;No</label>
                            <input 
                              type="text"
                              class="form-control"
                              id="reorder"
                              placeholder=""
                              name="reorder"
                              value="<?php echo $wz1['reorder']; ?>"

                              aria-label="Product barcode" />
</div>
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">File&nbsp;Ref&nbsp;No</label>
                            <input 
                              type="text"
                              class="form-control"
                              id="flref"
                              placeholder=""
                              name="flref"
                              value="<?php echo $wz1['flref']; ?>"

                              aria-label="Product barcode" />
</div>
 
                              <div class="col-md-4">

                            <label class="form-label" for="ecommerce-product-barcode">Prepareed&nbsp;By</label>
                            <select name="prepared" id="prepared"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['prepared']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                          </div>
                        </div>

                     
              <div class="row">
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Instructions</strong></label>
                          <textarea
                            class="form-control"
                            id="instruction"
                            name="instruction"
                            
                            rows="3"><?php echo $wz1['instruction']; ?></textarea>
                        </div>
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Remarks</strong></label>
                          <textarea
                            class="form-control"
                            id="remarks"
                            name="remarks"
                            

                            rows="3"><?php echo $wz1['remarks']; ?></textarea>
                        </div>
              </div>
                       <br>
                      
                            <div class="table-responsive" >
                    
                            
                            
                       </div> 
</div>
                
                        <!-- Social Links -->
                     
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
                           
                             <input type="text" hidden name="fid"  value="<?php echo $wz1['id'];?>">
                        <label for="formFile" class="form-label">Carton Marking</label>
                        <input class="form-control" type="file" id="label" name="label" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $wz1['label']; ?>" target="blank"><?php echo $wz1['label']; ?></a>                      
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Lable-1</label>
                        <input class="form-control" type="file" id="label1" name="label1" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $wz1['label1']; ?>" target="blank"><?php echo $wz1['label1']; ?></a>                      
                            </div>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Lable-2</label>
                        <input class="form-control" type="file" id="label2" name="label2" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $wz1['label2']; ?>" target="blank"><?php echo $wz1['label2']; ?></a>                      
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Lable-3</label>
                        <input class="form-control" type="file" id="label3" name="label3" 
  accept="image/jpeg,image/png,application/pdf"> 
  <a href="uploads/<?php echo $wz1['label3']; ?>" target="blank"><?php echo $wz1['label3']; ?></a>                       
                            </div>
                           </div>
            </div></div>
                            </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-label-secondary btn-prev" href="stitchinglist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Preview</span>
                              </a>
                             
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>
                          </div> 
                          
                  </form>
                
                
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    </div>
    </div>
    </div>
    <!-- footer -->
    <?php include "footer.php" ?>
  </body>
</html>


<?php
if (isset($_POST['submit'])) {


 
  $cid = $_POST['cid'];
  $book = $_POST['book'];
  $date = $_POST['date'];
  $deliverydt = $_POST['deliverydt'];
  $tostitch = $_POST['tostitch'];
  $orderno = $_POST['orderno'];
  $checking = $_POST['checking'];
  $reorder = $_POST['reorder'];
  $flref = $_POST['flref'];
  $prepared = $_POST['prepared'];
  $instruction = $_POST['instruction'];
  $remarks = $_POST['remarks'];
  $p1 = $_FILES['label']['name'];
  $p_tmp1 = $_FILES['label']['tmp_name'];
  $path = "uploads/$p1";
  $move = move_uploaded_file($p_tmp1, $path);

  $p2 = $_FILES['label1']['name'];
  $p_tmp2 = $_FILES['label1']['tmp_name'];
  $path = "uploads/$p2";
  $move = move_uploaded_file($p_tmp2, $path);
 
  $p3 = $_FILES['label2']['name'];
  $p_tmp3 = $_FILES['label2']['tmp_name'];
  $path = "uploads/$p3";
  $move = move_uploaded_file($p_tmp3, $path);

  $p4 = $_FILES['label3']['name'];
  $p_tmp4 = $_FILES['label3']['tmp_name'];
  $path = "uploads/$p4";
  $move = move_uploaded_file($p_tmp4, $path);

  if ($deliverydt != '') {
    $sql = "UPDATE stitching SET book='$book',date='$date',deliverydt='$deliverydt',tostitch='$tostitch',orderno='$orderno',checking='$checking',reorder='$reorder',flref='$flref',prepared='$prepared',instruction='$instruction',remarks='$remarks' ,label='$p1',label1='$p2',label2='$p3',label3='$p4' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  }

  foreach ($_POST['pono'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $quality = $_POST['quality'][$key];
    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $print = $_POST['print'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
  
   
   
   
     $sql1 = "UPDATE stitching1 SET itemno='$itemno',quality='$quality',pono='$pono',itemdesc='$itemdesc',print='$print',size='$size',quantity='$quantity',unit='$unit' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
    

  if ($result) {

   echo "<script>alert('Stitching Updated successfully');window.location='stitchinglist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 