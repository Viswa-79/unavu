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
function get_product_details(id,value) {
  var c=id.substr(11);
  //alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
  $('#rate'+c).val(data.price);
$('#specification'+c).val(data.specification);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(4));





        var t=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;

		var v=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v);
		
		document.getElementById('amount'+b).value=tt.toFixed(2);



  k=0;
      for(i=0;i<20;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{
		
      var r= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);
	   document.getElementById('taxable').value=k.toFixed(2);
		
		
	}
	  }
	  


nn();

	  


}


function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
        var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
		var sgst=document.getElementById('sgst').value?document.getElementById('sgst').value:0;
		var igst=document.getElementById('igst').value?document.getElementById('igst').value:0;
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		
        var cgsta=parseFloat(t1)*parseFloat(cgst)/100;
		var sgsta=parseFloat(t1)*parseFloat(sgst)/100;
		var igsta=parseFloat(t1)*parseFloat(igst)/100;
		

      var tot=parseFloat(t1)+parseFloat(cgsta)+parseFloat(sgsta)+parseFloat(igsta)+parseFloat(roundoff);
	  
	  document.getElementById('net').value=tot;

}

</script>

<script>
function get_items(value) {
//alert(value);
var form='purchaseorder';
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
						  document.getElementById('itemno'+i).innerHTML =r1[1];
					   }
            }
             else if(sts==0)
            {
              alert("Purchase Order Already Made For This Order No.!");
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

<?php
		   $fg1="select max(purchaseno) as id from purchaseorder";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
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
                      <button class="btn btn-label-primary">Purchase Order</button>
                      <a href="purchaseorderlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>      
                                
            
               
                
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h4 class="mb-0">Purchase Order</h4>
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Purchase&nbsp;Order&nbsp;No</label>
                            <input
                              type="text"
                              id="purchaseno"
                              name="purchaseno"
                              readonly
                              value="<?php echo $enq; ?>"
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
                          <div class="col-md-4">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true" autofocus required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                                                    </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Material&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="material" id="material" class="select form-select" data-allow-clear="true" required>
                            <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM product_group order by pro_grp_name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['pro_grp_name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>   
                          
                          
                        
                       
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Payment&nbsp;Type</label>
                            <select name="payment" id="payment" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="CASH">CASH</option>
                                <option value="CREDIT">CREDIT</option>
                                
                              </select>
                            </div>   </div><br> 
                            <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Sales&nbsp;Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onblur="get_items(this.value);"
                              required
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Ref</label>
                            <input
                              type="text"
                              id="orderref"
                              name="orderref"
                              class="form-control"/>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty</label>
                            <input
                              type="text"
                              id="orderqty"
                              name="orderqty"
                              class="form-control"/>
                          </div>
                         <!-- <div class="col-4">
                            <label >Delivery</label>
                            <select name="delivery" id="delivery" class="select2 form-select" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                                                    </select>
                          </div>  -->
                          
                          
                        </div>
                     <br>
                     <div class="mb-0"><hr></div>
                
                      <div class="card mb-2 mt-1">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>PARTICULARS</th> 
                                  <th>SPECIFICATION</th> 
                                  <th>COLOR</th> 
                                  <th>DIA</th> 
                                  <th>NO.&nbsp;OF&nbsp;BAGS/ROLLS</th>
                                  <th>QUANTITY</th>
                                  <th>UNIT</th>
                                  <th>RATE/UNIT</th>
                                  <th>AMOUNT</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td> 
                </td>
                <td style="padding: 0.3rem;width:230px;">
                               <select name="productname[]"  id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="specification<?php echo $i;?>"
                                    name="specification[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="color[]" style="width:100px" id="color<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM color order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                          <td style="padding: 0.3rem">
                          <select name="dia[]" style="width:100px" id="dia<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM dia order by id asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                        </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bags<?php echo $i;?>"
                                   
                                    name="bags[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                              </td><td style="padding: 0.3rem;width: 130px;">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM unit_master order by unit asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate<?php echo $i;?>"
                                    name="rate[]"
                                    style="text-align:right"
									onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    name="amount[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
									onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                                  
                <td style="padding: 0.3rem;width: 230px;">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="specification<?php echo $i;?>"
                                    name="specification[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                                   <select name="color[]" style="width:100px" id="color<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM color order by color asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="dia[]" style="width:100px" id="dia<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM dia order by dia asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bags<?php echo $i;?>"
                                    name="bags[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem;width: 130px;">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM unit_master order by unit asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate<?php echo $i;?>"
                                    name="rate[]"
                                    style="text-align:right"
									onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    name="amount[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"
									onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr>          
<?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
                
              </div>
              <br>
              <div class="mb-0"><hr></div>
              <div class="row g-3 mt-2">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Taxable&nbsp;Value</label>
                            <input
                              type="text"
                              id="taxable"
                              name="taxable"
                              style="text-align:right"
                              onKeyUp="nn();"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">CGST(%)</label>
                            <input
                              type="text"
                              id="cgst"
                              style="text-align:right"
                              name="cgst"
                              class="form-control"
							  onKeyUp="nn();"
                              placeholder=""
							  />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">SGST(%)</label>
                            <input
                              type="text"
                              id="sgst"
                              style="text-align:right"
                              name="sgst"
                              class="form-control"
							  onKeyUp="nn();"/>
                          </div><div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">IGST(%)</label>
                            <input
                              type="text"
                              id="igst"
                              style="text-align:right"
                              name="igst"
                              class="form-control"
							  onKeyUp="nn();"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Round&nbsp;Off</label>
                            <input
                              type="text"
                              id="round"
                              style="text-align:right"
                              name="round"
                              class="form-control"
							  onKeyUp="nn();"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net&nbsp;Value</label>
                            <input
                              type="text"
                              id="net"
                              style="text-align:right"
                              name="net"
                              class="form-control"
							  onKeyUp="nn();"/>
                          </div>
                          
                          
                          </div>


                          <div class="row g-3 mt-2">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>

</div>
                  </div>
              </div>    

                          <br><div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="dashboard.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                             
                              </button>
                            </div>    
                        </div>
                        </form>
                    
            
               
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

  $purchaseno = $_POST['purchaseno'];
  $date = $_POST['date'];
  $supplier = $_POST['supplier'];
  $material = $_POST['material'];
  $payment = $_POST['payment'];
  $orderno = $_POST['orderno'];
  $orderref = $_POST['orderref'];
  $orderqty = $_POST['orderqty'];
  $delivery = $_POST['delivery'];
  $taxable = $_POST['taxable'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $igst = $_POST['igst'];
  $round = $_POST['round'];
  $net = $_POST['net'];
  $remarks = $_POST['remarks'];
  
    $sql = "INSERT into purchaseorder (purchaseno,date,supplier,material,payment,orderno,orderref,orderqty,delivery,taxable,cgst,sgst,igst,round,net,remarks) values ('$purchaseno','$date','$supplier','$material','$payment','$orderno','$orderref','$orderqty','$delivery','$taxable','$cgst','$sgst','$igst','$round','$net','$remarks')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['specification'] as $key => $val) {
    
    
    $productname = $_POST['productname'][$key];
    $specification = $_POST['specification'][$key];
    $color = $_POST['color'][$key];
    $dia = $_POST['dia'][$key];
    $bags = $_POST['bags'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $rate = $_POST['rate'][$key];
    $amount = $_POST['amount'][$key];

    if ($specification != '') {
    echo $sql1 = "INSERT into purchaseorder1 (cid,productname,specification,color,dia,bags,quantity,unit,rate,amount) 
 values ('$cid','$productname','$specification','$color','$dia','$bags','$quantity','$unit','$rate','$amount')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Purchase Saved Successfully');window.location='purchaseorder.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


