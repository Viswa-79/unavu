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
var form='cutpanel_outward1';

		//alert(c);		
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r);
if(sts==1)
{
document.getElementById('itemno'+c).innerHTML =r1[1];
					
            }
             else if(sts==0)
            {
              alert("Cut Panel Outward Already Made For This Order No.!");
              document.getElementById('orderno').value='';
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

<?php
$fg1="select max(dcno) as id from cutpanel_outward";
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
                      <button class="btn btn-label-primary">Cut Panel Outward</button>
                      <a href="cutpaneloutlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Cut Panel
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
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              autofocus />
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
                            <label class="form-label" for="collapsible-fullname">To&nbsp;Process&nbsp;<span style="color:red;">*</span></label>
                            <select name="process" id="process" class="select form-select" onchange="get_details(this.value)" required>
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM process where id in('4','5') order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" >
                                <option value="">Select</option>
						
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Vehicle&nbsp;No&nbsp;<span style="color:red;">*</span></label>
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
                          
                          
                          
                          </div><br><hr>
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
                                  <th>color</th> 
                                  <th>Stock</th>
                                  <th>Quantity</th>
                                  <th>Balance&nbsp;qty</th>
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
                                    id="orderno<?php echo $i; ?>"
                                    
                                    name="orderno[]"
                                    onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="ref<?php echo $i; ?>"
                                    name="ref[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);get_cut(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                               <select name="color[]"    style="width:200px" id="color<?php echo $i;?>" class="select form-select" >
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
                 <input style="width:130px"
                                    type="text"
                                    class="form-control"
                                    id="totcut<?php echo $i;?>"
                                    name="totcut[]"
                                    readonly
                                    style="text-align:right"
                                    onkeyUp="tott(pcs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                  </td>

                                  <td style="padding: 0.3rem">
                                    <input 
                                    type="text"
                                    class="form-control"
                                    id="pcs<?php echo $i;?>"
                                    name="pcs[]"
                                    
                                    onkeyup="chkreqqty2(this.id,this.value);tott(pcs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>   
                </td>

                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="balqty<?php echo $i;?>"
                                    name="balqty[]"
                                    style="text-align:right"
                                    onkeyUp="tott(pcs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
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
                                  id="orderno<?php echo $i; ?>"
                                  
                                  name="orderno[]"
                                  onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"

                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input  
                                  type="text"
                                  class="form-control"
                                  id="ref<?php echo $i; ?>"
                                  name="ref[]"
                                  onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                             <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);get_cut(this.id,this.value);" >
                              <option value="">Select</option>
                          <?php 
                  $sql = "SELECT * FROM item_master order by code asc";
                  $result = mysqli_query($conn, $sql);
                  while($rw = mysqli_fetch_array($result))
                  { ?>
                   <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                  <?php } ?>
                              
                            </select>
                                     
              </td>
              <td style="padding: 0.3rem">
                             <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>" class="select form-select"  >
                              <option value="">Select</option>
                          <?php 
                  $sql = "SELECT * FROM quality_master order by id asc";
                  $result = mysqli_query($conn, $sql);
                  while($rw = mysqli_fetch_array($result))
                  { ?>
                   <option value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                  <?php } ?>
                              
                            </select>
                                     
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
                                  id="totcut<?php echo $i;?>"
                                  name="totcut[]"
                                  readonly
                                    style="width:130px"
                                  onkeyUp="tott(pcs<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                </td>

                                <td style="padding: 0.3rem">
                                  <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  name="pcs[]"
                                  style="text-align:right"
                                  onkeyup="chkreqqty2(this.id,this.value);tott(pcs<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                </td>
                <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="balqty<?php echo $i;?>"
                                  name="balqty[]"
                                  style="text-align:right"
                                  onkeyUp="tott(pcs<?php echo $i;?>.id);"
                                  aria-label="Product barcode"/>
                                     
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
  $process = $_POST['process'];
  $vehicleno = $_POST['vehicleno'];
  $dvrname = $_POST['dvrname'];
  
    $sql = "INSERT into cutpanel_outward (dcno,refno,date,partyname,process,vehicleno,dvrname) values ('$dcno','$refno','$date','$partyname','$process','$vehicleno','$dvrname')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['quality'] as $key => $val) {
    
    
    $orderno = $_POST['orderno'][$key];
    $itemno = $_POST['itemno'][$key];
    $ref = $_POST['ref'][$key];
    $quality = $_POST['quality'][$key];
    $color = $_POST['color'][$key];
    $totcut = $_POST['totcut'][$key];
    $balqty = $_POST['balqty'][$key];
    $pcs = $_POST['pcs'][$key];
    $descr = $_POST['descr'][$key];

    if ($orderno != '') {
       $sql1 = "INSERT into cutpanel_outward1 (cid,orderno,ref,itemno,quality,pcs,color,totcut,balqty,descr) 
 values ('$cid','$orderno','$ref','$itemno','$quality','$pcs','$color','$totcut','$balqty','$descr')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Cut Panel Outward Registered Successfully');window.location='cutpanel_outward.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 



<script>
function get_cut(id,value) {
  var c=id.substr(6);
  // alert(c);

  var value2=document.getElementById('orderno'+c).value;
  if (value != "") {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#totcut'+c).val(data.totalcut);

}

      }
    };
    xmlhttp.open("GET","ajax/get_cutting.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
  function chkreqqty2(id,value){
    var c=id.substr(3);
    var totcut=document.getElementById('totcut'+c).value?document.getElementById('totcut'+c).value:0;
   if(parseFloat(value)>parseFloat(totcut)){
      alert("Cutting Quantity Exceeded Total Cutting.");
      document.getElementById('pcs'+c).value='';
    }
  }
  </script>

<script language="javascript" type="text/javascript">
function tott(v1)
{
//alert(v1);

a=v1;
b=(a.substr(3));

var t=document.getElementById('totcut'+b).value?document.getElementById('totcut'+b).value:0;
//alert(t);
        var v=document.getElementById('pcs'+b).value?document.getElementById('pcs'+b).value:0;
        
        var tt=parseFloat(t) - parseFloat(v);
        
        //alert(tt);
		document.getElementById('balqty'+b).value=tt.toFixed(2);
		  
}
 
</script>

<script>
function get_details(value) {
// alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);

  document.getElementById('partyname').innerHTML =r;
			    }
    };
    xmlhttp.open("GET","ajax/getparty_process.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>