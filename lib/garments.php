<?php include "config.php";
error_reporting(0); ?>
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
function get_details(value) {
  
  
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == '1'){

  //$('#ordertype').val(data.ordertype);
  $('#partyname').val(data.partyname); 
  get_party_details(data.partyname);
  get_items(value);
  
}
  else
  {
    alert("Order Already Made For This Enquiry No.!");
    document.getElementById('enq_no').value='';
  }
}
};
xmlhttp.open("GET","ajax/getenquiry.php?id="+value,true);
xmlhttp.send();
  }
}
</script>

<script>
function get_item_details(id,value) {
  var c=id.substr(6);
  
  
   var value2=document.getElementById('enq_no').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#pono'+c).val(data.pono);  
$('#itemdesc'+c).val(data.descr);
$('#label'+c).val(data.label);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#price'+c).val(data.price);
$('#quantity'+c).val(data.quantity);
$('#unit'+c).val(data.unit);
$('#pack'+c).val(data.pack);
$('#totamt'+c).val(data.totamt);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getenqitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML = r;
					   }

      }
    };
    xmlhttp.open("GET","ajax/get_enq_items2.php?id="+value,true);
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
  
$('#Destination').val(data.Destination);
$('#payment').val(data.payment);
$('#tolerance').val(data.tolerance);
$('#title').val(data.title);
$('#contact').val(data.cpname);
$('#currency').val(data.currency);
$('#shipterm').val(data.shipterm);					
$('#shipport').val(data.shipport);
$('#agent').val(data.agent);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getParty.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>




<?php
$fg1="select max(ord_no) as id from order1";
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
                      <button   class="btn btn-label-primary">Garments Order</button>
                      <a href="garmentlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Garment Orders
                          </a>
                    </div>
                  <div class="bs-stepper wizard-numbered mt-4">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Garments</span>
                            <span class="bs-stepper-subtitle">Basic info for the Garments</span>
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
                       <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>  
                      <div class="step" data-target="#documents">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DOCUMENT UPLOAD</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
                          </span>
                        </button>
                      </div>

                    </div>

                    
                    <div class="bs-stepper-content">
                      <form action="" method="post" onSubmit="return true" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px"> TOM </span>&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="ord_no"
                              name="ord_no"
                              value="<?php echo $fg5; ?>"
                              required readonly
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Date&nbsp;<span style="color:red;">*</span></label>
                            <input type="date" id="date" name="date"  value="<?php echo date("Y-m-d");?>" placeholder="DD/MM/YYYY" class="form-control" />
                          </div>
                         
                     
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Enquiry No.</label>
                            <input
                              type="text"
                              id="enq_no"
                              name="enq_no"
                              onblur="get_details(this.value);"
                              class="form-control"
                              autofocus/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Ref No.</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"/>
                          </div>
                         
                         <!-- <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Party Name</label>
                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
          
                <option value="Box">Yes</option>
                 <option value="Box">No</option>
                 
                 
             </select>
                          </div> -->
                          <div class="col-md-4">
                          <label class="form-label" for="ecommerce-product-barcode">Buyer Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" onchange="get_party_details(this.value);" data-allow-clear="true" required>
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
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Order Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="ordertype" id="ordertype" class="select form-select" data-allow-clear="true">
                              
                                <option value="Garments">Garments</option>
                                
                              </select>
                 
                 
             </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Sample</label>
                            <select name="sample" id="sample" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Yes">Yes </option>
                                <option value="No">No</option>
                                
                              </select>
                 
                 
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
                                  <th>PO&nbsp;No</th>
                                  <th>Item&nbsp;No</th>
                                  <th>Item&nbsp;Description</th>
                                  <!-- <th>Label/Handtag</th> -->
                                  <th>Fabric&nbsp;description</th> 
                                  <th>color</th> 
                                  <th>xs</th> 
                                  <th>s</th> 
                                  <th>m</th> 
                                  <th>l</th> 
                                  <th>xl</th> 
                                  <th>xxl</th> 
                                  <th>xxxl</th> 
                                  <th>Print</th> 
                                  <th>Quality</th>
                                  <th>Cloth&nbsp;Width<span style="background-color: green; color: white;border-radius: 2px;padding: 2px">(Inch)</span></th>
                                  <th>Size</th>
                                  <th>Price</th>
                                  <th>Quantity</th> 
                                  <th>Unit</th>
                                  <th>Total&nbsp;Amt</th>
                                  <th>Packing&nbsp;Method</th>
                                  
                                  
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
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="pono"
                                  
                                    name="pono[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master WHERE itemtype='Garments' order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                  
                                    name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td> -->

                <td style="padding: 0.3rem">
                <select name="fabricdesc[]" id="fabricdesc<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM fabric_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                <select name="color[]" style="width:300px" id="color<?php echo $i;?>" class="select form-select"   >
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
                                    id="xs<?php echo $i;?>"
                                    style="width:120px"
                                    name="xs[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="s<?php echo $i;?>"
                                    style="width:120px"
                                    name="s[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="m<?php echo $i;?>"
                                    style="width:120px"
                                    name="m[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="l<?php echo $i;?>"
                                    style="width:120px"
                                    name="l[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xl<?php echo $i;?>"
                                    style="width:120px"
                                    name="xl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xxl<?php echo $i;?>"
                                    style="width:120px"
                                    name="xxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xxxl<?php echo $i;?>"
                                    style="width:120px"
                                    name="xxxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    style="width:120px"
                                    name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    style="width:120px"
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                </td>
               <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="clwidth<?php echo $i;?>"
                                    
                                    name="clwidth[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    
                                    name="size[]"
                                  style="text-align:left;width:100px;"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
									onblur="tott(xs<?php echo $i;?>.id);"
                                    style="text-align:right;width:100px;"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    onkeyUp="tott(xs<?php echo $i; ?>.id);"
									onblur="tott(xs<?php echo $i; ?>.id);"
                                    name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" style="width:90px">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="totamt<?php echo $i;?>"
                                    step="0.01"

                                    name="totamt[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);" readonly
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack<?php echo $i;?>"
                                   
                                    name="pack[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                  </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                             <div align="center"><?php echo $sno;?></div>
                </td>
                                  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pono"
                                   
                                    name="pono[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master WHERE itemtype='Garments' order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    style="width:200px"
                                    name="itemdesc[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                   
                                    name="label[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td> -->
                <td style="padding: 0.3rem">
                <select name="itemno[]" id="itemno<?php echo $i;?>" class="select form-select">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM fabric_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                <select name="color[]" style="width:300px" id="color<?php echo $i;?>" class="select form-select"  >
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
                                    id="xs<?php echo $i;?>"
                                    name="xs[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="s<?php echo $i;?>"
                                    name="s[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="m<?php echo $i;?>"
                                   
                                    name="m[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="l<?php echo $i;?>"
                                   
                                    name="l[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xl<?php echo $i;?>"
                                   
                                    name="xl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xxl<?php echo $i;?>"
                                   
                                    name="xxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="xxxl<?php echo $i;?>"
                                    style="width:120px"
                                    name="xxxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                   
                                    name="print[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                   
                                    name="quality[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                  <input
                                    type="text"
                                    class="form-control"
                                    id="clwidth<?php echo $i;?>"
                                   
                                    name="clwidth[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                   
                                    name="size[]"
                                  style="text-align:left;width:100px;"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    onkeyUp="tott(xs<?php echo $i; ?>.id);"
									onchange="tott(xs<?php echo $i; ?>.id);"
                                    style="text-align:right;width:100px;"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
									onkeyUp="tott(xs<?php echo $i; ?>.id);"
									onchange="tott(xs<?php echo $i; ?>.id);"
                                    name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" style="width:90px">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="totamt<?php echo $i; ?>"
                                    step="0.01"

                                    name="totamt[]"
                                    style="text-align:right"
                                    onKeyDown="ee1(this.id);"readonly
                                    aria-label="Product barcode"/>
                                       
                </td>
                     
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack<?php echo $i;?>"
                                   
                                    name="pack[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr>          
<?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
                
              </div>   <br>
              <div class="col-md-12">
                            <label class="form-label" for="collapsible-phone">Accessories</label>
                            <input
                              type="text"
                              id="access"
                              name="access"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>  
                        </div>
                        
                        <!-- Account Details -->
                        <div id="documents" class="content">
                         <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            alt="wizard-create-deal"
                            data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png"
                            width="650"
                            
                            class="img-fluid" />
                        </div>
                            
                           <br> 
                          <div class="row g-3">
                          
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-1</label>
                        <input class="form-control" type="file" id="file1" name="doc1" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-2</label>
                        <input class="form-control" type="file" id="file2" name="doc2" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-3</label>
                        <input class="form-control" type="file" id="file3" name="doc3" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-4</label>
                        <input class="form-control" type="file" id="file4" name="doc4" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                          </div>  
                        </div>
                        
                          
                          <div id="timeaction" class="content">

                          <div class="row g-3">
						  
						    <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Date Of Shipment</label>
                            <input
                              type="text"
                              id="shipment"
                              name="shipment"
                              class="form-control" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Port Of Loading</label>
                            <input
                              type="text"
                              id="loads"
                              name="loads"
                              value="Tuticorin"
                              class="form-control" />
                          </div>
						  <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Port Of Destination&nbsp;<span style="color:red;">*</span></label>
                          
                            <input
                              type="text"
                              id="Destination"
                              name="Destination"
                              class="form-control" />
                          
                          </div>
						    
						     <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Shipment Terms</label>
                            <input
                              type="text"
                              id="shipterm"
                              name="shipterm"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
                          </div>
                              <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Payment&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="payment"
                              name="payment"
                              class="form-control" />
                          </div>
						  
						    <div class="col-md-2">
                <label class="form-label" for="collapsible-phone">Currency&nbsp;<span style="color:red;">*</span></label>
                            <select name="currency" id="currency" class="select form-select" data-allow-clear="true" required>
                          
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
						  
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Piece Length</label>
                            <input
                              type="text"
                              id="length"
                              name="length"
                              class="form-control" />
                          </div>
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Tolerance(%)&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="number"
							  step="0.1"
                              id="tolerance"
                              name="tolerance"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
                          </div>

                          <div class="col-md-4">
                                  
                                  <label class="form-label" for="formtabs-country">Contact Person Name&nbsp;<span style="color:red;">*</span></label>
                        <div class="input-group">
                          
                          <span style="width: 80px;"  class="input-group-text"><select style="border: none;padding: 0px;"  id="title" class="form-control" name="title" data-allow-clear="true">
                            <option value="">..</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Sir">Sir</option>
                 <option value="Madam">Madam</option>
                          </select></span>
                          <input
                            type="text"
                            class="form-control"
                            id="contact"
                                placeholder=""
                                name="contact"
                             />
                        </div>
                                  </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Agent Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="agent"
                              name="agent"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
                          </div>  
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Remarks</label>
                            <input
                              type="text"
                              id="remark"
                              name="remark"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
                          </div>  
                          
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-phone">Note (If Any)</label>
                            <input
                              type="text"
                              id="notes"
                              name="notes"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
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
  </body>


<?php
if (isset($_POST['submit'])) {

  $ord_no = $_POST['ord_no'];
  $enq_no = $_POST['enq_no'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $company_name = $_POST['company_name'];
  $ordertype = $_POST['ordertype'];
  $length = $_POST['length'];
  $Destination = $_POST['Destination'];
  $payment = $_POST['payment'];
  $tolerance = $_POST['tolerance'];
  $currency = $_POST['currency'];
  $shipterm = $_POST['shipterm'];
  $title = $_POST['title'];
  $contact = $_POST['contact'];
  $agent = $_POST['agent'];
  $remark = $_POST['remark'];
  $notes = $_POST['notes'];
  $shipment = $_POST['shipment'];
  $loads = $_POST['loads'];
  $sample = $_POST['sample'];
  $access = $_POST['access'];
  
    $sql = "INSERT into order1 (ord_no,enq_no,refno,date,partyname,ordertype,length,Destination,payment,tolerance,currency,shipterm,shipment,loads,contact,title,agent,remark,notes,sample,access) 
 values ('$ord_no','$enq_no','$refno','$date','$partyname','$ordertype','$length','$Destination','$payment','$tolerance','$currency','$shipterm','$shipment','$loads','$contact','$title','$agent','$remark','$notes','$sample','$access')";
    $result = mysqli_query($conn, $sql);
  
  if($result)
  {
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['itemno'] as $key => $val) {
    
    

    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $label = $_POST['label'][$key];
    $fabricdesc = $_POST['fabricdesc'][$key];
    $color = $_POST['color'][$key];
    $xs = $_POST['xs'][$key];
    $s = $_POST['s'][$key];
    $m = $_POST['m'][$key];
    $l = $_POST['l'][$key];
    $xl = $_POST['xl'][$key];
    $xxl = $_POST['xxl'][$key];
    $xxxl = $_POST['xxxl'][$key];
    $print = $_POST['print'][$key];
    $quality = $_POST['quality'][$key];
    $pack = $_POST['pack'][$key];
    $size = $_POST['size'][$key];
    $clwidth = $_POST['clwidth'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
    $totamt = $_POST['totamt'][$key];
   
    if ($itemno != '')
		{
      $sql1 = "INSERT into order2 (cid,pono,itemno,itemdesc,label,fabricdesc,color,xs,s,m,l,xl,xxl,xxxl,print,quality,pack,clwidth,size,quantity,unit,price,totamt) 
 values ('$cid','$pono','$itemno','$itemdesc','$label','$fabricdesc','$color','$xs','$s','$m','$l','$xl','$xxl','$xxxl','$print','$quality','$pack','$clwidth','$size','$quantity','$unit','$price','$totamt')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  

    $p1 = $_FILES['doc1']['name'];
    $p_tmp1 = $_FILES['doc1']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  
    $p2 = $_FILES['doc2']['name'];
    $p_tmp2 = $_FILES['doc2']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
    $p3 = $_FILES['doc3']['name'];
    $p_tmp3 = $_FILES['doc3']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
  
    $p4 = $_FILES['doc4']['name'];
    $p_tmp4 = $_FILES['doc4']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
    
    $sql = "insert into order4 (cid,doc1,doc2,doc3,doc4) values('$cid','$p1','$p2','$p3','$p4')";
    $result = mysqli_query($conn, $sql);
    
  }
  if ($result)
	  {

   echo "<script>alert('Garments Registered successfully');window.location='garments.php';</script>";

  }
  else 
  {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script language="javascript" type="text/javascript">


function tott(v2)
{


//alert(v2);

a=v2;
b=(a.substr(2));

        var t=document.getElementById('xs'+b).value?document.getElementById('xs'+b).value:0;
        var v=document.getElementById('s'+b).value?document.getElementById('s'+b).value:0;
        var s=document.getElementById('m'+b).value?document.getElementById('m'+b).value:0;
        var a=document.getElementById('l'+b).value?document.getElementById('l'+b).value:0;
        var d=document.getElementById('xl'+b).value?document.getElementById('xl'+b).value:0;
        var c=document.getElementById('xxl'+b).value?document.getElementById('xxl'+b).value:0;
        
        var tt=parseFloat(t)+parseFloat(v)+parseFloat(s)+parseFloat(a)+parseFloat(d)+parseFloat(c);
        
        //alert(tt);
		document.getElementById('quantity'+b).value=tt.toFixed(2);

        var v1=document.getElementById('price'+b).value?document.getElementById('price'+b).value:0;

var tt1=parseFloat(tt)*parseFloat(v1);
document.getElementById('totamt'+b).value=tt1;
	  
	   // var grossamt=k.toFixed(4);
	   // document.getElementById('grossamt').value=grossamt;
     // alert(grossamt);

	 //  nn();
     
}

</script>