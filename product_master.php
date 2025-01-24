<?php include "config.php"; ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Users List Table -->
              <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >PRODUCT LIST</h5>
                      <div class="action-btns">
                      
                      
                      <button
                        type="button"
                        class="btn btn-icon btn-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Print">
                        <span class="ti ti-printer"></span>
                      </button>
                    
                      &nbsp;  <button type="button" 
                class="btn btn-icon btn-secondary"
                data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="PDF">
                  <span class="ti ti-file"></span>
                   </button>
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addParty();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="modal"
                          data-bs-target="#largeModal"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Product</span></span></button>
                      </div>
                    </div>

                    <div class="card-body">
                  <div class="card-datatable table-responsive">
                <table class="table table-hover">
                    <thead>
                      <tr>
                      <th><div align="center">S.No</div></th>   
                      <th>Product&nbsp;Code</th>
                      <th>Product&nbsp;Name</th>
                        <th>HSN</th>
                        <th style="padding-left:80px">Action</td>
                       </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM product_master order by id desc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                    
                  ?>
                    <td hidden><input type="text" name="rid" hidden id ="rid<?php echo $sno;?>" value="<?php echo $rows['id'];?>"></td>
                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                      <td align="center"><?php echo $sno;?></td>
                      <td><?php echo $rows['productcode'];?></td>
                      <td><?php echo $rows['productname'];?></td>
                      <td><?php echo $rows['hsn'];?></td>
                      <td nowrap>
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal"
                id="edit<?php echo $sno;?>" onclick="getParty(edit<?php echo $sno;?>.id);">
                    <span class="ti-xs ti ti-edit me-1"></span>Edit
               </button>

                  <button type="button" 
                    class="btn btn-outline-danger" 
                    id="del<?php echo $sno;?>" onclick="delParty(del<?php echo $sno;?>.id);" >
                    <span class="ti-xs ti ti-trash me-1"></span>Delete
                  </button> 
                                          </td>
                      </tr>
                      <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="7" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>
                    </tbody>
                                    </table>
                                    </div>
                </div>
                </div>
                <!-- Offcanvas to add new user -->
               
              </div>
            </div>
            <!-- / Content -->

            <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          <form action="" method="post">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3"><span id="form-title">Add</span> Product Details</h5>
                              
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="col-md-3">
                                <label class="form-label" hidden for="formtabs-country">ID</label>
                                <input
                          type="text"
                          class="form-control"
                          id="id"
                          hidden
                          placeholder=""
                          name="id"
                          aria-label="John Doe" />
                                </div>
                              <div class="row g-4">
                                <div class="col-md-4">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Product&nbsp;Group&nbsp;<span style="color:red;">*</span></label>
                            <select id="productgroup" class="select form-control" name="productgroup" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM product_group order by pro_grp_name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['pro_grp_name'];?>
						 </option>
					<?php } ?>
                              </select>
                                </div>
                                
                                <div class="col-md-4">
                                <label class="form-label"  for="formtabs-country">HSN</label>
                              <input type="text" id="hsn" class="form-control" name="hsn" data-allow-clear="true" />
                              
                                </div>
                                <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">Product&nbsp;Code&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="productcode"
                              placeholder="Enter Code"
                              name="productcode"
                              aria-label="Product barcode" required/>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Product&nbsp;Name</label>
                                <input
                              type="text"
                              class="form-control"
                              id="productname"
                              name="productname"
                              aria-label="Product barcode" />
                                </div>

                           <!--     <div class="col-md-4">
                                <label class="form-label"  for="formtabs-country">Supplier Name</label>
                                <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                                                    </select>
                                </div> -->
                                <div class="col-md-6">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Size</label>
                                  <input class="form-control" type="text" name="size" id="size" />
                                </div>
							   </div>
                              
                              <div class="row g-3 mt-1">
                                <div class="col-md-4">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Price</label>
                                  <input class="form-control" type="text" name="price" id="price" />
                                </div>
                                <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">GST %</label>
                                <select name="gstno" id="gstno" class="select form-select" data-allow-clear="true" >
                                
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM gst order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['gstpercent'];?>"><?php echo $rw['gstpercent'];?>&nbsp;%</option>
                    <?php } ?>
                                
                              </select>
          </select>
                                </div>
								  <div class="col-md-4">
                                  <label for="emailLarge" class="form-label">Unit&nbsp;<span style="color:red;">*</span></label>
                                  <select name="unit" id="unit" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
								   </div>
                                </div>
                              
                                <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                  <label class="form-label" for="form-repeater-1-4">Product&nbsp;Specification</label>
                                  <textarea
                              type="text"
                              class="form-control"
                              id="specification"
                              name="specification"
                              aria-label="Product barcode"
                              rows=3></textarea>
                                </div>
								<div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Product&nbsp;Description&nbsp;<span style="color:red;">*</span></label>
                                <textarea
                              type="text"
                              class="form-control"
                              id="decription"
                              name="decription"
                              aria-label="Product barcode" 
                              rows=3></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button class="btn btn-primary btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle me-sm-1">Submit</span>
                                
                              </button>
                            </div>
          </form>
                          </div>
                        </div>
                      </div>

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
$id=$_POST['id']; 
$productgroup=$_POST['productgroup'];
$productname=$_POST['productname'];
$hsn=$_POST['hsn'];
$productcode=$_POST['productcode'];
$supplier=$_POST['supplier'];
$size=$_POST['size'];
$price=$_POST['price'];
$unit=$_POST['unit'];
$gstno=$_POST['gstno'];
$specification=$_POST['specification'];
$decription=$_POST['decription'];


if($id==""){
 $sql3="insert into product_master (productgroup,hsn,productcode,productname,supplier,size,unit,specification,decription,gstno,price) 
 values('$productgroup','$hsn','$productcode','$productname','$supplier','$size','$unit','$specification','$decription','$gstno','$price')"; 
$res1=mysqli_query($conn, $sql3);
}else{
$sql2="UPDATE product_master SET productgroup='$productgroup',hsn='$hsn',productcode='$productcode',productname='$productname',price='$price',supplier='$supplier',size='$size',unit='$unit',specification='$specification',decription='$decription',gstno='$gstno' WHERE id='$id'"; 
  $res2=mysqli_query($conn, $sql2);
}
if($res1) { 
 
  echo "<script>alert('Product Registered Successfully');window.location='product_master.php';</script>";
 
}
else if($res2) { 

  echo "<script>alert('Product Updated Successfully');window.location='product_master.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  


<script>
function getParty(id) {
  document.getElementById('form-title').innerHTML='Edit';  
  
  var c=(id.substr(4));
  //alert(c);
  var rid=document.getElementById('rid'+c).value;
  //alert(rid);
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
                    $('#id').val(data.id);                 
                    $('#productgroup').val(data.productgroup);                 
                    $('#hsn').val(data.hsn);                 
                    $('#productcode').val(data.productcode);                 
                    $('#productname').val(data.productname);                 
                    $('#supplier').val(data.supplier);                 
                    $('#size').val(data.size);                 
                    $('#price').val(data.price);                 
                    $('#unit').val(data.unit);                 
                    $('#gstno').val(data.gstno);                 
                    $('#specification').val(data.specification);                 
                    $('#decription').val(data.decription);                 
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+rid,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addParty() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');                 
                    $('#productgroup').val('');                 
                    $('#hsn').val('');                 
                    $('#productcode').val('');                 
                    $('#productname').val('');                 
                    $('#supplier').val('');                 
                    $('#size').val('');                 
                    $('#price').val('');                 
                    $('#unit').val('');                 
                    $('#gstno').val('');                 
                    $('#specification').val('');                 
                    $('#decription').val('');                 
                    
}
</script>

<script>
function delParty(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    
  var c=(id.substr(3));
				var rid=document.getElementById('rid'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='product_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delproduct.php?id="+rid,true);
    xmlhttp.send();
  }
}
}
</script>