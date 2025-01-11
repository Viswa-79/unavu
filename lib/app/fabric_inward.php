<?php include "config.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
function get_quality(id,value) {
  
  var c=id.substr(6);
//alert(c);
   var value2=document.getElementById('orderno'+c).value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

document.getElementById('quality'+c).innerHTML =r;


      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_fabqty(id,value) {
//alert("hello");
  var c=id.substr(7);

  var orderno=document.getElementById('orderno'+c).value;
  var itemno=document.getElementById('itemno'+c).value;
				
  if (value != "") {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == '1')
{
$('#reqqty'+c).val(data.totalmeters);
//$('#recqty'+c).val(data.mtrs);
$('#descr'+c).val(data.size);

}


      }
    };
    xmlhttp.open("GET","ajax/get_fabqty.php?id="+value+"&orderno="+orderno+"&itemno="+itemno,true);
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
  
$('#color'+c).val(data.color);
$('#descr'+c).val(data.size);
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_ref(id,value) {
// alert("hello");
  var c=id.substr(7);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#ref'+c).val(data.refno);

}

      }
    };
    xmlhttp.open("GET","ajax/get_odrpono.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items(id,value) {
//alert(value);
var c=id.substr(7);
var form='fabric_inward1';

		//alert(c);		
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
// alert(r);
if(sts==1)
{
document.getElementById('itemno'+c).innerHTML =r1[1];
					
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }

      }
    };
    xmlhttp.open("GET","ajax/get_order_items.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(dcno) as id from fabric_inward";
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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Fabric Inward</button>
                      <a href="fabinlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-6">
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              required />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" required/>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" required>
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group IN('Job Work','Internal Transfer') order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
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
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Driver&nbsp;Name</label>
                            <input
                              type="text"
                              id="dvrname"
                              name="dvrname"
                              class="form-control"
                              placeholder="" />
                          </div>
                         </div>
<br>
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Tollerance</label>
                            <input
                              type="number"
                              min=0 max=5 step=1
                              id="tollerance"
                              name="tollerance"
                             style="text-align:right"
                              class="form-control"
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
                                  <th>Ref&nbsp;no</th> 
                                  <th>item&nbsp;No</th> 
                                  <th>quality</th>
                                  <th>Required&nbsp;qty</th>
                                  <th>width</th>  
                                  <th>color</th> 
                                  <th>Bales</th> 
                                  <th>Bale&nbsp;No's</th> 
                                  <th>pieces</th>
                                  <th>meters</th>
                                  <th>fABRIC&nbsp;stock&nbsp;location</th> 
                                  <th>Description</th> 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                 
                                   <?php echo $sno; ?>
                                    
                </td>
                <td style="padding: 0.3rem">
                  <input  
                  type="text"
                  class="form-control"
                  id="orderno<?php echo $i;?>"
                  
                  name="orderno[]"
                  onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                  aria-label="Product barcode"/>
                  
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="ref<?php echo $i;?>"
                                 
                                    name="ref[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                              </select>                         
                </td>
                 
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>" onchange="get_fabqty(this.id,this.value);" class="select form-select"  >
                                <option value="">Select</option>
			
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="reqqty<?php echo $i;?>"
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
                                 
                                    name="width[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="color[]"    style="width:200px" id="color<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="bundle"
                                    
                                    name="bundle[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bale<?php echo $i;?>"
                                 
                                    name="bale[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pcs<?php echo $i;?>"
                                   
                                    name="pcs[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="mtrs<?php echo $i;?>"
                                   
                                    name="mtrs[]"
                                    onkeyup="getexcess(reqqty<?php echo $i;?>.id);"
                                    onchange="getexcess(reqqty<?php echo $i;?>.id);"
                                    onblur="getexcess(reqqty<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
               
               
                <td style="padding: 0.3rem">
                               <select name="stockloc[]"   id="stockloc<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM location_master order by location asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['location'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="descr<?php echo $i;?>"
                                 
                                    name="descr[]"
                                   onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                      <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
              <td style="padding: 0.3rem">
                <input  
                type="text"
                class="form-control"
                id="orderno<?php echo $i;?>"
                
                name="orderno[]"
                onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                aria-label="Product barcode"/>
                
              </td>
              <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="ref<?php echo $i;?>"
                                 
                                    name="ref[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
              <td style="padding: 0.3rem">
                               <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>" onchange="get_fabqty(this.id,this.value);" class="select form-select"  >
                                <option value="">Select</option>
			
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="reqqty<?php echo $i;?>"
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
                                    name="width[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
              <td style="padding: 0.3rem">
                             <select name="color[]"    style="width:200px" id="color<?php echo $i;?>" class="select form-select"  >
                              <option value="">Select</option>
                          <?php 
                  $sql = "SELECT * FROM color order by id asc";
                  $result = mysqli_query($conn, $sql);
                  while($rw = mysqli_fetch_array($result))
                  { ?>
                   <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                  <?php } ?>
                              
                            </select>
                                     
              </td>
              <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="bundle"
                                    
                                    name="bundle[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bale<?php echo $i;?>"
                                 
                                    name="bale[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                 
                                  name="pcs[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="mtrs<?php echo $i;?>"
                                  name="mtrs[]"
                                  onkeyup="getexcess(reqqty<?php echo $i;?>.id);"
                                    onchange="getexcess(reqqty<?php echo $i;?>.id);"
                                    onblur="getexcess(reqqty<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
              
              <td style="padding: 0.3rem">
                               <select name="stockloc[]" id="stockloc<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM location_master order by location asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['location'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                               
                                  name="descr[]"
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
              <br>
                  </div>
                </div>
                 
            </div>
               
           
                          
                         <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
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

  $dcno = $_POST['dcno'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $vehicleno = $_POST['vehicleno'];
  $dvrname = $_POST['dvrname'];
  $tollerance = $_POST['tollerance'];
  
    $sql = "INSERT into fabric_inward (dcno,refno,date,partyname,vehicleno,dvrname,tollerance) values ('$dcno','$refno','$date','$partyname','$vehicleno','$dvrname','$tollerance')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['quality'] as $key => $val) {
    
    
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

    if ($orderno != '') {
       $sql1 = "INSERT into fabric_inward1 (cid,orderno,itemno,quality,reqqty,pcs,color,mtrs,descr,bundle,stockloc,width,bale,ref) 
 values ('$cid','$orderno','$itemno','$quality','$reqqty','$pcs','$color','$mtrs','$descr','$bundle','$stockloc','$width','$bale','$ref')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Fabric Registered Successfully');window.location='fabric_inward.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<!-- <script>
  function chkreqqty2(id,value){
    var c=id.substr(4);
   // alert(c);
    var reqqty=document.getElementById('reqqty'+c).value?document.getElementById('reqqty'+c).value:0;
    if(parseFloat(value)>parseFloat(reqqty)){
      alert("Meter Exceeded Required Quantity.");
      document.getElementById('mtrs'+c).value='';
      alert(mtrs);
    }
  }
  </script> -->

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