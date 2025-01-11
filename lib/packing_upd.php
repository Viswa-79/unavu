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

<?php
$fg1="select max(id) as id from packing1";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>


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
                      <button class="btn btn-label-primary label-dark">Packing</button>
                      <a href="packinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Packing
                          </a>
                    </div>
                  
                   
                    <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>

<div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                <?php
                              $sql4 = " SELECT * FROM packing WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $ordno=$wz1['orderno'];
                                  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                          <div class="row g-4">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                          <div class="col-md-2">
                            

                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="book"
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
                              name="date"
                              value="<?php echo $wz1['date']; ?>"

                              aria-label="Product barcode" />
                            </div>
                            <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input 
                              type="text"
                              class="form-control"
                              id="orderno"
                              name="orderno"

                              onblur="get_items(this.value);"
                              value="<?php echo $wz1['orderno']; ?>"
                              aria-label="Product barcode" />
                              </div>

                            <div class="col-md-2">
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
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Repeat&nbsp;Order&nbsp;No</label>
                            <input 
                              type="text"
                              class="form-control"
                              id="reorder"
                              name="reorder"
                              value="<?php echo $wz1['reorder']; ?>"
                              aria-label="Product barcode" />
                              
                            
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">File&nbsp;ref&nbsp;No</label>
                            <input 
                              type="text"
                              class="form-control"
                              id="flref"
                              name="flref"
                              value="<?php echo $wz1['flref']; ?>"
                              aria-label="Product barcode" />
                              
                            
                          </div>
                            
                        </div><br><hr>


                        <div class="card mb-2 mt-4">
                        
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM packing1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  $qty= $rw['quality'];
                                  ?>
                                  <tr>
                              <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                              <td> <div style="text-align:center">  <?php echo $sno; ?></div></td>
                          
                <td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
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
                                    id="pono<?php echo $i;?>"
                                    name="pono[]"
                                    value="<?php echo $rw['pono']; ?>"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                      name="itemdesc[]"
                                      style="width:200px"
                                      value="<?php echo $rw['itemdesc']; ?>"
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
                <td style="padding: 0.3rem">
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
                                    name="quantity[]"
                                    style="text-align:right"
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

                                           
                </td>
                  </tr>       
                    <?php
                     $sno++; $i++;
                              }
                              ?>                 
                              </tbody>
                            </table>
                </div>
              </div><br>
<hr>
 <div class="row">
              <div class="col-md-12">
                          <label class="form-label" for="formValidationBio"><strong>Packing Instructions</strong></label>
                          <textarea
                            class="form-control"
                            id="instruction"
                            name="instruction"
                            rows="2"><?php echo $wz1['instruction']; ?></textarea>
                        </div>
</div><br>
                        <div class="row g-3">
                        <div class="col-md-6">
                              <label class="form-label" for="formtabs-country">Port Of Destination</label>
                              <input
                              type="text"
                              class="form-control"
                              id="port"
                              name="port"
                              value="<?php echo $wz1['port']; ?>"
                              aria-label="Product barcode" />
                            </div>
                        <div class="col-md-6">
                            <label class="form-label" for="ecommerce-product-barcode">Shipment</label>
                            <input 
                              type="text"
                              class="form-control"
                              id="shipment"
                              name="shipment"
                              value="<?php echo $wz1['shipment']; ?>"
                              aria-label="Product barcode" />
                          </div>
                          </div> 
                          </div></div>
                      </div>
                 
                   
                       <br>

                       <div class=" col-12  d-flex  justify-content-between">
                      
                              <a class="btn btn-label-dark " href="packinglist.php">
                                <i class="ti ti-arrow-left"></i>
                                <span class="align-middle d-sm-inline-block  me-sm-1">Preview</span>
                            </a>
                            <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
                    </div>      
                       
                            </div>
                            </div>
                
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
    $orderno = $_POST['orderno'];
    $port = $_POST['port'];
    $reorder = $_POST['reorder'];
    $shipment = $_POST['shipment'];
    $to1 = $_POST['to1'];
    $flref = $_POST['flref'];
    $instruction = $_POST['instruction'];

   
   $sql = "UPDATE packing SET book='$book',date='$date',port='$port',reorder='$reorder',shipment='$shipment',orderno='$orderno',to1='$to1',flref='$flref',instruction='$instruction' where id='$cid'";
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
  
   
   
   
     $sql1 = "UPDATE packing1 SET itemno='$itemno',quality='$quality',pono='$pono',itemdesc='$itemdesc',print='$print',size='$size',quantity='$quantity',unit='$unit' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
    

  if ($result) {

   echo "<script>alert('Packing Updated successfully');window.location='packinglist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 