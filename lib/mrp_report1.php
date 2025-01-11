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
  
 ?>
           
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Material Resource Planning </h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo $fromdate;?>&nbsp; | To : <?php echo $todate;?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table  id="ConvertTable" class=" table table-bordered "style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr>
                  <th>S.No</th>
                  <th>Order&nbsp;No.</th>
                  <th>Date</th>
				  <th>particulars</th>
                  <th>Req&nbsp;quantity</th>
                  <th>Excess&nbsp;(%)</th>
                  <th>Excess&nbsp;qty</th>
                  
                    </tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
                 $sql4 = " SELECT *,s.id as idn FROM material_resource s left join material_resource1 s1 on s.id=s1.cid left join product_master c on s1.productname=c.id where date between '$fromdate' and '$todate' order by orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4))
                 {
                  $id = $wz1['idn'];
                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td><a href="material_resource_upd.php?cid=<?php echo base64_encode($id);?>" target="blank" ><?php echo $wz1['orderno']; ?></a></td>      
               <td nowrap><?php echo $wz1['date']; ?></td>      
               <td><?php echo $wz1['productname']; ?></td>      
               <td><?php echo $wz1['reqqty']; ?></td>          
               <td><?php echo $wz1['excess']; ?></td>     
               <td><?php echo $wz1['excessqty']; ?></td>      
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
            <div class="col-12">
              
<a href="mrp_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>&nbsp;&nbsp;
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning mt-4" ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>
     
</div> </div>
           
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