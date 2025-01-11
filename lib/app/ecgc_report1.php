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

          
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
#myInput {
 border-radius: 10px;
background-image: url('/css/searchicon.png');
background-color: lavender; /* Add a search icon to input */
background-position: 10px 12px; /* Position the search icon */
background-repeat: no-repeat; /* Do not repeat the icon image */
width: 100%; /* Full-width */
font-size: 16px; /* Increase font-size */
padding: 12px 20px 12px 40px; /* Add some padding */
border: 1px solid #ddd; /* Add a grey border */
margin-bottom: 12px; /* Add some space below the input */
}


</style>
<script>
const myFunction = () => {
const trs = document.querySelectorAll('#myTable tr:not(.header)')
const filter = document.querySelector('#myInput').value
const regex = new RegExp(filter, 'i')
const isFoundInTds = td => regex.test(td.innerHTML)
const isFound = childrenArr => childrenArr.some(isFoundInTds)
const setTrStyleDisplay = ({ style, children }) => {
style.display = isFound([
...children // <-- All columns
]) ? '' : 'none' 
}

trs.forEach(setTrStyleDisplay)
}
</script>

<script>
$(document).ready(function(){
$("#myInput").on("keyup", function() {
alert("hello");
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->
            <?php
   
   $rz1=mysqli_query($conn,"select * from address");
   $rz2=mysqli_fetch_array($rz1);
   ?>
            <?php
   $fromdate=$_POST['fromdate'];
   $todate=$_POST['todate'];
   
 ?>
      
            <div  class="container-xxl flex-grow-1 container-p-y">
            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            
            </h1>
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>ECGC Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo $fromdate;?>&nbsp; | To : <?php echo $todate;?> </h5>
</div>
                <div class="card-body  table-responsive">
                <table  id="ConvertTable" class=" table table-bordered text-nowrap" style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th >Buyer&nbsp;code</th>
                  <th >Shipment Date (bl date)</th>
                  <th >Value of shipments made<br>during the quarter in INR</th>
                  <th >Terms of payment with<br>maximum credit period</th>
                  <th >outstanding Amount  at the<br>end of the quarter INR</th>
                  <th>Due Date</th>
                  <th>Realisation Date</th>
                  <th>Realisation Value <br> In Currency</th>
                  <th >Buyer&nbsp;Name</th>
				
                   
                    
	</tr>
                </thead>
                <tbody id=myTable>
                  <?php 
                 $sno=1;
                 $tinvinrvalue=0;
                 $tpaymentreceived=0;
                 $toutstanding=0;

                 $t0="SELECT * FROM partymaster order by name ASC";
               //  echo $t0;
                 $sql1= mysqli_query($conn,$t0);
                 while($wz1= mysqli_fetch_array($sql1)) 
                    {
                    
                    $name=$wz1['id'];
                       
                 $t0="SELECT *,sum(invinrvalue) as invinrvalue,s.realizationdate as realizationdate FROM salesinvoice s  where s.partyname='$name' and s.date between '$fromdate' and '$todate'";
               // echo $t0;
                 $get = mysqli_query($conn,$t0);
                 $row=mysqli_fetch_array($get);
                  $invinrvalue=number_format((float)$row['invinrvalue'], 3, '.', '');
                  
                  
                  
                  $t0="SELECT *,sum(invinrvalue) as invinrvalue,s.realizationdate as realizationdate FROM salesinvoice s where s.partyname='$name' and s.date between '$fromdate' and '$todate' and paymentreceived='Yes'";
                // echo $t0;
                 $get = mysqli_query($conn,$t0);
                 $row=mysqli_fetch_array($get);
                  $paymentreceived=number_format((float)$row['invinrvalue'], 3, '.', '');
                  
                   
                   
                   $outstanding=number_format((float)($invinrvalue-$paymentreceived), 3, '.', '');
                   
                   if(round($invinrvalue)!=0)
                   {
               
                    ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>            
               <td style="text-align:center"><?php echo "" ?></td>            
               <td align="right"></td>      
               <td align="right"><?php echo $invinrvalue; ?></td>      
               <td ><?php echo $row['terms']; ?></td>                
               <td align="right"><?php echo $outstanding; ?></td> 
               <td ></td>      
               <td ></td>      
               <td ><?php echo  $row['realisedvaluecurrency']; ?></td>      
               <td ><?php echo $wz1['name']; ?></td>      
              
               
             
               
                  </tr>
           
             <?php
             $tinvinrvalue+=$invinrvalue;
             $tpaymentreceived+=$paymentreceived;
             $toutstanding+=$outstanding;

             $sno++;
                 }
                }
             ?>
             <tr>
<td colspan="3" align="right"style="padding-right:15px;">Total</td>
<td align="right"><?php echo number_format((float)($tinvinrvalue), 3, '.', '');?></td>
<td colspan="7"></td>





             </tr>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="col-12">
              
<a href="ecgc_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
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