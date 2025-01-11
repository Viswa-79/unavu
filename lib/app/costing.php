<?php include "config.php"; ?>



<script>
function ee6(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

}

</script>
<script>
function ee7(x)
{


//alert(x);
var a=x;
var c=(a.substr(7));
e=parseInt(c)+1;

document.getElementById('s7'+e).style.display='table-row';

}

</script>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(12));
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
function ee3(x)
{


//alert(x);
var a=x;
var c=(a.substr(15));
e=parseInt(c)+1;

document.getElementById('s3'+e).style.display='table-row';

}

</script>
<script>
function ee2(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s4'+e).style.display='table-row';

}

</script>
<script>
function ee4(x)
{


//alert(x);
var a=x;
var c=(a.substr(16));
e=parseInt(c)+1;

document.getElementById('s5'+e).style.display='table-row';

}

</script>
<script>
function ee2(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s6'+e).style.display='table-row';

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

  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML = r;
					   }

      }
    };
    xmlhttp.open("GET","ajax/get_items.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>



<script>
function get_items(value) {
//alert(value);
var form='costing';
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
              alert("Costing Already Made For This Order No.!");
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
function get_item_details(id,value) {
  var c=id.substr(6);
  //alert(c);
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  $('#costqty'+c).val(data.quantity);


                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>


<script>
function getrefno(value) {
//alert("hello");
  
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  


$('#refno').val(data.refno);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_ordqty.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(fileno) as id from costing";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
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
            
            
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Costing </button>
                      <a href="costinglist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Costing
                          </a>
                    </div>    <br>
                    
          <form class="card-body"action="" method="post" enctype="multipart/form-data" autocomplete="off">
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-l">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      
                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Costing&nbsp;File&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="fileno"
                              name="fileno"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              value="<?php echo date("Y-m-d");?>"

                              class="form-control"/>
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              onblur="get_items(this.value);get_mrp(this.value);getrefno(this.value);"
                              onchange="get_qty_details(this.value);"autofocus
                              class="form-control"
							  required />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Ref No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              
                              class="form-control"
							   />
                          </div>
                        <!--  <div class="col-md-3">
                          <label class="form-label" for="collapsible-fullname">Item No&nbsp;<span style="color:red;">*</span></label>
                          <select name="itemno" id="itemno" class="select form-select" onchange="get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
						
                                
                              </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="costqty"
                              name="costqty"
                              class="form-control"/>
                          </div>
                          
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Costing&nbsp;For&nbsp;<span style="color:red;">*</span></label>
                            <select name="costplan" id="costplan" class="select form-select"  >
                                <option value="">Select</option>
                                <option value="1">Full Quantity</option>
                                <option value="2">Partial Quantity</option>
							
                              </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Costing&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="reqcost"
                              name="reqcost"
                              autofocus
                              onblur="chkreqqty2(this.id,this.value);"
                              class="form-control"/>
                          </div><hr> -->
                          </div>
                          </div>
                     
                    </div>
                  </div>
                </div>
                <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Item Details</h5>
                    </div>
                    <div class="card-body">
                     
                      <div class="table-responsive text-nowrap">
                        
                      <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th  style="text-align:center">S&nbsp;no</th>
                                  <th  >item&nbsp;no</th>
                                  <th>order&nbsp;qty</th>
                                  <th>costing&nbsp;for</th>
                                  <th>costing&nbsp;qty</th>
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
                                   <select name="itemno[]" style="width:150px" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" 
                                     >
                                <option value="">Select</option>
							 
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="costqty<?php echo $i;?>"
                                  
                                    name="costqty[]"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                               style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                                   <select name="costplan[]" id="costplan<?php echo $i; ?>" style="width:150px" onchange="getreqqty(this.id,this.value);" class="select form-select"  >
                                <option value="">Select</option>
                                <option value="1">Full Quantity</option>
                                <option value="2">Partial Quantity</option>
							
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="reqcost<?php echo $i;?>"
                                    onkeyup="chkreqqty2(this.id,this.value);"
                                    onchange="chkreqqty2(this.id,this.value);"
                                    style="text-align:right"
                                    name="reqcost[]"
                                    onKeyDown="ee7(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
          </tr>
          <?php
                              }
                              for ($i = 1, $sno = 2; $i <=9; ) {
                                ?>
                      <tr id="s7<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                             <div align="center"><?php echo $sno;?></div>
                </td>
                         <td style="padding: 0.3rem">
                               <select name="itemno[]" style="width:150px" onchange="get_item_details(this.id,this.value);" id="itemno<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
						
                                
                              </select>
                                       
                </td>             
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="costqty<?php echo $i;?>"
                                   
                                    name="costqty[]"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                               <td style="padding: 0.3rem">
                               <select name="costplan[]" id="costplan<?php echo $i; ?>" style="width:150px" onchange="getreqqty(this.id,this.value);" class="select form-select"  >
                                <option value="">Select</option>
                                <option value="1">Full Quantity</option>
                                <option value="2">Partial Quantity</option>
							
                              </select>
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="reqcost<?php echo $i;?>"
                                    onkeyup="chkreqqty2(this.id,this.value);"
                                    onchange="chkreqqty2(this.id,this.value);"
                                    style="text-align:right"
                                    name="reqcost[]"
                                    onKeyDown="ee7(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td></tr><?php  $i++; $sno++; } ?>
             <!--   <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><strong>Total</strong></td>
                  <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalfab"
                                   
                                    name="totalfab"
                                    readonly
                                    aria-label="Product barcode"/>
                                       
                </td></tr> -->
                

                              </tbody>
                            </table>
                     
                    </div>
                  </div> 
              </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Fabric Cost </h5>
                    </div>
                    <div class="card-body">
                     
                      <div class="table-responsive text-nowrap">
                        
                      <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th  style="text-align:center">S.No</th>
                                  <th>Quality</th>
                                  <th>Cons</th>
                                  <th>Rate/Mtr</th>
                                  <th>Value</th>
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
                                   <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" class="select form-select" 
                                     >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM quality_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                  
                                    name="consumption[]"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                               style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                               
                                    name="price[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    name="amount[]"
                                    onKeyDown="ee6(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
          </tr>
          <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; ) {
                                ?>
                      <tr id="s2<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                             <div align="center"><?php echo $sno;?></div>
                </td>
                         <td style="padding: 0.3rem">
                               <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM quality_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>             
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                   
                                    name="consumption[]"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                               <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    onkeyUp="tott5(price<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    name="amount[]"
                                    onKeyDown="ee6(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td></tr><?php  $i++; $sno++; } ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><strong>Total</strong></td>
                  <td style="padding: 0.3rem">
                  
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalfab"
                                    style="text-align:right"
                                    name="totalfab"
                                    readonly
                                    aria-label="Product barcode"/>
                                       
                </td>
                

                              </tbody>
                            </table>
                     
                    </div>
                  </div> 
              </div>

              <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Processing Cost </h5>
                    </div>
                    <div class="card-body">
                     
                      <div class="table-responsive text-nowrap">
                        
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                  <th  style="text-align:center">S.No</th>
                                  <th>particulars</th>
                                  <th>value</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                               
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                                    </td>
                                    
                                    <td style="padding: 0.3rem">
                                    <select name="processing[]"  id="processing<?php echo $i;?>" class="select form-select" >
                                                    <option value="">Select</option>
                                  <?php 
                              $sql2 = "SELECT * FROM process order by id asc";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while($rw = mysqli_fetch_array($result2))
                              { ?>
                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                                        <?php } ?>
                                                    
                                                  </select>
                                                          
                                    </td>
                                    <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="processvalue<?php echo $i;?>"
                                      name="processvalue[]"
                                      onKeyDown="ee1(this.id);"
                                      onkeyUp="tott();"
                                      aria-label="Product barcode"/>
                                      
                                    </td>
                                </tr><hr>
                               

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?> </td>
                                  
                
                                  <td style="padding: 0.3rem">
                                <select name="processing[]"  id="processing<?php echo $i;?>" class="select form-select" >
                                                <option value="">Select</option>
                              <?php 
                          $sql2 = "SELECT * FROM process order by id asc";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while($rw = mysqli_fetch_array($result2))
                          { ?>
                                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                                    <?php } ?>
                                                
                                              </select>
                                                      
                                </td>
                                <td style="padding: 0.3rem">
                                  <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="processvalue<?php echo $i;?>"
                                  name="processvalue[]"
                                  onKeyDown="ee1(this.id);"
                                  onkeyUp="tott();"
                                  aria-label="Product barcode"/>
                                  
                                </td>
                                
                                
                                                </tr>  


                                                
                                        
                                  <?php
                                              }
                                              ?> 
                                              <tr>
                                                <td></td>
                                                  <td>Total</td>


                                                  <td style="padding: 0.3rem">
                                                    <input
                                                    type="text"
                                                    style="text-align:right"
                                                    class="form-control"
                                                    id="processingtotal"
                                                    readonly
                                                    name="processingtotal"
                                                    aria-label="Product barcode"
                                                    />
                                                  </td>
                                                  
                                                  
                                              </tr>
                                                <!-- <tr>
                                                  <td></td>
                                                  <td ><span style="float: left">Process&nbsp;Loss&nbsp;(%)</span>
                                                    <input
                                                    type="text"
                                                    style="text-align:right;width:80px;float: right"
                                                    class="form-control"
                                                    id="processlossper"
                                                    name="processlossper"
                                                    onKeyUp="tott();"
                                                    placeholder="%"/>
                                                    
                                                  </td>
                                                  
                                                  <td style="padding: 0.3rem">
                                                    <input
                                                    type="text"
                                                    style="text-align:right"
                                                    class="form-control"
                                                    id="processloss"
                                                    name="processloss"
                                                    readonly
                                                    aria-label="Product barcode"/>
                                                    
                                                  </td>
                                              </tr>
                                                <tr>
                                                  <td></td>
                                                  <td>Process&nbsp;Cost</td>
                                                  <td style="padding: 0.3rem">
                                                    <input
                                                    type="text"
                                                    style="text-align:right"
                                                    class="form-control"
                                                    id="processcost"
                                                    name="processcost"
                                                    readonly
                                                    aria-label="Product barcode"/>
                                                    
                                                  </td>
                                                  
                                              </tr> -->
                              

                              </tbody>
                            </table>
                     
                    </div>
                  </div>
                  




                  
              </div>


                  <div class="card mb-4">
                   <!-- <div class="card-header d-flex justify-content-between align-items-center">
                    
                     </div>
                   <div class="card-body">
                     
                       <div class="table-responsive text-nowrap">
                        
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                <th  style="text-align:center">S.No</th>
                                  <th>particulars</th>
                                  <th>UOM</th>
                                  <th>value</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                               
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                </td>
                <td style="padding: 0.3rem">
                <select name="accessoriesname[]"  id="accessoriesname<?php echo $i;?>" class="select form-select" onchange="get_party(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM product_master order by productname asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
               
               
                <td style="padding: 0.3rem">
                  <input
                  type="text"
                  class="form-control"
                  id="uom<?php echo $i;?>"
                  name="uom[]"
                  onKeyDown="ee4(this.id);"
                  
                  aria-label="Product barcode"/>
                  
                </td>
                <td style="padding: 0.3rem">
                  <input
                  type="text"
                  style="text-align:right"
                  class="form-control"
                  id="accessoriesvalue<?php echo $i;?>"
                  name="accessoriesvalue[]"
                  onKeyDown="ee4(this.id);"
                  onkeyUp="tott1();"
                  aria-label="Product barcode"/>
                  
                </td>
                
                    
                
                
               
                                  
                                </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <= 10; $i++, $sno++) {
                                ?>
                      <tr id="s5<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?> </td>
                                  
                
                                  <td style="padding: 0.3rem">
                <select name="accessoriesname[]"  id="accessoriesname<?php echo $i;?>" class="select form-select" onchange="get_party(this.id,this.value);">
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM product_master order by productname asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                  <input
                  type="text"
                 
                  class="form-control"
                  id="uom<?php echo $i;?>"
                  name="uom[]"
                  onKeyDown="ee4(this.id);"
                  onkeyUp="tott1();"
                  aria-label="Product barcode"/>
                  
                </td>
                <td style="padding: 0.3rem">
                  <input
                  type="text"
                  style="text-align:right"
                  class="form-control"
                  id="accessoriesvalue<?php echo $i;?>"
                  name="accessoriesvalue[]"
                  onKeyDown="ee4(this.id);"
                  onkeyUp="tott1();"
                  aria-label="Product barcode"/>
                  
                </td>
                
                
                                </tr>  
                    </div>        
<?php
                              }
                              ?>    
                              
                              
                              <tr>
                                <td></td>
                                <td></td>
                                  <td style="text-align:center">Total</td>


                                  <td style="padding: 0.3rem">
                                    <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="accessoriestotal"
                                    name="accessoriestotal"
                                    readonly
                                    />
                                  </td>

                                  
                              
                              
                              
                              
                              </tr>
                              </tbody>
                            </table>
                      </div> 
                     
                    </div>-->
                  </div>


                 
                </div>
                <div class="col-xl">
                  
                <div class="col-xl">
                  


              
             <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Total Cost</h5>
                    </div>
                    <div class="card-body">
                     
                      <div class="table-responsive text-nowrap">
                        
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                   <th >DESCRIPTION</th>
                                  <th></th>
                                  <th>value</th>
                                </tr>
                                <tr>
                                        <td colspan="2">Fabric Cost</td>
                                      
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="totfab"
                                            name="totfab"
                                           readonly

                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>
                                <tr>
                                    <td colspan="2">Processing Cost</td>
                                   
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="processingcost"
                                            name="processingcost"
                                           readonly

                                            aria-label="Product barcode"/>
                                        </td>
                                    </tr>
                                <tr>
                                    <td colspan="2">CMT</td>
                                    
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="productioncost"
                                            name="productioncost"
                                            onkeyUp="tott4();"

                                            aria-label="Product barcode"/>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="2">Accessories Cost</td>
                                     
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="accessoriescost"
                                            name="accessoriescost"
                                          readonly

                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>  -->
                                    <tr>
                                        
                                        <td colspan="2">Transport</td>
                                       
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="transport"
                                            onkeyUp="tott4();"
                                            name="transport"
                                            
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>
                                    <tr>
                                       
                                        <td colspan="2">Wastage</td>
                                       
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="wastage"
                                           onkeyUp="tott4();"
                                            name="wastage"
                                            
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>
                                    <tr>
                                        
                                        <td colspan="2">Interest</td>
                                       
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="interest"
                                           onkeyUp="tott4();"
                                            name="interest"
                                            
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>
                                    
                                    <tr>
                                        <td>Rejection&nbsp;% </td>
                                        <td style="padding: 0.3rem;width:80px">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="rejectionper"
                                            name="rejectionper"
                                            placeholder="%"
                                            onkeyUp="tott4();"

                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                        <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="rejection"
                                            name="rejection"
                                            readonly
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                            
                                    </tr>
                                     <tr>
                                        <td>Commission&nbsp;%</td>
                                        <td style="padding: 0.3rem">
                                                <input
                                                type="text"
                                                style="text-align:right"
                                                class="form-control"
                                                id="commissionper"
                                                name="commissionper"
                                                placeholder="%"
                                            onkeyUp="tott4();"

                                                aria-label="Product barcode"/>
                                                
                                            </td>
                                            <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="commission"
                                            name="commission"
                                           readonly
                                            
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                                
                                        </tr>
                                        <tr>
                                            <td>Profit&nbsp;%</td>
                                            <td style="padding: 0.3rem">
                                                    <input
                                                    type="text"
                                                    style="text-align:right"
                                                    class="form-control"
                                                    id="profitper"
                                                    name="profitper"
                                                    placeholder="%"
                                            onkeyUp="tott4();"

                                                    aria-label="Product barcode"/>
                                                    
                                                </td>
                                                <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="profit"
                                            name="profit"
                                            readonly
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                                    
                                        </tr>
                                        <tr>
                                            <td colspan="2">Total&nbsp;Price&nbsp;( &#8377; )</td>
                                           
                                            <td style="padding: 0.3rem">
                                            <input
                                            type="text"
                                            style="text-align:right"
                                            class="form-control"
                                            id="totalprs"
                                            name="totalprs"
                                            readonly
											
                                            aria-label="Product barcode"/>
                                            
                                        </td>
                                               
                                        </tr>
                              </tbody>
                            </table>
                      </div>
                     
                    </div>
                  </div>
                <!-- /Custom Svg Icon Radios -->

                <!-- Custom SVG Icon Checkbox -->
               
                <!-- /Custom SVG Icon Checkbox -->

                <!-- Custom Option Radio Image -->
                
                <!-- /Custom Option Radio Image -->

                <!-- Custom Option Checkbox Image -->
                
                <!-- /Custom Option Checkbox Image -->
               </div>
                      </div>   <br>
                          
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
                        </div>
                        
                                                                           
                
           
        <!-- / Layout page -->
    
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

  $fileno = $_POST['fileno'];
  $date = $_POST['date'];
  $refno = $_POST['refno'];
  $orderno = $_POST['orderno'];
  $itemno = $_POST['itemno'];
 // $documentation = $_POST['documentation'];
 // $testing = $_POST['testing'];
 // $inspection = $_POST['inspection'];
  $transport = $_POST['transport'];
 // $totalgarment = $_POST['totalgarment'];
  $processingcost = $_POST['processingcost'];
  $productioncost = $_POST['productioncost'];
 // $accessoriescost = $_POST['accessoriescost'];
  //$garmentcost = $_POST['garmentcost'];
  $rejectionper = $_POST['rejectionper'];
  $rejection = $_POST['rejection'];
  $commissionper = $_POST['commissionper'];
  $commission = $_POST['commission'];
  $profitper = $_POST['profitper'];
  $profit = $_POST['profit'];
  $totalprs = $_POST['totalprs'];
  $processingtotal = $_POST['processingtotal'];
  //$processlossper = $_POST['processlossper'];
  //$processloss = $_POST['processloss'];
  //$processcost = $_POST['processcost'];
  //$productiontotal = $_POST['productiontotal'];
  // $accessoriestotal = $_POST['accessoriestotal'];
  $wastage = $_POST['wastage'];
  $interest = $_POST['interest'];
  $costqty = $_POST['costqty'];
  $costplan = $_POST['costplan'];
  $reqcost = $_POST['reqcost'];
  $totalfab = $_POST['totalfab'];
  $totfab = $_POST['totfab'];
  

  $sql = "INSERT into costing (fileno,date,refno,orderno,itemno,transport,processingcost,productioncost,rejectionper,rejection,commissionper,commission,profitper,profit,totalprs,processingtotal,totalfab,totfab,wastage,interest,costplan,costqty,reqcost) 
 values ('$fileno','$date','$refno','$orderno','$itemno','$transport','$processingcost','$productioncost','$rejectionper','$rejection','$commissionper','$commission','$profitper','$profit','$totalprs','$processingtotal','$totalfab','$totfab','$wastage','$interest','$costplan','$costqty','$reqcost')";
    $result = mysqli_query($conn, $sql);
  
 
    $cid = mysqli_insert_id($conn);
    

  foreach ($_POST['processing'] as $key => $val) {
    
    
    $processing = $_POST['processing'][$key];
    $processvalue = $_POST['processvalue'][$key];
    
    if ($processing != '') {
    $sql1 = "INSERT into costing1 (cid,processing,processvalue) 
    values ('$cid','$processing','$processvalue')";
      $result1 = mysqli_query($conn, $sql1);
    
    }
  }
  
  //   foreach ($_POST['productionname'] as $key => $val) {



  //       $productionname = $_POST['productionname'][$key];
  //       $productionvalue = $_POST['productionvalue'][$key];
        
        
  //   if ($productionname != '') {
  //        $sql1 = "INSERT into costing2 (cid,productionname,productionvalue) 
  //       values ('$cid','$productionname','$productionvalue')";
  //         $result1 = mysqli_query($conn, $sql1);
       

  //   }
  // }
  
//   foreach ($_POST['accessoriesname'] as $key => $val) {

//     $accessoriesname = $_POST['accessoriesname'][$key];
//     $uom = $_POST['uom'][$key];
//     $accessoriesvalue = $_POST['accessoriesvalue'][$key];
    
    
//   if ($accessoriesname != '') {
//      $sql1 = "INSERT into costing3 (cid,accessoriesname,uom,accessoriesvalue) 
//     values ('$cid','$accessoriesname','$uom','$accessoriesvalue')";
//       $result1 = mysqli_query($conn, $sql1);
    
  

// }
// }
  foreach ($_POST['consumption'] as $key => $val) {

   $quality = $_POST['quality'][$key];
   $consumption = $_POST['consumption'][$key];
   $price = $_POST['price'][$key];
   $amount = $_POST['amount'][$key];
    
    
  if ($quality != '') {
     $sql1 = "INSERT into costing4 (cid,quality,consumption,price,amount) 
    values ('$cid','$quality','$consumption','$price','$amount')";
      $result1 = mysqli_query($conn, $sql1);

}
}

  foreach ($_POST['costqty'] as $key => $val) {

   $itemno = $_POST['itemno'][$key];
   $costqty = $_POST['costqty'][$key];
   $costplan = $_POST['costplan'][$key];
   $reqcost = $_POST['reqcost'][$key];
    
    
  if ($itemno != '') {
     $sql1 = "INSERT into costing5 (cid,itemno,costqty,costplan,reqcost) 
    values ('$cid','$itemno','$costqty','$costplan','$reqcost')";
      $result1 = mysqli_query($conn, $sql1);

}
}
 

  if ($result) {

  echo "<script>alert('Costing Registered successfully');window.location='costing.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>

<script language="javascript" type="text/javascript">


function tott()
{


//alert("hello");


  k=0;
      for(i=0;i<20;i++)
	  {
	  
	   	if(document.getElementById('processvalue'+i).value!='')
	{
		
      var r= document.getElementById('processvalue'+i).value?document.getElementById('processvalue'+i).value:0;
  
      var k=(parseFloat)(k)+(parseFloat)(r);
	  
	 // alert(k);
	   document.getElementById('processingtotal').value=k.toFixed(2);
     
     document.getElementById('processingcost').value=k.toFixed(2);
     
    }
  }
  
 

    tott4();
   
}

</script>

<script language="javascript" type="text/javascript">


function tott1()
{


//alert("hello");


  k=0;
      for(i=0;i<20;i++)
	  {
	  
	   	if(document.getElementById('accessoriesvalue'+i).value!='')
	{
		
      var r= document.getElementById('accessoriesvalue'+i).value?document.getElementById('accessoriesvalue'+i).value:0;
  
      var k=(parseFloat)(k)+(parseFloat)(r);
	  
	 // alert(k);
	   document.getElementById('accessoriestotal').value=k.toFixed(2);
	   document.getElementById('accessoriescost').value=k.toFixed(2);
		
		
	}
	  }
	  tott4();
    
}

</script>

<script language="javascript" type="text/javascript">


function tott2()
{


//alert("hello");


  k=0;
      for(i=0;i<20;i++)
	  {
	  
	   	if(document.getElementById('productionvalue'+i).value!='')
	{
		
      var r= document.getElementById('productionvalue'+i).value?document.getElementById('productionvalue'+i).value:0;
  
      var k=(parseFloat)(k)+(parseFloat)(r);
	  
	 // alert(k);
	   document.getElementById('productiontotal').value=k.toFixed(2);
	   document.getElementById('productioncost').value=k.toFixed(2);
		
		
	}
	  }
	  tott4();
  
}

</script>

<script language="javascript" type="text/javascript">


function tott3()
{


//alert("hello");



	  
      var documentation= document.getElementById('documentation').value?document.getElementById('documentation').value:0;
      var testing= document.getElementById('testing').value?document.getElementById('testing').value:0;
      var inspection= document.getElementById('inspection').value?document.getElementById('inspection').value:0;
      
  
      var k=(parseFloat)(documentation)+(parseFloat)(testing)+(parseFloat)(inspection);
	  
	  // alert(k);
	   document.getElementById('totalgarment').value=k.toFixed(2);
	   document.getElementById('garmentcost').value=k.toFixed(2);
     tott4();
}

</script>

<script language="javascript" type="text/javascript">


function tott4()
{


//alert("hello");


     var transport= document.getElementById('transport').value?document.getElementById('transport').value:0;
      var wastage= document.getElementById('wastage').value?document.getElementById('wastage').value:0;
      var interest= document.getElementById('interest').value?document.getElementById('interest').value:0;
	    var fabcost= document.getElementById('totfab').value?document.getElementById('totfab').value:0;
      var processingcost= document.getElementById('processingcost').value?document.getElementById('processingcost').value:0;
      var productioncost= document.getElementById('productioncost').value?document.getElementById('productioncost').value:0;
     // var accessoriescost= document.getElementById('accessoriescost').value?document.getElementById('accessoriescost').value:0;
      //var garmentcost= document.getElementById('garmentcost').value?document.getElementById('garmentcost').value:0;
                                                                  //  (parseFloat)(garmentcost)+(parseFloat)(accessoriescost)+
      var k=(parseFloat)(processingcost)+(parseFloat)(productioncost)+(parseFloat)(fabcost)+(parseFloat)(transport)+(parseFloat)(wastage)+(parseFloat)(interest);
	  
	   //alert(k);
	   document.getElementById('totalprs').value=k.toFixed(2);

     var rejectionper= document.getElementById('rejectionper').value?document.getElementById('rejectionper').value:0;
  var k1=(parseFloat)(k)*(parseFloat)(rejectionper) / 100;

  document.getElementById('rejection').value=k1.toFixed(2);

  var t1=(parseFloat)(k)+(parseFloat)(k1);

  var commissionper= document.getElementById('commissionper').value?document.getElementById('commissionper').value:0;
  var k2=(parseFloat)(t1)*(parseFloat)(commissionper) / 100;

  document.getElementById('commission').value=k2.toFixed(2);

  var t2=(parseFloat)(t1)+(parseFloat)(k2);

  var profitper= document.getElementById('profitper').value?document.getElementById('profitper').value:0;
  var k3=(parseFloat)(t2)*(parseFloat)(profitper) / 100;

  document.getElementById('profit').value=k3.toFixed(2);

    var t3=(parseFloat)(k)+(parseFloat)(k1)+(parseFloat)(k2)+(parseFloat)(k3);
    document.getElementById('totalprs').value=t3.toFixed(2);
}

</script>

<script language="javascript" type="text/javascript">

function tott5(v1)
{


//alert(v1);

a=v1;
b=(a.substr(5));
    var t=document.getElementById('consumption'+b).value?document.getElementById('consumption'+b).value:0;
   // alert(t); 
    var v=document.getElementById('price'+b).value?document.getElementById('price'+b).value:0;
        
        var tt=parseFloat(t)*parseFloat(v);
        
        //alert(tt);
		document.getElementById('amount'+b).value=tt.toFixed(2);

    k=0;
      for(i=0;i<20;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{

	  
	  var a1= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
	
		 var k=(parseFloat)(k)+(parseFloat)(a1);
	
  var totalfab=k.toFixed(4);
	    document.getElementById('totalfab').value=totalfab;
    //  alert(totalfab);
    document.getElementById('totfab').value=k.toFixed(2);
     tott4();

		
	}
	  }
	  
	  
}


</script>

<script>
function get_party(id,value) {
//alert("hello");
  var c=id.substr(15);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#uom'+c).val(data.unit);
$('#accessoriesvalue'+c).val(data.price);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>



<script>
  function chkreqqty2(id,value){
    var c=id.substr(7);
    var costqty=document.getElementById('costqty'+c).value?document.getElementById('costqty'+c).value:0;
   if(parseFloat(value)>parseFloat(costqty)){
      alert("Required Quantity Exceeded Order Quantity.");
      document.getElementById('reqcost'+c).value='';
    }
  }
  </script>


<script>
  function getreqqty(id,value)
  {
    var c=id.substr(8);
//alert(c);
    var costqty=document.getElementById('costqty'+c).value?document.getElementById('costqty'+c).value:0;
   // alert (costqty);
    var costplan=document.getElementById('costplan'+c).value?document.getElementById('costplan'+c).value:0;
   
   if(parseInt(costplan)==parseInt(1)){

     document.getElementById('reqcost'+c).value=costqty;
   }
   else{
    document.getElementById('reqcost'+c).value='';
   }


  }
  </script>

<script>
function get_mrp(value) {

//alert(value);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
for(var i=0;i<=20;i++)
					   {
						  document.getElementById('accessoriesname'+i).innerHTML =r;
					   }		  
      }
    };
    xmlhttp.open("GET","ajax/get_mrp.php?orderno="+value,true);
    xmlhttp.send();
  }
}
</script>