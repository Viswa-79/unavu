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
// document.getElementById('toitem'+c).innerHTML =r1[1];
					
            }
             else if(sts==0)
            {
              alert("Fabric Plan Already Made For This Order No.!");
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
function get_items1(id,value) {
//alert(value);
var c=id.substr(7);
var form='fabric_outward1';

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
document.getElementById('toitem'+c).innerHTML =r1[1];
					
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

}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<?php
$fg1="select max(book) as id from fabric_stock";
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
                      <button class="btn btn-label-primary">Fabric Stock Transfer</button>
                      <a href="fabric_stock_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric Stock
                          </a>
                    </div>   <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-3">
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="book"
                              name="book"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              
                            
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
                         
                          
                          </div><br><hr>
                        <div class="card">
                        
                        <div class="table-responsive">

                            <table class="table table-border border-top table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>ref&nbsp;no</th>
                                 
                                  <th>from&nbsp;order&nbsp;No</th>
                                  <th>From&nbsp;item&nbsp;No</th>
                                   <th>Quality</th>
                                  <th>color</th>
                                  <th>to&nbsp;order&nbsp;No</th>
                                  <th>to&nbsp;item&nbsp;No</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                               
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
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
                  <input
                  type="text"
                  class="form-control"
                  id="orderno<?php echo $i;?>"
                  name="orderno[]"
                  onchange="get_items(this.id,this.value);"
                  aria-label="Product barcode"/>
                  
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]"  style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="color[]" style="width:200px" id="color<?php echo $i;?>" class="select form-select" >
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
                                    id="toorder<?php echo $i;?>"
                                    
                                    name="toorder[]"
                                    onchange="get_items1(this.id,this.value);"

                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="toitem[]"    style="width:200px" id="toitem<?php echo $i;?>" class="select form-select" >
                              <option value="">Select</option>
                        
                              
                            </select>
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                <select name="unit[]" style="width:130px" id="unit<?php echo $i;?>" onKeyDown="ee1(this.id);" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by unit asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                     </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 21; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?> </td>
                                  <td style="padding: 0.3rem">
                  <input
                  type="text"
                  class="form-control"
                  id="ref<?php echo $i;?>"
                  name="ref[]"
                  
                  aria-label="Product barcode"/>
                  
                </td>
                
                <td style="padding: 0.3rem">
                  <input
                  type="text"
                  class="form-control"
                  id="orderno<?php echo $i;?>"
                  name="orderno[]"
                  onchange="get_items(this.id,this.value);"
                  aria-label="Product barcode"/>
                  
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]"  style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="color[]" style="width:200px" id="color<?php echo $i;?>" class="select form-select" >
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
                                    id="toorder<?php echo $i;?>"
                                    
                                    name="toorder[]"
                                    onchange="get_items1(this.id,this.value);"

                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="toitem[]"    style="width:200px" id="toitem<?php echo $i;?>" class="select form-select" >
                              <option value="">Select</option>
                       
                              
                            </select>
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                <select name="unit[]" style="width:130px" id="unit<?php echo $i;?>" onKeyDown="ee1(this.id);" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by unit asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
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

  $book = $_POST['book'];
  $dcno = $_POST['dcno'];
  $date = $_POST['date'];
 
    $sql = "INSERT into fabric_stock (book,dcno,date) values ('$book','$dcno','$date')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['color'] as $key => $val) {
    
    
    $ref = $_POST['ref'][$key];
    $color = $_POST['color'][$key];
    $quality = $_POST['quality'][$key];
    $itemno = $_POST['itemno'][$key];
    $orderno = $_POST['orderno'][$key];
    $toitem = $_POST['toitem'][$key];
    $toorder = $_POST['toorder'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    
    if ($ref != '') {
    echo  $sql1 = "INSERT into fabric_stock1 (cid,quality,itemno,orderno,toitem,toorder,quantity,unit,ref,color) 
 values ('$cid','$quality','$itemno','$orderno','$toitem','$toorder','$quantity','$unit','$ref','$color')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Fabric Stock Registered successfully');window.location='fabric_stock.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
