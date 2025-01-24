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
$('#label'+c).val(data.label);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_items(value) {
//alert(value);
var form='sample';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(sts);
if(sts==1)
{

  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML =r1[1];
					   }
            }
             else if(sts==0)
            {
              alert("Sample Already Made For This Order No.!");
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
<?php
$fg1="select max(book) as id from sample";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
                      <button class="btn btn-label-primary">Order Sample</button>
                      <a href="samplelist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Sample
                          </a>
                    </div>   <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-3">
                          
                          <div class="col-md-3">
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
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              autofocus
                              name="orderno"
                              class="form-control"
                              onblur="get_items(this.value);" required/>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Airway Bill No</label>
                            <input
                              type="text"
                              id="airway"
                              autofocus
                              name="airway"
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
                                 
                                  <th>Item&nbsp;No</th>
                                  <th>PO&nbsp;No</th>
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
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                               
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                </td>
              
                <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
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
                  <input
                  type="text"
                  class="form-control"
                  id="pono<?php echo $i;?>"
                  name="pono[]"
                  
                  aria-label="Product barcode"/>
                  
                </td>
                
                <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    
                                    name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    
                                    name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i;?>"
                                    
                                    onKeyDown="ee1(this.id);"
                                    name="unit[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                
               
                                  
                                </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 21; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?> </td>
                                  
                
                <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
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
                  <input
                  type="text"
                  class="form-control"
                  id="pono<?php echo $i;?>"
                
                  name="pono[]"
                  
                  aria-label="Product barcode"/>
                  
                </td>
                
                <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    
                                    name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    
                                    name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i; ?>"
                                    
                                    name="unit[]"
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
</html>


<?php
if (isset($_POST['submit'])) {

  $book = $_POST['book'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $airway = $_POST['airway'];
  $partyname = $_POST['partyname'];
  
    $sql = "INSERT into sample (book,date,orderno,airway,partyname) values ('$book','$date','$orderno','$airway','$partyname')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['itemdesc'] as $key => $val) {
    
    

    $pono = $_POST['pono'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $itemno = $_POST['itemno'][$key];
    $print = $_POST['print'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $print = $_POST['print'][$key];
    
    if ($itemdesc != '') {
      $sql1 = "INSERT into sample1 (cid,pono,itemdesc,itemno,print,quality,size,quantity,unit) 
 values ('$cid','$pono','$itemdesc','$itemno','$print','$quality','$size','$quantity','$unit')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Sample Registered successfully');window.location='sample.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
