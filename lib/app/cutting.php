<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(9));
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



<script>
function get_items(value) {
//alert(value);
var form='fabric_computation';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(sts);
if(sts==1)
{
  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno').innerHTML =r1[1];
					   }
            }
             else if(sts==0)
            {
              alert("Fabric Already Made For This Order No.!");
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
function get_item_details(value) {
  
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#itemdesc').val(data.descr);
$('#fabricgsm').val(data.quality);
$('#bsize').val(data.size);
$('#fabricqty').val(data.quantity);
$('#color').val(data.color);
$('#cutprint').val(data.print);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getord.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_rec(value) {
  
  var value2=document.getElementById('orderno').value;
  var value3=document.getElementById('itemno').value;
  var value4=document.getElementById('color').value;
  // alert(value4);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == '1'){


$('#recmtr').val(data.mtrs);
 
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_fab.php?id="+value+"&orderno="+value2+"&itemno="+value3+"&color="+value4,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_fabcomp(value) {
  
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r); 
const data = JSON.parse(r);
if(data.sts == '1'){


$('#delmtr').val(data.totalmeters);

                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_fabcomp.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>



<?php
		
		  
		   $fg1="select max(bookno) as id from cutting";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>


  <?php include "head.php"; ?>
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
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Cutting</button>
                      <a href="cuttinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Cutting
                          </a>
                    </div>


                     <!-- Multi Column with Form Separator -->
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                          <div class="row g-4">
                            
                          <div class="col-md-2">
                            

                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="bookno"
                              placeholder=""
                              name="bookno"
                              value="<?php echo $enq; ?>"
                              readonly
                              aria-label="Product barcode" />                            
                          </div>
                          
                          <div class="col-md-2">
                              <label class="form-label" for="formtabs-country">Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo date("Y-m-d");?>"

                              aria-label="Product barcode" />
                            </div>
                            <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input 
                              type="text"
                              class="form-control"
                              id="orderno"
                              placeholder=""
                              name="orderno"
                             required
                              autofocus
                              onblur="get_items(this.value);"
                              aria-label="Product barcode" />
                          </div>
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;No&nbsp;</label>
                              <select name="itemno" id="itemno" class="select form-select" onchange="get_item_details(this.value);get_qty_details(this.value);get_fabcomp(this.value);"
 >
                                <option value="">Select</option>
					
                                
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label class="form-label" for="formtabs-country">Color</span></label>
                              <select name="color" id="color" class="select form-select">
                                <option value="">Select</option>
                              <?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                             </select>
                            </div>
                            <div class="col-md-2">
                              <label class="form-label" for="formtabs-country">Fab.Quality</label>
                              <select name="fabqty" id="fabqty" class="select form-select" onchange="get_rec(this.value);get_process(this.value);">
                                <option value="">Select</option>
                              <?php 
					$sql = "SELECT * FROM quality_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                    <?php } ?>
                             </select>
                            </div>

                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Required Meter</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="delmtr"
                                placeholder=""
                                name="delmtr"
                                readonly
                                aria-label="Product barcode" />
                              
                              
                            </div>
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Received Meter</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="recmtr"
                                placeholder=""
                                name="recmtr"
                                
                                aria-label="Product barcode" />  
                            </div>

                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Processed Meter</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="prometer"
                                placeholder=""
                                name="prometer"
                                readonly
                                aria-label="Product barcode" />
                              
                              
                            </div>
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;Description&nbsp;</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="itemdesc"
                                placeholder=""
                                name="itemdesc"
                                aria-label="Product barcode" />
                              
                            </div>
                           
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Gsm</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="fabricgsm"
                                placeholder=""
                                name="fabricgsm"
                                aria-label="Product barcode" />
                              
                              
                            </div>
                            <!-- <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="fabricsize"
                                placeholder=""
                                name="fabricsize"
                                aria-label="Product barcode" />
                              
                            </div>   -->
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Quantity</label>
                              <input 
                                type="text"
                                style="text-align:right"
                                min="0"
                                class="form-control"
                                id="fabricqty"
                                placeholder=""
                                name="fabricqty"
                                
                                aria-label="Product barcode" />
                              
                            </div>
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Print</label>
                              <input 
                                type="text"
                                style="text-align:right"
                                class="form-control"
                                id="cutprint"
                                placeholder=""
                                name="cutprint"
                                
                                aria-label="Product barcode" />
                              
                            </div>
                            
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="bsize"
                                placeholder=""
                                name="bsize"
                                aria-label="Product barcode" />
                              
                            </div>  
                          
                           
                            <div hidden class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">H.Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="hsize"
                                placeholder=""
                                name="hsize"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Cut.Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="cutsize"
                                placeholder=""
                                name="cutsize"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Loop Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="loopsize"
                                placeholder=""
                                name="loopsize"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-1">
                              <label class="form-label" for="ecommerce-product-barcode">Bit Waste</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="bitwaste"
                                placeholder=""
                                name="bitwaste"
                                aria-label="Product barcode" />
                              
                            </div>  
                          
                           
                            <div class="col-md-1">
                              <label class="form-label" for="ecommerce-product-barcode">Side&nbsp;Waste</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="swaste"
                                placeholder=""
                                name="swaste"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Table No</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="tabno"
                                placeholder=""
                                name="tabno"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Weight</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="weight"
                                placeholder=""
                                name="weight"
                                aria-label="Product barcode" />
                              
                            </div> 
                            <div class="col-md-2">
                              <label class="form-label" for="ecommerce-product-barcode">Balance Meter</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="balanmtr"
                                placeholder=""
                                name="balanmtr"
                                aria-label="Product barcode" />
                              
                            </div> 
                        </div><br><hr>


                        <div class=" mb-2 mt-4">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>date</th>
                                  <th>Count</th>
                                  <th>Bunch</h>
                                  <th>Total</th>
                                  <th>Lot</th> 
                                  <th>Bundle&nbsp;No</th>
                                  <th>Time</th> 
                                  <th>Total&nbsp;Pcs</th> 
                                  <th>Total&nbsp;Loop</th>
                                  
                                 
								
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
               
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="date1<?php echo $i;?>"
                                name="date1[]"
                                value="<?php echo date("Y-m-d");?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cutcount<?php echo $i;?>"
                                name="cutcount[]"
                                onkeyUp="tott(cutcount<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bunch<?php echo $i;?>"
                                name="bunch[]"
                                onkeyUp="tott(cutcount<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalcut<?php echo $i;?>"
                                      name="totalcut[]"
                                      onkeyUp="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id)"
                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="lot<?php echo $i;?>"
                                name="lot[]"
                              
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bundleno<?php echo $i;?>"
                                name="bundleno[]"
                              
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="timecut<?php echo $i;?>"
                                name="timecut[]"
                                
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                name="totalpcs[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalloop<?php echo $i;?>"
                                name="totalloop[]"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>



              
                
		
                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <50; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
             
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="date1<?php echo $i;?>"
                                name="date1[]"
                                value="<?php echo date("Y-m-d");?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cutcount<?php echo $i;?>"
                                name="cutcount[]"
                                onkeyUp="tott(cutcount<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bunch<?php echo $i;?>"
                                name="bunch[]"
                                onkeyUp="tott(cutcount<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalcut<?php echo $i;?>"
                                      name="totalcut[]"
                                      onkeyUp="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id);"
                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="lot<?php echo $i;?>"
                                name="lot[]"
                              
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bundleno<?php echo $i;?>"
                                name="bundleno[]"
                              
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="timecut<?php echo $i;?>"
                                name="timecut[]"
                               
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                name="totalpcs[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalloop<?php echo $i;?>"
                                name="totalloop[]"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>



              
                
		
                  </tr>     
<?php
                              }
                              ?>   
                                <tr >
                               
                                <td colspan="4" style="text-align:right">TOTAL</td>
                                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    step="0.01"
                                    id="totalfabric"
                                name="totalfabric" readonly
                                style="text-align:right" 
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                              </tr>
                              <tr style="display:none;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Consumption</td>
                                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="fabricconsumpution"
                                name="fabricconsumpution"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td></td>
                <td></td>

                              </tr>              
                              </tbody>
                            
                  </table>
                </div>
              </div><br>  
                 
                    </div>
                       
                            
                       </div> 
</div>
                
                       <br>

                       <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                               
                              </button>
                            </div>  
                   
                        
                        </form>
              </div>

                <!-- Default Wizard -->
               
               
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


<?php
if (isset($_POST['submit'])) {


 
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $itemno = $_POST['itemno'];
  $color = $_POST['color'];
  $fabqty = $_POST['fabqty'];
  $recmtr = $_POST['recmtr'];
  $delmtr = $_POST['delmtr'];
  $itemdesc = $_POST['itemdesc'];
  $fabricgsm = $_POST['fabricgsm'];
  $fabricqty = $_POST['fabricqty'];
  $cutprint = $_POST['cutprint'];
  $bsize = $_POST['bsize'];
  $hsize = $_POST['hsize'];
  $cutsize = $_POST['cutsize'];
  $loopsize = $_POST['loopsize'];
  $bitwaste = $_POST['bitwaste'];
  $swaste = $_POST['swaste'];
  $tabno = $_POST['tabno'];
  $weight = $_POST['weight'];
  $balanmtr = $_POST['balanmtr'];
  $totalfabric = $_POST['totalfabric'];
  $prometer = $_POST['prometer'];


 
    $sql = "INSERT into cutting (bookno,date,orderno,itemno,color,fabqty,recmtr,itemdesc,fabricgsm,fabricqty,cutprint,bsize,hsize,cutsize,loopsize,bitwaste,swaste,tabno,weight,balanmtr,delmtr,totalfabric,prometer) 
 values ('$bookno','$date','$orderno','$itemno','$color','$fabqty','$recmtr','$itemdesc','$fabricgsm','$fabricqty','$cutprint','$bsize','$hsize','$cutsize','$loopsize','$bitwaste','$swaste','$tabno','$weight','$balanmtr','$delmtr','$totalfabric','$prometer')";
    $result = mysqli_query($conn, $sql);
  
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['cutcount'] as $key => $val) {
    
    


    $date1 = $_POST['date1'][$key];
    $cutcount = $_POST['cutcount'][$key];
    $bunch = $_POST['bunch'][$key];
    $totalcut = $_POST['totalcut'][$key];
    $lot = $_POST['lot'][$key];
    $bundleno = $_POST['bundleno'][$key];
    $timecut = $_POST['timecut'][$key];
    $totalpcs = $_POST['totalpcs'][$key];
    $totalloop = $_POST['totalloop'][$key];

    if ($cutcount != '') {
   $sql = "INSERT into cutting1 (cid,date1,cutcount,bunch,totalcut,lot,bundleno,timecut,totalpcs,totalloop) 
 values ('$cid','$date1','$cutcount','$bunch','$totalcut','$lot','$bundleno','$timecut','$totalpcs','$totalloop')";
      $result = mysqli_query($conn, $sql);
    }
  }

  if ($result) {

 echo "<script>alert('Cutting Registered successfully');window.location='cutting.php';</script>";

  } 
  else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<script language="javascript" type="text/javascript">


function tot(v1)
{


// alert(v1);

a=v1;
b=(a.substr(8));


    k1=0;
       for(var i=0;i<=50;i++)
	  {
		
	   	if(document.getElementById('totalcut'+i).value!='')
	{
  
	  
	  var a1= document.getElementById('totalcut'+i).value?document.getElementById('totalcut'+i).value:0;
		 var k1=(parseFloat)(k1)+(parseFloat)(a1);
	
	   document.getElementById('totalfabric').value=k1.toFixed(3);

		
	}
	  }
  

}

</script>




<script>
function get_qty_details(value) {
  // alert(value);
  
  var value2=document.getElementById('orderno').value;
  if (value != "") {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  
		  document.getElementById('fabqty').innerHTML =r;

      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>


<script language="javascript" type="text/javascript">


function tott(v1)


{
  a=v1;
b=(a.substr(8));
//alert(v2);


    var cutcount=document.getElementById('cutcount'+b).value?document.getElementById('cutcount'+b).value:0;
    
		var bunch=document.getElementById('bunch'+b).value?document.getElementById('bunch'+b).value:0;
		
    var totalcut=(parseFloat)(cutcount)*(parseFloat)(bunch);
	 // alert(totalcut);
	  document.getElementById('totalcut'+b).value=totalcut;
}

	
    </script>


<script>
function get_process(value) {
  
  var value2=document.getElementById('orderno').value;
  var value3=document.getElementById('itemno').value;
  var value4=document.getElementById('color').value;
  // alert(value4);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == '1'){


$('#prometer').val(data.mtrs);
 
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_pro.php?id="+value+"&orderno="+value2+"&itemno="+value3+"&color="+value4,true);
    xmlhttp.send();
  }
}
</script>