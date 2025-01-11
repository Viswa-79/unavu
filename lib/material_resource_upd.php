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
  function chkreqqty(id,value){
    var c=id.substr(6);
    var requiredqty=document.getElementById('requiredqty').value?document.getElementById('requiredqty').value:0;
    var uom=document.getElementById('uom'+c).value?document.getElementById('uom'+c).value:0;

    if((parseFloat(value)>parseFloat(requiredqty))&&uom=='Pcs'){
      alert("Required Quantity Exceeded Order Quantity.");
      document.getElementById('reqqty'+c).value='';
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
<?php
		   $fg1="select max(bookno) as id from material_resource";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
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
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Material List</button>
                      <a href="material_resourcelist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    
                      <h4 class="mb-0">Material&nbsp;Resource</h4>
                     
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM material_resource WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3 mt-2">
                          <div class="col-md-1">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $wz1['bookno']; ?>"
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
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              class="form-control"
                              value="<?php echo $wz1['orderno']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Ref&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              value="<?php echo $wz1['refno']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                         
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderqty"
                              name="orderqty"
                              class="form-control"
                              style="text-align:right" readonly
                              value="<?php echo $wz1['orderqty']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">MRP&nbsp;Plan&nbsp;For</label>
                            <select name="mrpplan" id="mrpplan" required
                               class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="1" <?php if($wz1['mrpplan']=='1'){ ?>Selected<?php } ?> >Full Quantity </option>
                                <option value="2" <?php if($wz1['mrpplan']=='2'){ ?>Selected<?php } ?> >Partial Quantity</option>                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Required&nbsp;Qty</label>
                            <input
                              type="text"
                              id="requiredqty"
                              name="requiredqty"
                              class="form-control"
                              style="text-align:right" 
                              value="<?php echo $wz1['requiredqty']; ?>"
                              placeholder="" />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PONO</label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              class="form-control"
                              style="text-align:left" 
                              value="<?php echo $wz1['pono']; ?>"
                              placeholder="" />
                          </div>
                        </div>
                         
                    </div><hr>
                    
                        <div class="table-responsive">
                            <table class="table table-border table-hover ">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="text-align:center">S.No</th>
                                  <th>PARTICULARS</th> 
                                  <th>UOM</th>
                                  <th>REQ&nbsp;QTY</th>
                                  <th>EXCESS&nbsp;QTY&nbsp;(%)</th>
                                  <th>TOTAL&nbsp;QTY</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM material_resource1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

                <td style="padding: 0.3rem;width: 600px;">
                <select name="productname[]" id="productname<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select"  >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM product_master order by productname asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo   $rw1['productname'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>        
                <td style="padding: 0.3rem">
                <select name="uom[]" id="uom<?php echo $i;?>" class="select form-select" style="width:120px" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM unit_master order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['unit']==$rw['uom']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo   $rw1['unit'];?></option>
                        <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="reqqty<?php echo $i;?>"
                                    name="reqqty[]"
                                    onkeyup="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onblur="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    onchange="chkreqqty(this.id,this.value);getexcessqty(excess<?php echo $i;?>.id);"
                                    value="<?php echo $rw['reqqty']; ?>"/>
                                       
                </td>                       
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min=0 max=5 step=0.1
                                    style="text-align:right"
                                    class="form-control"
                                    id="excess<?php echo $i;?>"
                                    name="excess[]"
                                    onkeyup="getexcessqty(this.id)"
                                    onblur="getexcessqty(this.id)"
                                    onchange="getexcessqty(this.id)"
                                    value="<?php echo $rw['excess']; ?>"
                                    onKeyDown="ee1(this.id);"/>
                                       
                </td>  <td style="padding: 0.3rem">
                 <input
                                    type="text" readonly
                                    style="text-align:right"
                                    class="form-control"
                                    id="excessqty<?php echo $i;?>"
                                    name="excessqty[]"
                                    value="<?php echo $rw['excessqty']; ?>"
                                  />
                                       
                </td>           
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
    $j=$i;
    $sn=$sno;
    for ($i = $j, $sno = $sn; $i <=99; $i++, $sno++) {

      ?>
       <input type="text" hidden name="rid[]" id="rid" value="">
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
          tabindex="-1"
         />
             
</td>
      </tr>          
<?php
    }
?>              

                              </tbody>
                            </table>
                          </div>
                
              </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-dark " href="material_resourcelist.php">
                                <i class="ti ti-arrow-left"></i>
                                <span class="align-middle d-sm-inline-block  me-sm-1">Preview</span>
                            </a>
                            <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $refno = $_POST['refno'];
  $orderno = $_POST['orderno'];
  $orderqty = $_POST['orderqty'];
  $mrpplan = $_POST['mrpplan'];
  $requiredqty = $_POST['requiredqty'];
  $pono = $_POST['pono'];
  
    $sql = "UPDATE material_resource SET bookno='$bookno',date='$date',refno='$refno',orderno='$orderno',orderqty='$orderqty',mrpplan='$mrpplan',requiredqty='$requiredqty',pono='$pono' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  
    
    foreach ($_POST['reqqty'] as $key => $val) {
      
      $rid = $_POST['rid'][$key];
    $productname = $_POST['productname'][$key];
    $reqqty = $_POST['reqqty'][$key];
    $excess = $_POST['excess'][$key];
    $excessqty = $_POST['excessqty'][$key];
    $uom = $_POST['uom'][$key];

    if ($reqqty != '') {
      if ($rid != '') {
      $sql1 = "UPDATE material_resource1 SET productname='$productname',reqqty='$reqqty',excess='$excess',excessqty='$excessqty',uom='$uom' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
    else{
      $sql1 = "INSERT into material_resource1 (cid,productname,uom,reqqty,excess,excessqty) 
      values ('$cid','$productname','$uom','$reqqty','$excess','$excessqty')";
           $result1 = mysqli_query($conn, $sql1);
    }
  }
  }
  
  if ($result) {

 echo "<script>alert('MRP Updated Successfully');window.location='material_resourcelist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


