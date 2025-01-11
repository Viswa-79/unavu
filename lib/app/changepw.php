<?php include "config.php"; ?>


    <script>


function validate_password() {
    let newpassword = document.getElementById('newpassword').value;
    let confirmpassword = document.getElementById('confirmpassword').value;
    let passwordLength = newpassword.length;

    if (passwordLength < 6 || passwordLength > 10) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = '☒ Password must be between 6 and 10 characters';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = 0.4;
    } else if (newpassword !== confirmpassword) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = '☒ Use the same password';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = 0.4;
    } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '🗹 Passwords Matched';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = 1;
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
            <button class="btn btn-label-primary">Change&nbsp;Password</button>

       

              <!-- Form Alignment -->
              <div class="card mt-4">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center h-px-500">
                    <form class="w-px-400 border rounded p-3 p-md-5" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <h3 class="mb-4">Change Password</h3>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname" hidden >ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="uid"
                          placeholder=""
                          name="uid"
                          hidden
                          value=""
                          
                          aria-label="John Doe"
                          />
                      </div>
                      <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="form-alignment-password">Old&nbsp;Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            name="oldpassword"
                            id="oldpassword"
                            class="form-control"
                            required
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="form-alignment-password2" />
                          <span class="input-group-text cursor-pointer" id="form-alignment-password2"
                            ><i class="ti ti-eye-off"></i
                          ></span>
                        </div>
                      </div>

                      <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="form-alignment-password">New&nbsp;Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="newpassword"
                            name="newpassword"
                            required
							 onkeyup="validate_password();"
                            class="form-control"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="form-alignment-password2" />
                          <span class="input-group-text cursor-pointer" id="form-alignment-password2"
                            ><i class="ti ti-eye-off"></i
                          ></span>
                        </div>
                      </div>
                      <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="form-alignment-password">Confirm&nbsp;Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="confirmpassword"
                            name="confirmpassword"
                            class="form-control"
                            required
                            onkeyup="validate_password();"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="form-alignment-password2" />
                          <span class="input-group-text cursor-pointer" id="form-alignment-password2"
                            ><i class="ti ti-eye-off"></i
                          ></span>
                        </div>
                        <span id="wrong_pass_alert"></span>
                      </div>
                      <div class="d-grid gap-2"> 
                         <button class="btn btn-success btn-next" name="submit2" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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

if(isset($_POST['submit2']))
{
   $query = "SELECT * FROM users u left join user_role r on u.userrole=r.id WHERE u.id = '$user_id'";
$result = mysqli_query($conn, $query);
$rz1=mysqli_fetch_array($result);
$password=$rz1['password'];



  $uid2=$_POST['uid2'];   
$newpassword=md5($_POST['newpassword']);
$oldpassword=md5($_POST['oldpassword']);
$confirmpassword=md5($_POST['confirmpassword']);

if($password == $oldpassword){


   $sql="UPDATE users SET password='$newpassword' WHERE id='$user_id'"; 
  $result3=mysqli_query($conn, $sql);


if($result3) { 
  echo "<script>alert('Password Changed Successfully');window.location='logout.php';</script>";
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}
}
else{
  echo '<script>alert("Invaid Password !..")</script>';    
  }
  

}
?>  


