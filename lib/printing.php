<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
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
function get_items(value) {
//alert(value);
var form='printing';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(sts);
if(sts==1)
{

  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML =r1[1];
					   }
            }
             else if(sts==0)
            {
              alert("Printing Plan Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            
      }
    };
    xmlhttp.open("GET","ajax/get_order_items.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>
<script>
function get_items2(value) {
//alert(value);
var form='printing';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(sts);
if(sts==1)
{

  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML =r1[1];
					   }
            }
             else if(sts==0)
            {
              alert("Printing Plan Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }
      }
    };
    xmlhttp.open("GET","ajax/get_order_check.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
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
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>
<?php
		
		  
		   $fg1="select max(book) as id from printing";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>

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
         
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Printing </button>
                      <a href="printinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Print
                          </a>
                    </div><br>

                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                  
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">PRINTING INSTURCTION</span>
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
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                          <div class="row g-3">
                            
                              <div class="col-md-3">
                            

                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;</label>
                            <input
                              type="text"
                              class="form-control"
                              id="book"
                              placeholder=""
                              name="book"
                              value="<?php echo $enq; ?>"
                              readonly
                              aria-label="Product barcode" />                            
                          </div>
                          
                              <div class="col-md-3">
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
                              
                              
                              
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                              <input 
                              type="text"
                              class="form-control"
                              id="orderno"
                              placeholder=""
                              name="orderno"
                              required
                              autofocus
                              onblur="get_items(this.value);"
                            
                              aria-label="Product barcode" />
                            </div>
                         
                          <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Delivery&nbsp;Date</label>
                              <input
                              type="date"
                              class="form-control"
                              id="deliverydt"
                              placeholder=""
                              name="deliverydt"
                              autofocus
                              aria-label="Product barcode" />
                            </div> </div><br>
                            <div class="row g-3">    
                            <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">Checking&nbsp;Type</label>
                            <select name="checking" id="checking" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Normal Quality Checking">Normal Quality Checking </option>
                                <option value="Strict Quality Checking">Strict Quality Checking </option>
                                
                              </select>
                            </div>
							         <div class="col-md-1">
                                <label class="form-label" for="ecommerce-product-barcode">File&nbsp;Ref&nbsp;No</label>
                                <input 
                                  type="text"
                                  class="form-control"
                                  id="flref"
                                  placeholder=""
                                  name="flref"
                                  aria-label="Product barcode" />
                        
                        </div>
                            <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Repeat&nbsp;Order&nbsp;No</label>
                                <input 
                                  type="text"
                                  class="form-control"
                                  id="reorder"
                                  placeholder=""
                                  name="reorder"
                                  aria-label="Product barcode" />
                        
                        </div>
                            <div class="col-md-3">
                                <label class="form-label" for="ecommerce-product-barcode">To</label>
                                <select name="to1" id="to1" class="select form-select"  data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                              </div>
                     
                        <div class="col-md-3">
                                <label class="form-label" for="ecommerce-product-barcode">Prepared&nbsp;By</label>
                                <select name="prepareby" id="prepareby" class="select form-select"  data-allow-clear="true">
                                  <option value="">Select</option>
                <?php 
            $sql = "SELECT * FROM staff order by name asc";
                      $result = mysqli_query($conn, $sql);
                      while($rw = mysqli_fetch_array($result))
            { ?>
                       <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                      <?php } ?>
                                  
                                </select>
                        
                        </div>
                      </div><hr><br>

                        
                        <div class="table-responsive">

                            <table class="table table-border border-top table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Item&nbsp;No</th>
                                  <th>po&nbsp;No</th>
                                  <th>Item&nbsp;Description</th>
                                  <th>Print</th> 
                                  <th>Quality</th>
                                  <th>Size</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                 
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
                  <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
						
                     
                    </select>
                      </td>
                    <td style="padding: 0.3rem">
                      
                      <input
                                         type="text"
                                         class="form-control"
                                         id="pono<?php echo $i;?>"
                                     name="pono[]"
                                       
                                         aria-label="Product barcode"/>
                                            
                   
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                      name="itemdesc[]"
                                      style="width:200px"
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
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="unit[]"  onKeyDown="ee1(this.id);" id="unit<?php echo $i;?>" class="select form-select" style="width:90px">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>
                                       
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
                  <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                    <option value="Not Selected">Select</option>
                   
                     
                    </select></td>
                    <td style="padding: 0.3rem">
                      
                     <input
                                        type="text"
                                        class="form-control"
                                        id="pono<?php echo $i;?>"
                                    name="pono[]"
                                      
                                        aria-label="Product barcode"/>
                                           
                    
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                      name="itemdesc[]"
                                      style="width:200px"
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
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                <select name="unit[]"  onKeyDown="ee1(this.id);" id="unit<?php echo $i;?>" class="select form-select" style="width:90px">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>
                                       
                </td>   
                  </tr>       
                    <?php
                              }
                              ?>                 
                              </tbody>
                  </table>
                </div>
                            
                            <br><hr>
                          
                           
                           
                        <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Instructions</strong></label>
                            <textarea
                            class="form-control"
                            id="instruction"
                            name="instruction"
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
                    
                            
                             
                       </div> 

                
                        <!-- Social Links -->
                     
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
                             
                        <label for="formFile" class="form-label">Print Design-1</label>
                        <input class="form-control" type="file" id="label" name="label" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Print Design-2</label>
                        <input class="form-control" type="file" id="label1" name="label1" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                            </div>
                  </div>
                </div>
               </div>
            </div>   
                            
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                               
                              </button>
                            </div>  
                          </div>  
                        
                          
                            </div>
                          
                          
                        </form>
                   
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


<?php
if (isset($_POST['submit'])) {


 
  $book = $_POST['book'];
  $date = $_POST['date'];
  $deliverydt = $_POST['deliverydt'];
  $orderno = $_POST['orderno'];
  $checking = $_POST['checking'];
  $reorder = $_POST['reorder'];
  $to1 = $_POST['to1'];
  $flref = $_POST['flref'];
  $instruction = $_POST['instruction'];
  $remarks = $_POST['remarks'];
  $prepareby = $_POST['prepareby'];

  $p1 = $_FILES['label']['name'];
    $p_tmp1 = $_FILES['label']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  
    $p2 = $_FILES['label1']['name'];
    $p_tmp2 = $_FILES['label1']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
    

  if ($date != '') {
$sql = "INSERT into printing (book,date,deliverydt,orderno,checking,reorder,to1,flref,instruction,remarks,prepareby,label,label1) 
 values ('$book','$date','$deliverydt','$orderno','$checking','$reorder','$to1','$flref','$instruction','$remarks','$prepareby','$p1','$p2')";
    $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);



  foreach ($_POST['quality'] as $key => $val) {
    
    
   
    $quality = $_POST['quality'][$key];
    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $print = $_POST['print'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
   
    if ($quality != '') {
     $sql = "INSERT into printing1 (cid,quality,pono,itemno,itemdesc,print,size,quantity,unit) 
      values ('$cid','$quality','$pono','$itemno','$itemdesc','$print','$size','$quantity','$unit')";
      $result = mysqli_query($conn, $sql);
    }
  }
    

  if ($result) {

  echo "<script>alert('Printing Registered successfully');window.location='printing.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
