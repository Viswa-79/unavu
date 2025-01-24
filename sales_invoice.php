<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(11));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>

<script>
function get_items(value) {
//alert(value);
var form='salesinvoice';
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
              alert("Sales Invoice Already Made For This Order No.!");
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
function get_item_details(id,value) {
//alert("hello");
  var c=id.substr(6);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#itemdesc'+c).val(data.descr);
$('#label'+c).val(data.label);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_party_details(value) {
  
  
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  $('#partyname').val(data.partyname);
  
  
}

}
};
xmlhttp.open("GET","ajax/getenquiry.php?id="+value,true);
xmlhttp.send();
  }
}
</script>
<?php
$fg1="select max(invoiceno) as id from salesinvoice";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
		   
		   
		    $n=$fg4;
 $sum = 0;
   while($n > 0 || $sum > 9)
    {
        if($n == 0)
        {
            $n = $sum;
            $sum = 0;
        }
        $sum += $n % 10;
	
        $n /= 10;
    }
  
 // echo $sum;
  
  if($sum!='8')
  {
   $fg5=$fg4;
  }
  else
  {
  $fg5=$fg4+1;
  }
       ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
              <div class="row">
            
                           
                                
                    
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button   class="btn btn-label-primary">Sales Invoice</button>
                      <a href="sales_invoice_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Sales
                          </a>
                    </div>
                  <div class="bs-stepper wizard-numbered mt-4">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">INVOICE DETAILS</span>
                            <span class="bs-stepper-subtitle">Basic info for the Invoice</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#item_details" >
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ITEM DETAILS</span>
                            <span class="bs-stepper-subtitle">Style Details</span>
                          </span>
                        </button>
                      </div><div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      
                     
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">SHIPMENT DETAILS</span>
                            <span class="bs-stepper-subtitle">Delivery Schedule</span>
                          </span>
                        </button>
                      </div> 
                       
                      

                    </div>

                    
                    <div class="bs-stepper-content">
                      <form action="" method="post" onSubmit="return true" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="invoiceno"
                              name="invoiceno"
                              readonly
                              value="<?php echo $fg5; ?>"
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
                          <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="color:red;">*</span></label>
                          <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onblur="get_items(this.value);"
                              class="form-control"
                              required
                              autofocus
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer Order No</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer Order Date</label>
                            <input
                              type="date"
                              id="orderdate"
                              name="orderdate"
                             
                              class="form-control"
                              placeholder="" />
                          </div>
                         
                          
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Currency&nbsp;<span style="color:red;">*</span></label>
                            <select name="currency" id="currency" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM currency order by currency asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          
                          
                          </div><br>
                          <div class="row mb-6">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Consignee&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer (if other than consignee)&nbsp;<span style="color:red;">*</span></label>
                            <select name="accountname" id="accountname" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">CFS Address</label>
                            <select name="agent" id="agent" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Third Party</label>
                            <select name="thirdparty" id="thirdparty" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                         
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Measurement&nbsp;<span style="color:red;">*</span></label>
                        <select name="measurement" id="measurement" class="select form-select" data-allow-clear="true">
                          <option value="">Select</option>
                         <option value="Meters">Meters</option>
                         <option value="Yards">Yards</option>
                         <option value="Pcs">Pcs</option>
                         <option value="Pack">Pack</option>
                         <option value="Mtrs/Pack">Mtrs/Pack</option>
                         <option value="Pcs/Mtrs">Pcs/Mtrs</option>
                         <option value="Pack/Pcs">Pack/Pcs</option>
                            </select>
                          </div>
                          </div>
                      </div>
                
                        <!-- Social Links -->
                        <div id="item_details" class="content">
                        <div class="card">
                        <div class="table-responsive">
                            <table class="table table-border border-top table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>Item&nbsp;No</th> 
                                  <th>Quality/Print</th> 
                                  <th>Marks&nbsp;&&nbsp;No</th> 
                                  <th>Description&nbsp;of&nbsp;Goods</th> 
                                  <th>Quantity&nbsp;Meters/Pcs</th>
                                  <th>Rate&nbsp;Per&nbsp;Pc/Mtr</th>
                                  <th>Amount</th> 
                                  <th>Net&nbsp;Wt</th>
                                  <th>Gross&nbsp;Wt</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                 
                                   <?php echo $sno; ?>
                                    
                </td>
               
                <td style="padding: 0.3rem;">
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality"
                                    
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="balenos"
                                    
                                    name="balenos[]"
                                  
                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                   
                                    name="itemdesc[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                   
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate<?php echo $i;?>"
                                    style="text-align:right"
                                    name="rate[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount"
                                    style="text-align:right"
                                    name="amount[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="netweight"
                                    style="text-align:right"
                                    name="netweight[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="grossweight<?php echo $i;?>"
                                    
                                    onKeyDown="ee1(this.id);"
                                    name="grossweight[]"
                                    aria-label="Product barcode"/>          
                </td>
                       </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <?php echo $sno; ?>
                                   
                </td>
                
              
                <td style="padding: 0.3rem;">
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="Not Selected">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality"
                                    
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="balenos"
                                    
                                    name="balenos[]"
                                  
                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                   
                                    name="itemdesc[]"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                   
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate<?php echo $i;?>"
                                   style="text-align:right"
                                    name="rate[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount"
                                    style="text-align:right"
                                    name="amount[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="netweight"
                                    style="text-align:right"
                                    name="netweight[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="grossweight<?php echo $i;?>"
                                    
                                    onKeyDown="ee1(this.id);"
                                    name="grossweight[]"
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
              <br><hr>
              <div class="row g-3">
                            <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Gross Value</label>
                            <input
                              type="text"
                              id="grossamt"
                              name="grossamt"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Discount %</label>
                            <input
                              type="text"
                              id="dis"
                              name="dis"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Discount Value</label>
                            <input
                              type="text"
                              id="disamt"
                              name="disamt"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Packing/Bale/Box</label>
                            <input
                              type="text"
                              id="pack"
                              name="pack"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Packing Cost</label>
                            <input
                              type="text"
                              id="packamt"
                              name="packamt"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Air Freight Cost</label>
                            <input
                              type="text"
                              id="airfreight"
                              name="airfreight"
                             
                              class="form-control"
                               />
                          </div>
                            </div>
                            <br>
                            <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other Charges (Title)</label>
                            <input
                              type="text"
                              id="ocharges"
                              name="ocharges"
                              placeholder="Other Charges If Any"
                              class="form-control"
                               />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other Charges</label>
                            <input
                              type="text"
                              id="othercharges"
                              name="othercharges"
                              class="form-control"
                               />
                          </div>
                      
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Late Payment Charges</label>
                            <input
                              type="text"
                              id="latepayment"
                              name="latepayment"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net Value</label>
                            <input
                              type="text"
                              id="netamt"
                              name="netamt"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Freight Charges</label>
                            <input
                              type="text"
                              id="freight"
                              name="freight"
                              class="form-control"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Insurance</label>
                            <input
                              type="text"
                              id="insurance"
                              name="insurance"
                              class="form-control"
                              placeholder="" />
                          </div>
              
              <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Commission</label>
                            <input
                              type="text"
                              id="commission"
                              name="commission"
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>
                            
                        </div>
                        
                        <!-- Account Details -->
                        <div id="documents" class="content">
                        </div>
                        
                          
                          <div id="timeaction" class="content">

                          <div class="row g-3">
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Shipment Terms</label>
                            <input
                              type="text"
                              id="shipmentterms"
                              
                              name="shipmentterms"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Pre-Carriage by</label>
                            <input
                              type="text"
                              id="carriage"
                              name="carriage"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Place of Receipt by Pre-Carrier</label>
                            <input
                              type="text"
                              id="carrier"
                              name="carrier"
                              
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Vessel/Flight No.</label>
                            <input
                              type="text"
                              id="vessel"
                              name="vessel"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Port of Loading</label>
                            <input
                              type="text"
                              id="portofloading"
                              name="portofloading"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Port of Discharge</label>
                            <input
                              type="text"
                              id="portofdischarge"
                              name="portofdischarge"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          </div><br>
                          <div class="row g-3">
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">HS Code</label>
                            <input
                              type="text"
                              id="hscode"
                              name="hscode"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total Cartoon</label>
                            <input
                              type="text"
                              id="totalcartons"
                              name="totalcartons"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Final Destination</label>
                            <input
                              type="text"
                              id="finaldestination"
                              name="finaldestination"
                              
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total Net Weight</label>
                            <input
                              type="text"
                              id="netwt"
                              name="netwt"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total Gross Weight</label>
                            <input
                              type="text"
                              id="grwt"
                              name="grwt"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Container No.</label>
                            <input
                              type="text"
                              id="containerno"
                              name="containerno"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          </div><br>
                          <div class="row g-3">
              <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">EPCG Licence No.</label>
                            <input
                              type="text"
                              id="epcgno"
                              name="epcgno"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Terms Of Delivery & Payment</label>
                            <input
                              type="text"
                              id="terms"
                              name="terms"
                              
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Delivery Address</label>
                            <select name="delivery_address" id="delivery_address" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                         
                          </div><br>
                          <div class="row g-3">
						
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Rex No.</label>
                            <input
                              type="text"
                              id="rexno"
                              name="rexno"
                              
                              class="form-control"
                               />
                          </div>
                         
                          </div>
                    </div>
					
					
                  </div>
				  
                </div>
                </div>
               	 <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php" >
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                             
                              <button class="btn btn-success btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                              </button>
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

</html>


<?php
if (isset($_POST['submit'])) {

  $invoiceno = $_POST['invoiceno'];
  $date = $_POST['date'];
  $refno = $_POST['refno'];
  $orderdate = $_POST['orderdate'];
  $orderno = $_POST['orderno'];
  $partyname = $_POST['partyname'];
  $agent = $_POST['agent'];
  $currency = $_POST['currency'];
  $accountname = $_POST['accountname'];
  $thirdparty = $_POST['thirdparty'];
  $measurement = $_POST['measurement'];
  $shipmentterms = $_POST['shipmentterms'];
  $carriage = $_POST['carriage'];
  $carrier = $_POST['carrier'];
  $vessel = $_POST['vessel'];
  $portofloading = $_POST['portofloading'];
  $portofdischarge = $_POST['portofdischarge'];
  $hscode = $_POST['hscode'];
  $totalcartons = $_POST['totalcartons'];
  $finaldestination = $_POST['finaldestination'];
  $netwt = $_POST['netwt'];
  $grwt = $_POST['grwt'];
  $containerno = $_POST['containerno'];
  $epcgno = $_POST['epcgno'];
  $terms = $_POST['terms'];
  $delivery_address = $_POST['delivery_address'];
  $grossamt = $_POST['grossamt'];
  $dis = $_POST['dis'];
  $disamt = $_POST['disamt'];
  $pack = $_POST['pack'];
  $packamt = $_POST['packamt'];
  $airfreight = $_POST['airfreight'];
  $ocharges = $_POST['ocharges'];
  $insurance = $_POST['insurance'];
  $othercharges = $_POST['othercharges'];
  $latepayment = $_POST['latepayment'];
  $netamt = $_POST['netamt'];
  $freight = $_POST['freight'];
  $commission = $_POST['commission'];
  $rexno = $_POST['rexno'];
  
    $sql = "INSERT into salesinvoice (invoiceno,date,refno,orderdate,orderno,partyname,agent,currency,accountname,thirdparty,measurement,insurance,
    shipmentterms,carriage,carrier,vessel,portofloading,portofdischarge,hscode,totalcartons,finaldestination,netwt,grwt,containerno,epcgno,
    terms,delivery_address,grossamt,dis,disamt,pack,packamt,airfreight,ocharges,othercharges,latepayment,netamt,freight,commission,rexno) 
    values ('$invoiceno','$date','$refno','$orderdate','$orderno','$partyname','$agent','$currency','$accountname','$thirdparty','$measurement','$insurance',
    '$shipmentterms','$carriage','$carrier','$vessel','$portofloading','$portofdischarge','$hscode','$totalcartons','$finaldestination','$netwt','$grwt','$containerno','$epcgno',
    '$terms','$delivery_address','$grossamt','$dis','$disamt','$pack','$packamt','$airfreight','$ocharges','$othercharges','$latepayment','$netamt','$freight','$commission','$rexno')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['itemdesc'] as $key => $val) {
    
    
    $itemno = $_POST['itemno'][$key];
    $quality = $_POST['quality'][$key];
    $balenos = $_POST['balenos'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $quantity = $_POST['quantity'][$key];
    $rate = $_POST['rate'][$key];
    $amount = $_POST['amount'][$key];
    $netweight = $_POST['netweight'][$key];
    $grossweight = $_POST['grossweight'][$key];

    if ($balenos != '') {
       $sql1 = "INSERT into salesinvoice1 (cid,itemno,itemdesc,balenos,quality,quantity,rate,amount,netweight,grossweight) 
 values ('$cid','$itemno','$itemdesc','$balenos','$quality','$quantity','$rate','$amount','$netweight','$grossweight')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Sales Registered Successfully');window.location='sales_invoice.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, Data Not Stored")</script>';
  }
}
?> 
