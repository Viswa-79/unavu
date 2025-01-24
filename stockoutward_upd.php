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
function get_product_details(id,value) {
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
  
$('#rate'+c).val(data.price);
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<?php
		   $fg1="select max(delno) as id from stockoutward";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
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
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Stock List</button>
                      <a href="stockoutwardlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                      <h4 class="mb-0">Stock Outward</h4>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM stockoutward WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3 mt-2">
                          <div class="col-md-4">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Del&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="delno"
                              name="delno"
                              readonly
                              value="<?php echo $wz1['delno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label >Staff&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="staff" id="staff" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['staff']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                        </div>
                         
                    </div><br><hr>
                      <div class="card mb-2 mt-4">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="text-align:center">S.No</th>
                                 
                                  <th>PARTICULARS</th> 
                                  <th>QTY</th>
                                  <th>UNIT</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM stockoutward1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

                <td style="padding: 0.3rem">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM product_master order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo   $rw1['productname'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>        
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    style="text-align:right"
                                    id="quantity"
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                <select name="unit[]" id="unit" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM unit_master order by unit asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>          
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
?>              
                              </tbody>
                            </table>
                          </div>
                
              </div>
             


 </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-secondary btn-prev" href="stockoutwardlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
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
</html>


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $delno = $_POST['delno'];
  $date = $_POST['date'];
  $staff = $_POST['staff'];


    $sql = "UPDATE stockoutward SET delno='$delno',date='$date',staff='$staff' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['quantity'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $productname = $_POST['productname'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];

    if ($quantity != '') {
      $sql1 = "UPDATE stockoutward1 SET productname='$productname',quantity='$quantity',unit='$unit' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

 echo "<script>alert('Stock Outward Updated Successfully');window.location='stockoutwardlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


