<?php include "config.php"; ?>
  <?php include "head.php"; ?>

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
  var c=id.substr(11);
  //alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_qty_details(value) {
//alert("hello");
  
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#orderqty').val(data.qty);
$('#refno').val(data.refno);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_ordqty.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_pono(value) {
//alert("hello");
  
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#pono').val(data.pono);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_odrpono.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_order_check(value) {
//alert(value);
var form='material_resource';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

var sts = xmlhttp.responseText;

//alert(sts);

             if(sts==0)
            {
              alert("MRP Already Made For This Order No.!");
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
  

$('#uom'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
  function getexcessqty(id){
    var c=id.substr(6);
    var reqqty=document.getElementById('reqqty'+c).value?document.getElementById('reqqty'+c).value:0;
    var excess=document.getElementById('excess'+c).value?document.getElementById('excess'+c).value:0;
    var t=parseFloat(reqqty)*parseFloat(excess)/100; 
    var excessqty=parseFloat(reqqty)+parseFloat(t);
    document.getElementById('excessqty'+c).value=excessqty;
  }
  </script>


<script>
  function chkreqqty(id,value){
    var c=id.substr(6);
    var requiredqty=document.getElementById('requiredqty').value?document.getElementById('requiredqty').value:0;
    var uom=document.getElementById('uom'+c).value?document.getElementById('uom'+c).value:0;
   // alert(uom);

  if((parseFloat(value)>parseFloat(requiredqty))&&uom=='Pcs'){
        alert("Required Quantity Exceeded Order Quantity.");
        document.getElementById('reqqty'+c).value='';
      }
 
    
  }
  </script>



<?php
		   $fg1="select max(bookno) as id from material_resource";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>


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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Material Resource Planning</button>
                      <a href="material_resourcelist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $enq; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onblur="get_qty_details(this.value);get_pono(this.value);"
                              required autofocus
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Ref&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderqty"
                              name="orderqty"
                              style="text-align:right"
                              readonly
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">MRP Plan For&nbsp;<span style="color:red;">*</span></label>
                            <select name="mrpplan" id="mrpplan" class="select form-select" data-allow-clear="true" onchange="getreqqty();" required>
                                <option value="">Select</option>
                                <option value="1">Full Quantity</option>
                                <option value="2">Partial Quantity</option>
                               
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Required&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="requiredqty"
                              name="requiredqty"
                              style="text-align:right"
                              required
                              onblur="chkreqqty2(this.id,this.value);"
                              class="form-control"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PONO<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              style="text-align:left"
                              class="form-control"
                               />
                          </div>
                        </div><hr>
                        <div class="row g-3"> 
                     
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th>S.No</th>
                                  <th>PARTICULARS</th> 
                                  <th>UOM</th>
                                  <th>REQ&nbsp;QTY</th>
                                  <th>EXCESS&nbsp;QTY&nbsp;(%)</th>
                                  <th>Total&nbsp;QTY</th>
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
                </td>
                <td style="padding: 0.3rem;width: 600px;">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by productname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                       
                <td style="padding: 0.3rem">
                <select name="uom[]" id="uom<?php echo $i;?>" style="width:120px;" class="select form-select" tabindex="-1">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
									 class="form-control"
                                    id="reqqty<?php echo $i;?>"
                                    name="reqqty[]"
                                    onkeyup="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onblur="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onchange="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    style="text-align:right"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min=0 max=5 step=0.1
                                    class="form-control"
                                    id="excess<?php echo $i;?>"
                                    name="excess[]"
                                    onkeyup="getexcessqty(this.id)"
                                    onblur="getexcessqty(this.id)"
                                    onchange="getexcessqty(this.id)" onKeyDown="ee1(this.id);"
                                    style="text-align:right"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text" readonly
                                    class="form-control"
                                    id="excessqty<?php echo $i;?>"
                                    name="excessqty[]"
                                    style="text-align:right"
                                   tabindex="-1"/>
                                       
                </td>
          </tr>
                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=99; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                                  
                <td style="padding: 0.3rem;width: 600px;">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by productname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                </select>            
                </td>
                <td style="padding: 0.3rem">
                <select name="uom[]" id="uom<?php echo $i;?>" style="width:120px;" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="reqqty<?php echo $i;?>"
                                    name="reqqty[]"
                                    onkeyup="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onblur="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onchange="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    style="text-align:right"/>
                                       
                    </td>


                    <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min=0 max=5 step=0.1
                                    class="form-control"
                                    id="excess<?php echo $i;?>"
                                    name="excess[]"
                                    onkeyup="getexcessqty(this.id)"
                                    onblur="getexcessqty(this.id)"
                                    onchange="getexcessqty(this.id)"
                                    style="text-align:right" onKeyDown="ee1(this.id);"
                                  />
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="excessqty<?php echo $i;?>"
                                    name="excessqty[]"
                                    style="text-align:right"
                                    tabindex="-1"/>
                                       
                </td>
                                </tr>          
<?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
              
              <br>
                          </div>

                          </div>
                  </div>
              </div>    
              </div>
               


                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span> 
                                <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                              </button>
                            </div>    
                        </form>
                  
            
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


<?php
if (isset($_POST['submit'])) {

  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $refno = $_POST['refno'];
  $orderno = $_POST['orderno'];
  $orderqty = $_POST['orderqty'];
  $mrpplan = $_POST['mrpplan'];
  $requiredqty = $_POST['requiredqty'];
  $pono = $_POST['pono'];
  
  $sql = "INSERT into material_resource (bookno,date,refno,orderno,orderqty,mrpplan,requiredqty,pono)
    values ('$bookno','$date','$refno','$orderno','$orderqty','$mrpplan','$requiredqty','$pono')";
    $result = mysqli_query($conn, $sql);


    $cid = mysqli_insert_id($conn);
    
    foreach ($_POST['reqqty'] as $key => $val) {
    
      
    $productname = $_POST['productname'][$key];
    $reqqty = $_POST['reqqty'][$key];
    $excess = $_POST['excess'][$key];
    $excessqty = $_POST['excessqty'][$key];
    $uom = $_POST['uom'][$key];

    if ($reqqty != '') {
     $sql1 = "INSERT into material_resource1 (cid,productname,uom,reqqty,excess,excessqty) 
 values ('$cid','$productname','$uom','$reqqty','$excess','$excessqty')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('MRP Saved successfully');window.location='material_resource.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<script>
  function getreqqty()
  {
   
    var orderqty=document.getElementById('orderqty').value?document.getElementById('orderqty').value:0;
    var mrpplan=document.getElementById('mrpplan').value?document.getElementById('mrpplan').value:0;
   
   if(parseInt(mrpplan)==parseInt(1)){

     document.getElementById('requiredqty').value=orderqty;
   }
   else{
    document.getElementById('requiredqty').value='';
   }


  }
  </script>

  
<script>
  function chkreqqty2(id,value){
    var c=id.substr(6);
    var orderqty=document.getElementById('orderqty').value?document.getElementById('orderqty').value:0;
   if(parseFloat(value)>parseFloat(orderqty)){
      alert("Required Quantity Exceeded Order Quantity.");
      document.getElementById('requiredqty').value='';
    }
  }
  </script>