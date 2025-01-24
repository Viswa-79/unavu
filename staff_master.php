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
                      <h5 class="card-title mb-sm-0 me-2" >STAFF LIST</h5>
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
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addStaff();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Staff</span></span></button>
                      </div>
                    </div>
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="text-align:center">s.no</th>
                    
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Status</th>
                          <th style="padding-left:80px">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM staff";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                           
                  ?>
                     <input type="text" hidden name="rid[]" id="rid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['designation'];?></td>
                      <td><?php echo $rows['department'];?></td>
                      <td><span class="badge bg-label-primary me-1">
                        Active
                      </span></td>                  
                          <td nowrap>
                          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getStaff(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="delStaff(del<?php echo $sno;?>.id);" >
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
                <!-- Offcanvas to add new user -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                 <h5 id="offcanvasAddUserLabel" class="offcanvas-title" ><span id="form-title">Add</span> Staff</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label" for="formtabs-country" hidden>ID</label>
                              <input
                              type="text"
                              class="form-control"
                              id="id"
                              placeholder=""
                              name="id"
                              aria-label="Product barcode"
                              hidden />
                      </div>  
                    <div class="mb-3">
                      <label class="form-label" for="formtabs-country">Name&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="name"
                              placeholder="Enter Staff Name"
                              name="name"
                              aria-label="Product barcode" required/>
                      </div>
                      <div class="mb-3">
                      <label class="form-label"  for="formtabs-country">Department&nbsp;<span style="color:red;">*</span></label>
                              <select id="department" class="select2 form-control" name="department" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <option value="accessories">Accessories</option>
                                <option value="checking">Checking</option>
                                <option value="cutting">Cutting </option>
                                <option value="fusing">Fusing </option>
                                <option value="ironing">Ironing </option>
                                <option value="merchandising">Merchandising</option>
                                <option value="packing">Packing</option>
                                <option value="printing">Printing </option>
                                <option value="quality">Quality </option>
                                <option value="sewing">Sewing</option>
                              </select>
                      </div>
                      <div class="mb-3"><label>Designation&nbsp;<span style="color:red;">*</span></label>
                      <select id="designation" class="select2 form-control" name="designation" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <option value="labour">Labour</option>
                                <option value="manager">Manager</option></select>
                      </div>
                      <div class="mb-3">
                      <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">Mobile &nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="mobile"
                              placeholder="+91 98765 ***55"
                              name="mobile"
                              aria-label="Product barcode" />
                      </div></div>
                      <div class="mb-3">
                      <div class="col">
                      <label for="html5-email-input">Email&nbsp;<span style="color:red;">*</span></label>
                          <input class="form-control" type="email" name="email" id="email" />
</div></div>
<div class="mb-3">
                      <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">Joining Date</label>
                            <input
                              type="date"
                              class="form-control"
                              id="joiningdate"
                              name="joiningdate"
                              aria-label="Product barcode" />
                      </div></div>
                      <div class="mb-3">
                      <label class="form-label" for="formtabs-country">ID Proof Number</label>
                              <input
                              type="number"
                              class="form-control"
                              id="idproofnumber"
                              name="idproofnumber"
                              aria-label="Product barcode" />
                      </div>
                      <div class="mb-3">
                       <label class="custom-uploader" for="file">Choose File</label> 
                        <input class="form-control" type="file" id="uploadidproof" name="uploadidproof" 
  accept="image/jpeg,image/png,application/pdf">
                </div>
                      <div class="mb-3">
                      <div class="col">
                     
                      <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                      </div>
                      </div>

                     
                          

                    
                      

 
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create"
                      onclick="wrong_pass_alert()" name="submit">Submit</button> 
                      <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

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

$name=$_POST['name'];
$department=$_POST['department'];
$designation=$_POST['designation'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$joiningdate=$_POST['joiningdate'];
$idproofnumber=$_POST['idproofnumber'];
$uploadidproof=$_POST['uploadidproof'];
$address=$_POST['address'];


$p1=$_FILES['uploadidproof']['name'];
$p_tmp1=$_FILES['uploadidproof']['tmp_name'];
$path="uploads/$p1";
$move=move_uploaded_file($p_tmp1,$path);

if($id==""){
 echo $sql="insert into staff (name,department,designation,mobile,email,joiningdate,idproofnumber,uploadidproof,address) 
 values('$name','$department','$designation','$mobile','$email','$joiningdate','$idproofnumber','$p1','$address')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql="UPDATE staff SET name='$name',department='$department',designation='$designation',mobile='$mobile',email='$email',joiningdate='$joiningdate',idproofnumber='$idproofnumber',address='$address' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert('Staff Registered successfully');window.location='staff_master.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('Staff Updated Successfully');window.location='staff_master.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  

<script>
function getStaff(id) {
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  
  var rid=document.getElementById('rid'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
  $('#id').val(data.id);  

      $('#name').val(data.name);                 
      $('#department').val(data.department);                 
      $('#designation').val(data.designation);                 
      $('#mobile').val(data.mobile);                 
      $('#email').val(data.email);                 
      $('#joiningdate').val(data.joiningdate);                 
      $('#idproofnumber').val(data.idproofnumber);                 
      $('#address').val(data.address);   
}
      }
    };
    xmlhttp.open("GET","ajax/getStaff.php?id="+rid,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addStaff() {
  document.getElementById('form-title').innerHTML='Add';  
                    $('#id').val('');  
                    $('#name').val('');                 
                    $('#department').val('');                 
                    $('#designation').val('');                 
                    $('#mobile').val('');                 
                    $('#email').val('');                 
                    $('#joiningdate').val('');                 
                    $('#idproofnumber').val('');                 
                    $('#address').val('');   
}
</script>

<script>
function delStaff(id) {

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
  window.location='staff_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delStaff.php?id="+rid,true);
    xmlhttp.send();
  }
}
}
</script>
