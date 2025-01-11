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
function get_process_details(id,value) {
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
  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_qty_details(value) {
//alert("hello");
  
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#orderqty').val(data.qty);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_ordqty.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<script>
  function calcdays(id){
    var c=id.substr(9);
    var startDate=document.getElementById('startdate'+c).value?document.getElementById('startdate'+c).value:0;
    var days=parseInt(document.getElementById('days'+c).value?document.getElementById('days'+c).value:0);


 // Convert the input string to a Date object
  const startDateObject = new Date(startDate);

  // Calculate the end date by adding the number of days
  const endDateObject = new Date(startDateObject.getTime() + days * 24 * 60 * 60 * 1000);

  // Format the end date as a string (you can adjust the format as needed)
  const endDateString = endDateObject.toISOString().split('T')[0];

  //alert(endDateString);
  
    document.getElementById('enddate'+c).value=endDateString;

  }
  </script>

<script>
function get_order_check(value) {
//alert(value);
var form='action_form';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

var sts = xmlhttp.responseText;

//alert(sts);

             if(sts==0)
            {
              alert("T & A Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }
      }
    };
    xmlhttp.open("GET","ajax/get_order_check.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>
<?php
		   $fg1="select max(bookno) as id from action_form";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
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
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Time&nbsp;&&nbsp;Action</button>
                      <a href="action_formlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                   
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM action_form WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3 mt-2">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $wz1['bookno']; ?>"
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
                              value="<?php echo $wz1['date']; ?>"/>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              onblur="get_qty_details(this.value);get_order_check(this.value);"
                              name="orderno"
                              class="form-control"
                              value="<?php echo $wz1['orderno']; ?>" />
                          </div>

                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty</label>
                            <input
                              type="text"
                              id="orderqty"
                              name="orderqty"
                              style="text-align:right"
                              class="form-control"
                              value="<?php echo $wz1['orderqty']; ?>" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Delivery&nbsp;Date</label>
                            <input
                              type="date"
                              id="deldate"
                              name="deldate"
                              class="form-control"
                              value="<?php echo $wz1['deldate']; ?>" />
                          </div>
                        </div>
                         
                    </div><br><hr><br>
                      <div class="card mb-2">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="text-align:center">S.No</th>
                                  <th>OPERATION</th> 
                                  <th>DAYS</th>
                                  <th>START&nbsp;DATE</th>
                                  <th>END&nbsp;DATE</th>
                                  <th>RESPONSIBLE</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM action_form1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

                <td style="padding: 0.3rem;width: 500px;">
                <select name="process[]" id="process<?php echo $i;?>" class="select form-select" onchange="get_process_details(this.id,this.value);" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM process order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['process']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo   $rw1['process'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>        
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    
                                    class="form-control"
                                    id="days<?php echo $i;?>"
                                    name="days[]"
                                    onchange="calcdays(startdate<?php echo $i;?>.id)"
                                    onkeyup="calcdays(startdate<?php echo $i;?>.id)"
                                    value="<?php echo $rw['days']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>                       
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    onchange="calcdays(this.id)"
                                    id="startdate<?php echo $i;?>"
                                    name="startdate[]"
                                    value="<?php echo $rw['startdate']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="enddate<?php echo $i;?>"
                                    name="enddate[]"
                                    value="<?php echo $rw['enddate']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem;width: 250px;">
                <select name="response[]" id="response" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM staff order by name asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['response']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
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
                          <a class="btn btn-label-dark " href="action_formlist.php">
                                <i class="ti ti-arrow-left"></i>
                                <span class="align-middle d-sm-inline-block  me-sm-1">Preview</span>
                            </a>
                            <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $orderqty = $_POST['orderqty'];
  $deldate = $_POST['deldate'];



   $sql = "UPDATE action_form SET bookno='$bookno',date='$date',orderno='$orderno',orderqty='$orderqty',deldate='$deldate' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['days'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $process = $_POST['process'][$key];
    $days = $_POST['days'][$key];
    $startdate = $_POST['startdate'][$key];
    $enddate = $_POST['enddate'][$key];
    $response = $_POST['response'][$key];

    if ($days != '') {
      $sql1 = "UPDATE action_form1 SET process='$process',days='$days',startdate='$startdate',enddate='$enddate',response='$response' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Time & Action Updated Successfully');window.location='action_formlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


