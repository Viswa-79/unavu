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
                      <h5 class="card-title mb-sm-0 me-2" >BRAND LIST</h5>
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
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addBrand();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Brand</span></span></button>
                      </div>
                    </div>
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="text-align:center">s.no</th>
                    
                          <th>Brand</th>
                          <th style="padding-left:80px">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM brand";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['brand'];?></td>
                                              
                          <td nowrap>
                          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getBrand(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="delBrand(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                          </button>
                          
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Brand</h5>
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
                      <label class="form-label" for="add-user-fullname">Brand</label>
                        <input
                          type="text"
                          class="form-control"
                          id="brand"
                          placeholder=""
                          name="brand"
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

    <
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  
  $id=$_POST['id'];   
  $brand=$_POST['brand'];
  
  if($id==""){
 $sql="insert into brand (brand) values('$brand')"; 
$result1=mysqli_query($conn, $sql);

}
else{
 echo $sql="UPDATE brand SET brand='$brand' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);

}
if($result1) { 
  echo "<script>alert('Brand Registered Successfully');window.location='product_brand.php';</script>";
}
else if($result2) { 
  echo "<script>alert('Brand Updated Successfully');window.location='product_brand.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}
}
?>  

<script>
function getBrand(id) {
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
   $('#brand').val(data.brand);             
}

      }
    };
    xmlhttp.open("GET","ajax/getBrand.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addBrand() {
  document.getElementById('form-title').innerHTML='Add';
  $('#id').val('');  
   $('#brand').val('');      
}
</script>

<script>
function delBrand(id) {

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
  window.location='product_brand.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delBrand.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>