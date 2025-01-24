<?php include "config.php"; ?>
<!DOCTYPE html>




<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
             
             
 
 <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >Printing List</h5>
                      <div class="action-btns">
                      <label ><input type="search"
                       class="form-control"
                       placeholder="Search Products"
                       aria-controls="DataTables_Table_0">
                       
                      </label>
                      
                     &nbsp; <button
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

               &nbsp;  <a class="btn btn-primary add-new " tabindex="0" href="printing.php"
                 type="button" >
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                 Add Printing</a>
                      </div>
                    </div>
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                        <th><div align="center">S.No</div></th>
                          <th>Date</th>
                          <th>Checking&nbsp;Type</th>
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT * FROM printing  ORDER by id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                           
                           ?>
                     <td hidden><input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>"></td>
                     <th><div align="center"><?php echo $sno; ?></div></th>
                     <td><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                          
                     <td><?php echo $rows['check1'];?></td>                          
                                      
                                                
                          <td>
                          <a href="printing_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </a>
                          <a href="" 
                          type="button" class="btn btn-outline-warning" id="<?php echo $sno;?>">
                            <span class="ti-xs ti ti-printer me-1"></span>Print
                          </a>
                          
                            <a  href="ajax/delprinting.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delprinting(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                          
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
</html>


<script>
function delprinting(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
  var cid=document.getElementById('cid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='printlist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delprinting.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>