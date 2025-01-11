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
  $partyname=$_POST['partyname'];
  $quality=$_POST['quality'];
  $orderno=$_POST['orderno'];
  $aa=array('orderno'=>$orderno,'p1.quality'=>$quality,'partyname'=>$partyname);
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
 ?>
           
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px"> 
                      <h3>Processing Ledger Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($fromdate));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($todate));?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                  <table  id="ConvertTable" class=" table table-bordered " style="border-collapse:collapse;width:100%" border="1">
                  <thead >
                 
                  
                  <tr >
                  <th >S.No</th>
                  <th>Dc&nbsp;No.</th>
                  <th>Date</th>
				          <th>Partyname</th>
                  <th>Orderno</th>
                  <th>color</th>
				          <th >Quality</th>
                  <th>Outward</th>
                  <th>Inward</th>
                  <th>Balance</th>
                    
                    </tr>
                </thead>
                <tbody>
                  <?php 
				
                 $tomtrs=0;
                 $toamount=0;
                 $todelmtrs=0;
                

 $sql1="SELECT A.dcno AS dcno, A.Rdate AS Rdate,A.orderno AS Orderno,A.Rwgt AS Rwgt,A.Dwgt AS Dwgt,@c := @c + (A.Dwgt - A.Rwgt) AS balance,A.Name As Partyname,A.quality as Quality FROM (                
  SELECT v1.dcno AS dcno,v1.date AS Rdate,p1.quality as quality,p1.orderno as orderno,p1.mtrs AS Rwgt,'' AS Dwgt,v1.partyname AS Name FROM process_inward AS v1 left join process_inward1 as p1 on p1.cid=v1.id where v1.date<'$fromdate' $rr                
  union SELECT v1.dcno AS dcno,v1.date AS Rdate,p1.quality as quality,p1.orderno as orderno,'' AS Rwgt,p1.mtrs AS Dwgt,v1.partyname AS Name FROM process_outward v1 left join process_outward1 as p1 on p1.cid=v1.id where v1.date<'$fromdate' $rr
  ) AS A JOIN (SELECT @c := 0) s ";
  $result41 = mysqli_query($conn, $sql1);
	while($wz = mysqli_fetch_array($result41))
		{
    
      $tomtrs1+= number_format((float)$wz['Rwgt'], 3, '.', '');
		$todelmtrs1+=number_format((float)$wz['Dwgt'], 3, '.', '');
               $opening= $todelmtrs1 - $tomtrs1;
         
                }  
			?>
            <tr>
               <td style="text-align:center"></td>      
               <td nowrap style="text-align:center"></td>      
               <td nowrap></td>  
               <td></td>          
               <td ></td>     
               <td ></td>     
               <td nowrap><b>OPENING BALANCE</b></td> 
               <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$todelmtrs1, 3, '.', '');?><b></td>       
                <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$tomtrs1, 3, '.', '');?><b></td>
               <td style="text-align:right"><?php echo number_format((float)$opening, 3, '.', ''); ?></td>            
             </tr>
<?php			 
				
                 $sno=1;
                 $tomtrs=0;
                 $toamount=0;
                 $todelmtrs=0;
                

  $sql1="SELECT A.dcno AS dcno, A.Rdate AS Rdate,A.orderno AS Orderno, A.Rwgt AS Rwgt,A.Dwgt AS Dwgt,@c := @c + (A.Dwgt - A.Rwgt) AS balance,A.Name As Partyname,A.quality as Quality,A.color as Color FROM (                
  SELECT v1.dcno AS dcno,v1.date AS Rdate,p1.quality as quality,p1.orderno as orderno,p1.color as color,p1.mtrs AS Rwgt,'' AS Dwgt,v1.partyname AS Name FROM process_inward AS v1 left join process_inward1 as p1 on p1.cid=v1.id where v1.date between '$fromdate' and '$todate' and p1.mtrs!=''  $rr                
  union SELECT v1.dcno AS dcno,v1.date AS Rdate,p1.quality as quality,p1.orderno as orderno,p1.color as color,'' AS Rwgt,p1.mtrs AS Dwgt,v1.partyname AS Name FROM process_outward v1 left join process_outward1 as p1 on p1.cid=v1.id where v1.date between '$fromdate' and '$todate' and p1.mtrs!='' $rr
  ) AS A JOIN (SELECT @c := '$opening') s  order by Rdate Asc";
  $result41 = mysqli_query($conn, $sql1);
	while($wz = mysqli_fetch_array($result41))
		{
      
                 
                  $party = $wz['Partyname'];
                  $quality = $wz['Quality'];
                  $date= date('d/m/Y',strtotime($wz['Rdate']));
                  $color=$wz['Color'];
                 
                  $sql4 = " SELECT * FROM partymaster WHERE id='$party'";
                  $result4 = mysqli_query($conn, $sql4);
                  $wz1 = mysqli_fetch_array($result4);

                  $sql5 = " SELECT * FROM quality_master WHERE id='$quality'";
                  $result5 = mysqli_query($conn, $sql5);
                  $wz2 = mysqli_fetch_array($result5);

                  $sql6 = " SELECT * FROM color WHERE id='$color'";
                  $result6 = mysqli_query($conn, $sql6);
                  $wz3 = mysqli_fetch_array($result6);

                  ?>
                
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td nowrap style="text-align:center"><?php echo $wz['dcno']; ?></td>      
               <td nowrap><?php echo $date; ?></td>  
               <td><?php echo $wz1['name']; ?></td>          
               <td ><?php echo $wz['Orderno']; ?></td>     
               <td ><?php echo $wz3['color']; ?></td>     
               <td nowrap><?php echo $wz2['quality']; ?></td>
               <td style="text-align:right"><?php if($wz['Dwgt']!=''){ echo number_format((float)$wz['Dwgt'], 3, '.', ''); } ?></td>
               <td style="text-align:right"><?php if($wz['Rwgt']!=''){ echo number_format((float)$wz['Rwgt'], 3, '.', ''); } ?></td>           
                      
               <td style="text-align:right"><?php echo number_format((float)$wz['balance'], 3, '.', ''); ?></td>            
             </tr>
          

                  <?php 
		$todelmtrs+=number_format((float)$wz['Dwgt'], 3, '.', '');
        $tomtrs+= number_format((float)$wz['Rwgt'], 3, '.', '');
               $toamount=$todelmtrs - $tomtrs;
               $sno++;
                } 
              
$tomtrs2=$tomtrs1+$tomtrs;
$todelmtrs2=$todelmtrs1+$todelmtrs;	

 $toamount2= $todelmtrs2 - $tomtrs2;			
             ?>
             <tr>
              <td colspan="6"></td>
              <td style="font-size:16px"><b>TOTAL <b></td>
               <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$todelmtrs, 3, '.', '');?><b></td>
              <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$tomtrs, 3, '.', '');?><b></td>
             
              <td style="text-align:right;font-size:16px"><b><b></td>
                </tr>
                
             <tr>
              <td colspan="6"></td>
              <td nowrap style="font-size:16px"><b>CLOSING BALANCE <b></td>
              <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$todelmtrs2, 3, '.', '');?><b></td>
              <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$tomtrs2, 3, '.', '');?><b></td>
			  
        <td style="text-align:right;font-size:16px"><b><?php echo number_format((float)$toamount2, 3, '.', '');?><b></td>
                </tr>

            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="ledger.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>&nbsp;&nbsp;
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning mt-4" ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>
        
</div> </div>
            <!-- / Content -->

          

            <div class="content-backdrop fade"></div>
          </div> </div>
          <!-- Content wrapper -->
         
          
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