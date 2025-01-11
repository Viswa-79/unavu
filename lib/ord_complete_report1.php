<?php include "config.php"; ?>


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

          
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->

            <?php
	  
  $orderno=$_POST['orderno'];

    
      

                  ?>	
      
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  id="ConvertTable" id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>OCR Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     
                <div class="card-body text-nowrap table-responsive">
                
                <?php 
                 $sno=1;
               
                

               
                 $aa=array('orderno'=>$orderno);
$aa=array_filter($aa);

//print_r($aa);

$i=1;
$rr='';
foreach($aa as $key => $aa1)
{
	if($i<count($aa))
	{
     $rq='and';
    }
	else
	{
	 $rq='';	
	}
	$rr=$rr.' '.$key."="."'".$aa[$key]."'"." ".$rq;

	
$i++;	
}


  if($rr!='')

{ 
   
 $rr=''.$rr;  
   
}
  else

{ 
   
 $rr='';  
   
} 
       
$sql4 = " SELECT * FROM ocr_entry e left join ocr_entry1 o on e.id=o.cid left join item_master n on e.itemno=n.id where $rr order by e.id asc";
                 $result4 = mysqli_query($conn, $sql4);
                $wz1 = mysqli_fetch_array($result4)



                     ?> 
                     <div style=" text-align:right;padding-right:5px">
                     <strong>Dc No :</strong><?php echo $wz1['dcno'];?>
                     </div>
              <table  class=" table table-bordered " style="border-collapse:collapse" border="1" >

<tr>
<td  width="200"><strong>Date : </strong></td>
<td  width="200" ><?php echo date('d/m/Y',strtotime($wz1['date'])); ?></td>
<td rowspan="2"colspan="2"width="90px" ></td>
<td width="250"><strong>Order no :</strong></td>
<td><?php echo $wz1['orderno']; ?></td>
</tr>

<tr>
<td  width="100" ><strong>Item No : </strong></td>
<td  width="200"  > <?php echo $wz1['code']; ?></td>
<td width="250"><strong>Quantity Shipped : </strong></td>
<td  width="200"><?php echo $wz1['qtyship']; ?></td>
</tr>

<tr>
<td rowspan="2"colspan="2" style="vertical-align: top;"  ><div align="left"><strong>Fabric Quality : </strong></div><div align="left"style="padding-top:5px"><?php echo $wz1['fabquality']; ?></div></td>
<td rowspan="2" colspan="2" style="vertical-align:top;" ><div align="left"><strong>Weight&nbsp;For&nbsp;Mtrs&nbsp;:&nbsp;</strong></div><div align="left"style="padding-top:5px"><?php echo $wz1['weightformtr']; ?></div></td>
<td width="250" ><strong>Consumption : </strong></td>
<td ><?php echo $wz1['consumption']; ?></td>
</tr>

<tr>
<td width="250"><strong>Total Fabric Receipt : </strong></td>
<td ><?php echo $wz1['tfabrec']; ?></td>
</tr>

<tr>
<td width="250"><strong>Bag Size : </strong></td>
<td colspan="3"><?php echo $wz1['bagsize']; ?></td>
<td width="250"><strong>Consumed Quantity : </strong></td>
<td colspan="2"><?php echo $wz1['consumedqty']; ?></td>
</tr>

<tr>
<td width="250"><strong>Cutting Size : </strong></td>
<td colspan="3"><?php echo $wz1['cutsize']; ?></td>
<td width="250"><strong>Balance : </strong></td>
<td colspan="2"><?php echo $wz1['balance']; ?></td>
</tr>     

<tr>
<td colspan="4"></td>
<td width="250"><strong>Fabric Stock : </strong></td>
<td colspan="2"><?php echo $wz1['fabstock']; ?></td>
</tr>

<tr>
<td ><strong>Ref No</strong></td>
<td colspan="3"><?php echo $wz1['refno']; ?></td>
<td width="250"><strong>Loop Stock : </strong></td>
<td colspan="2"><?php echo $wz1['loopstock']; ?></td>
</tr>

<tr>
<td colspan="4"></td>
<td width="250"><strong>Pcs Stock : </strong></td>
<td colspan="2"><?php echo $wz1['pcsstock']; ?></td>
</tr>

<tr>
<td colspan="4"></td>
<td width="250"><strong>Half Finishing : </strong></td>
<td colspan="2"><?php echo $wz1['halffinish']; ?></td>
</tr>

<tr>
<td colspan="7" width="250"><strong>Wastage In Mtrs :- </strong></td>

</tr>

<tr>
<td width="250"><strong>A) Cutting Bit : </strong></td>
<td colspan="2"><?php echo $wz1['acutting']; ?></td>
<td colspan="2"><?php echo $wz1['bcutting']; ?></td>
<td colspan="2"><?php echo $wz1['ccutting']; ?></td> 
</tr>

<tr>
<td width="250"><strong>B) Length Side Wastage : </strong></td>
<td colspan="2"><?php echo $wz1['alengthside']; ?></td>
<td colspan="2"><?php echo $wz1['blengthside']; ?></td>
<td colspan="2"><?php echo $wz1['clengthside']; ?></td> 
</tr>

<tr>
<td width="250"><strong>C) Loop Wastage : </strong></td>
<td colspan="2"><?php echo $wz1['aloopwaste']; ?></td>
<td colspan="2"><?php echo $wz1['bloopwaste']; ?></td>
<td colspan="2"><?php echo $wz1['cloopwaste']; ?></td> 
</tr>

<tr>
<td width="250"><strong>D) Printing Mistake : </strong></td>
<td colspan="2"><?php echo $wz1['aprintmistake']; ?></td>
<td colspan="2"><?php echo $wz1['bprintmistake']; ?></td>
<td colspan="2"><?php echo $wz1['cprintmistake']; ?></td> 
</tr>

<tr>
<td width="250"><strong>E) Fabric Mistake : </strong></td>
<td colspan="2"><?php echo $wz1['afabmistake']; ?></td>
<td colspan="2"><?php echo $wz1['bfabmistake']; ?></td>
<td colspan="2"><?php echo $wz1['cfabmistake']; ?></td> 
</tr> 

<tr>
<td width="250"><strong>F) Adas : </strong></td>
<td colspan="2"><?php echo $wz1['aadas']; ?></td>
<td colspan="2"><?php echo $wz1['badas']; ?></td>
<td colspan="2"><?php echo $wz1['cadas']; ?></td> 
</tr>

<tr>
<td width="250" colspan="7"><strong>Income Wastage :-</strong></td> 
</tr>

<tr>
<td width="250"><strong>A) Side Seri : </strong></td>
<td colspan="2"><?php echo $wz1['asideseri']; ?></td>
<td colspan="2"><?php echo $wz1['bsideseri']; ?></td>
<td colspan="2"><?php echo $wz1['csideseri']; ?></td> 
</tr>
<tr>


<td width="250"><strong>B) Overlock Wastage </strong></td>
<td colspan="2"><?php echo $wz1['aovrloclwaste']; ?></td>
<td colspan="2"><?php echo $wz1['bovrloclwaste']; ?></td>
<td colspan="2"><?php echo $wz1['covrloclwaste']; ?></td> 
</tr>

<tr>
<td colspan="5" width="250"><strong>Total Balance : </strong></td>
<td ><?php echo $wz1['totalbalance']; ?></td>

</tr>

<tr>
<td width="250"><strong>Total Wastage In % : </strong></td>
<td colspan="2"><?php echo $wz1['atotalweight']; ?></td>
<td colspan="2"><?php echo $wz1['btotalweight']; ?></td>
<td colspan="2"><?php echo $wz1['ctotalweight']; ?></td> 
</tr>

 

</table> 

                
              </div>            
              </div>            
              </div>            
                  
           
            <div class="col-12">
              
<a href="ord_complete_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a> 
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button> 
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning mt-4" ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>


            <div class="content-backdrop fade"></div>
          </div> </div>
          <!-- Content wrapper -->
        </div>
         
          
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

<script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
   window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>   
<script type="text/javascript">

    function PrintElem(elem)
    {
		
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="tables.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>