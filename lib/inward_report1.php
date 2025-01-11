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
   $fromdate=$_POST['fromdate'];
   $todate=$_POST['todate'];
   $rtype=$_POST['rtype'];
   $partyname=$_POST['partyname'];
   $orderno=$_POST['orderno'];
   $itemno=$_POST['itemno'];
 
   $sql2 = " SELECT * FROM process where process='$rtype'";
   $result2 = mysqli_query($conn, $sql2);
   $rw1 = mysqli_fetch_array($result2);
   if($rtype=='Cutting'){
    $table = "cutting_inward";
    $tables = "cutting_inward1";
    $title="meters";
    $value="mtrs";
   }
 else if($rtype=='Printing'){
    $table = "printing_inward";
    $tables = "printing_inward1"; 
    $title="pcs";
    $value="pcs";
   }
  else if($rtype=='Packing'){
    $table = "packing_inward";
    $tables = "packing_inward1"; 
    $title="pcs";
    $value="pcs";
   }
  else if($rtype=='Sewing'){
    $table = "sewing_inward";
    $tables = "sewing_inward1"; 
    $title="pcs";
    $value="pcs";
   }
  else if($rtype=='Checking'){
    $table = "checking_inward";
    $tables = "checking_inward1";
     $title="pcs";
     $value="pcs";
   }
    $table;
    $tables;
 ?>
      
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3><?php
                     echo $rtype;?> Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));
?>&nbsp; | To : <?php echo date('d-m-Y',strtotime($todate));
?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table  id="ConvertTable" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr>
                  <th>S.No</th>
                  <th>book&nbsp;no</th>
                  <th>Date</th>
                  <th>Order&nbsp;No.</th>
                  <th>item&nbsp;No.</th>
                  <th>ref</th>
                  <th>party&nbsp;name</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th ><?php echo $title;?></th>
                  
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;

                 $aa=array('orderno'=>$orderno,'itemno'=>$itemno,'partyname'=>$partyname);
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
                    
                  $rr='and'.$rr;  
                    
                 }
                   else
                 
                 { 
                    
                  $rr='';  
                    
                 } 
                             
                  $pcs1=0;
                 $sql4 = " SELECT * FROM $table s left join $tables s1 on s.id=s1.cid left join partymaster m on s.partyname=m.id left join item_master a on s1.itemno=a.id left join color b on s1.color=b.id where date between '$fromdate' and '$todate' $rr order by date asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  $dt=date('d-m-Y',strtotime($wz1['date']));
                  $val = $wz1[$value];
                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td><?php echo $wz1['dcno']; ?></td>      
               <td nowrap><?php echo $dt; ?></td>      
               <td><?php echo $wz1['orderno']; ?></td>      
               <td><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['ref']; ?></td>      
               <td><?php echo $wz1['name']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td style="text-align:right"><?php echo $val; ?></td>      
                
               
             
               
                  </tr>
           
             <?php $sno++;
                 $pcs1+=number_format((float)$val, 2, '.', '');
                 }
                 
                 ?> 
            <tr style="font-size:16px">
              <td colspan="8"></td> 
              <td ><b>TOTAL<b></td>
            <td style="text-align:right"><b><?php echo $pcs1;?><b></td>
            </tr>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="inward_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>&nbsp;&nbsp;
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