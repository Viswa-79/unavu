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
						  document.getElementById('itemno'+i).innerHTML =r1[1];
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
function get_item_details(id,value) {
  var c=id.substr(6);
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#fabricqty'+c).val(data.quantity);
$('#pono'+c).val(data.pono);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>

<?php
		
		  
		   $fg1="select max(bookno) as id from fabric_computation";
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
                      <button class="btn btn-label-primary">Fabric Computation </button>
                      <a href="fabric_computationlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>


                     <!-- Multi Column with Form Separator -->
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <?php
                              $sql4 = " SELECT * FROM fabric_computation WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <div class="row g-3">
                        <div class="col-md-3">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $wz1['bookno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              class="form-control"
                              value="<?php echo $wz1['orderno']; ?>"
                              placeholder="" />
                          </div>
                 
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Ref&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              value="<?php echo $wz1['refno']; ?>"
                              placeholder="" />
                          </div>
                         
                          </div><br><hr>


                        <div class="card mb-2 mt-4">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>item&nbsp;no</th>
                                  <th>pono</th>
                                  <th>order&nbsp;qty</th>
                                  <th>Cut&nbsp;Panel&nbsp;Name</th>
                                  <th style="width:200px">Quality</th>
                                  <th>Color</th>
                                  <th>Allot&nbsp;Fabric&nbsp;width&nbsp;Inches</th>
                                  <th>width</th>
                                  <th>length</th> 
                                  <th>Taken&nbsp;Fabric&nbsp;Inches</th>
                                  <th>No&nbsp;Of&nbsp;Bits</th> 
                                  <th>consumption</th> 
                                  <th>Quantity</th>
                                  <th>Total&nbsp;Meters</th>
                                  <th>Fabric&nbsp;Process</th>
                                  <th>Printing</th>
								   <th>Wastage</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM fabric_computation1 Where cid='$sid' order by id asc";
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
                <select name="itemno[]" style="width:150px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_qty_details(this.id,this.value);get_item_details(this.id,this.value);"
 >
                                   <option value="">Select</option>
                                  <?php 
					$sql = "SELECT *,s1.id as id FROM item_master s1 left join order2 c on s1.id=c.itemno left join order1 d on c.cid=d.id where ord_no='".$wz1['orderno']."' order by code asc";
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
                                    id="pono<?php echo $i;?>"
                                    name="pono[]"
                                    style="text-align:left;width:120px"
                                    
                                    value="<?php echo $rw['pono']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="fabricqty<?php echo $i;?>"
                                    name="fabricqty[]"
                                    style="text-align:right"
                                    
                                    value="<?php echo $rw['fabricqty']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                <select name="pannelname[]" id="pannelname<?php echo $i;?>"
                               class="select form-select" >
                                <option value="">Select</option>
                                <option value="Bag" <?php if($rw['pannelname']=='Bag'){ ?>Selected<?php } ?> >Bag </option>
                                <option value="Handle" <?php if($rw['pannelname']=='Handle'){ ?>Selected<?php } ?> >Handle</option>                                
                                <option value="Wastage" <?php if($rw['pannelname']=='Wastage'){ ?>Selected<?php } ?> >Wastage</option> 
								<option value="Gusset" <?php if($rw['pannelname']=='Gusset'){ ?>Selected<?php } ?> >Gusset</option>
								<option value="Pocket" <?php if($rw['pannelname']=='Pocket'){ ?>Selected<?php } ?> >Pocket</option>
								<option value="Cardboard fabric" <?php if($rw['pannelname']=='Cardboard Fabric'){ ?>Selected<?php } ?> >Cardboard Fabric</option>
								<option value="Parallel Part" <?php if($rw['pannelname']=='Parallel Part'){ ?>Selected<?php } ?>>Parallel Part</option>	
	<?php 
					$sql1 = "SELECT * FROM cutpanel_master order by cutpanel_name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw['pannelname']==$rw1['cutpanel_name']){ ?>Selected<?php } ?> value="<?php echo $rw1['cutpanel_name'];?>"><?php echo $rw1['cutpanel_name'];?></option>
                    <?php } ?>								
                              </select>
                </td>
                <td style="padding: 0.3rem">
                <select name="quality[]" style="width:200px" id="quality<?php echo $i;?>" class="select form-select" >
                                  <option value="">Select</option>
                                  <?php 
					$sql = "SELECT *,q.id as id FROM costing4 c1 left join costing c on c1.cid=c.id left join quality_master q on c1.quality=q.id where orderno='$wz1[orderno]' group by c1.quality order by c1.id asc";
          $result = mysqli_query($conn, $sql);
          while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['quality']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['quality'];?></option>
                     <?php } ?>
                     
                                
                              </select>
                              </td> 
                <td style="padding: 0.3rem">
                <select name="color[]" style="width:130px" id="color<?php echo $i;?>" class="select form-select" >
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
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                    name="allotfabric[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value="<?php echo $rw['allotfabric']; ?>"
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
                                    value="<?php echo $rw['width']; ?>"
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
                                    value="<?php echo $rw['length']; ?>"
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
                                    value="<?php echo $rw['takefabric']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
               
                         
                           
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                    name="bits[]"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    style="width:120px;text-align:right"
                                    value="<?php echo $rw['bits']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>       
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                    name="consumption[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value="<?php echo $rw['consumption']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>         
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                    name="totalmeters[]"
                                    style="text-align:right"
                                    onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
                                    value="<?php echo $rw['totalmeters']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                                   <select name="process[]"  id="process<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM process ";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['process']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>  <td style="padding: 0.3rem">
                 
                                    <select name="printing[]" id="printing<?php echo $i; ?>" class="select form-select" onKeyDown="ee1(this.id);">
                            <option value="">Select</option> 
                                <option value="Yes" <?php if($rw['printing']=='Yes'){ ?>Selected<?php } ?> >Yes</option>
                                <option value="No" <?php if($rw['printing']=='No'){ ?>Selected<?php } ?> >No</option>   
                              </select>
                                       
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
                                    value="<?php echo  $rw['wastage']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                
               
                                  
                                </tr>
                                <?php
                       $sno++; $i++;
    }
    $j=$i;
    $sn=$sno;
    for ($i = $j, $sno = $sn; $i <50; $i++, $sno++) {
      ?>       
            
        <input type="text" hidden name="rid[]" id="rid" value="">
        <tr id="s1<?php echo $i; ?>" style="display:none">
        <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                <td style="padding: 0.3rem">
                <select name="itemno[]" id="itemno<?php echo $i; ?>" style="width:150px" class="select form-select" onchange="get_qty_details(this.id,this.value);get_item_details(this.id,this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT *,s1.id as id FROM item_master s1 left join order2 c on s1.id=c.itemno left join order1 d on c.cid=d.id where ord_no='".$wz1['orderno']."' order by code asc";
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
                                    id="pono<?php echo $i;?>"
                                    name="pono[]"
                                    style="text-align:left"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>  
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="fabricqty<?php echo $i;?>"
                                    name="fabricqty[]"
                                    style="text-align:right"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                <select name="pannelname[]"  id="pannelname<?php echo $i;?>" class="select form-select">
                                <option value="">Select</option>
                         		<?php 
					$sql1 = "SELECT * FROM cutpanel_master order by cutpanel_name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option value="<?php echo $rw1['cutpanel_name'];?>"><?php echo $rw1['cutpanel_name'];?></option>
                    <?php } ?>
							
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
                                
                                onchange="tott(bits<?php echo $i;?>.id);"
                                onkeyUp="tott(bits<?php echo $i;?>.id);;"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                name="consumption[]"
                                onkeyUp="tott(bits<?php echo $i;?>.id);"
                                onchange="tott(bits<?php echo $i;?>.id);"
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
                               <select name="process[]"     id="process<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM process order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                
                <select name="printing[]"  onKeyDown="ee1(this.id);" id="printing<?php echo $i;?>" class="select form-select">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>

          </select>
                   
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
                  <?php } ?>
                                                         

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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>TOTAL&nbsp;METERS</td>
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
                              <a class="btn btn-label-secondary btn-prev" href="fabric_computationlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
  <?php if($user_role==2){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" > 
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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
  $refno = $_POST['refno'];
  $orderno = $_POST['orderno'];
  $totalfabric = $_POST['totalfabric'];

  $sql = "UPDATE fabric_computation SET bookno='$bookno',date='$date',refno='$refno',orderno='$orderno',totalfabric='$totalfabric' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['pannelname'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $itemno = $_POST['itemno'][$key];
    $pono = $_POST['pono'][$key];
    $fabricqty = $_POST['fabricqty'][$key];
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
    $process = $_POST['process'][$key];
    $printing = $_POST['printing'][$key];
    $wastage = $_POST['wastage'][$key];

    
    if ($itemno != '') {
      if ($rid != '') {
        $sql1 = "UPDATE fabric_computation1 SET cid='$cid',itemno='$itemno',pono='$pono',fabricqty='$fabricqty',pannelname='$pannelname',quality='$quality',color='$color',width='$width',length='$length',takefabric='$takefabric',allotfabric='$allotfabric',bits='$bits',consumption='$consumption',quantity='$quantity',totalmeters='$totalmeters',process='$process',printing='$printing',wastage='$wastage'  WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
     
      }
      else{ 
     echo $sql = "INSERT into fabric_computation1 (cid,pannelname,itemno,pono,fabricqty,quality,color,width,length,takefabric,allotfabric,bits,consumption,quantity,totalmeters,process,printing,wastage) 
   values ('$cid','$pannelname','$itemno','$pono','$fabricqty','$quality','$color','$width','$length','$takefabric','$allotfabric','$bits','$consumption','$quantity','$totalmeters','$process','$printing','$wastage')";
        $result = mysqli_query($conn, $sql);
    }
  }
  
  if ($result) {

  echo "<script>alert('Fabric Computation Updated successfully');window.location='fabric_computationlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
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
//alert(t);
        var s=document.getElementById('width'+b).value?document.getElementById('width'+b).value:0;
		
		var pannelname=document.getElementById('pannelname'+b).value?document.getElementById('pannelname'+b).value:0;
      
        var tt=parseFloat(t)*parseFloat(2.54)/parseFloat(s);
        
		var ttb=Math.floor(tt);
		document.getElementById('bits'+b).value=ttb;
		
		var w=(parseFloat(t)*2.54)-(parseFloat(s)*parseFloat(ttb));
		
		document.getElementById('wastage'+b).value=w.toFixed(3);


     var t1=document.getElementById('length'+b).value?document.getElementById('length'+b).value:0;
    
        var tt1=parseFloat(t1)/(parseFloat(100)*parseFloat(ttb));
        
       var tt2=tt1.toFixed(3);
		document.getElementById('consumption'+b).value=tt2;
		
		
		

        var s1=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;
      
        var tt3=parseFloat(tt2)*parseFloat(s1);
      
		document.getElementById('totalmeters'+b).value=tt3.toFixed(3);

    k1=0;
       for(var i=0;i<20;i++)
	  {
		
	 	if(document.getElementById('totalmeters'+i).value!='' && document.getElementById('pannelname'+i).value!='Wastage')
	{
  
	  
	  var a1= document.getElementById('totalmeters'+i).value?document.getElementById('totalmeters'+i).value:0;
		 var k1=(parseFloat)(k1)+(parseFloat)(a1);
	
	   document.getElementById('totalfabric').value=k1.toFixed(3);

		
	}
	  }
  

}

</script>
<!-- -->

<script>
function get_qty_details(id,value) {
  var c=id.substr(6);
  //alert(c)

  var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
 document.getElementById('quality'+c).innerHTML =r;

      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>
