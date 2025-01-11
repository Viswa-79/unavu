<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(8));
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
  var c=id.substr(11);
  //alert(c);
				
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
    xmlhttp.open("GET","ajax/getprocess.php?id="+value,true);
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
    var deldate=parseInt(document.getElementById('deldate').value?document.getElementById('deldate').value:0);


 // Convert the input string to a Date object
  const startDateObject = new Date(startDate);

  // Calculate the end date by adding the number of days
  const endDateObject = new Date(startDateObject.getTime() + days * 24 * 60 * 60 * 1000);

  // Format the end date as a string (you can adjust the format as needed)
  const endDateString = endDateObject.toISOString().split('T')[0];

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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Time&nbsp;&&nbsp;Action</button>
                      <a href="action_formlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                      </a>
               </div>
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                 
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $enq; ?>"
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
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              required
                              onblur="get_qty_details(this.value);get_order_check(this.value);"
                              autofocus
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty</label>
                            <input
                              type="text"
                              id="orderqty"
                              name="orderqty"
                              style="text-align:right"
                              class="form-control"
							  required
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Delivery&nbsp;Date</label>
                            <input
                              type="date"
                              id="deldate"
                              name="deldate"
                              class="form-control"
                               required />
                          </div>
                        </div><br><hr><br>
                        <div class="row g-3"> 
                      <div class="card mb-2 mt-2">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th>S.No</th>
                                  <th>OPERATION</th> 
                                 
                                  <th>START&nbsp;DATE</th>
								   <th>DAYS</th>
                                  <th>END&nbsp;DATE</th>
                                  <th>RESPONSIBLE</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td> 
                </td>
                <td style="padding: 0.3rem;width: 500px;">
                <select name="process[]" id="process<?php echo $i;?>" class="select form-select" onchange="get_process_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM process order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                       
              
                <td style="padding: 0.3rem">
                <input
                                    type="date"
                                    
                                    class="form-control"
                                    id="startdate<?php echo $i;?>"
                                    name="startdate[]"
                                    onchange="calcdays(this.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>
				<td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="days<?php echo $i;?>"
                                    onchange="calcdays(startdate<?php echo $i;?>.id)"
                                    onkeyup="calcdays(startdate<?php echo $i;?>.id)"
                                    name="days[]"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    
                                    class="form-control"
                                    id="enddate<?php echo $i;?>"
                                    name="enddate[]"
                                    aria-label="Product barcode"/>
                                       
                </td> <td style="padding: 0.3rem;width: 250px;">
                <select name="response[]"id="response<?php echo $i;?>" onKeyDown="ee1(this.id);" class="select form-select">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM staff order by name asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
			</tr>
                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                                  
                <td style="padding: 0.3rem;width: 500px;">
                <select name="process[]" id="process<?php echo $i;?>" class="select form-select" onchange="get_process_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM process order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    onchange="calcdays(this.id)"
                                    class="form-control"
                                    id="startdate<?php echo $i;?>"
                                    name="startdate[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
				  <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    
                                    class="form-control"
                                    id="days<?php echo $i;?>"
                                    name="days[]"
                                    onchange="calcdays(startdate<?php echo $i;?>.id)"
                                    onkeyup="calcdays(startdate<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                    </td><td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    
                                    class="form-control"
                                    id="enddate<?php echo $i;?>"
                                    name="enddate[]"
                                    aria-label="Product barcode"/>
                                       
                </td> <td style="padding: 0.3rem;width: 250px;">
                <select name="response[]"id="response<?php echo $i;?>"onKeyDown="ee1(this.id);" class="select form-select">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM staff order by name asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
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
              </div>    
              </div>
               


                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
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

  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $orderqty = $_POST['orderqty'];
  $deldate = $_POST['deldate'];
  
     $sql = "INSERT into action_form (bookno,date,orderno,orderqty,deldate)
    values ('$bookno','$date','$orderno','$orderqty','$deldate')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['days'] as $key => $val) {
    
    
    $process = $_POST['process'][$key];
    $days = $_POST['days'][$key];
    $startdate = $_POST['startdate'][$key];
    $enddate = $_POST['enddate'][$key];
    $response = $_POST['response'][$key];

    if ($days != '') {
      $sql1 = "INSERT into action_form1 (cid,process,days,startdate,enddate,response) 
 values ('$cid','$process','$days','$startdate','$enddate','$response')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Time & Action Registered successfully');window.location='action_form.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


