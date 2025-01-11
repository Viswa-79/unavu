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



<?php
		   $fg1="select max(refno) as id from ocr_entry";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>


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
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">BOOK&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              readonly
                              value="<?php echo $enq; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              autofocus
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onchange="get_items(this.id,this.value);"
                              required 
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Item&nbsp;No</label>
                            <select name="itemno"   id="itemno" class="select form-select" onchange="get_item(this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quantity&nbsp;Shipped:</label>
                            <input
                              type="text"
                              id="qtyship"
                              name="qtyship"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Quality:</label>
                            <input
                              type="text"
                              id="fabquality"
                              name="fabquality"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Weight&nbsp;For&nbsp;Mtrs:</label>
                            <input
                              type="text"
                              id="weightformtr"
                              name="weightformtr"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Consumption</label>
                            <input
                              type="text"
                              id="consumption"
                              name="consumption"
                              class="form-control"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total&nbsp;Fabric&nbsp;Recepit</label>
                            <input
                              type="text"
                              id="tfabrec"
                              name="tfabrec"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Consumed&nbsp;Quantity</label>
                            <input
                              type="text"
                              id="consumedqty"
                              name="consumedqty"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Bag&nbsp;Size</label>
                            <input
                              type="text"
                              id="bagsize"
                              name="bagsize"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Cutting&nbsp;Size</label>
                            <input
                              type="text"
                              id="cutsize"
                              name="cutsize"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Balance</label>
                            <input
                              type="text"
                              id="balance"
                              name="balance"
                              class="form-control"
                               />
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Stock</label>
                            <input
                              type="text"
                              id="fabstock"
                              name="fabstock"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Loop&nbsp;Stock</label>
                            <input
                              type="text"
                              id="loopstock"
                              name="loopstock"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Pcs&nbsp;Stock</label>
                            <input
                              type="text"
                              id="pcsstock"
                              name="pcsstock"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Half&nbsp;Finishing</label>
                            <input
                              type="text"
                              id="halffinish"
                              name="halffinish"
                              class="form-control"
                               />
                          </div>
                          
                         
                        </div>
                        <br>
                        <div class="card">
                        <div class="table-responsive">
                            <table  class="table table-border border-top table-hover mt-2">
                             
                              <tbody>
                             
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bcutting"
                                     name="bcutting[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="ccutting"
                                     name="ccutting[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="blengthside"
                                     name="blengthside[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="clengthside"
                                     name="clengthside[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bloopwaste"
                                     name="bloopwaste[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cloopwaste"
                                     name="cloopwaste[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bprintmistake"
                                     name="bprintmistake[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cprintmistake"
                                     name="cprintmistake[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bfabmistake"
                                     name="bfabmistake[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cfabmistake"
                                     name="cfabmistake[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="badas"
                                     name="badas[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="cadas"
                                     name="cadas[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bsideseri"
                                     name="bsideseri[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="csideseri"
                                     name="csideseri[]"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="bovrloclwaste"
                                     name="bovrloclwaste[]"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="covrloclwaste"
                                     name="covrloclwaste[]"
                                     style="text-align:right"/>
                                        
                 </td>
           </tr>
           <tr>
                                 
               
               
                                 <td style="padding: 0.3rem"colspan="3">Total Balance : </td>        
                 
                                 <td style="padding: 0.3rem" >
                  <input
                                     type="text" 
                                    
                                     class="form-control"
                                     id="totalbalance"
                                     name="totalbalance"
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
                                     style="text-align:right"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="btotalweight"
                                     name="btotalweight"
                                     style="text-align:right"/>
                                        
                 </td> 
               <td style="padding: 0.3rem">
                  <input
                                     type="text" 
                                     class="form-control"
                                     id="ctotalweight"
                                     name="ctotalweight"
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
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
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
  
   $sql = "INSERT into ocr_entry (refno,dcno,date,orderno,itemno,qtyship,fabquality,weightformtr,consumption,tfabrec,consumedqty,bagsize,cutsize,balance,fabstock,loopstock,pcsstock,halffinish,totalbalance,atotalweight,btotalweight,ctotalweight)
    values ('$refno','$dcno','$date','$orderno','$itemno','$qtyship','$fabquality','$weightformtr','$consumption','$tfabrec','$consumedqty','$bagsize','$cutsize','$balance','$fabstock','$loopstock','$pcsstock','$halffinish','$totalbalance','$atotalweight','$btotalweight','$ctotalweight')";
    $result = mysqli_query($conn, $sql);


    $cid = mysqli_insert_id($conn);
    
    foreach ($_POST['acutting']as $key => $val); {
    
      
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

    if ($acutting != '') {
     $sql1 = "INSERT into ocr_entry1 (cid,acutting,bcutting,ccutting,alengthside,blengthside,clengthside,aloopwaste,bloopwaste,cloopwaste,aprintmistake,bprintmistake,cprintmistake,afabmistake,bfabmistake,cfabmistake,aadas,badas,cadas,asideseri,bsideseri,csideseri,aovrloclwaste,bovrloclwaste,covrloclwaste) 
 values ('$cid','$acutting','$bcutting','$ccutting','$alengthside','$blengthside','$clengthside','$aloopwaste','$bloopwaste','$cloopwaste','$aprintmistake','$bprintmistake','$cprintmistake','$afabmistake','$bfabmistake','$cfabmistake','$aadas','$badas','$cadas','$asideseri','$bsideseri','$csideseri','$aovrloclwaste','$bovrloclwaste','$covrloclwaste')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('OCR Saved successfully');window.location='ocr_entry.php';</script>";

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

 