<?php include "config.php"; ?>


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
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-success">MRP LIST</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="material_resource.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
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
                  <div class="card-datatable table-responsive ">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Book&nbsp;No</th>
                          <th>order&nbsp;No</th>
                          <th>Date</th>
                     <th style="padding-left:55px">Status</th>
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT * FROM material_resource ORDER by id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                            $book=$rows['bookno'];
                            $orderno=$rows['orderno'];
                            
                            $sql11 = " SELECT sum(n.excessqty)as excessqty FROM material_resource m left join material_resource1 n on m.id=n.cid where m.bookno='$book' " ;
                         $result11 =mysqli_query($conn, $sql11);
                         $rows11=mysqli_fetch_array($result11);

                            $reqqty=$rows11['excessqty'];
                          

                            $c0="SELECT sum(pf.quantity) as quantity from purchaseorder1 pf left join purchaseorder po on pf.cid=po.id where po.mrp='$book'";
                            $cz=mysqli_query($conn,$c0);
                            $cz1=mysqli_fetch_array($cz);
                             $qty=$cz1['quantity'];

                            $bal = $reqqty - $qty;


							 if($bal==0)
							 {
								 $status="PO Generated";
								 $clr="Success";
							 }
							 else if($bal>0 && $reqqty!=$bal)
							 {
								 $status="PO Partial";
								 $clr="Warning";
							 }
							 else
							 {
								 $status="PO Pending";
								 $clr="Danger";
							 }
                           ?>
                     <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td ><?php echo $sno; ?></td>                                                 
                     <td><?php echo $rows['bookno'];?></td>                          
                     <td><?php echo $rows['orderno'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                            
                       <td>
                      <span style="width:150px;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span>
                    </td>                          
                                             
                                      
                                                
                          <td nowrap>
                            <a href="mrp_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:113px" class="btn btn-outline-warning" id="edit<?php echo $sno;?>">
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a>
                          <a href="material_resource_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" style="width:113px" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                          </a>

                          <?php if($user_role==2){ ?>
                            <a  href="ajax/delmaterial_resource.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delmaterial_resource(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                           <?php } ?>
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

<script>
function delmaterial_resource(id) {

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
  window.location='material_resourcelist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delmaterial_resource.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>