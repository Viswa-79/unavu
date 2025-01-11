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
//alert(r);
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
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>




  <?php include "head.php"; ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
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
                      <button class="btn btn-label-primary">Cutting </button>
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
                        <?php
                              $sql4 = " SELECT * FROM cutting WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                                    <div class="row g-4">
                            
                            <div class="col-md-2">
                              
  
                              <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                              <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;&nbsp;<span style="color:red;">*</span></label>

                              <input
                                type="text"
                                class="form-control"
                                id="bookno"
                                placeholder=""
                                name="bookno"
                                value="<?php echo $wz1['bookno']; ?>"
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
                                value="<?php echo $wz1['date']; ?>"
  
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
                                value="<?php echo $wz1['orderno']; ?>"
                                autofocus
                                aria-label="Product barcode" />
                            </div>
                              <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;No&nbsp;</label>
                                <select name="itemno"  id="itemno" class="select form-select" >
                                   <option value="">Select</option>
                                  <?php 
					$sql2 = "SELECT * FROM item_master order by code asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw2 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw2['id']==$wz1['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw2['id'];?>"><?php echo $rw2['code'];?></option>
                    <?php } ?>
                                
                              </select>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label" for="formtabs-country">Color</span></label>
                                <select name="color"  id="color" class="select form-select">
                                   <option value="">Select</option>
                                  <?php 
					$sql1 = "SELECT * FROM color order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$wz1['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label" for="formtabs-country">Fab.Quality</label>

                                <select name="fabqty"  id="fabqty" class="select form-select" >
                                   <option value="">Select</option>
                                  <?php 
					$sql = "SELECT * FROM quality_master order by quality asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['fabqty']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                              </div>
  
                              <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Delivered Meter</label>
                                <input 
                                  type="text"
                                  class="form-control"
                                  id="delmtr"
                                  placeholder=""
                                  name="delmtr"
                                  value="<?php echo $wz1['delmtr']; ?>"
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
                                  value="<?php echo $wz1['recmtr']; ?>"
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
                                  value="<?php echo $wz1['prometer']; ?>"
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
                                  value="<?php echo $wz1['itemdesc']; ?>"
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
                                  value="<?php echo $wz1['fabricgsm']; ?>"
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
                                  value="<?php echo $wz1['fabricqty']; ?>"
                                  name="fabricqty"
                                  
                                  aria-label="Product barcode" required/>
                                
                              </div>
                              <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Print</label>
                                <input 
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="cutprint"
                                  placeholder=""
                                  value="<?php echo $wz1['cutprint']; ?>"
                                  name="cutprint"
                                  
                                  aria-label="Product barcode" required/>
                                
                              </div>
                              
                              <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Size</label>
                                <input 
                                  type="text"
                                  class="form-control"
                                  id="bsize"
                                  placeholder=""
                                  name="bsize"
                                  value="<?php echo $wz1['bsize']; ?>"
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
                                  value="<?php echo $wz1['hsize']; ?>"
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
                                  value="<?php echo $wz1['cutsize']; ?>"
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
                                  value="<?php echo $wz1['loopsize']; ?>"
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
                                  value="<?php echo $wz1['bitwaste']; ?>"
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
                                  value="<?php echo $wz1['swaste']; ?>"
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
                                  value="<?php echo $wz1['tabno']; ?>"
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
                                  value="<?php echo $wz1['weight']; ?>"
                                  aria-label="Product barcode" />
                                
                              </div> 
                              <div class="col-md-2">
                                <label class="form-label" for="ecommerce-product-barcode">Balance Meter</label>
                                <input 
                                  type="text"
                                  class="form-control"
                                  id="balanmtr"
                                  placeholder=""
                                  value="<?php echo $wz1['balanmtr']; ?>"
                                  name="balanmtr"
                                  aria-label="Product barcode" />
                                
                              </div> 
                          </div>
                       <br><hr>


                        <div class=" mb-2 mt-4">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                <th style="width:50px">S.No</th>
                                  <th>date</th>
                                  <th>Count</th>
                                  <th>Bunch</th>
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM cutting1 Where cid='$sid' order by id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                
                                  <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>
               
                                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="date1<?php echo $i;?>"
                                name="date1[]"
                                value="<?php echo $rw['date1']; ?>"
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
                                value="<?php echo $rw['cutcount']; ?>"
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
                                value="<?php echo $rw['bunch']; ?>"
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
                                      value="<?php echo $rw['totalcut']; ?>"
                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="lot<?php echo $i;?>"
                                name="lot[]"
                                value="<?php echo $rw['lot']; ?>"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bundleno<?php echo $i;?>"
                                name="bundleno[]"
                                value="<?php echo $rw['bundleno']; ?>"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="timecut<?php echo $i;?>"
                                name="timecut[]"
                                value="<?php echo $rw['timecut']; ?>"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                name="totalpcs[]"
                                value="<?php echo $rw['totalpcs']; ?>"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalloop<?php echo $i;?>"
                                name="totalloop[]"
                                value="<?php echo $rw['totalloop']; ?>"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>

                  </tr>
                  <?php
                            $sno++; $i++;
    }
    $j=$i;
    $sn=$sno; 
    for ($i = $j, $sno = $sn; $i <=49; $i++, $sno++) {

      ?>
       <input type="text" hidden name="rid[]" id="rid" value="">
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
                                value="<?php echo $rw['date1']; ?>"
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
                                value="<?php echo $rw['cutcount']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bunch<?php echo $i;?>"
                                name="bunch[]"
                                onkeyUp="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);tot(totalcut<?php echo $i;?>.id);"
                                style="text-align:right"
                                value="<?php echo $rw['bunch']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalcut<?php echo $i;?>"
                                      name="totalcut[]"
                                      onkeyUp="tott(cutcount<?php echo $i;?>.id);"
                                onchange="tott(cutcount<?php echo $i;?>.id);"
                                      value="<?php echo $rw['totalcut']; ?>"
                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="lot<?php echo $i;?>"
                                name="lot[]"
                                value="<?php echo $rw['lot']; ?>"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bundleno<?php echo $i;?>"
                                name="bundleno[]"
                                value="<?php echo $rw['bundleno']; ?>"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="timecut<?php echo $i;?>"
                                name="timecut[]"
                                value="<?php echo $rw['timecut']; ?>"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                name="totalpcs[]"
                                value="<?php echo $rw['totalpcs']; ?>"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalloop<?php echo $i;?>"
                                name="totalloop[]"
                                value="<?php echo $rw['totalloop']; ?>"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
      </tr>
                                <?php
                     
    }
?>                                 <input type="text" hidden name="rc3" id="rc3" value="<?php echo $i;?>">                                             

                                <tr >
                              
                                <td colspan="4" style="text-align:right">TOTAL</td>
                                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    step="0.01"
                                    id="totalfabric"
                                name="totalfabric"
                                style="text-align:right"
                                value="<?php echo $wz1['totalfabric']; ?>"
                                    aria-label="Product barcode" READONLY/>
                                       
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
                          <!--      <td>Consumption</td>
                                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="fabricconsumpution"
                                name="fabricconsumpution"
                                style="text-align:right"
                                value="<?php echo $wz1['fabricconsumpution']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>-->
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
                              <a class="btn btn-label-dark btn-prev" href="cuttinglist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>

 
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
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
  $cid =$_POST['cid'];

  
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
  


  $sql = "UPDATE cutting SET bookno='$bookno',date='$date',orderno='$orderno',itemno='$itemno',color='$color',fabqty='$fabqty',delmtr='$delmtr',recmtr='$recmtr',itemdesc='$itemdesc',fabricgsm='$fabricgsm',fabricqty='$fabricqty',cutprint='$cutprint',bsize='$bsize',hsize='$hsize',cutsize='$cutsize',loopsize='$loopsize',bitwaste='$bitwaste',swaste='$swaste',tabno='$tabno',weight='$weight',balanmtr='$balanmtr',totalfabric='$totalfabric',prometer='$prometer' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['cutcount'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $cutcount = $_POST['cutcount'][$key];
    $date1 = $_POST['date1'][$key];
    $bunch = $_POST['bunch'][$key];
    $totalcut = $_POST['totalcut'][$key];
    $lot = $_POST['lot'][$key];
    $bundleno = $_POST['bundleno'][$key];
    $timecut = $_POST['timecut'][$key];
    $totalpcs = $_POST['totalpcs'][$key];
    $totalloop = $_POST['totalloop'][$key];


    
    if ($cutcount != '') {
      if ($rid != '') {
     $sql1 = "UPDATE  cutting1 SET cid='$cid',date1='$date1',cutcount='$cutcount',bunch='$bunch',totalcut='$totalcut',lot='$lot',bundleno='$bundleno',timecut='$timecut',totalpcs='$totalpcs',totalloop='$totalloop' WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
  }
  else{
    $sql1 = "INSERT into cutting1 (cid,date1,cutcount,bunch,totalcut,lot,bundleno,timecut,totalpcs,totalloop) 
    values ('$cid','$date1','$cutcount','$bunch','$totalcut','$lot','$bundleno','$timecut','$totalpcs','$totalloop')";
         $result1 = mysqli_query($conn, $sql1);
  }
}
  }
  
  if ($result) {

  echo "<script>alert('Cutting Updated successfully');window.location='cuttinglist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


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


<script language="javascript" type="text/javascript">
  

function tot(v1)
{

  
// alert(v1);

a=v1;
b=(a.substr(8));

var rc3=document.getElementById('rc3').value;

    k1=0;
       for(var i=0;i<=rc3;i++)
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