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
var form='sewing_inward1';

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
// alert(r);
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
                      <button class="btn btn-label-primary">Checking Outward</button>
                      <a href="checkingoutlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Checking
                          </a>
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                                <div class="card mb-2 mt-2">
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        <?php
                              $sql4 = " SELECT * FROM checking_outward WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $wz1['dcno']; ?>"
                              class="form-control"
                               />
                          </div>

                          <div class="col-md-2">

                            <label class="form-label" for="collapsible-fullname">Dc&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              
                              value="<?php echo $wz1['refno']; ?>"
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
                            <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname"  class="select form-select" required>
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster where party_group IN('Job Work','Internal Transfer') order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
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
                              value="<?php echo $wz1['vehicleno']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Driver&nbsp;Name</label>
                            <input
                              type="text"
                              id="dvrname"
                              name="dvrname"
                              class="form-control"
                              value="<?php echo $wz1['dvrname']; ?>"
                              placeholder="" />
                          </div>
                          
                          </div><br><hr>
                        <div >
                        
                        <div class="table-responsive">

                        <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                 
                                  <th>order&nbsp;No</th> 
                                  <th>ref&nbsp;No</th> 
                                  <th>item&nbsp;No</th> 
                                  <th>cutting&nbsp;total</th>
                                  <th>pieces</th>
                                  <th hidden>Loop&nbsp;Wastage[Kgs]</th>
                                  <th>ADAS[Pcs]</th>
                                  <th>Loss Qty</th>
                                  <th>Description</th> 
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $sno=1; $i=0;
                              $sql4 = " SELECT * FROM checking_outward1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $ordno=$rw['orderno'];
                                  ?>
                             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                <tr>
                                <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
              <td style="padding: 0.3rem">
               <input  
                                  type="text"
                                  class="form-control"
                                  id="orderno"
                                  value="<?php echo $rw['orderno']; ?>"
                                  name="orderno[]"
                                  onchange="get_items(this.id,this.value);"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input  
                                  type="text"
                                  class="form-control"
                                  id="ref"
                                  value="<?php echo $rw['ref']; ?>"
                                  name="ref[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="itemno[]"  id="itemno<?php echo $i;?>"  onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM order2 m left join order1 s on s.id=m.cid join item_master n on m.itemno=n.id where s.ord_no='$ordno' order by itemno asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="totcut<?php echo $i;?>"
                                  value="<?php echo $rw['totcut']; ?>"
                                  name="totcut[]"
                                  readonly
                                  aria-label="Product barcode"/>
                                     
              </td> 
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  value="<?php echo $rw['pcs']; ?>"
                                  name="pcs[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td> 
                <td hidden style="padding: 0.3rem">
                 <input hidden
                                    type="text"
                                    class="form-control"
                                    id="loopwaste"
                                name="loopwaste[]"
                                value="<?php echo $rw['loopwaste']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="adas"
                                name="adas[]"
                                value="<?php echo $rw['adas']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="loss<?php echo $i;?>"
                                  value="<?php echo $rw['loss']; ?>"
                                  name="loss[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                                  value="<?php echo $rw['descr']; ?>"
                                  name="descr[]"
                                  onKeyDown="ee1(this.id);"
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
              <br>
                        </div>
                  </div>
                </div>
                 
            
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="checkingoutlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
  <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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
  $cid =$_POST['cid'];
  $dcno = $_POST['dcno'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $vehicleno = $_POST['vehicleno'];
  $dvrname = $_POST['dvrname'];

  $sql = "UPDATE checking_outward SET dcno='$dcno',refno='$refno',date='$date',partyname='$partyname',vehicleno='$vehicleno',
 dvrname='$dvrname' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['pcs'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
  
    
      $orderno = $_POST['orderno'][$key];
      $itemno = $_POST['itemno'][$key];
      $ref = $_POST['ref'][$key];
      $pcs = $_POST['pcs'][$key];
      $totcut = $_POST['totcut'][$key];
      $loopwaste = $_POST['loopwaste'][$key];
      $adas = $_POST['adas'][$key];
      $loss = $_POST['loss'][$key];
      $descr = $_POST['descr'][$key];
    
   $sql1 = "UPDATE  checking_outward1 SET cid='$cid',orderno='$orderno',ref='$ref',itemno='$itemno',pcs='$pcs',totcut='$totcut',loopwaste='$loopwaste',adas='$adas',loss='$loss',descr='$descr'  WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Checking Outward Updated Successfully');window.location='checkingoutlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
