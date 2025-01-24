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

<script>
function get_items(value) {
//alert(value);
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
						  document.getElementById('itemno'+i).innerHTML = r1[1];
					   }
            }
           
            else if(sts==0)
            {
              alert("Sample Enquiry Already Made For This Enquiry No.!");
              document.getElementById('enq_no').value='';
            }

            else if(sts==2)
            {
              alert("Enquiry No. Not Available.!");
              document.getElementById('enq_no').value='';
            }

      }
    };
    xmlhttp.open("GET","ajax/get_enq_items.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(book) as id from sampleenq";
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
                      <button class="btn btn-label-primary">Sample Enquiry</button>
                      <a href="sampleenqlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Sample
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Sample&nbsp;Enq&nbsp;No&nbsp;<span style="color:red;">*</span></label>
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
                            <label class="form-label" for="collapsible-fullname"> Enquiry No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="enq_no"
                              name="enq_no"
                              onblur="get_items(this.value);"
                              required
                              autofocus
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Sample Order No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="sample"
                              name="sample"
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Ref No</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
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
                                  <th>Item&nbsp;Description</th> 
                                  <th>Print</th> 
                                  <th>Label</th> 
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
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                 
                                   <?php echo $sno; ?>
                                    
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
                 <input style="width:200px"
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                   
                                    name="print[]"
                                    style="width:150px"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                    style="width:110px"
                                    name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    style="width:100px"
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    style="width:100px"
                                    name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="unit"
                                    class="form-control"
                                    id="quantity"
                                    style="text-align:right;width:100px"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i;?>"
                                    style="width:100px"
                                    onKeyDown="ee1(this.id);"
                                    name="unit[]"
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
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
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
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    
                                    name="print[]"
                                    style="width:150px"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                    style="width:110px"
                                    name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    style="width:100px"
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    style="width:100px"
                                    name="size[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity"
                                    style="text-align:right"
                                    name="quantity[]"
                                    style="width:100px"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i; ?>"
                                    style="width:100px"
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
              <br><hr>
              <div class="row g-3">
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Airway Bill No</label>
                            <input
                              type="text"
                              id="airway"
                              name="airway"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Follow Up</label>
                            <select name="follow" id="follow" class="select form-select" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          </div>
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
  $sample = $_POST['sample'];
  $partyname = $_POST['partyname'];
  $follow = $_POST['follow'];
  $enq_no = $_POST['enq_no'];
  $refno = $_POST['refno'];
  $airway = $_POST['airway'];
  $remarks = $_POST['remarks'];
  
    $sql = "INSERT into sampleenq (book,date,sample,partyname,follow,enq_no,refno,airway,remarks) values ('$book','$date','$sample','$partyname','$follow','$enq_no','$refno','$airway','$remarks')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['itemdesc'] as $key => $val) {
    
    
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $print = $_POST['print'][$key];
    $label = $_POST['label'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];

    if ($itemno != '') {
       $sql1 = "INSERT into sampleenq1 (cid,itemno,itemdesc,label,quality,print,size,quantity,unit) 
 values ('$cid','$itemno','$itemdesc','$label','$quality','$print','$size','$quantity','$unit')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Sample Registered Successfully');window.location='sampleenquiry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
