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
function get_party_details(value) {
  
  
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  $('#partyname').val(data.partyname);
  
  
}

}
};
xmlhttp.open("GET","ajax/getenquiry.php?id="+value,true);
xmlhttp.send();
  }
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
$('#size'+c).val(data.size);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Fabric Inward</button>
                      <a href="fabinlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                                <div class="card mb-2 mt-2">
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        <?php
                              $sql4 = " SELECT * FROM fabric_inward WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Book
                              &nbsp;No&nbsp;<span style="color:red;">*</span></label>

                            <input
                            type="text"
                            id="dcno"
                            name="dcno"
                              readonly
                              value="<?php echo $wz1['dcno']; ?>"
                              class="form-control"
                              />
                            </div>
                            
                            <div class="col-md-2">
                              <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                              <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>

                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              readonly
                              value="<?php echo $wz1['refno']; ?>"
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
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname"  class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE (party_group='Job Work' or party_group='Internal Transfer') order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Vehicle&nbsp;No</label>
                            <input
                              type="text"
                              id="vehicleno"
                              name="vehicleno"
                              class="form-control"
                              value="<?php echo $wz1['vehicleno']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Driver&nbsp;Name</label>
                            <input
                              type="text"
                              id="dvrname"
                              name="dvrname"
                              class="form-control"
                              value="<?php echo $wz1['dvrname']; ?>"
                              placeholder="" />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Tollerance</label>
                            <input
                              type="number"
                              style="text-align:right"
                              min=0 max=5 step=1
                              id="tollerance"
                              name="tollerance"
                              class="form-control"
                              value="<?php echo $wz1['tollerance']; ?>"
                              placeholder="" />
                          </div>
                          
                          </div><hr>
                        <div class="card">
                        
                        <div class="table-responsive">

                        <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>order&nbsp;No</th> 
                                 <th>ref&nbsp;No</th> 
                                  <th>item&nbsp;No</th> 
                                  <th>quality</th> 
                                  <th>required&nbsp;qty</th> 
                                  <th>width</th> 
                                  <th>color</th> 
                                  <th>Bales</th> 
                                  <th>bale&nbsp;no's</th> 
                                  <th>pieces</th>
                                  <th>meters</th>
                                  <th>fabric&nbsp;stock&nbsp;location</th> 
                                  <th>Description</th> 
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $sno=1; $i=0;
                                
                                  
                              $sql4 = " SELECT * FROM fabric_inward1 Where cid='$sid' order by id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $ordno= $rw['orderno'];
                                  ?>
                             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                <tr>
                                <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
              <td style="padding: 0.3rem">
               <input  
                                  type="text"
                                  class="form-control"
                                  id="orderno"
                                  value="<?php echo $rw['orderno']; ?>"
                                  name="orderno[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="width:100px"
                                  class="form-control"
                                  id="ref<?php echo $i;?>"
                                  value="<?php echo $rw['ref']; ?>"
                                  name="ref[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="itemno[]" style="width:200px" id="itemno<?php echo $i;?>"  class="select form-select" >
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
              <select name="quality[]" style="width:300px" id="quality<?php echo $i;?>"  class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM costing4 m left join costing s on s.id=m.cid join quality_master n on m.quality=n.id where s.orderno='$ordno' order by m.quality asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['quality']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="reqqty<?php echo $i;?>"
                                  value="<?php echo $rw['reqqty']; ?>"
                                  name="reqqty[]"
                                  readonly
                                  onkeyup="getexcess(reqqty<?php echo $i;?>.id);"
                                    onchange="getexcess(reqqty<?php echo $i;?>.id);"
                                    onblur="getexcess(reqqty<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
             
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="width<?php echo $i;?>"
                                  value="<?php echo $rw['width']; ?>"
                                  name="width[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="color[]" style="width:200px" id="color<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="bundle"
                                    
                                    name="bundle[]"
                                  value=<?php echo $rw['bundle']; ?>
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="bale<?php echo $i;?>"
                                  value="<?php echo $rw['bale']; ?>"
                                  name="bale[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  value="<?php echo $rw['pcs']; ?>"
                                  name="pcs[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="mtrs<?php echo $i;?>"
                                  value="<?php echo $rw['mtrs']; ?>"
                                  name="mtrs[]"
                                  onkeyup="getexcess(reqqty<?php echo $i;?>.id);"
                                    onchange="getexcess(reqqty<?php echo $i;?>.id);"
                                    onblur="getexcess(reqqty<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
             
              <td style="padding: 0.3rem">
              <select name="stockloc[]" id="stockloc<?php echo $i;?>"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM location_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['stockloc']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['location'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                                  value="<?php echo $rw['descr']; ?>"
                                  name="descr[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
                                 
                                  
                                </tr>
                                     
<?php $sno++; $i++;
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
                
              </div>
              <br>
                        </div>
                  </div>
                </div>
                 
            
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="fabinlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
  <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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
  $cid =$_POST['cid'];
  $dcno = $_POST['dcno'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $vehicleno = $_POST['vehicleno'];
  $dvrname = $_POST['dvrname'];
  $tollerance = $_POST['tollerance'];

  $sql = "UPDATE fabric_inward SET dcno='$dcno',refno='$refno',date='$date',partyname='$partyname',vehicleno='$vehicleno',tollerance='$tollerance',
 dvrname='$dvrname' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['quality'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
  
    
      $orderno = $_POST['orderno'][$key];
      $itemno = $_POST['itemno'][$key];
      $quality = $_POST['quality'][$key];
      $reqqty = $_POST['reqqty'][$key];
      $color = $_POST['color'][$key];
      $bundle = $_POST['bundle'][$key];
      $pcs = $_POST['pcs'][$key];
      $mtrs = $_POST['mtrs'][$key];
      $descr = $_POST['descr'][$key];
      $stockloc = $_POST['stockloc'][$key];
      $width = $_POST['width'][$key];
      $bale = $_POST['bale'][$key];
      $ref = $_POST['ref'][$key];
    
   $sql1 = "UPDATE  fabric_inward1 SET cid='$cid',orderno='$orderno',itemno='$itemno',quality='$quality',color='$color',pcs='$pcs',mtrs='$mtrs',descr='$descr',bundle='$bundle',stockloc='$stockloc',width='$width',bale='$bale',ref='$ref',reqqty='$reqqty' WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Fabric Updated Successfully');window.location='fabinlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<script> 
  function getexcess(id,value){
    var c=id.substr(6);
    var toll=document.getElementById('tollerance').value?document.getElementById('tollerance').value:0;
    var reqqty=document.getElementById('reqqty'+c).value?document.getElementById('reqqty'+c).value:0;
    var mtrs=document.getElementById('mtrs'+c).value?document.getElementById('mtrs'+c).value:0;
    
    var k2=(parseFloat)(toll)/100*(parseFloat)(reqqty);
    var k3=(parseFloat)(k2) + (parseFloat)(reqqty);
    // alert(k3);
    
    if(parseFloat(mtrs)>parseFloat(k3)){
      alert("Meter Exceeded Required Quantity.");
      document.getElementById('mtrs'+c).value='';
    }

  }
  </script>