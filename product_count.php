<!DOCTYPE html>
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
                      <h5 class="card-title mb-sm-0 me-2" >COUNT LIST</h5>
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
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addcount();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Count</span></span></button>
                      </div>
                    </div>
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="text-align:center">ID</th>
                    
                          <th>Count</th>
                          <th style="padding-left:80px">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM product_count";
                  $result =mysqli_query($conn, $sql);
                  while($rows=mysqli_fetch_array($result))
                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['product_count'];?></td>
                                              
                          <td>
                          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getcount(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="delcount(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                          </button>
                          
                          </td>
                        </tr>
                        <?php
$sno++;
    }
?>
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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Count</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post">
                      <div class="mb-3">
                      <label class="form-label" hidden for="add-user-fullname">ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder=""
                          name="id"
                          hidden
                          aria-label="John Doe" />
                      </div>
                  
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Count</label>
                        <input
                          type="text"
                          class="form-control"
                          id="product_count"
                          placeholder=""
                          name="product_count"
                          aria-label="John Doe" required/>
                      </div>
                    
                      
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
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

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/app-user-list.js"></script>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  
  $id=$_POST['id'];   
  $product_count=$_POST['product_count'];
  
  if($id==""){
 $sql="insert into product_count (product_count) values('$product_count')"; 
$result1=mysqli_query($conn, $sql);

}
else{
 echo $sql="UPDATE product_count SET product_count='$product_count' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);

}
if($result1) { 
  echo "<script>alert('Count Registered Successfully');window.location='product_count.php';</script>";
}
else if($result2) { 
  echo "<script>alert('Count Updated Successfully');window.location='product_count.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}
}
?>  

<script>
function getcount(id) {
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#id').val(data.id);  
   $('#product_count').val(data.product_count);             
}

      }
    };
    xmlhttp.open("GET","ajax/getcount.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addcount() {
  document.getElementById('form-title').innerHTML='Add';
  $('#id').val('');  
   $('#product_count').val('');      
}
</script>

<script>
function delcount(id) {

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
  window.location='product_count.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delcount.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>