<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(8));
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
$('#fabricsize').val(data.size);
$('#fabricqty').val(data.quantity);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
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
                            
                          <div class="col-md-3">
                            

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
                          
                          <div class="col-md-3">
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
                            <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input 
                              type="text"
                              class="form-control"
                              id="orderno"
                              placeholder=""
                              name="orderno"
                             
                              autofocus
                              onblur="get_items(this.value);"
                              aria-label="Product barcode" />
                          </div>
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;No&nbsp;</label>
                              <select name="itemno" id="itemno" class="select form-select" onchange="get_item_details(this.value);get_qty_details(orderno.value,this.value);"
 >
                                <option value="">Select</option>
					
                                
                              </select>
                            </div>
                           
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;Description&nbsp;</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="itemdesc"
                                placeholder=""
                                name="itemdesc"
                                aria-label="Product barcode" />
                              
                            </div>
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Gsm</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="fabricgsm"
                                placeholder=""
                                name="fabricgsm"
                                aria-label="Product barcode" />
                              
                              
                            </div>
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Size</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="fabricsize"
                                placeholder=""
                                name="fabricsize"
                                aria-label="Product barcode" />
                              
                            </div>  
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Quantity</label>
                              <input 
                                type="text"
                                style="text-align:right"
                                min="0"
                                class="form-control"
                                id="fabricqty"
                                placeholder=""
                                name="fabricqty"
                                
                                aria-label="Product barcode" required/>
                              
                            </div>
                            
                           
                          
                           

                            
                        </div><br><hr>


                        <div class="card mb-2 mt-4">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Cut&nbsp;Pannel&nbsp;Name</th>
                                  <th>Quality</th>
                                  <th>Color</th>
                                  <th>Allot&nbsp;Fabric&nbsp;width&nbsp;Inches</th>
                                  <th>width</th>
                                  <th>length</th> 
                                  <th>Take&nbsp;Fabric&nbsp;Inches</th>
                                  <th>No&nbsp;Of&nbsp;Bits</th> 
                                  <th>consumption</th> 
                                  <th>Quantity</th>
                                  <th>Total&nbsp;Meters</th>
                                 
								  <th>Wastage</th>
                                 
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
                <select name="pannelname[]"  id="pannelname" class="select form-select">
                                <option value="">Select</option>
                                <option value="Bag">Bag</option>
                                <option value="Handle">Handle</option>
							
                              </select>
                 </td>
                <td style="padding: 0.3rem">
                <select  style="width:200px"  id="quality<?php echo $i;?>"
                                 name="quality[]" 
                                 style="text-align:right"
                                 class="select form-select" 
                                   >
                                <option value="">Select</option>
						
                              </select>
                  
                 </td>
                <td style="padding: 0.3rem">
                <select  style="width:130px"  id="color<?php echo $i;?>"
                                 name="color[]"
                                 style="text-align:right"
                                 class="select form-select" 
                                   >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                  
                 </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                name="allotfabric[]"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="width<?php echo $i;?>"
                                      name="width[]"
                                      onkeyUp="tott(bits<?php echo $i;?>.id);"
                                        onchange="tott(bits<?php echo $i;?>.id);"

                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="length<?php echo $i;?>"
                                name="length[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="takefabric<?php echo $i;?>"
                                name="takefabric[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"

                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                name="bits[]"
                                
                                onchange="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                onkeyUp="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                name="consumption[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>



                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                name="totalmeters[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                
			<td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wastage<?php echo $i;?>"
                                    name="wastage[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value=""
                                    aria-label="Product barcode"/>
                                       
                </td>  
                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                                               <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                <td style="padding: 0.3rem">
                <select name="pannelname[]"  id="pannelname" class="select form-select">
                                <option value="">Select</option>
                                <option value="Bag">Bag</option>
                                <option value="Handle">Handle</option>
							
                              </select>
                 </td>
                 <td style="padding: 0.3rem">
                <select  style="width:200px"  id="quality<?php echo $i;?>"
                                 name="quality[]" 
                                 style="text-align:right"
                                 class="select form-select" 
                                   >
                                <option value="">Select</option>
							
                              </select>
                  
                 </td>
                <td style="padding: 0.3rem">
                <select  style="width:130px"  id="color<?php echo $i;?>"
                                 name="color[]"
                                 style="text-align:right"
                                 class="select form-select" 
                                   >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                  
                 </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                name="allotfabric[]"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>

                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="width<?php echo $i;?>"
                                      name="width[]"
                                      onkeyUp="tott(bits<?php echo $i;?>.id);"
                                        onchange="tott(bits<?php echo $i;?>.id);"

                                      style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="length<?php echo $i;?>"
                                name="length[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="takefabric<?php echo $i;?>"
                                name="takefabric[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"

                                style="text-align:right"
                                    aria-label="Product barcode"/>
                </td>
               
               <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                name="bits[]"
                                
                                onchange="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                onkeyUp="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                name="consumption[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>



                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                name="totalmeters[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
               
               

   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wastage<?php echo $i;?>"
                                    name="wastage[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value=""
                                    aria-label="Product barcode"/>
                                       
                </td>  
                  </tr>       
<?php
                              }
                              ?>   
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align:right">TOTAL&nbsp;METERS</td>
                                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    step="0.01"
                                    id="totalfabric"
                                name="totalfabric"
                                style="text-align:right" readonly
                                    aria-label="Product barcode"/>
                                       
                </td>
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
  $itemdesc = $_POST['itemdesc'];
  $fabricgsm = $_POST['fabricgsm'];
  $fabricsize = $_POST['fabricsize'];
  $fabricqty = $_POST['fabricqty'];
  $totalfabric = $_POST['totalfabric'];
  $fabricconsumpution = $_POST['fabricconsumpution'];

 
    $sql = "INSERT into cutting (bookno,date,orderno,itemno,itemdesc,fabricgsm,fabricsize,fabricqty,totalfabric,fabricconsumpution) 
 values ('$bookno','$date','$orderno','$itemno','$itemdesc','$fabricgsm','$fabricsize','$fabricqty','$totalfabric','$fabricconsumpution')";
    $result = mysqli_query($conn, $sql);
  
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['quantity'] as $key => $val) {
    
    

    $pannelname = $_POST['pannelname'][$key];
    $quality = $_POST['quality'][$key];
    $color = $_POST['color'][$key];
    $width = $_POST['width'][$key];
    $length = $_POST['length'][$key];
    $takefabric = $_POST['takefabric'][$key];
    $allotfabric = $_POST['allotfabric'][$key];
    $bits = $_POST['bits'][$key];
    $consumption = $_POST['consumption'][$key];
    $quantity = $_POST['quantity'][$key];
    $totalmeters = $_POST['totalmeters'][$key];
   
    $wastage = $_POST['wastage'][$key];
    
    if ($color != '') {
    echo $sql = "INSERT into cutting1 (cid,pannelname,quality,color,width,length,takefabric,allotfabric,bits,consumption,quantity,totalmeters,process,wastage) 
 values ('$cid','$pannelname','$quality','$color','$width','$length','$takefabric','$allotfabric','$bits','$consumption','$quantity','$totalmeters','$process','$wastage')";
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


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(4));


        var t=document.getElementById('takefabric'+b).value?document.getElementById('takefabric'+b).value:0;

        var s=document.getElementById('width'+b).value?document.getElementById('width'+b).value:0;
      
        var tt=parseFloat(t)*parseFloat(2.54)/parseFloat(s);
        
    
				var ttb=Math.floor(tt);
		document.getElementById('bits'+b).value=ttb;
		
		var w=(parseFloat(t)*2.54)-(parseFloat(s)*parseFloat(ttb));
		
		document.getElementById('wastage'+b).value=w.toFixed(3);


     var t1=document.getElementById('length'+b).value?document.getElementById('length'+b).value:0;
    
        var tt1=parseFloat(t1)/(parseFloat(100)*parseFloat(ttb));
        
       
		document.getElementById('consumption'+b).value=tt1.toFixed(3);

        var s1=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;
      
        var tt1=parseFloat(tt1)*parseFloat(s1);
      
		document.getElementById('totalmeters'+b).value=tt1.toFixed(3);

    k1=0;
       for(var i=0;i<20;i++)
	  {
		
	   	if(document.getElementById('totalmeters'+i).value!='')
	{
  
	  
	  var a1= document.getElementById('totalmeters'+i).value?document.getElementById('totalmeters'+i).value:0;
		 var k1=(parseFloat)(k1)+(parseFloat)(a1);
	
	   document.getElementById('totalfabric').value=k1.toFixed(3);

		
	}
	  }
  

}

</script>




<script>
function get_qty_details(orderno,itemno) {
  
  
  if (itemno != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('quality'+i).innerHTML =r;
					   }
      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?orderno="+orderno+"&itemno="+itemno,true);
    xmlhttp.send();
  }
}
</script>
