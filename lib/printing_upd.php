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
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>

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
                      <button class="btn btn-label-primary">Printing</button>
                      <a href="printinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View List
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                   
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">PRINTING INSTRUCTION</span>
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
                              $sql4 = " SELECT * FROM printing WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $ordno=$wz1['orderno'];
                                  ?>
                        <div id="order_details" class="content">
                          <div class="row g-3">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                              <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;</label>
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
                          
                              <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Date</label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo $wz1['date']; ?>"

                              aria-label="Product barcode" />
                            </div>   
                            
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="orderno"
                              placeholder=""
                              name="orderno"
                              onblur="get_items(this.value);"
                              value="<?php echo $wz1['orderno']; ?>"
                              
                              aria-label="Product barcode" /></div>
                              <div class="col-md-3">
                                  <label class="form-label" for="formtabs-country">Delivery&nbsp;Date</label>
                                  <input
                                  type="date"
                                  class="form-control"
                                  id="deliverydt"
                                  placeholder=""
                                  name="deliverydt"
                                  value="<?php echo $wz1['deliverydt']; ?>"
    
                                  aria-label="Product barcode" />
                                
                            </div></div><br>
                            <div class="row g-3">
						  <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">Checking&nbsp;Type</label>
                            <select name="checking" id="checking" class="select form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="Normal Quality Checking" <?php if($wz1['checking']=='Normal Quality Checking'){ ?>Selected<?php } ?> >Normal Quality Checking  </option>
                                <option value="Strict Quality Checking" <?php if($wz1['checking']=='Strict Quality Checking'){ ?>Selected<?php } ?> >Strict Quality Checking </option>   
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
                              value="<?php echo $wz1['flref']; ?>"

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
                                  value="<?php echo $wz1['reorder']; ?>"
                                  aria-label="Product barcode" />
                        
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">To</label>
                            <select name="to1" id="to1"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['to1']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
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
                      while($rw1 = mysqli_fetch_array($result))
            { ?>
                     <option <?php if($rw1['id']==$wz1['prepareby']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
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
                                  <th>Item&nbsp;Description</th>
                                  <th>PO&nbsp;No</th>
                                  <th>Print</th> 
                                  <th>Quality</th>
                                  <th>Size</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM printing1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                
                                  <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td><td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM order2 m left join order1 s on s.id=m.cid join item_master n on m.itemno=n.id where s.ord_no='$ordno' order by itemno asc";
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
                                    id="pono<?php echo $i;?>"
                                  
                                    name="pono[]"
                                    value="<?php echo $rw['pono']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    
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
                      <select  name="unit[]" id="unit<?php echo $i;?>" style="width: 90px;" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master ";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select></td>
                
                
               
                                  
                                </tr>
                                <?php
                       $sno++; $i++;
    }
?>
                       
                              </tbody>
                  </table>
                
              </div><br><hr>
             
              <div class="row g-3">
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
                             
                        <label for="formFile" class="form-label">Print Design-1</label>
                        <input type="text" hidden name="label0"  value="<?php echo $wz1['label'];?>"/>

                        <input class="form-control" type="file" id="label" name="label" 
  accept="image/jpeg,image/png,application/pdf">    
  <a href="uploads/<?php echo $wz1['label']; ?>" target="blank"><?php echo $wz1['label']; ?></a>                   
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Print Design-2</label>
                        <input type="text" hidden name="label11"  value="<?php echo $wz1['label1'];?>"/>

                        <input class="form-control" type="file" id="label1" name="label1" 
  accept="image/jpeg,image/png,application/pdf">        
  <a href="uploads/<?php echo $wz1['label1']; ?>" target="blank"><?php echo $wz1['label1']; ?></a>               
                            </div></div>
            </div></div>
                            </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-label-dark btn-prev" href="printinglist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Preview</span>
                              </a>
                              <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            <?php } ?>
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


<?php
if (isset($_POST['submit'])) {


 
  $cid = $_POST['cid'];
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

  if($_FILES['label']['name']!='')
  {

$p1 = $_FILES['label']['name'];
$p_tmp1 = $_FILES['label']['tmp_name'];
$path = "uploads/$p1";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
$p1=$_REQUEST['label0'];
} 


if($_FILES['label1']['name']!='')
  {

$p2 = $_FILES['label1']['name'];
$p_tmp2 = $_FILES['label1']['tmp_name'];
$path = "uploads/$p2";
$move = move_uploaded_file($p_tmp2, $path);

}
else
{
$p2=$_REQUEST['label11'];
} 



    $sql = "UPDATE printing SET book='$book',date='$date',deliverydt='$deliverydt',checking='$checking',reorder='$reorder',orderno='$orderno',to1='$to1',flref='$flref',instruction='$instruction',remarks='$remarks',prepareby='$prepareby',label='$p1',label1='$p2' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['quality'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $quality = $_POST['quality'][$key];
    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $print = $_POST['print'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
  
   
   
     $sql1 = "UPDATE printing1 SET itemno='$itemno',quality='$quality',pono='$pono',itemdesc='$itemdesc',print='$print',size='$size',quantity='$quantity',unit='$unit' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
    

  if ($result) {

   echo "<script>alert('Printing Updated successfully');window.location='printinglist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 