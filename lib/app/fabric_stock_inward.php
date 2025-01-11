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
function get_items2(id,value) {
//alert(value);
var c=id.substr(7);
				
//var form='fabric_computation';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

  
						  document.getElementById('itemno'+c).innerHTML =r;
				
            
            
      }
    };
    xmlhttp.open("GET","ajax/get_orditem1.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<?php
$fg1="select max(dcno) as id from fabric_stock_inward";
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
                      <button class="btn btn-label-primary">Fabric Stock Inward</button>
                      <a href="fabric_stock_inward_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View List
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
                          
                          
                          </div><br><hr>
                        <div class="card">
                        
                        <div class="table-responsive">

                            <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>Order&nbsp;No</th>
                                  <th>Item&nbsp;No</th>
                                  <th>quality</th>
                                  <th>width</th>  
                                  <th>color</th> 
                                  <th>Bales</th> 
                                  <th>Bale&nbsp;No's</th> 
                                  <th>pieces</th>
                                  <th>meters</th>
                                  <th>Fabric&nbsp;stock&nbsp;location</th> 
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
                                    onchange="get_items2(this.id,this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>       
                </td>
                          
               
               
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>"  class="select form-select"  >
                                <option value="">Select</option>
        
                                       
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
                                    onchange="get_items2(this.id,this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>       
                </td>
                          
               
               
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>"  class="select form-select"  >
                                <option value="">Select</option>
        
                                       
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
                               
                                    aria-label="Product barcode"/>
                                       
                </td>
                
               
             
                <td style="padding: 0.3rem">
                               <select name="stockloc[]"    id="stockloc<?php echo $i;?>" class="select form-select"  >
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
  
$sql = "INSERT into fabric_stock_inward (dcno,refno,date,partyname,vehicleno,dvrname) values ('$dcno','$refno','$date','$partyname','$vehicleno','$dvrname')";
   //echo $sql; 
   $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['quality'] as $key => $val) {
    
    

    $orderno = $_POST['orderno'][$key];
    $itemno = $_POST['itemno'][$key];
    $quality = $_POST['quality'][$key];
 
    
    $color = $_POST['color'][$key];
    $bundle = $_POST['bundle'][$key];
    $pcs = $_POST['pcs'][$key];
    $mtrs = $_POST['mtrs'][$key];
    $descr = $_POST['descr'][$key];
    $stockloc = $_POST['stockloc'][$key];
    $width = $_POST['width'][$key];
    $bale = $_POST['bale'][$key];

    if ($quality != '') {
      $sql1 = "INSERT into fabric_stock_inward1 (cid,orderno,itemno,quality,pcs,color,mtrs,descr,bundle,stockloc,width,bale) 
 values ('$cid','$orderno','$itemno','$quality','$pcs','$color','$mtrs','$descr','$bundle','$stockloc','$width','$bale')";
     echo $sql1;
    $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

//echo "<script>alert('Fabric Stock Inward Registered Successfully');window.location='fabric_stock_inward.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

