<?php include "config.php"; ?>

  <?php include "head.php";?>

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
                      <button class="btn btn-label-success">LOCATION&nbsp;LIST</button><br>
                      

                      <div class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addlocation();" aria-controls="DataTables_Table_0" class="btn btn-primary" style="color: white;"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
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
                        <th ><div align="center">S.No</div></th>
                          <th>location</th>
                        <?php if($user_role!=3){ ?><th style="padding-left:80px">Action</th><?php } ?>
                       </tr>
                      </thead>
                      <tbody>
                    
                      
                      
                    <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM location_master ORDER BY id DESC";
                    $result =mysqli_query($conn, $sql);
                   $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                          ?>
						  <tr>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                   
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                        <td><?php echo $rows['location'];?></td>
                      
                      <?php if($user_role!=3){ ?>             
                          <td nowrap>
                          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getlocation(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="dellocation(del<?php echo $sno;?>.id);" >
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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> location</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                    <form action="" method="post">
                      <label class="form-label" for="add-user-fullname" hidden>ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder="" 
                          name="id"
                          value=""
                          hidden
                          aria-label="John Doe"
                          />
                      </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Location</label>
                        <input
                          type="text"
                          class="form-control"
                          id="location"
                          placeholder=" "
                          name="location"
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


<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];    
$location=$_POST['location'];


if($id==""){
echo $sql="insert into location_master (location) values('$location')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql="UPDATE location_master SET location='$location'  WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert('location added successfully');window.location='location_master.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('location Updated Successfully');window.location='location_master.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?>  

<script>
function getlocation(id) {
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
                    $('#location').val(data.location);                 
                   
}

      }
    };
    xmlhttp.open("GET","ajax/getlocation.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>   

<script>
function addlocation() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#location').val('');                 
                   
}
</script>

</script>

<script>
function dellocation(id) {

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
  window.location='location_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/dellocation.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>