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

<?php
$fg1="select max(id) as id from fabric_stock";
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
                     <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>                  
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        <?php
                              $sql4 = " SELECT * FROM fabric_stock WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                          <div class="col-md-2">

                            <label class="form-label" for="collapsible-fullname">Book No&nbsp;<span style="color:red;">*</span></label>
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

                            <label class="form-label" for="collapsible-fullname">DC No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              
                              value="<?php echo $wz1['dcno']; ?>"
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
                          
                         
                          </div><br><hr>
                        <div class="card">
                        
                        <div class="table-responsive">

                        <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  
                                  <th>ref&nbsp;no</th>
                                 
                                  <th>from&nbsp;order&nbsp;no</th>
                                  <th>From&nbsp;Item&nbsp;No</th>
                                  <th>Quality</th>
                                  <th>color</th>
                                  <th>to&nbsp;order&nbsp;no</th>
                                  <th>To&nbsp;Item&nbsp;No</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM fabric_stock1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $ordno=$rw['orderno'];
                                $ordno1=$rw['toorder'];
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                
                                  <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>
                <td style="padding: 0.3rem">
        <input
                   type="text"
                   class="form-control"
                   id="ref<?php echo $i;?>"
                  
                   name="ref[]"
                   value="<?php echo $rw['ref']; ?>"
                   aria-label="Product barcode"/>
                      
        </td>
        <td style="padding: 0.3rem">
        <input
                   type="text"
                   class="form-control"
                   id="orderno<?php echo $i;?>"
                  
                   name="orderno[]"
                   value="<?php echo $rw['orderno']; ?>"
                   aria-label="Product barcode"/>
                      
        </td>
        <td style="padding: 0.3rem">
              <select name="itemno[]" style="width:200px" id="itemno<?php echo $i;?>"  class="select form-select" >
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
                  <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                    <option value="">Select</option>
                    <?php 
					$sql = "SELECT * FROM quality_master order by quality asc";
          $result = mysqli_query($conn, $sql);
          while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['quality']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['quality'];?></option>
                     <?php } ?>
                     
                    </select>
                    
                  </td>
                <td style="padding: 0.3rem">
                  <select name="color[]" style="width:200px" id="color<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                    <option value="">Select</option>
                    <?php 
					$sql = "SELECT * FROM color order by color asc";
          $result = mysqli_query($conn, $sql);
          while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                     <?php } ?>
                     
                    </select>
                    
                  </td>
                  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="toorder<?php echo $i;?>"
                                    
                                    name="toorder[]"
                                    value="<?php echo $rw['toorder']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
              <select name="toitem[]" style="width:200px" id="toitem<?php echo $i;?>"  class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM order2 m left join order1 s on s.id=m.cid join item_master n on m.itemno=n.id where s.ord_no='$ordno1' order by itemno asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['toitem']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>           
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
                <select name="unit[]" style="width:130px" id="unit<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                    <option value="">Select</option>
                    <?php 
					$sql = "SELECT * FROM unit_master order by unit asc";
          $result = mysqli_query($conn, $sql);
          while($rw1 = mysqli_fetch_array($result))
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
              <br>
                  </div>
                </div>
                 
            </div>
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="fabric_stock_list.php">
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

  $cid = $_POST['cid'];
  $book = $_POST['book'];
  $date = $_POST['date'];
  $dcno = $_POST['dcno'];

  
    $sql = "UPDATE fabric_stock SET book='$book',date='$date',dcno='$dcno' WHERE id='$cid'";
    $result = mysqli_query($conn, $sql);
  
    

  foreach ($_POST['quality'] as $key => $val) {
    

    $rid = $_POST['rid'][$key];
    $toorder = $_POST['toorder'][$key];
    $toitem = $_POST['toitem'][$key];
    $orderno = $_POST['orderno'][$key];
    $itemno = $_POST['itemno'][$key];
    $quality = $_POST['quality'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $ref = $_POST['ref'][$key];
    $color = $_POST['color'][$key];
    
    if ($quality != '') {
      $sql1 = "UPDATE  fabric_stock1 SET toorder='$toorder',toitem='$toitem',orderno='$orderno',itemno='$itemno',quality='$quality',ref='$ref',color='$color',
    quantity='$quantity',unit='$unit' WHERE id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

 echo "<script>alert('Fabric Stock Updated successfully');window.location='fabric_stock_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
