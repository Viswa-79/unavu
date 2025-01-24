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

<?php
$fg1="select max(id) as id from sampleenq";
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
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                                <div class="card mb-2 mt-2">
                      <form class="card-body" action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <?php
                              $sql4 = " SELECT * FROM sampleenq WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Sample&nbsp;Enq&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="book"
                              name="book"
                              readonly
                              value="<?php echo $wz1['book']; ?>"
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
                            <label class="form-label" for="collapsible-fullname"> Enquiry No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="enq_no"
                              onblur="get_party_details(this.value);"

                              name="enq_no"
                              value="<?php echo $wz1['enq_no']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Sample Order No</label>
                            <input
                              type="text"
                              id="sample"
                              name="sample"
                              
                              class="form-control"
                              value="<?php echo $wz1['sample']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Ref No</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              value="<?php echo $wz1['refno']; ?>"
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
                                  $sno=1; $i=0;
                              $sql4 = " SELECT * FROM sampleenq1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                <tr>
                                <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                                <td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                  
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                    value="<?php echo $rw['itemdesc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                   
                                    name="print[]"
                                    style="width:150px"
                                    value="<?php echo $rw['print']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                   
                                    name="label[]"
                                    value="<?php echo $rw['label']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                  
                                    name="quality[]"
                                    value="<?php echo $rw['quality']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    
                                    name="size[]"
                                    value="<?php echo $rw['size']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unit<?php echo $i;?>"
                                    
                                    onKeyDown="ee1(this.id);"
                                    name="unit[]"
                                    value="<?php echo $rw['unit']; ?>"
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
              <br><hr>
              <div class="row g-3">
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Airway Bill No</label>
                            <input
                              type="text"
                              id="airway"
                              name="airway"
                              value="<?php echo $wz1['airway']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Follow Up</label>
                            <select name="follow" id="follow" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['follow']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
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
                              value="<?php echo $wz1['remarks']; ?>"
                              placeholder="" />
                          </div>
                          
                          </div><br>
                         
                        </div>
                  </div>
                </div>
                 
            
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="sampleenqlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
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
  $cid =$_POST['cid'];
  $book = $_POST['book'];
  $date = $_POST['date'];
  $sample = $_POST['sample'];
  $follow = $_POST['follow'];
  $enq_no = $_POST['enq_no'];
  $refno = $_POST['refno'];
  $airway = $_POST['airway'];
  $remarks = $_POST['remarks'];

  $sql = "UPDATE sampleenq SET book='$book',date='$date',sample='$sample',follow='$follow',enq_no='$enq_no',
 refno='$refno',airway='$airway',remarks='$remarks' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['quality'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
  
    
      $itemno = $_POST['itemno'][$key];
      $itemdesc = $_POST['itemdesc'][$key];
      $print = $_POST['print'][$key];
      $label = $_POST['label'][$key];
      $quality = $_POST['quality'][$key];
      $size = $_POST['size'][$key];
      $quantity = $_POST['quantity'][$key];
      $unit = $_POST['unit'][$key];
    
   $sql1 = "UPDATE  sampleenq1 SET cid='$cid',itemno='$itemno',itemdesc='$itemdesc',print='$print',label='$label',quality='$quality',print='$print',quantity='$quantity',unit='$unit'  WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Sample Updated Successfully');window.location='sampleenqlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
