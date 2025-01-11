<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(10));
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
function get_quality(id,value) {
  
  var c=id.substr(6);
//alert(c);
   var value2=document.getElementById('orderno'+c).value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

document.getElementById('quality'+c).innerHTML =r;


      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?itemno="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items(id,value) {
//alert(value);
var c=id.substr(7);
var form='packing_entry1';

		//alert(c);		
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r);
if(sts==1)
{
document.getElementById('itemno'+c).innerHTML =r1[1];
					
            }
             else if(sts==0)
            {
              alert("Packing Already Made For This Order No.!");
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
  
$('#color'+c).val(data.color);
$('#itemdesc'+c).val(data.descr);

}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(dcno) as id from packing_entry";
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
             
              <!-- Default -->
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Packing Entry</button>
                      <a href="packing_entry_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Packing
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="refno"
                              name="refno"
                              class="form-control"
                              required
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
                     
                          
                          
                          </div><br><hr>
                        <div class="card">
                        
                        <div class="table-responsive">

                            <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>order&nbsp;No</th> 
                                  <th>ref&nbsp;No</th> 
                                  <th>item&nbsp;No</th> 
                                  <th>item&nbsp;Description</th> 
                                  <th>order&nbsp;qty</th> 
                                  <th>cutting&nbsp;qty</th> 
                                  <th>From&nbsp;Box</th> 
                                  <th>To&nbsp;Box</th> 
                                  <th>Total&nbsp;Box</th> 
                                  <th>Box&nbsp;pcs</th> 
                                  <th>Total&nbsp;Pcs</th> 
                              
                                   
                                  <th>Pcs&nbsp;Weight</th> 
                                
                                  <th>Empty</th>
								   <th>Gross&nbsp;Weight</th>
                                  <th>Net&nbsp;Weight</th>
                                   <th>Total&nbsp;Gross&nbsp;Weight</th>
                                  <th>Total&nbsp;Net&nbsp;Weight</th>
                                
                                  <th>Cartoon&nbsp;Size</th> 

                                  
                                  
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
                <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="orderno<?php echo $i;?>"
                                    
                                    name="orderno[]"
                                    onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="ref<?php echo $i;?>"                                    
                                    name="ref[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]"    style="width:150px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);get_tot(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="ordqty<?php echo $i;?>"
                                    name="ordqty[]"
                                    readonly
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="cutqty<?php echo $i;?>"
                                    name="cutqty[]"
                                    readonly
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                <input 
                                    type="number"
                                    class="form-control"
                                    id="frombox<?php echo $i;?>"
                                    name="frombox[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    onchange="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
               
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="number"
                                    class="form-control"
                                    id="tobox<?php echo $i;?>"
                                    name="tobox[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    onchange="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalbox<?php echo $i;?>"
                                    name="totalbox[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="number"
                                    class="form-control"
                                    id="boxpcs<?php echo $i;?>"
                                    name="boxpcs[]"
                                    style="text-align:right"
                                    onchange="tott(tobox<?php echo $i;?>.id);"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                    name="totalpcs[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
              
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pcsweight<?php echo $i;?>"
                                    name="pcsweight[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="emp<?php echo $i;?>"
                                    name="emp[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
				   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="grossweight<?php echo $i;?>"
                                    name="grossweight[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="netweight<?php echo $i;?>"
                                    name="netweight[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
             
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalnet<?php echo $i;?>"
                                    name="totalnet[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalgross<?php echo $i;?>"
                                    name="totalgross[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cartonsize<?php echo $i;?>"
                                    name="cartonsize[]"
                                    onKeyDown="ee1(this.id);"
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
              <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="orderno<?php echo $i;?>"
                                    
                                    name="orderno[]"
                                    onchange="get_items(this.id,this.value);get_ref(this.id,this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>
              <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="ref<?php echo $i;?>"
                                    name="ref[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="itemno[]"    style="width:150px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_tot(this.id,this.value); ">
                                <option value="">Select</option>
							
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="ordqty<?php echo $i;?>"
                                    name="ordqty[]"
                                    readonly
                                    aria-label="Product barcode"/>
                </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="cutqty<?php echo $i;?>"
                                    name="cutqty[]"
                                    readonly
                                    aria-label="Product barcode"/>
                </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"
                                    aria-label="Product barcode"/>
                </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="number"
                                    class="form-control"
                                    id="frombox<?php echo $i;?>"
                                    name="frombox[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    onchange="tott(tobox<?php echo $i;?>.id);"/>
                </td>
               
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="number"
                                    class="form-control"
                                    id="tobox<?php echo $i;?>"
                                    name="tobox[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    onchange="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalbox<?php echo $i;?>"
                                    name="totalbox[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="number"
                                    class="form-control"
                                    id="boxpcs<?php echo $i;?>"
                                    name="boxpcs[]"
                                    style="text-align:right"
                                    onchange="tott(tobox<?php echo $i;?>.id);"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalpcs<?php echo $i;?>"
                                    name="totalpcs[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
              
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pcsweight<?php echo $i;?>"
                                    name="pcsweight[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="emp<?php echo $i;?>"
                                    name="emp[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
				 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="grossweight<?php echo $i;?>"
                                    name="grossweight[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="netweight<?php echo $i;?>"
                                    name="netweight[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
           
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalnet<?php echo $i;?>"
                                    name="totalnet[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totalgross<?php echo $i;?>"
                                    name="totalgross[]"
                                    style="text-align:right"
                                    onkeyUp="tott(tobox<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cartonsize<?php echo $i;?>"
                                    name="cartonsize[]"
                                    onKeyDown="ee1(this.id);"
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
                  </div>
                </div>
                 
            </div>
               
           
                          
                         <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                            </div>    
                    
                        </form>
                   
                   
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

  $dcno = $_POST['dcno'];
  $refno = $_POST['refno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  
    $sql = "INSERT into packing_entry (dcno,refno,date,partyname) values ('$dcno','$refno','$date','$partyname')";
  //echo $sql;
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);

  foreach ($_POST['orderno'] as $key => $val) {
    
    
    $orderno = $_POST['orderno'][$key];
    $ref = $_POST['ref'][$key];
    $itemno = $_POST['itemno'][$key];
    $ordqty = $_POST['ordqty'][$key];
    $cutqty = $_POST['cutqty'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $frombox = $_POST['frombox'][$key];
    $tobox = $_POST['tobox'][$key];
    $totalbox = $_POST['totalbox'][$key];
    $boxpcs = $_POST['boxpcs'][$key];
    $totalpcs = $_POST['totalpcs'][$key];
    $pcsweight = $_POST['pcsweight'][$key];
    $emp = $_POST['emp'][$key];
    $netweight = $_POST['netweight'][$key];
    $grossweight = $_POST['grossweight'][$key];
    $totalnet = $_POST['totalnet'][$key];
    $totalgross = $_POST['totalgross'][$key];
    $cartonsize = $_POST['cartonsize'][$key];

    if ($orderno != '') {
       $sql1 = "INSERT into packing_entry1 (cid,orderno,ref,itemno,ordqty,cutqty,itemdesc,tobox,frombox,totalbox,boxpcs,totalpcs,pcsweight,emp,netweight,grossweight,totalnet,totalgross,cartonsize) 
 values ('$cid','$orderno','$ref','$itemno','$ordqty','$cutqty','$itemdesc','$tobox','$frombox','$totalbox','$boxpcs','$totalpcs','$pcsweight','$emp','$netweight','$grossweight','$totalnet','$totalgross','$cartonsize')";
  // echo $sql1;
   $result1 = mysqli_query($conn, $sql1);
    }
  } 
  
  if ($result) {

  echo "<script>alert('Packing Entry Registered Successfully');window.location='packing_entry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(5));


var t=document.getElementById('frombox'+b).value;
//alert(t);
        var v=document.getElementById('tobox'+b).value;
        var tt=parseFloat(v)-parseFloat(t)+1;
        //alert(tt);
		document.getElementById('totalbox'+b).value=tt;


var e=document.getElementById('totalbox'+b).value;
//alert(t);
        var f=document.getElementById('boxpcs'+b).value;
        var tt1=parseFloat(e)*parseFloat(f);
        //alert(tt);
		document.getElementById('totalpcs'+b).value=tt1;


var g=document.getElementById('grossweight'+b).value?document.getElementById('grossweight'+b).value:0;
//alert(t);
        var h=document.getElementById('emp'+b).value?document.getElementById('emp'+b).value:0;
        var tt2=parseFloat(g)-parseFloat(h);
        //alert(tt);
		document.getElementById('netweight'+b).value=tt2.toFixed(2);

        var tt3=parseFloat(g)*parseFloat(e);
        //alert(tt);
		document.getElementById('totalgross'+b).value=tt3.toFixed(2);

    var m=document.getElementById('netweight'+b).value?document.getElementById('netweight'+b).value:0;
        var tt4=parseFloat(m)*parseFloat(e);
        //alert(tt);
		document.getElementById('totalnet'+b).value=tt4.toFixed(2);

   
}

</script>


<script>
function get_ref(id,value) {
// alert("hello");
  var c=id.substr(7);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#ref'+c).val(data.refno);

}

      }
    };
    xmlhttp.open("GET","ajax/get_odrpono.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_tot(id,value) {
// alert("hello");
  var c=id.substr(6);
  var value2=document.getElementById('orderno'+c).value;

  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#ordqty'+c).val(data.quantity);
$('#cutqty'+c).val(data.qty);

}

      }
    };
    xmlhttp.open("GET","ajax/get_qty1.php?id="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>