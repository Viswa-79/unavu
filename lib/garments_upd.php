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
function get_details(value) {
  
  
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  $('#ordertype').val(data.ordertype);
  $('#partyname').val(data.partyname); 
  get_party_details(data.partyname);
  
  
}

}
};
xmlhttp.open("GET","ajax/getenquiry.php?id="+value,true);
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
$('#pack'+c).val(data.pack);
$('#clwidth'+c).val(data.clwidth);					
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
                      <button  class="btn btn-label-primary">Garments Order</button>
                      <a href="garmentlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Garments
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
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
                       <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>  
                      <div class="step" data-target="#loi">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DOCUMENT UPLOAD</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
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
                    $sno = 1;
                    // LOOP TILL END OF DATA
                    $sql = " SELECT * FROM order1 WHERE id='$sid'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    

                      ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row g-3">
                        <input type="text" hidden name="cid" id="cid" value="<?php echo $row['id'];?>">                                                                                                                                                                                                                                                  <tr>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px"> TOM </span>&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="ord_no"
                              name="ord_no"
                              value="<?php echo $row['ord_no']; ?>"
                              readonly
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-phone">Date&nbsp;<span style="color:red;">*</span></label>
                            <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>"
 placeholder="DD/MM/YYYY" class="form-control" />
                          </div>
                       
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Enquiry No&nbsp;</label>
                            <input
                              type="text"
                              id="enq_no"
                              name="enq_no"
                              onblur="get_details(this.value);"
                              class="form-control"
                              value="<?php echo $row['enq_no']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Ref No&nbsp;</label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              value="<?php echo $row['refno']; ?>"/>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-phone">Order Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="ordertype" id="ordertype"
                               class="select form-select" data-allow-clear="true">
                                <option value="Garments" <?php if($row['ordertype']=='Garments'){ ?>Selected<?php } ?> >Garments </option>
                                                        
                              </select>
                          </div>
                         <!-- <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Party Name</label>
                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
          
                <option value="Box">Yes</option>
                 <option value="Box">No</option>
                 
                 
             </select>
                          </div> -->
                          
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Buyer Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" onchange="get_party_details(this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$row['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                           
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-phone">Sample</label>
                            <select name="sample" id="sample"
                               class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Yes"<?php if($row['sample']=='Yes'){ ?>Selected<?php } ?> >Yes </option>
                                <option value="No"<?php if($row['sample']=='No'){ ?>Selected<?php } ?> >No</option>                                
                              </select>
                            
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Sample Approval</label>
                            <select name="sampleapprove" id="sampleapprove"
                               class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Approved" <?php if($row['sampleapprove']=='Approved'){ ?>Selected<?php } ?> >Approved </option>
                                <option value="Not Approved" <?php if($row['sampleapprove']=='Not Approved'){ ?>Selected<?php } ?> >Not Approved</option>                                
                                <option value="Direct Protection" <?php if($row['sampleapprove']=='Direct Protection'){ ?>Selected<?php } ?> >Direct Protection</option>                                
                              </select>
                          </div> 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Stitching Approval</label>
                            <select name="stitching" id="stitching"
                               class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Approved" <?php if($row['stitching']=='Approved'){ ?>Selected<?php } ?> >Approved </option>
                                <option value="Not Approved" <?php if($row['stitching']=='Not Approved'){ ?>Selected<?php } ?> >Not Approved</option>                                
                              </select>
                          </div> 
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-phone">Inspection</label>
                            <select name="inspection" id="inspection"
                               class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Okay" <?php if($row['inspection']=='Okay'){ ?>Selected<?php } ?> >Okay </option>
                                <option value="Not Okay" <?php if($row['inspection']=='Not Okay'){ ?>Selected<?php } ?> >Not Okay </option>
                                <option value="Not Requird" <?php if($row['inspection']=='Not Requird'){ ?>Selected<?php } ?> >Not Requird</option>                                
                              </select>
                          </div> 
                                
                         
                        </div>  <br>
                       
                      </div>
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
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
                                  <th>packing&nbsp;method</th>
                                  <th>Status&nbsp;(Tick&nbsp;If&nbsp;Closed)</th>
                                  
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $sno=1;$i=0;
                              $sql2 = " SELECT * FROM order2 WHERE cid='$sid'";
                              $result2 = mysqli_query($conn, $sql2);
                              while ($rw = mysqli_fetch_array($result2)) {
                                
                                  ?>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>">
                                <tr>
                                  <td ><div style="text-align:center"><?php echo $sno; ?></div></td>
                                  <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="pono<?php echo $i;?>"
                                    name="pono[]"
                                    value="<?php echo $rw['pono']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                                   <select name="itemno[]" style="width:300px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM item_master WHERE itemtype='Garments' order by code asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input style="width:200px"
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"
                                    value="<?php echo $rw['itemdesc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="label<?php echo $i;?>"
                                    name="label[]"
                                    value="<?php echo $rw['label']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td> -->
                <td style="padding: 0.3rem">
                <select name="fabricdesc[]" id="fabricdesc<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM fabric_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['fabricdesc']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['fabric'];?></option>
                    <?php } ?>
                                
                              </select>    
                </td>
                <td style="padding: 0.3rem">
                <select name="color[]" style="width:120px" id="color<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="xs<?php echo $i;?>"
                                    name="xs[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['xs']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="s<?php echo $i;?>"
                                    name="s[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['s']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="m<?php echo $i;?>"
                                    name="m[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['m']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="l<?php echo $i;?>"
                                    name="l[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['l']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="xl<?php echo $i;?>"
                                    name="xl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['xl']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="xxl<?php echo $i;?>"
                                    name="xxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['xxl']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="xxxl<?php echo $i;?>"
                                    name="xxxl[]"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    value="<?php echo $rw['xxxl']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="width:120px"
                                    class="form-control"
                                    id="print<?php echo $i;?>"
                                    name="print[]"
                                    value="<?php echo $rw['print']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quality<?php echo $i;?>"
                                    name="quality[]"
                                    style="width:120px"
                                    
                                    value="<?php echo $rw['quality']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="clwidth<?php echo $i;?>"
                                    name="clwidth[]"
                                    value="<?php echo $rw['clwidth']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    name="size[]"
									style="text-align:left;width:100px;"
                                    value="<?php echo $rw['size']; ?>"
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
                                    value="<?php echo $rw['price']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    onkeyUp="tott(xs<?php echo $i;?>.id);"
                                    onblur="tott(xs<?php echo $i;?>.id);"
                                    name="quantity[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                      <select  name="unit[]" id="unit<?php echo $i;?>" style="width: 90px;" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master ";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select></td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="totamt<?php echo $i;?>"
                                  
                                    name="totamt[]"
                                    step="0.01"

                                    style="text-align:right"
                                    value="<?php echo $rw['totamt']; ?>"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                                </td>  
                                <td style="padding: 0.3rem">
                 <input             
                                    style="width: 104%;"
                                    type="text"
                                    class="form-control"
                                    id="pack<?php echo $i;?>"
                                    name="pack[]"
                                    value="<?php echo $rw['pack']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="text-align:center">
                <input class="form-check-input" style="width:30px;height:30px;" type="checkbox"  id="ostatus" name="ostatus[<?php echo $i;?>]"  <?php if($rw['ostatus']==1){ ?>Checked<?php } ?> />
    </td>       
                <td> <a href="ajax/del_garments1.php?cid=<?php echo base64_encode($rw['id']);?>"><button type="button" class="btn btn-link btn-sm text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a></td>
                                
              </tr>                            
                                <?php
                            $sno++; $i++;
    }
    $j=$i;
    $sn=$sno;
    for ($i = $j, $sno = $sn; $i <=19; $i++, $sno++) {

      ?>
       <input type="text" hidden name="rid[]" id="rid" value="">
<tr id="s1<?php echo $i; ?>" style="display:none">

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
                <select name="color[]"  id="color<?php echo $i;?>" class="select form-select"   >
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
                              ?>                 
                              </tbody>
                            </table>
                            
                          </div>
                
              </div>
              <br><div class="col-md-12">
                            <label class="form-label" for="collapsible-phone">Accessories</label>
                            <input
                              type="text"
                              id="access"
                              name="access"
                              value="<?php echo $row['access']; ?>"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>  
                          <br>   
                        </div>
                        
                        <!-- Account Details -->
                        <div id="loi" class="content">
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

                           <?php
                              $sql4 = " SELECT * FROM order4 where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                          <div class="row g-3">
                          
                            <div class="col-sm-6">
                            <input type="text" hidden name="fid"  value="<?php echo $wz1['id'];?>">

                        <label for="formFile" class="form-label">Document 1</label>
                        <input type="text" hidden name="doc11"  value="<?php echo $wz1['doc1'];?>"/>

                        <input 
 class="form-control" type="file" id="file1" name="doc1" 

  accept="image/jpeg,image/png,application/pdf"> 
  <?php if ($wz1['doc1']!='') {
    ?> <a href="uploads/<?php echo $wz1['doc1']; ?>" target="blank"><?php echo $wz1['doc1']; ?></a>
    <?php } ?>                   
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 2</label>
                        <input type="text" hidden name="doc22"  value="<?php echo $wz1['doc2'];?>"/>
                        <input 
 class="form-control" type="file" id="file2" name="doc2" 
  accept="image/jpeg,image/png,application/pdf">                      
  <a href="uploads/<?php echo $wz1['doc2']; ?>" target="blank"><?php echo $wz1['doc2']; ?></a>                     
                            </div>

                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label"> Document 3</label>
                        <input type="text" hidden name="doc33"  value="<?php echo $wz1['doc3'];?>"/>
                        <input 
 class="form-control" type="file" id="file3" name="doc3" 
  accept="image/jpeg,image/png,application/pdf">   
  <a href="uploads/<?php echo $wz1['doc3']; ?>" target="blank"><?php echo $wz1['doc3']; ?></a>                     
                   
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 4</label>
                        <input type="text" hidden name="doc44"  value="<?php echo $wz1['doc4'];?>"/>
                        <input 
 class="form-control" type="file" id="file4" name="doc4" 
  accept="image/jpeg,image/png,application/pdf">
  <a href="uploads/<?php echo $wz1['doc4']; ?>" target="blank"><?php echo $wz1['doc4']; ?></a>                                           
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
                              value="<?php echo $row['shipment']; ?>"
                              class="form-control" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Port Of Loading</label>
                            <input
                              type="text"
                              id="loads"
                              value="<?php echo $row['loads']; ?>"
                              name="loads"
                              class="form-control" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Port Of Destination&nbsp;<span style="color:red;">*</span></label>
                            
                            <input
                              type="text"
                              id="Destination"
                              name="Destination"
                              value="<?php echo $row['Destination']; ?>"
                              class="form-control" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Shipment Terms</label>
                            <input
                              type="text"
                              id="shipterm"
                              name="shipterm"
                              value="<?php echo $row['shipterm']; ?>"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>
                          
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Payment&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="payment"
                              name="payment"
                              value="<?php echo $row['payment']; ?>"
                              class="form-control"
                              placeholder="John Doe" />
                          </div>
                         <!-- <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Party Name</label>
                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
          
                <option value="Box">Yes</option>
                 <option value="Box">No</option>
                 
                 
             </select>
                          </div> -->
                         

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Currency&nbsp;<span style="color:red;">*</span></label>
                            <select name="currency" id="currency"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM currency order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$row['currency']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['currency'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Piece Of Length</label>
                            <input
                              type="text"
							  step="0.01"
							  id="length"
                              name="length"
                              class="form-control phone-mask"
                             
                              value="<?php echo $row['length']; ?>"
                              aria-label="658 799 8941" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-phone">Tolerance(%)&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="number"
							  step="0.1"
							  id="tolerance"
                              name="tolerance"
                              class="form-control phone-mask"
                             
                              value="<?php echo $row['tolerance']; ?>"
                              aria-label="658 799 8941" />
                          </div>
                          <div class="col-md-4">
                                  
                                  <label class="form-label" for="formtabs-country">Contact Person Name&nbsp;<span style="color:red;">*</span></label>
                        <div class="input-group">
                          
                          <span style="width: 80px;"  class="input-group-text"><select style="border: none;padding: 0px;"  id="title" class="form-control" name="title" data-allow-clear="true">
                          
                                <option value="">Select</option>
                                <option value="Mr." <?php if($row['title']=='Mr.'){ ?>Selected<?php } ?> >Mr. </option>
                                <option value="Ms." <?php if($row['title']=='Ms.'){ ?>Selected<?php } ?> >Ms.</option>                                
                                <option value="Mrs" <?php if($row['title']=='Mrs'){ ?>Selected<?php } ?> >Mrs</option>                                
                                <option value="Sir" <?php if($row['title']=='Sir'){ ?>Selected<?php } ?> >Sir</option>                                
                                <option value="Madam" <?php if($row['title']=='Madam'){ ?>Selected<?php } ?> >Madam</option>                                
                              
                          </select></span>
                          <input
                            type="text"
                            class="form-control"
                            id="contact"
                                value="<?php echo $row['contact']; ?>"
                                name="contact"
                             />
                        </div>
                                  </div>
                                  <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Agent Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="agent"
                              value="<?php echo $row['agent']; ?>"
                              name="agent"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>  

                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-phone">Remarks</label>
                            <input
                              type="text"
                              id="remark"
                              name="remark"
                              value="<?php echo $row['remark']; ?>"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>  
                          
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-phone">Note (If Any)</label>
                            <input
                              type="text"
                              id="notes"
                              name="notes"
                              value="<?php echo $row['notes']; ?>"
                              class="form-control phone-mask"
                              placeholder="John Doe"
                              aria-label="658 799 8941" />
                          </div>  
                          
                        </div>
      <div class="table-responsive">
       </div>
                  </div>
                </div>
  </div>  </div>
                          
                            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="garmentlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
                              </a>
                             
                              <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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


<?php
if (isset($_POST['submit'])) {

    $cid = $_POST['cid'];
    $fid = $_POST['fid'];
  $ord_no = $_POST['ord_no'];
  $enq_no = $_POST['enq_no'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $ordertype = $_POST['ordertype'];
  $length = $_POST['length'];
  $Destination = $_POST['Destination'];
  $payment = $_POST['payment'];
  $tolerance = $_POST['tolerance'];
  $currency = $_POST['currency'];
  $shipterm = $_POST['shipterm'];
  $shipment = $_POST['shipment'];
  $loads = $_POST['loads'];
  $title = $_POST['title'];
  $contact = $_POST['contact'];
  $agent = $_POST['agent'];
  $remark = $_POST['remark'];
  $notes = $_POST['notes'];
  $sample = $_POST['sample'];
  $sampleapprove = $_POST['sampleapprove'];
  $stitching = $_POST['stitching'];
  $inspection = $_POST['inspection'];
  $access = $_POST['access'];

    $sql1 = "UPDATE order1 SET ord_no='$ord_no',enq_no='$enq_no',refno='$refno',date='$date',partyname='$partyname',ordertype='$ordertype',length='$length',access='$access',
    Destination='$Destination',payment='$payment',tolerance='$tolerance',currency='$currency',shipment='$shipment',loads='$loads',shipterm='$shipterm',contact='$contact',
    title='$title',agent='$agent',remark='$remark',notes='$notes',sample='$sample',sampleapprove='$sampleapprove',stitching='$stitching',inspection='$inspection' WHERE id='$cid' ";
         $result1 = mysqli_query($conn, $sql1);
  
  foreach ($_POST['pono'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $pono = $_POST['pono'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $label = $_POST['label'][$key];
    $print = $_POST['print'][$key];
    $fabricdesc = $_POST['fabricdesc'][$key];
    $color = $_POST['color'][$key];
    $xs = $_POST['xs'][$key];
    $s = $_POST['s'][$key];
    $m = $_POST['m'][$key];
    $l = $_POST['l'][$key];
    $xl = $_POST['xl'][$key];
    $xxl = $_POST['xxl'][$key];
    $xxxl = $_POST['xxxl'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $clwidth = $_POST['clwidth'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
    $totamt = $_POST['totamt'][$key];
    $pack = $_POST['pack'][$key];
     $ostatus = $_POST['ostatus'][$key];
 
   if($ostatus=='on'){
    $orderstatus='1';
   }
   else{
    $orderstatus='0';
   }



    if ($itemno != '') {
      if ($rid != '') {
     echo  $sql2 = "UPDATE order2 SET pono='$pono',itemno='$itemno',itemdesc='$itemdesc',label='$label',print='$print',quality='$quality',fabricdesc='$fabricdesc',color='$color',xs='$xs',s='$s',m='$m',l='$l',xl='$xl',xxl='$xxl',xxxl='$xxxl',
      clwidth='$clwidth',size='$size',quantity='$quantity',unit='$unit',price='$price',totamt='$totamt',pack='$pack',ostatus='$orderstatus' WHERE id='$rid' ";
      $result2 = mysqli_query($conn, $sql2);
      }
      else{
        $sql1 = "INSERT into order2 (cid,pono,itemno,itemdesc,label,fabricdesc,color,xs,s,m,l,xl,xxl,xxxl,print,quality,pack,clwidth,size,quantity,unit,price,totamt) 
        values ('$cid','$pono','$itemno','$itemdesc','$label','$fabricdesc','$color','$xs','$s','$m','$l','$xl','$xxl','$xxxl','$print','$quality','$pack','$clwidth','$size','$quantity','$unit','$price','$totamt')";
             $result1 = mysqli_query($conn, $sql1);
      }
  }
  }
  
  if($_FILES['doc1']['name']!='')
			   {

    $p1 = $_FILES['doc1']['name'];
    $p_tmp1 = $_FILES['doc1']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  }
  else
  {
  $p1=$_REQUEST['doc11'];
  } 
  
  
  if($_FILES['doc2']['name']!='')
			   {

    $p2 = $_FILES['doc2']['name'];
    $p_tmp2 = $_FILES['doc2']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
  }
  else
  {
  $p2=$_REQUEST['doc22'];
  } 
      
  
  if($_FILES['doc3']['name']!='')
			   {

    $p3 = $_FILES['doc3']['name'];
    $p_tmp3 = $_FILES['doc3']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
  }
  else
  {
  $p3=$_REQUEST['doc33'];
  } 
      
    
  if($_FILES['doc4']['name']!='')
  {

    $p4 = $_FILES['doc4']['name'];
    $p_tmp4 = $_FILES['doc4']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
  }
  else
  {
  $p4=$_REQUEST['doc44'];
  } 
      

    $sql4 = "UPDATE order4 SET doc1='$p1',doc2='$p2',doc3='$p3',doc4='$p4' WHERE id='$fid' ";
    $result4 = mysqli_query($conn, $sql4);
    

  if ($result) {

     echo "<script>alert('Garments Updated successfully');window.location='garmentlist.php';</script>";

  } else {
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