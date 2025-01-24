<?php include "config.php"; ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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

           
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Stitching Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y');?>&nbsp; | To : <?php echo date('d/m/Y');?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive" >
                <table  class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                  <tr >
                  <th >S.No</th>
                  <th>Date</th>
                  <th >Book&nbsp;No.</th>
                  <th>File&nbsp;&nbsp;No.</th>
                  <th >Order&nbsp;No.</th>
                    <th>po&nbsp;&nbsp;no</th>
                    <th>Item&nbsp;&nbsp;No</th>
                    <th>Item&nbsp;&nbsp;Description</th>
					<th>Print</th>
					<th>Quality</th>
					<th>size</th>
					<th>quantity</th>
					<th>unit</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
                 $sql4 = " SELECT * FROM stitching s left join stitching1 s1 on s.id=s1.cid order by book asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4))
                 {
                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td nowrap><?php echo $wz1['date']; ?></td>      
               <td><?php echo $wz1['book']; ?></td>      
               <td><?php echo $wz1['flref']; ?></td>      
               <td><?php echo $wz1['orderno']; ?></td>      
               <td><?php echo $wz1['pono']; ?></td>      
               <td><?php echo $wz1['itemno']; ?></td>      
               <td><?php echo $wz1['itemdesc']; ?></td>      
               <td><?php echo $wz1['print']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>     
               <td><?php echo $wz1['quantity']; ?></td>          
               <td><?php echo $wz1['unit']; ?></td>     
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="stitching_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>&nbsp;&nbsp;
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
</html>

<script src="jquery-1.4.4.min.js" type="text/javascript"></script>



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