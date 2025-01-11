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
    xmlhttp.open("GET","ajax/get_qty.php?itemno="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items(id,value) {
//alert(value);
var c=id.substr(7);
var form='cutpanel_inward1';

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
            //  else if(sts==0)
            // {
            //   alert("Fabric Plan Already Made For This Order No.!");
            //   document.getElementById('orderno').value='';
            // }
            // else if(sts==2)
            // {
            //   alert("Order No. Not Available.!");
            //   document.getElementById('orderno').value='';
            // }

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
<?php
$fg1="select max(dcno) as id from printing_inward";
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
                      <button class="btn btn-label-primary">Printing Inward</button>
                      <a href="printinlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Printing
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
                            <label class="form-label" for="collapsible-fullname">Dc&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              autofocus
                              onblur="get_details(this.value);get_dcdetails(this.value);get_print(this.value);"
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
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" required>
                                <option value="Not Selected">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster where party_group IN('Job Work','Internal Transfer') order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>


                          <!-- <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Process&nbsp;<span style="color:red;">*</span></label>
                            <select name="process" id="process" class="select form-select" required >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM process where process IN ('Printing','Sewing') order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div> -->


                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Vehicle&nbsp;No&nbsp;</label>
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
                        <div class="card" >
                        
                        <div class="table-responsive" id="print">

                            
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
  
    $sql = "INSERT into printing_inward (dcno,refno,date,partyname,process,vehicleno,dvrname) values ('$dcno','$refno','$date','$partyname','$process','$vehicleno','$dvrname')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['pcs'] as $key => $val) {
    
    
    $orderno = $_POST['orderno'][$key];
    $ref = $_POST['ref'][$key];
    $itemno = $_POST['itemno'][$key];
    $quality = $_POST['quality'][$key];
    $color = $_POST['color'][$key];
    $pcs = $_POST['pcs'][$key];
    $descr = $_POST['descr'][$key];

    if ($orderno != '') {
       $sql1 = "INSERT into printing_inward1 (cid,orderno,ref,itemno,quality,color,pcs,descr) 
 values ('$cid','$orderno','$ref','$itemno','$color',$quality,'$pcs','$descr')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Printing Registered Successfully');window.location='printing_inward.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script>
function get_details(value) {
//alert(value);
var form='printing_inward';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r1);

if(sts==1)
{
  document.getElementById('cutpandcno').innerHTML =r1[1];
					
            }
						 
            //   if(sts==2)
            // {
            //   alert("Printing Inward Already Made For This Dc No.!");
            //   document.getElementById('refno').value='';
            //   document.getElementById('cutpandcno').innerHTML ='';
            // }
            // else if(sts==2)
            // {
            //   alert("Order No. Not Available.!");
            //   document.getElementById('refno').value='';
            // }

          }
    };
    xmlhttp.open("GET","ajax/get_cutpandcno1.php?refno="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_dcdetails(value) {
 

  //alert(value);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#date').val(data.date);  
$('#process').val(data.process);
$('#vehicleno').val(data.vehicleno);
$('#dvrname').val(data.dvrname);
$('#partyname').val(data.partyname);


}

      }
    };
    xmlhttp.open("GET","ajax/getdcdetails1.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_print(value) {
// alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
						  document.getElementById('print').innerHTML =r;		
            }
    };
    xmlhttp.open("GET","ajax/get_printinward.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>