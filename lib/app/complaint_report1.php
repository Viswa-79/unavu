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
 ?>
      
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Complaint Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo $fromdate;?>&nbsp; | To : <?php echo $todate;?> </h5>
</div>
                <div class="card-body  ">
                <table  class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
					<th>Party Name</th>
                    <th >Invoice No</th>
                    <th>Date</th>
                    <th>Order No</th>
					<th>Item No</th>
                    <th>Customers Complaint</th>
                    <th>Deducted Amount</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;




                 
                 $aa=array('partyname'=>$partyname);
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







                 $sql4 = " SELECT * FROM salesinvoice e left join salesinvoice1 a on e.id=a.cid left join item_master d on a.itemno=d.id left join partymaster f on e.partyname=f.id where date between '$fromdate' and '$todate' $rr order by invoiceno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                    $date=date('d/m/Y',strtotime($wz1['date']));

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>            
               <td nowrap><?php echo $wz1['name']; ?></td>      
               <td nowrap><?php echo $wz1['invoiceno']; ?></td>      
               <td nowrap><?php echo $date; ?></td>      
               <td nowrap><?php echo $wz1['orderno']; ?></td>      
               <td nowrap><?php echo $wz1['code']; ?></td>      
               <td nowrap></td>      
               <td nowrap style="text-align:right;"><?php echo number_format((float)$wz1['othercharges'], 2, '.', '');?></td></td>      
              
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="complaint_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>&nbsp;&nbsp;
           <!-- / Content -->

          

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