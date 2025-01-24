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
            
                           
                                
                    
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button  class="btn btn-label-primary">Sales Invoice</button>
                      <a href="sales_invoice_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View sales
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
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
                      <div class="step" data-target="#fabric_process" >
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

                    <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">

                      <?php
                              $sql4 = " SELECT * FROM salesinvoice WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                            <input type="text" hidden name="cid" id="cid" value="<?php echo $wz1['id'];?>">                                                                                                                                                                                                                                                  <tr>
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="invoiceno"
                              name="invoiceno"
                              readonly
                              value="<?php echo $wz1['invoiceno']; ?>"
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
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="color:red;">*</span></label>
                          <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              value="<?php echo $wz1['orderno']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer Order No</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              value="<?php echo $wz1['refno']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer Order Date</label>
                            <input
                              type="date"
                              id="orderdate"
                              name="orderdate"
                              value="<?php echo $wz1['orderdate']; ?>"
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
                     <option <?php if($rw['id']==$wz1['currency']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?></option>
                    <?php } ?>     
                              </select>
                          </div>
                          
                          
                          </div><br>
                          <div class="row mb-6">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Consignee&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Buyer (if other than consignee)&nbsp;<span style="color:red;">*</span></label>

                          <select name="accountname" id="accountname" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['accountname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">CFS Address</label>
                            <select name="agent" id="agent" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['agent']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Third Party</label>
                            <select name="thirdparty" id="thirdparty" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['thirdparty']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                         
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Measurement&nbsp;<span style="color:red;">*</span></label>
                          <select name="measurement" id="measurement" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Meters" <?php if($wz1['measurement']=='Meters'){ ?>Selected<?php } ?> >Meters </option>
                                <option value="Yards" <?php if($wz1['measurement']=='Yards'){ ?>Selected<?php } ?> >Yards</option>                                
                                <option value="Pcs" <?php if($wz1['measurement']=='Pcs'){ ?>Selected<?php } ?> >Pcs</option>                                
                                <option value="Pack" <?php if($wz1['measurement']=='Pack'){ ?>Selected<?php } ?> >Pack</option>
                                <option value="Mtrs/Pack" <?php if($wz1['measurement']=='Mtrs/Pack'){ ?>Selected<?php } ?> >Mtrs/Pack</option>
                                <option value="Pcs/Mtrs" <?php if($wz1['measurement']=='Pcs/Mtrs'){ ?>Selected<?php } ?> >Pcs/Mtrs</option>
                                <option value="Pack/Pcs" <?php if($wz1['measurement']=='Pack/Pcs'){ ?>Selected<?php } ?> >Pack/Pcs</option>
                        </select>
                          </div>
                          
                          
                          </div><br>
                      </div>
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM salesinvoice1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                  <td  style="padding: 0.3rem;text-align:center">
                                 
                                   <?php echo $sno; ?>
                                    
                </td>
               
                <td style="padding: 0.3rem;">
                <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                    <option value="">Select</option>
                    <?php 
					$sql = "SELECT * FROM item_master order by code asc";
          $result = mysqli_query($conn, $sql);
          while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                     <?php } ?>
                     
                    </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality"
                                    
                                    name="quality[]"
                                    value="<?php echo $rw['quality']; ?>"
                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="balenos"
                                    
                                    name="balenos[]"
                                    value="<?php echo $rw['balenos']; ?>"

                                    aria-label="Product barcode"/>
                                   
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                   
                                    name="itemdesc[]"
                                    value="<?php echo $rw['itemdesc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity"
                                   
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"

                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate"
                                   
                                    name="rate[]"
                                    value="<?php echo $rw['rate']; ?>"

                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount"
                                    
                                    name="amount[]"
                                    value="<?php echo $rw['amount']; ?>"

                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="netweight"
                                    style="text-align:right"
                                    name="netweight[]"
                                    value="<?php echo $rw['netweight']; ?>"

                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="grossweight>"
                                    value="<?php echo $rw['grossweight']; ?>"

                                    onKeyDown="ee1(this.id);"
                                    name="grossweight[]"
                                    aria-label="Product barcode"/>          
                </td>
                       </tr>
                             
<?php
                            $sno++; $i++;   }
                              ?>                 
                              </tbody>
                            </table>
          </div>
                
                          </div><br><hr>

                          <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Gross Value</label>
                            <input
                              type="text"
                              id="grossamt"
                              name="grossamt"
                              value="<?php echo $wz1['grossamt']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Discount&nbsp;%</label>
                            <input
                              type="text"
                              id="dis"
                              name="dis"
                              value="<?php echo $wz1['dis']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Discount&nbsp;Value</label>
                            <input
                              type="text"
                              id="disamt"
                              name="disamt"
                              value="<?php echo $wz1['disamt']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Packing/Bale/Bok</label>
                            <input
                              type="text"
                              id="pack"
                              name="pack"
                              value="<?php echo $wz1['pack']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Packing&nbsp;Cost</label>
                            <input
                              type="text"
                              id="packamt"
                              name="packamt"
                              value="<?php echo $wz1['packamt']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Air Freight Cost</label>
                            <input
                              type="text"
                              id="airfreight"
                              name="airfreight"
                              value="<?php echo $wz1['airfreight']; ?>"
                              class="form-control"
                               />
                          </div>
                          
                          
          </div>
                          <br>
              <div class="row g-3">
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges&nbsp;(Title)</label>
                            <input
                              type="text"
                              id="ocharges"
                              name="ocharges"
                              value="<?php echo $wz1['ocharges']; ?>"
                              placeholder="Other Charges If Any"
                              class="form-control"
                               />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges</label>
                            <input
                              type="text"
                              id="othercharges"
                              name="othercharges"
                              value="<?php echo $wz1['othercharges']; ?>"
                              class="form-control"
                               />
                          </div>
              <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Late Payment Charges</label>
                            <input
                              type="text"
                              id="latepayment"
                              name="latepayment"
                              value="<?php echo $wz1['latepayment']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net Value</label>
                            <input
                              type="text"
                              id="netamt"
                              name="netamt"
                              value="<?php echo $wz1['netamt']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Freight Charges</label>
                            <input
                              type="text"
                              id="freight"
                              name="freight"
                              value="<?php echo $wz1['freight']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Insurance</label>
                            <input
                              type="text"
                              id="insurance"
                              value="<?php echo $wz1['insurance']; ?>"
                              name="insurance"
                              class="form-control"
                              placeholder="" />
          </div>
             
              <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Commission</label>
                            <input
                              type="text"
                              id="commission"
                              value="<?php echo $wz1['commission']; ?>"
                              name="commission"
                              class="form-control"
                              placeholder="" />
                          </div>
          </div>
              
                          <br>   
                        </div>
                        
                        <!-- Account Details -->
                        <div id="loi" class="content">
                         
                            
                           <br> 

                          
                        </div>
                        
                          <div id="timeaction" class="content">

                          <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Shipment Terms</label>
                            <input
                              type="text"
                              id="shipmentterms"
                              value="<?php echo $wz1['shipmentterms']; ?>"
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
                              value="<?php echo $wz1['carriage']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Place of Receipt by Pre-Carrier</label>
                            <input
                              type="text"
                              id="carrier"
                              name="carrier"
                              value="<?php echo $wz1['carrier']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Vessel/Flight No.</label>
                            <input
                              type="text"
                              id="vessel"
                              name="vessel"
                              value="<?php echo $wz1['vessel']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Port of Loading</label>
                            <input
                              type="text"
                              id="portofloading"
                              name="portofloading"
                              value="<?php echo $wz1['portofloading']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Port of Discharge</label>
                            <input
                              type="text"
                              id="portofdischarge"
                              value="<?php echo $wz1['portofdischarge']; ?>"
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
                              value="<?php echo $wz1['hscode']; ?>"
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
                              value="<?php echo $wz1['totalcartons']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Final Destination</label>
                            <input
                              type="text"
                              id="finaldestination"
                              name="finaldestination"
                              value="<?php echo $wz1['finaldestination']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total Net Weight</label>
                            <input
                              type="text"
                              id="netwt"
                              name="netwt"
                              value="<?php echo $wz1['netwt']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total Gross Weight</label>
                            <input
                              type="text"
                              id="grwt"
                              name="grwt"
                              value="<?php echo $wz1['grwt']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Container No.</label>
                            <input
                              type="text"
                              id="containerno"
                              name="containerno"
                              value="<?php echo $wz1['containerno']; ?>"
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
                              value="<?php echo $wz1['epcgno']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Terms Of Delivery & Payment</label>
                            <input
                              type="text"
                              id="terms"
                              name="terms"
                              value="<?php echo $wz1['terms']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Delivery Address</label>
                            <select name="delivery_address" id="delivery_address" class="select form-select"  data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['delivery_address']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
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
                              value="<?php echo $wz1['rexno']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          </div>
      <div class="table-responsive">
       </div>
                  </div>
                </div>
  </div>  </div>
                          
                            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="sales_invoice_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
                              </a>
                             
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>
                        </div>
                          
                       
                        </form>
                   
               
           
            
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

    $cid = $_POST['cid'];
  $invoiceno = $_POST['invoiceno'];
  $date = $_POST['date'];
  $refno = $_POST['refno'];
  $orderdate = $_POST['orderdate'];
  $partyname = $_POST['partyname'];
  $orderno = $_POST['orderno'];
  $currency = $_POST['currency'];
  $accountname = $_POST['accountname'];
  $agent = $_POST['agent'];
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
  $insurance = $_POST['insurance'];
  $airfreight = $_POST['airfreight'];
  $ocharges = $_POST['ocharges'];
  $othercharges = $_POST['othercharges'];
  $latepayment = $_POST['latepayment'];
  $netamt = $_POST['netamt'];
  $freight = $_POST['freight'];
  $commission = $_POST['commission'];
  $rexno = $_POST['rexno'];
  
   $sql = "UPDATE salesinvoice SET invoiceno='$invoiceno',date='$date',refno='$refno',orderdate='$orderdate',orderno='$orderno',
    currency='$currency',partyname='$partyname',accountname='$accountname',agent='$agent',thirdparty='$thirdparty',measurement='$measurement',insurance='$insurance',carrier='$carrier',
    shipmentterms='$shipmentterms',carriage='$carriage',vessel='$vessel',portofloading='$portofloading',portofdischarge='$portofdischarge',hscode='$hscode',
    totalcartons='$totalcartons',finaldestination='$finaldestination',netwt='$netwt',grwt='$grwt',containerno='$containerno',epcgno='$epcgno',
    terms='$terms',delivery_address='$delivery_address',grossamt='$grossamt',dis='$dis',disamt='$disamt',pack='$pack',packamt='$packamt',airfreight='$airfreight',
    ocharges='$ocharges',othercharges='$othercharges',latepayment='$latepayment',netamt='$netamt',freight='$freight',commission='$commission',rexno='$rexno' WHERE id='$cid'";
    $result = mysqli_query($conn, $sql);
  
  foreach ($_POST['itemdesc'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
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
       $sql1 = "UPDATE salesinvoice1 SET cid='$cid',itemno='$itemno',itemdesc='$itemdesc',balenos='$balenos',quality='$quality',quantity='$quantity',
       rate='$rate',amount='$amount',netweight='$netweight',grossweight='$grossweight' WHERE id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Sales Updated Successfully');window.location='sales_invoice_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, Data Not Stored")</script>';
  }
}
?> 
