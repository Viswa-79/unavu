<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>

<script>
function get_items(id,value) {
//alert(value);
var c=id.substr(7);
var form='ocr_entry';

		//alert(c);		
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r);
if(sts==1)
{
document.getElementById('itemno').innerHTML =r1[1];
					
            }
             else if(sts==0)
            {
              alert("Sewing Inward Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }

      }
    };
    xmlhttp.open("GET","ajax/get_order_items.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>




<script>
function get_item(value) {
 
   var value2=document.getElementById('orderno').value;
  //alert(value);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#acutting').val(data.bitwaste);  
$('#alengthside').val(data.swaste);
$('#aprintmistake').val(data.printmistake);
$('#afabmistake').val(data.fabmistake);
$('#aloopwaste').val(data.loopwaste);
$('#aadas').val(data.adas);
$('#tfabrec').val(data.mtrs);
$('#qtyship').val(data.quantity);
}

      }
    };
    xmlhttp.open("GET","ajax/getitemocr1.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
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
          <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">OCR Entry</button>
                      <a href="ocr_entry_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                        <?php
                            $sql4 = " SELECT * FROM ocr_entry WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No</label>
                            <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              readonly
                              value="<?php echo $wz1['refno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Dc&nbsp;No</label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              value="<?php echo $wz1['dcno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date</label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No</label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onchange="get_items(this.id,this.value);"
                              value="<?php echo $wz1['orderno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Item&nbsp;No</label>
                            <select name="itemno" id="itemno"  class="select form-select" data-allow-clear="true" onchange="get_item(this.id,this.value)">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quantity&nbsp;Shipped:</label>
                            <input
                              type="text"
                              id="qtyship"
                              name="qtyship"
                              value="<?php echo $wz1['qtyship']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Quality:</label>
                            <input
                              type="text"
                              id="fabquality"
                              name="fabquality"
                              value="<?php echo $wz1['fabquality']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Weight&nbsp;For&nbsp;Mtrs:</label>
                            <input
                              type="text"
                              id="weightformtr"
                              name="weightformtr"
                              value="<?php echo $wz1['weightformtr']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Consumption</label>
                            <input
                              type="text"
                              id="consumption"
                              name="consumption"
                              value="<?php echo $wz1['consumption']; ?>"
                              class="form-control"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total&nbsp;Fabric&nbsp;Recepit</label>
                            <input
                              type="text"
                              id="tfabrec"
                              name="tfabrec"
                              value="<?php echo $wz1['tfabrec']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Consumed&nbsp;Quantity</label>
                            <input
                              type="text"
                              id="consumedqty"
                              name="consumedqty"
                              value="<?php echo $wz1['consumedqty']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Bag&nbsp;Size</label>
                            <input
                              type="text"
                              id="bagsize"
                              name="bagsize"
                              value="<?php echo $wz1['bagsize']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Cutting&nbsp;Size</label>
                            <input
                              type="text"
                              id="cutsize"
                              name="cutsize"
                              value="<?php echo $wz1['cutsize']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Balance</label>
                            <input
                              type="text"
                              id="balance"
                              name="balance"
                              value="<?php echo $wz1['balance']; ?>"
                              class="form-control"
                               />
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Stock</label>
                            <input
                              type="text"
                              id="fabstock"
                              name="fabstock"
                              value="<?php echo $wz1['fabstock']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Loop&nbsp;Stock</label>
                            <input
                              type="text"
                              id="loopstock"
                              name="loopstock"
                              value="<?php echo $wz1['loopstock']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Pcs&nbsp;Stock</label>
                            <input
                              type="text"
                              id="pcsstock"
                              name="pcsstock"
                              value="<?php echo $wz1['pcsstock']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Half&nbsp;Finishing</label>
                            <input
                              type="text"
                              id="halffinish"
                              name="halffinish"
                              value="<?php echo $wz1['halffinish']; ?>"
                              class="form-control"
                               />
                          </div>
                          
                         
                        </div>
                        <br>
                        <div class="card">
                        <div class="table-responsive">
                            <table  class="table table-border border-top table-hover mt-2">
                             
                              <tbody>
                              <?php
                       
                              $sql3 = " SELECT * FROM ocr_entry1 Where cid='$sid'";
                              $result3 = mysqli_query($conn, $sql3);
                              $rw = mysqli_fetch_array($result3)
                              
                                  ?>
                                  <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 
                                <tr style="height: 40px;">
                                 
               
               
                                <td colspan="4" style="padding: 0.3rem">Wastage In Mtrs : </td>        
                
                                
          </tr>
          <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">A) Cutting Bit : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="acutting"
                                     name="acutting[]"
                                     value="<?php echo $rw['acutting']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bcutting"
                                     name="bcutting[]"
                                     value="<?php echo $rw['bcutting']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="ccutting"
                                     name="ccutting[]"
                                     value="<?php echo $rw['ccutting']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">B) Length Side Wastage : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="alengthside"
                                     name="alengthside[]"
                                     value="<?php echo $rw['alengthside']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="blengthside"
                                     name="blengthside[]"
                                     value="<?php echo $rw['blengthside']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="clengthside"
                                     name="clengthside[]"
                                     value="<?php echo $rw['clengthside']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">C) Loop Wastage : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="aloopwaste"
                                     name="aloopwaste[]"
                                     value="<?php echo $rw['aloopwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bloopwaste"
                                     name="bloopwaste[]"
                                     value="<?php echo $rw['bloopwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cloopwaste"
                                     name="cloopwaste[]"
                                     value="<?php echo $rw['cloopwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">D) Printing Mistake : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="aprintmistake"
                                     name="aprintmistake[]"
                                     value="<?php echo $rw['aprintmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bprintmistake"
                                     name="bprintmistake[]"
                                     value="<?php echo $rw['bprintmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cprintmistake"
                                     name="cprintmistake[]"
                                     value="<?php echo $rw['cprintmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">E) Fabric Mistake : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="afabmistake"
                                     name="afabmistake[]"
                                     value="<?php echo $rw['afabmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bfabmistake"
                                     name="bfabmistake[]"
                                     value="<?php echo $rw['bfabmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cfabmistake"
                                     name="cfabmistake[]"
                                     value="<?php echo $rw['cfabmistake']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">F) ADAS : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="aadas"
                                     name="aadas[]"
                                     value="<?php echo $rw['aadas']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="badas"
                                     name="badas[]"
                                     value="<?php echo $rw['badas']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cadas"
                                     name="cadas[]"
                                     value="<?php echo $rw['cadas']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr style="height:40px">
                                 
               
               
                                 <td colspan="4" style="padding: 0.3rem">Income Mistake : </td>        
                 
                               
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">A) Side Seri : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="asideseri"
                                     name="asideseri[]"
                                     value="<?php echo $rw['asideseri']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bsideseri"
                                     name="bsideseri[]"
                                     value="<?php echo $rw['bsideseri']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="csideseri"
                                     name="csideseri[]"
                                     value="<?php echo $rw['csideseri']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">B) Overlock Wastage : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="aovrloclwaste"
                                     name="aovrloclwaste[]"
                                     value="<?php echo $rw['aovrloclwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bovrloclwaste"
                                     name="bovrloclwaste[]"
                                     value="<?php echo $rw['bovrloclwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="covrloclwaste"
                                     name="covrloclwaste[]"
                                     value="<?php echo $rw['covrloclwaste']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem" colspan="3">Total Balance : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="totalbalance"
                                     name="totalbalance"
                                     value="<?php echo $wz1['totalbalance']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem">Total Weight In % : </td>        
                 
                                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="atotalweight"
                                     name="atotalweight"
                                     value="<?php echo $wz1['atotalweight']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="btotalweight"
                                     name="btotalweight"
                                     value="<?php echo $wz1['btotalweight']; ?>"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="ctotalweight"
                                     name="ctotalweight"
                                     value="<?php echo $wz1['ctotalweight']; ?>"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
                              </tbody>
                            </table>
                            </div>
                            </div>

                       
                          </div>
                  </div>
              </div>    
              </div>
               


                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>    
                        </form>
                  
            
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
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $refno = $_POST['refno'];
  $dcno = $_POST['dcno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $itemno = $_POST['itemno'];
  $qtyship = $_POST['qtyship'];
  $fabquality = $_POST['fabquality'];
  $weightformtr = $_POST['weightformtr'];
  $consumption = $_POST['consumption'];
  $tfabrec = $_POST['tfabrec'];
  $consumedqty = $_POST['consumedqty'];
  $bagsize = $_POST['bagsize'];
  $cutsize = $_POST['cutsize'];
  $balance = $_POST['balance'];
  $fabstock = $_POST['fabstock'];
  $loopstock = $_POST['loopstock'];
  $pcsstock = $_POST['pcsstock'];
  $halffinish = $_POST['halffinish'];
  $totalbalance = $_POST['totalbalance'];
  $atotalweight = $_POST['atotalweight'];
  $btotalweight = $_POST['btotalweight'];
  $ctotalweight = $_POST['ctotalweight'];
  
  $sql = "UPDATE ocr_entry SET refno='$refno',dcno='$dcno',date='$date',orderno='$orderno',itemno='$itemno',qtyship='$qtyship',fabquality='$fabquality',weightformtr='$weightformtr',consumption='$consumption',tfabrec='$tfabrec',consumedqty='$consumedqty',bagsize='$bagsize',cutsize='$cutsize',balance='$balance',fabstock='$fabstock',loopstock='$loopstock',pcsstock='$pcsstock',halffinish='$halffinish',totalbalance='$totalbalance',atotalweight='$atotalweight',btotalweight='$btotalweight',ctotalweight='$ctotalweight' where id='$cid'";
    $result = mysqli_query($conn, $sql);

    foreach ($_POST['acutting']as $key => $val); {
    
      
    $rid = $_POST['rid'][$key];
    $acutting = $_POST['acutting'][$key];
    $bcutting = $_POST['bcutting'][$key];
    $ccutting = $_POST['ccutting'][$key];
    $alengthside = $_POST['alengthside'][$key];
    $blengthside = $_POST['blengthside'][$key];
    $clengthside = $_POST['clengthside'][$key];
    $aloopwaste = $_POST['aloopwaste'][$key];
    $bloopwaste = $_POST['bloopwaste'][$key];
    $cloopwaste = $_POST['cloopwaste'][$key];
    $aprintmistake = $_POST['aprintmistake'][$key];
    $bprintmistake = $_POST['bprintmistake'][$key];
    $cprintmistake = $_POST['cprintmistake'][$key];
    $afabmistake = $_POST['afabmistake'][$key];
    $bfabmistake = $_POST['bfabmistake'][$key];
    $cfabmistake = $_POST['cfabmistake'][$key];
    $aadas = $_POST['aadas'][$key];
    $badas = $_POST['badas'][$key];
    $cadas = $_POST['cadas'][$key];
    $asideseri = $_POST['asideseri'][$key];
    $bsideseri = $_POST['bsideseri'][$key];
    $csideseri = $_POST['csideseri'][$key];
    $aovrloclwaste = $_POST['aovrloclwaste'][$key];
    $bovrloclwaste = $_POST['bovrloclwaste'][$key];
    $covrloclwaste = $_POST['covrloclwaste'][$key];

     $sql1 = "UPDATE ocr_entry1 SET acutting='$acutting',bcutting='$bcutting',ccutting='$ccutting',alengthside='$alengthside',blengthside='$blengthside',clengthside='$clengthside',aloopwaste='$aloopwaste',bloopwaste='$bloopwaste',cloopwaste='$cloopwaste',aprintmistake='$aprintmistake',bprintmistake='$bprintmistake',cprintmistake='$cprintmistake',afabmistake='$afabmistake',bfabmistake='$bfabmistake',cfabmistake='$cfabmistake',aadas='$aadas',badas='$badas',cadas='$cadas',asideseri='$asideseri',bsideseri='$bsideseri',csideseri='$csideseri',aovrloclwaste='$aovrloclwaste',bovrloclwaste='$bovrloclwaste',covrloclwaste='$covrloclwaste' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('OCR Update successfully');window.location='ocr_entry_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<!-- <script>
  function getreqqty()
  {
   
    var orderqty=document.getElementById('orderqty').value?document.getElementById('orderqty').value:0;
    var mrpplan=document.getElementById('mrpplan').value?document.getElementById('mrpplan').value:0;
   
   if(parseInt(mrpplan)==parseInt(1)){

     document.getElementById('requiredqty').value=orderqty;
   }
   else{
    document.getElementById('requiredqty').value='';
   }


  }
  </script> -->

 