<?php include "config.php"; ?>


  <?php include "head.php"; ?>
  
  <style>
  body { height: 500px; }
  #header-fixed { 
    position: fixed; 
    top: 0px; display:none;
    background-color:white;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
  var tableOffset = $("#table-1").offset().top;
var $header = $("#table-1 > thead").clone();
var $fixedHeader = $("#header-fixed").append($header);

$(window).bind("scroll", function() {
    var offset = $(this).scrollTop();
    
    if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
        $fixedHeader.show();
    }
    else if (offset < tableOffset) {
        $fixedHeader.hide();
    }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
<?php   $fromdate=$_POST['fromdate'];
                 $todate=$_POST['todate'];
                 $itemno=$_POST['itemno'];
                 $orderno=$_POST['orderno'];
                 ?>
      
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Order Tracking Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));
?>&nbsp; | To : <?php echo date('d-m-Y',strtotime($todate));
?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table  id="table-1" style="width:100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th >Order&nbsp;No.</th>
                  <th >Item&nbsp;No.</th>
                  <th>Order&nbsp;Qty</th>
                  <th>Cutted</th>
                  <th>Printed</th>
                  <th >Sewed</th>
                  <th >Checked</th>
                  <th>Packed</th>
                    <th>Shipped</th>
					<th>Pending&nbsp;Qty</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
               
                 $aa=array('ord_no'=>$orderno,'itemno'=>$itemno);
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
                  $sql4 = " SELECT *,s.id as idn FROM order1 s left join order2 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id where date between '$fromdate' and '$todate' $rr group by ord_no,itemno order by ord_no,itemno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  $id=$wz1['idn'];
                  $orderno=$wz1['ord_no'];
                  $itemno=$wz1['itemno'];

                  $sql3 = " SELECT *,sum(pcs) as pcs FROM cutpanel_outward s left join cutpanel_outward1 s1 on s.id=s1.cid  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by dcno asc";
                 $result3 = mysqli_query($conn, $sql3);
                 $wz = mysqli_fetch_array($result3);

                  $sql2 = " SELECT *,sum(pcs) as pcs FROM printing_outward s left join printing_outward1 s1 on s.id=s1.cid  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by dcno asc";
                 $result2 = mysqli_query($conn, $sql2);
                 $wz2 = mysqli_fetch_array($result2);
                  
                 $sql = " SELECT *,sum(pcs) as pcs FROM sewing_outward s left join sewing_outward1 s1 on s.id=s1.cid  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by dcno asc";
                 $result = mysqli_query($conn, $sql);
                $wz3 = mysqli_fetch_array($result);

                 $sql1 = " SELECT *,sum(pcs) as pcs FROM checking_outward s left join checking_outward1 s1 on s.id=s1.cid  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by dcno asc";
                 $result1 = mysqli_query($conn, $sql1);
                $wz4 = mysqli_fetch_array($result1);

                 $sql5 = " SELECT *,sum(pcs) as totalpcs FROM packing_inward s left join packing_inward1 s1 on s.id=s1.cid  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by dcno asc";
                 $result5 = mysqli_query($conn, $sql5);
                 $wz5 = mysqli_fetch_array($result5);

                 $sql6 = "SELECT *,sum(s1.quantity) as quantity FROM salesinvoice s left join salesinvoice1 s1 on s.id=s1.cid  where s.date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' order by invoiceno asc";
                 $result6 = mysqli_query($conn, $sql6);
                $wz6 = mysqli_fetch_array($result6);
                  
				$pending_qty=$wz1['quantity']-$wz6['quantity'];
                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td style="text-align:center"><?php echo $wz1['ord_no']; ?></td>      
               <td style="text-align:left"><?php echo $wz1['code']; ?></td>      
               <td style="text-align:center"><?php echo $wz1['quantity']; ?></td>      
               <td style="text-align:center"><?php echo $wz['pcs']; ?></td>      
               <td style="text-align:center"><?php echo $wz2['pcs']; ?></td>      
               <td style="text-align:center"><?php echo $wz3['pcs']; ?></td>      
               <td style="text-align:center"><?php echo $wz4['pcs']; ?></td>      
               <td style="text-align:center"><?php echo $wz5['totalpcs']; ?></td>      
               <td style="text-align:center"><?php echo $wz6['quantity']; ?></td>
				<td style="text-align:center"><?php if($pending_qty>0){ echo $pending_qty; } ?></td>			   
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
                            ?>
            </tbody>
</table> 
<table id="header-fixed"></table>
                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="order_tracking_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
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