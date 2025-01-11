 <!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
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
              <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Session</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">21,459</h3>
                            <p class="text-success mb-0">(+29%)</p>
                          </div>
                          <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-user ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Paid Users</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">4,567</h3>
                            <p class="text-success mb-0">(+18%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-danger">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Active Users</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">19,860</h3>
                            <p class="text-danger mb-0">(-14%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-success">
                            <i class="ti ti-user-check ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Pending Users</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">237</h3>
                            <p class="text-success mb-0">(+42%)</p>
                          </div>
                          <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Users List Table -->
              <div class="card">
                <div class="card-header border-bottom">
                  <h5 class="card-title mb-3">Search Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class="datatables-users table">
                    <thead class="border-top">
                      <tr>
                        <th></th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Plan</th>
                        <th>Billing</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Offcanvas to add new user -->

                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">User Details</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post" class="add-new-user pt-0"  >
                      <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="add-user-fullname"
                          placeholder="your name"
                          name="name"
                          aria-label="John Doe" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input
                          type="text"
                          id="add-user-email"
                          class="form-control"
                          placeholder="john.doe@gmail.com"
                          aria-label="john.doe@gmail.com"
                          name="email" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Password</label>
                        <input
                          type="password"
                          id="add-user-contact"
                          class="form-control "
                          placeholder="Abc12#* "
                          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                          title="Must contain at least one number,
		                     	one uppercase and lowercase letter,
                          at least 8 characters"
                          aria-label="john.doe@example.com"
                          name="password" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Conform Password</label>
                        <input
                          type="password"
                          id="conform_pass"
                          class="form-control"
                          placeholder=""
                          aria-label="jdoe1"
                          name="cpassword"
                          onkeyup="validate_password()" />
                      </div>
                      <script>
		function validate_password() {

			var pass = document.getElementById('pass').value;
			var confirm_pass = document.getElementById('conform_pass').value;
			if (pass != confirm_pass) {
				document.getElementById('wrong_pass_alert').style.color = 'red';
				document.getElementById('wrong_pass_alert').innerHTML
					= '☒ Please enter the correct Password';
				document.getElementById('create').disabled = true;
				document.getElementById('create').style.opacity = (0.4);
			} else {
				document.getElementById('wrong_pass_alert').style.color = 'green';
				document.getElementById('wrong_pass_alert').innerHTML =
					'🗹 Password Matched';
				document.getElementById('create').disabled = false;
				document.getElementById('create').style.opacity = (1);
			}
		}

		function wrong_pass_alert() {
			if (document.getElementById('pass').value != "" &&
				document.getElementById('confirm_pass').value != "") {
				alert("Your response is submitted");
			} else {
				alert("Please fill all the fields");
			}
		}
	</script>
                      <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="user-role" name="userrole" class=" form-select">
                        <?php 
                 
                            $query = "SELECT * FROM user_role ORDER BY role asc ";
                            while($row = mysqli_query($conn, $query)){   
                               ?>  
                               <option value="<?php echo $row['id'];?>"><?php echo $row['role'];?></option>
                               <?php } ?>
                      </select>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Ph Number</label>
                        <input
                          type="text"
                          id="add-user-company"
                          class="form-control"
                          placeholder="+91 988 765(4321)"
                          aria-label="jdoe1"
                          name="phnumber" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="user-status" name="status" class=" form-select">
                          <option value="1">Active</option>
                          <option value="2">Pending</option>
                          <option value="3">Inactive</option></select>
</div>
                      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                      onclick="wrong_pass_alert()" name="submit">Submit</button>
                      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
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

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/app-user-list.js"></script>
  </body>
</html>


<?php
include ("config.php");
if(isset($_POST['submit']))
{
    
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$userrole=$_POST['userrole'];
$phnumber=$_POST['phnumber'];
$status=$_POST['status'];

echo $sql="insert into users (name,email,password,cpassword,userrole,phnumber,status) values('$name','$email','$password','$cpassword','$userrole','$phnumber','$status')"; 

$result=mysqli_query($conn, $sql);


if($result) { 
echo "User Registered successfully, You can Login Now";
}
else{
echo "something wrong, data not stored";    
}


}
?>  
<?php
function_alert("User Registered successfully, You can Login Now");

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>