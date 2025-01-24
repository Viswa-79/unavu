<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>
<script>
function ee2(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

}

</script>

<?php
$fg1="select max(book) as id from sample";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>

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
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Sales Invoice </button>
                      <a href="sales_invoice_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Sales
                          </a>
                    </div>  <br>         
                    <?php
		 $sid=base64_decode($_GET['id']);
		 ?>                     
              <div class="row">
               
                
                <div class="col-xxl">
                  <div class="card mb-4">
                      <div class="bs-stepper-content mt-3">
                        <h4>Sales Invoice - Additional Details</h4>
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM salesinvoice WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                
                        <!-- Social Links -->
                       
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="invoiceno"
                              name="invoiceno"
                              
                              value="<?php echo $wz1['invoiceno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">SB No.&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="sbno"
                              name="sbno"
                              class="form-control"
                              value="<?php echo $wz1['sbno']; ?>"
                              placeholder="" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="collapsible-fullname">SB Date.</label>
                                <input
                                type="date"
                                id="sbdate"
                                
                                name="sbdate"
                                value="<?php echo $wz1['sbdate']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Port</label>
                            <input
                              type="text"
                              id="port"
                              value="<?php echo $wz1['port']; ?>"
                              name="port"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Payment Received</label>
                            <select name="paymentreceived" class="select form-select" data-live-search="true"   >
                            <option value="">Select</option>
                                <option value="Yes" <?php if($wz1['paymentreceived']=='Yes'){ ?>Selected<?php } ?> >Yes </option>
                                <option value="No" <?php if($wz1['paymentreceived']=='No'){ ?>Selected<?php } ?> >No</option>                                
                              </select>
                               </select>
                          </div>
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">FOB Value</label>
                            <input
                              type="text"
                              id="fobvalue"
                              name="fobvalue"
                              value="<?php echo $wz1['fobvalue']; ?>"
                             
                              class="form-control"
                               />
                          </div> </div><br>
                           <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DBK Value</label>
                            <input
                              type="text"
                              id="dbkvalue"
                              name="dbkvalue"
                              class="form-control"
                              value="<?php echo $wz1['dbkvalue']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Status</label>
                            <select name="dstatus" class="select form-select" data-live-search="true"   >
                        
                         <option value="">Select</option>
                                <option value="Pending" <?php if($wz1['dstatus']=='Pending'){ ?>Selected<?php } ?> >Pending </option>
                                <option value="Received" <?php if($wz1['dstatus']=='Received'){ ?>Selected<?php } ?> >Received</option>                                
                              </select>
                         
                         </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Scroll/DT</label>
                            <input
                              type="text"
                              id="scroll"
                              value="<?php echo $wz1['scroll']; ?>"
                              name="scroll"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label">Clearing&nbsp;Agent</label>
                            <select name="clearingagent" id="clearingagent" class="select form-select" data-allow-clear="true" >
                            <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['clearingagent']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                          </div>
                          
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Export Product</label>
                            <input
                              type="text"
                              id="exportproduct"
                              name="exportproduct"
                              
                              value="<?php echo $wz1['exportproduct']; ?>"
                              class="form-control"
                               />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Ex Rate</label>
                            <input
                              type="text"
                              id="exrate"
                              name="exrate"
                              class="form-control"
                              value="<?php echo $wz1['exrate']; ?>"
                              placeholder="" />
                          </div></div><br>
                          <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">FOB Value(In INR)</label>
                            <input
                              type="text"
                              id="fobvalueinr"
                              name="fobvalueinr"
                              value="<?php echo $wz1['fobvalueinr']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Bank&nbsp;Realization&nbsp;No</label>
                            <input
                              type="text"
                              id="realizationno"
                              value="<?php echo $wz1['realizationno']; ?>"
                              name="realizationno"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label">Date&nbsp;of&nbsp;Realization</label>
                          <input
                              type="text"
                              id="realizationdate"
                              value="<?php echo $wz1['realizationdate']; ?>"
                              name="realizationdate"
                              class="form-control"
                               />
                          </div>
                          
                          <div class="col-md-1">
                              <label class="form-label" for="collapsible-fullname">MEIS/RODTEP(%)</label>
                              <input
                              type="text"
                              id="meispercent"
                              name="meispercent"
                              value="<?php echo $wz1['meispercent']; ?>"
                              class="form-control"
                              />
                            </div>
                            
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">MEIS/RODTEP</label>
                            <input
                              type="text"
                              id="meisvalue"
                              name="meisvalue"
                              class="form-control"
                              value="<?php echo $wz1['meisvalue']; ?>"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">MEIS Received Amt</label>
                            <input
                              type="text"
                              id="meisrecamt"
                              value="<?php echo $wz1['meisrecamt']; ?>"
                              name="meisrecamt"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">MEIS License No/Date</label>
                            <input
                              type="text"
                              id="meisno"
                              value="<?php echo $wz1['meisno']; ?>"
                              name="meisno"
                              class="form-control"
                               />
                          </div></div><br>
                          <div class="row g-3">
                          <div class="col-md-2">
                          <label class="form-label">Type&nbsp;</label>
                          <input
                              type="text"
                              id="type"
                              value="<?php echo $wz1['type']; ?>"
                              name="type"
                              class="form-control"
                               />
                            
                          </div>
                         
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">MEIS Status</label>
                            <input
                              type="text"
                              id="meisstatus"
                              name="meisstatus"
                              value="<?php echo $wz1['meisstatus']; ?>"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Scroll No.</label>
                            <input
                              type="text"
                              id="scroll"
                              name="scroll"
                              class="form-control"
                              value="<?php echo $wz1['invoiceno']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">EP Copy</label>
                            <input
                              type="text"
                              id="epcopy"
                              value="<?php echo $wz1['epcopy']; ?>"
                              name="epcopy"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">BRC</label>
                            <input
                              type="text"
                              id="brc"
                              value="<?php echo $wz1['brc']; ?>"
                              name="brc"
                              class="form-control"
                               />
                          </div> 
                          <div class="col-md-2">
                          <label class="form-label">Due Date&nbsp;</label>
                          <input
                              type="date"
                              id="duedate"
                              name="duedate"
                              class="form-control"
                              value="<?php echo $wz1['duedate']; ?>"
                              placeholder="" />
                          </div>
                         
                    

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Bank Ref No & Date</label>
                            <input
                              type="text"
                              id="bankrefno"
                              name="bankrefno"
                              value="<?php echo $wz1['bankrefno']; ?>"
                              class="form-control"
                               />
                          </div> </div><br>
                          <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Way Bill No & Date</label>
                            <input
                              type="date"
                              id="waybillno"
                              name="waybillno"
                              value="<?php echo $wz1['waybillno']; ?>"
                              class="form-control"
                              
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Realised Value in Currency</label>
                            <input
                              type="text"
                              id="realisedvaluecurrency"
                              value="<?php echo $wz1['realisedvaluecurrency']; ?>"
                              name="realisedvaluecurrency"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Realised Value in INR</label>
                            <input
                              type="text"
                              id="realisedvalueinr"
                              value="<?php echo $wz1['realisedvalueinr']; ?>"
                              name="realisedvalueinr"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label">+ / - Value&nbsp;</label>
                          <input
                              type="text"
                              id="plusorminusvalue"
                              value="<?php echo $wz1['plusorminusvalue']; ?>"
                              name="plusorminusvalue"
                              class="form-control"
                               />
                            
                          </div>
                          
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Bank Charge</label>
                            <input
                              type="text"
                              id="bankcharge"
                              name="bankcharge"
                              
                              value="<?php echo $wz1['bankcharge']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Payment Realised Date</label>
                            <input
                              type="date"
                              id="paymentrealiseddate"
                              value="<?php echo $wz1['paymentrealiseddate']; ?>"
                              name="paymentrealiseddate"
                              class="form-control"
                              
                              placeholder="" />
                          </div></div><br>
                          <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">ETA(Changes If Any)</label>
                            <input
                              type="date"
                              id="etachanges"
                              value="<?php echo $wz1['etachanges']; ?>"
                              name="etachanges"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Inv INR Value</label>
                            <input
                              type="text"
                              id="invinrvalue"
                              name="invinrvalue"
                              value="<?php echo $wz1['invinrvalue']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label">Doc Sub Date</label>
                          <input
                              type="date"
                              id="docsubdate"
                              name="docsubdate"
                              value="<?php echo $wz1['docsubdate']; ?>"
                              class="form-control"
                               />
                          </div>
                        
                      
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Acceptance Date</label>
                            <input
                              type="date"
                              id="acceptancedate"
                              name="acceptancedate"
                              value="<?php echo $wz1['acceptancedate']; ?>"
                              class="form-control"
                               />
                          </div> 
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">FC Details</label>
                            <input
                              type="date"
                              id="fcdetails"
                              name="fcdetails"
                              class="form-control"
                              value="<?php echo $wz1['fcdetails']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Exbid</label>
                            <input
                              type="text"
                              id="exbid"
                              value="<?php echo $wz1['exbid']; ?>"
                              name="exbid"
                              class="form-control"
                              placeholder="" />
                          </div>
                         
                          
                          </div><br>
                       
              </div>  </div>
                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="sales_invoice_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Preview</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span>
                               
                              </button>
                            </div>    
                        </div>
                        </form>
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


<?php
if (isset($_POST['submit'])) {


    $sbno = $_POST['sbno'];
    $sbdate = $_POST['sbdate'];
    $port = $_POST['port'];
    $fobvalue = $_POST['fobvalue'];
    $dbkvalue = $_POST['dbkvalue'];
    $dstatus = $_POST['dstatus'];
    $scroll = $_POST['scroll'];
    $clearingagent = $_POST['clearingagent'];
    $exportproduct = $_POST['exportproduct'];
    $exrate = $_POST['exrate'];
    $fobvalueinr = $_POST['fobvalueinr'];
    $realizationno = $_POST['realizationno'];
    $realizationdate = $_POST['realizationdate'];
    $meisvalue = $_POST['meisvalue'];
    $meisno = $_POST['meisno'];
    $type = $_POST['type'];
    $meisstatus = $_POST['meisstatus'];
    $epcopy = $_POST['epcopy'];
    $brc = $_POST['brc'];
    $meispercent = $_POST['meispercent'];
    $bankrefno = $_POST['bankrefno'];
    $waybillno = $_POST['waybillno'];
    $realisedvaluecurrency = $_POST['realisedvaluecurrency'];
    $realisedvalueinr = $_POST['realisedvalueinr'];
    $plusorminusvalue = $_POST['plusorminusvalue'];
    $bankcharge = $_POST['bankcharge'];
    $paymentrealiseddate = $_POST['paymentrealiseddate'];
    $duedate = $_POST['duedate'];
    $etachanges = $_POST['etachanges'];
    $invinrvalue = $_POST['invinrvalue'];
    $exbid = $_POST['exbid'];
    $docsubdate = $_POST['docsubdate'];
    $paymentreceived = $_POST['paymentreceived'];
    $paymentreceived = $_POST['paymentreceived'];
    $meisrecamt = $_POST['meisrecamt'];
    $acceptancedate = $_POST['acceptancedate'];
    $fcdetails = $_POST['fcdetails'];
    
 

       $sql= "UPDATE salesinvoice SET sbno='$sbno',sbdate='$sbdate',port='$port',fobvalue='$fobvalue',dbkvalue='$dbkvalue',
        dstatus='$dstatus',scroll='$scroll',clearingagent='$clearingagent',exportproduct='$exportproduct',exrate='$exrate',fobvalueinr='$fobvalueinr',realizationno='$realizationno',realizationdate='$realizationdate',
        meisvalue='$meisvalue',meisno='$meisno',type='$type',meisstatus='$meisstatus',epcopy='$epcopy',brc='$brc',
        meispercent='$meispercent',bankrefno='$bankrefno',waybillno='$waybillno',realisedvaluecurrency='$realisedvaluecurrency',realisedvalueinr='$realisedvalueinr',plusorminusvalue='$plusorminusvalue',bankcharge='$bankcharge',paymentrealiseddate='$paymentrealiseddate',duedate='$duedate',etachanges='$etachanges',invinrvalue='$invinrvalue',docsubdate='$docsubdate',acceptancedate='$acceptancedate',fcdetails='$fcdetails',
        exbid='$exbid',paymentreceived='$paymentreceived',meisrecamt='$meisrecamt' WHERE id='$sid'";
        $result = mysqli_query($conn, $sql);
    
  
  
  if ($result) {

 echo "<script>alert('Sales Updated Successfully');window.location='sales_invoice_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
