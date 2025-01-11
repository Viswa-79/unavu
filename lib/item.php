<?php include "config.php"; ?>

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




              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-success">ITEM&nbsp;LIST</button><br>
                      

                      <div class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a  tabindex="0" onclick="additem();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="modal"
                          data-bs-target="#largeModal" class="btn btn-primary" style="color: white;"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  Tools
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                           
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>
              <div class="card mt-4">
              

                    <div class="card-body">
                  <div class="card-datatable table-responsive">
                <table id="myTable" class="table table-hover display">
                    <thead>
                      <tr>
                      <th><div align="center">S.No</div></th>   
                      <th><div align="center" hidden>ID<div></th>                    
                      <th>Item&nbsp;No</th>
                      <th>Item&nbsp;type</th>
                         <?php if($user_role!=3){ ?><th style="padding-left:80px">Action</th><?php } ?>
                       </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM item_master order by code asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                    
                  ?>
                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                      <td align="center"><?php echo $sno;?></td>
                      <td><input type"text" name="id" hidden id ="id<?php echo $sno;?>" value="<?php echo $rows['id'];?>"></td>
                      <td><?php echo $rows['code'];?></td>
                      <td><?php echo $rows['itemtype'];?></td>
                      
                      <?php if($user_role!=3){ ?>
                      <td nowrap>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#largeModal"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getitem(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="delitem(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                          </button>
                          
                          </td>
                          <?php } ?>
                      </tr>
                      <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="4" align="center">  <p>No Data Found</p></td> </tr>
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
                          <form action="" method="post" autocomplete="off">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3"><span id="form-title">Add</span> Item Details</h5>
                              
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
                          class="form-select"
                          id="id"
                          hidden
                          placeholder=""
                          name="id"
                          aria-label="John Doe" />
                                </div>
                              <div class="row g-4">
                                <div class="col-md-3">
                                  
                                <label class="form-label" for="add-user-fullname">Item No.&nbsp;<span style="color:red;">*</span></label>
                        <input
                          type="text"
                          class="form-control"
                          id="code"
                          placeholder=" "
                          name="code"
                          aria-label="John Doe" required/>
                                </div>
                                
                                <div class="col-md-9">
                                <label class="form-label" for="add-user-fullname">Item Description</label>
                        <textarea
                          class="form-control"
                          id="descr"
                          
                          name="descr"
                           ></textarea>
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Item&nbsp;Type&nbsp;<span style="color:red;">*</span></Label></label>
                        
                          <select name="itemtype" id="itemtype" class="form-select" required>
                                <option value="">Select</option>
                                <option value="Fabrics">Fabrics </option>
                                <option value="Madeups">Madeups</option>
                                <option value="Garments">Garments</option>
                                
                              </select>
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Label/Handtag</Label></label>
                        <input
                          type="text"
                          class="form-control"
                          id="label"
                          
                          name="label"
                          aria-label="John Doe" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Fabric Quality</label>
                      <select name="fabqty" id="fabqty" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM quality_master order by quality asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div>
                                <div class="col-md-3">
                                  
                                <label class="form-label" for="add-user-fullname">GSM</label>
                      <select name="quality" id="quality" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM gsm order by gsm asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['gsm'];?>"><?php echo $rw['gsm'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div> 
                             
							   </div>
                              
                              <div class="row g-3 mt-1">
                              <div class="col-md-6">
                                <label class="form-label" for="add-user-fullname">Print</label>
                      <textarea type="text" name="print"  id="print" class="form-control" >
          </textarea>
                                </div>
                               

                                
								  <div class="col-md-6">
                  <label class="form-label" for="add-user-fullname">Size</label>
                      <textarea type="text" name="size"  id="size" class="form-control" ></textarea>
								   </div>
                                </div>
                              
                                <div class="row g-3 mt-1">
                              
                            
                                <div class="col-md-12">
                                <label class="form-label" for="add-user-fullname">Packing Method</label>
                        <textarea
                          type="text"
                          class="form-control"
                          id="pack"
                          
                          name="pack"
                          aria-label="John Doe"></textarea>
                                </div>
                                <div class="col-md-3">
                               <label class="form-label" for="add-user-fullname">Cloth Width</label>
                        <input
                          type="number"
                          class="form-control"
                          id="clwidth"
                          
                          name="clwidth"
                          aria-label="John Doe" />
                                </div>
								      <div class="col-md-3">
                      <label class="form-label" for="add-user-fullname">Itemno Visibility<span style="color:red;">*</span></label>
                       <select name="visible" id="visible" class="form-select" required>
                                <option value="1">Visible</option>
                                <option value="0">Not Visible</option>
                                
                              </select>
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Color</label>
                      <select name="color"  id="color" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div> 
								    <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Unit</label>
                      <select name="unit"  id="unit" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by unit asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div>
                                  <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Poly Bag Size</label>
                                <select name="polybag"  id="polybag" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by productname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div>   
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Cartoon Box Size</label>
                                <select name="cartoon"  id="cartoon" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by productname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                </div>                           
                             
                               
                                
                                
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Pcs Per Poly Bag</label>
                        <input
                          type="number" min="0" 
                          class="form-control"
                          id="pcsper"
                          
                          name="pcsper"
                          aria-label="John Doe" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Poly Bag Per Cartoon</label>
                        <input
                          type="number" min="0" 
                          class="form-control"
                          id="polycartoon"
                          
                          name="polycartoon"
                          aria-label="John Doe" />
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

  <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];    
$code=$_POST['code'];
$descr=$_POST['descr'];
$itemtype=$_POST['itemtype'];
$label=$_POST['label'];
$print=$_POST['print'];
$quality=$_POST['quality'];
$clwidth=$_POST['clwidth'];
$size=$_POST['size'];
$unit=$_POST['unit'];
$pack=$_POST['pack'];
$fabqty=$_POST['fabqty'];
$visible=$_POST['visible'];
$color=$_POST['color'];
$polybag=$_POST['polybag'];
$cartoon=$_POST['cartoon'];
$pcsper=$_POST['pcsper'];
$polycartoon=$_POST['polycartoon'];



if($id==""){
 $sql="insert into item_master (code,descr,itemtype,label,print,quality,clwidth,size,unit,pack,fabqty,visible,polybag,cartoon,pcsper,polycartoon,color) values('$code','$descr','$itemtype','$label','$print','$quality','$clwidth','$size','$unit','$pack','$fabqty','$visible','$polybag','$cartoon','$pcsper','$polycartoon','$color')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql2="UPDATE item_master SET code='$code',descr='$descr',itemtype='$itemtype',label='$label',print='$print',quality='$quality',clwidth='$clwidth',size='$size',unit='$unit',pack='$pack',fabqty='$fabqty',visible='$visible',polybag='$polybag',cartoon='$cartoon',pcsper='$pcsper',polycartoon='$polycartoon',color='$color'  WHERE id='$id'";
  $result2=mysqli_query($conn, $sql2);
}
if($result1) { 
 
  echo "<script>alert('Item Added Successfully');window.location='item.php';</script>";
 
}
else if($result2) { 
 echo "<script>alert('Item Updated Successfully');window.location='item.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?>  

<script>
function getitem(id) {
  document.getElementById('form-title').innerHTML='Edit';
  var c=(id.substr(4));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#id').val(data.id);  
                    $('#code').val(data.code);
                    $('#descr').val(data.descr);
                    $('#itemtype').val(data.itemtype);
                    $('#label').val(data.label);
                    $('#print').val(data.print);
                    $('#quality').val(data.quality);
                    $('#clwidth').val(data.clwidth);
                    $('#size').val(data.size);
                    $('#unit').val(data.unit);
                    $('#pack').val(data.pack);
                    $('#fabqty').val(data.fabqty);
                    $('#visible').val(data.visible);
                    $('#color').val(data.color);
                    $('#polybag').val(data.polybag);
                    $('#cartoon').val(data.cartoon);
                    $('#pcsper').val(data.pcsper);
                    $('#polycartoon').val(data.polycartoon);
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>   

<script>
function additem() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#code').val('');
                    $('#descr').val('');
                    $('#itemtype').val('');
                    $('#label').val('');
                    $('#print').val('');
                    $('#quality').val('');
                    $('#clwidth').val('');
                    $('#size').val('');
                    $('#unit').val('');
                    $('#pack').val('');
                    $('#fabqty').val('');
                    $('#visible').val('');
                    $('#color').val('');
                    $('#polybag').val('');
                    $('#cartoon').val('');
                    $('#pcsper').val('');
                    $('#polycartoon').val('');
};
</script>

</script>

<script>
function delitem(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='item_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delitem.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>