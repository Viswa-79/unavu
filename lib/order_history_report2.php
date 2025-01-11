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
   $orderno=$_POST['orderno'];
   $itemno=$_POST['itemno'];
   
 ?>
       <div id="mydiv">
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Order History Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?> </h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                 
                
                  <th>Buyer&nbsp;name</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >price</th>
                  <th>shipment&nbsp;Date</th>
                    <th>payment&nbsp;terms</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                $sql4 = " SELECT * FROM order1 s left join order2 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id where date between '$fromdate' and '$todate' and ord_no='$orderno' and itemno='$itemno' ORDER BY ord_no asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
                   
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td style="text-align:right"><?php echo $wz1['price']; ?></td>      
               <td><?php echo $wz1['shipterm']; ?></td>      
               <td><?php echo $wz1['payment']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
             </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                 
                 
                  <th>Follow&nbsp;up</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;description</th>
                  <th>size</th>
                  <th>unit</th>
                  <th>checking&nbsp;type</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT * FROM fabric s left join fabric1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join staff k on s.follow=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' and itemno='$itemno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
                   
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['print']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               <td><?php echo $wz1['checking']; ?></td>      
              
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
             </div>
             <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Computation Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
             
              
                  <th>cut&nbsp;pannel</th>
                  <th>color</th>
                  <th>Date</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM fabric_computation s left join fabric_computation1 s1 on s.id=s1.cid left join item_master m on s.itemno=m.id left join color k on s1.color=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno'  ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
               
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['pannelname']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Process Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                 
                  
                  <th>follow</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                  <th>unit</th>
                      <th>checking&nbsp;type</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM fabric_process s left join fabric_process1 s1 on s.id=s1.cid left join staff k on s.follow=k.id left join item_master m on s1.itemno=m.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' and itemno='$itemno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
             
                  
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['checking']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
              </div>            
                  
          
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Stitching Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                
                
                  <th>prepared&nbsp;by</th>
                  <th>checking&nbsp;type</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM stitching s left join stitching1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join staff k on s.prepared=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' and itemno='$itemno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               
               
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['checking']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
              </div>
                 
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Material Resource Plan Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
               
                
                  <th>mrp&nbsp;plan</th>
                  <th>partiulars</th>
                  <th>unit</th>
                  <th>required&nbsp;qty</th>
                  <th >excess&nbsp;qty</th>
                  <th>Total&nbsp;qty</th>
                    
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM material_resource s left join material_resource1 s1 on s.id=s1.cid left join product_master k on s1.productname=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
               
               <td><?php echo $wz1['mrpplan']; ?></td>      
               <td><?php echo $wz1['productname']; ?></td>      
               <td><?php echo $wz1['uom']; ?></td>      
               <td><?php echo $wz1['reqqty']; ?></td>      
               <td><?php echo $wz1['excess']; ?></td>      
               <td ><?php echo $wz1['excessqty']; ?></td>    
                
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                       </div>
                       
                       <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Printing Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                
                 
                  <th>checking&nbsp;type</th>
                  <th>To</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM printing s left join printing1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join staff k on s.to1=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' and itemno='$itemno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               
                
               <td ><?php echo $wz1['checking']; ?></td>      
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
         </div>

            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Packing Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                 
                 
                  <th>To</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>quantity</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM packing s left join packing1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join staff k on s.to1=k.id where date between '$fromdate' and '$todate' and s.orderno='$orderno' and itemno='$itemno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                 
                 
                  <th>Party&nbsp;Name</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM fabric_inward s left join fabric_inward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Outward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>party&nbsp;name</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM fabric_outward s left join fabric_outward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>

            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Fabric Stock Transfer Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>from&nbsp;order&nbsp;no</th>
                  <th>from&nbsp;item&nbsp;no</th>
                  <th>to&nbsp;order&nbsp;no</th>
                  <th>to&nbsp;item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th>quantity</th>
                  
                    <th>unit

                    </th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM fabric_stock s left join fabric_stock1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id  left join color j on s1.color=j.id where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                    $sql = " SELECT *FROM item_master e  WHERE id='".$wz1['toitem']."'";
                    $result =mysqli_query($conn, $sql);
                    $so=mysqli_fetch_array($result);
                    ?>

                     
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['orderno']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['toorder']; ?></td>      
               <td><?php echo $so['code']; ?></td>      
               <td ><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
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
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Process Outward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>process</th>
                  <th>party&nbsp;name</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                  <th>unit
                      
                      </th>
                      <th>Meters</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM process_outward s left join process_outward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id  left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['process']; ?></td>      
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               <td><?php echo $wz1['mtrs']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>

            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Process Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>process&nbsp;name</th>
                  <th>party&nbsp;name</th>
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th >item&nbsp;Description</th>
                  <th>Size</th>
                  <th>unit
                      
                      </th>
                      <th>meters</th>
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM process_inward s left join process_inward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id  left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
              
             
               <td ><?php echo $wz1['process']; ?></td>      
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td ><?php echo $wz1['descr']; ?></td>      
               <td><?php echo $wz1['size']; ?></td>      
               <td><?php echo $wz1['unit']; ?></td>      
               <td><?php echo $wz1['mtrs']; ?></td>      
               
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Cutting Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                    <th >S.No</th>
                    <th>item&nbsp;no</th>
                  <th>cut&nbsp;pannel&nbsp;name</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th>width</th>
                  <th>length</th>
                  <th>No.of bits</th>
                  <th>consumption</th>
                  <th>quantity</th>
                  <th>wastage</th>
                  <th>Total&nbsp;meters </th>
                    
                    
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s.orderno as orderno FROM cutting s left join cutting1 s1 on s.id=s1.cid left join item_master m on s.itemno=m.id   where date between '$fromdate' and '$todate' and s.orderno='$orderno' ORDER BY s.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td ><?php echo $wz1['code']; ?></td>      
               <td ><?php echo $wz1['pannelname']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td><?php echo $wz1['width']; ?></td>      
               <td><?php echo $wz1['length']; ?></td>      
               <td><?php echo $wz1['bits']; ?></td>      
               <td><?php echo $wz1['consumption']; ?></td>      
               <td ><?php echo $wz1['quantity']; ?></td>      
               <td ><?php echo $wz1['wastage']; ?></td>      
               <td><?php echo $wz1['totalmeters']; ?></td>      
        
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Cutpanel Outward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>party&nbsp;name</th>
                  <th>process</th>
                
                  <th>item&nbsp;no</th>
                  <th>Quality</th>
                  <th>color</th>
                  <th>pieces</th>
                  <th >Description</th>
                 
	</tr>
                </thead>
                <tbody>
                  <?php 
                 $sno=1;
              
                           
                  $sql4 = " SELECT *,s1.orderno as orderno FROM cutpanel_outward s left join cutpanel_outward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4)){
                  

                     ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td ><?php echo $wz1['name']; ?></td>      
               <td ><?php echo $wz1['process']; ?></td>      
                 
               <td ><?php echo $wz1['code']; ?></td>      
               <td><?php echo $wz1['quality']; ?></td>      
               <td><?php echo $wz1['color']; ?></td>      
               <td ><?php echo $wz1['pcs']; ?></td>      
               <td><?php echo $wz1['descr']; ?></td>      
             
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Cutpanel Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                 <tr >
                 <th >S.No</th>
                 <th>party&nbsp;name</th>
                 <th>process</th>
               
                 <th>item&nbsp;no</th>
                 <th>Quality</th>
                 <th>color</th>
                 <th>pieces</th>
                 <th >Description</th>
                
 </tr>
               </thead>
               <tbody>
                 <?php 
                $sno=1;
             
                          
                  $sql4 = " SELECT *,s1.orderno as orderno FROM cutpanel_inward s left join cutpanel_inward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                $result4 = mysqli_query($conn, $sql4);
                while($wz1 = mysqli_fetch_array($result4)){
                 

                    ?>
                   <tr>
              <td style="text-align:center"><?php echo $sno; ?></td>      
              <td ><?php echo $wz1['name']; ?></td>      
              <td ><?php echo $wz1['process']; ?></td>      
                
              <td ><?php echo $wz1['code']; ?></td>      
              <td><?php echo $wz1['quality']; ?></td>      
              <td><?php echo $wz1['color']; ?></td>      
              <td ><?php echo $wz1['pcs']; ?></td>      
              <td><?php echo $wz1['descr']; ?></td>      
            
                 </tr>
          
            <?php $sno++;
                }
            ?>
           </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Printing Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                 <tr >
                 <th >S.No</th>
                 <th>party&nbsp;name</th>
                 <th>process</th>
                 <th>item&nbsp;no</th>
                 <th>Quality</th>
                 <th>color</th>
                 <th>pieces</th>
                 <th >Description</th>
                
 </tr>
               </thead>
               <tbody>
                 <?php 
                $sno=1;
             
                          
                  $sql4 = " SELECT *,s1.orderno as orderno FROM printing_inward s left join printing_inward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                $result4 = mysqli_query($conn, $sql4);
                while($wz1 = mysqli_fetch_array($result4)){
                 

                    ?>
                   <tr>
              <td style="text-align:center"><?php echo $sno; ?></td>      
              <td ><?php echo $wz1['name']; ?></td>      
                
              <td ><?php echo $wz1['process']; ?></td>      
              <td ><?php echo $wz1['code']; ?></td>      
              <td><?php echo $wz1['quality']; ?></td>      
              <td><?php echo $wz1['color']; ?></td>      
              <td ><?php echo $wz1['pcs']; ?></td>      
              <td><?php echo $wz1['descr']; ?></td>      
            
                 </tr>
          
            <?php $sno++;
                }
            ?>
           </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Printing Outward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                 <tr >
                 <th >S.No</th>
                 <th>party&nbsp;name</th>
                 <th>process</th>
               
                 <th>item&nbsp;no</th>
                 <th>Quality</th>
                 <th>color</th>
                 <th>pieces</th>
                 <th >Description</th>
                
 </tr>
               </thead>
               <tbody>
                 <?php 
                $sno=1;
             
                          
                  $sql4 = " SELECT *,s1.orderno as orderno FROM printing_outward s left join printing_outward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id left join process i on s.process=i.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                $result4 = mysqli_query($conn, $sql4);
                while($wz1 = mysqli_fetch_array($result4)){
                 

                    ?>
                   <tr>
              <td style="text-align:center"><?php echo $sno; ?></td>      
              <td ><?php echo $wz1['name']; ?></td>      
              <td ><?php echo $wz1['process']; ?></td>      
                
              <td ><?php echo $wz1['code']; ?></td>      
              <td><?php echo $wz1['quality']; ?></td>      
              <td><?php echo $wz1['color']; ?></td>      
              <td ><?php echo $wz1['pcs']; ?></td>      
              <td><?php echo $wz1['descr']; ?></td>      
            
                 </tr>
          
            <?php $sno++;
                }
            ?>
           </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Sewing Inward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                 <tr >
                 <th >S.No</th>
                 <th>party&nbsp;name</th>
                 <th>item&nbsp;no</th>
                 <th>Quality</th>
                 <th>color</th>
                 <th>pieces</th>
                 <th >Description</th>
                
 </tr>
               </thead>
               <tbody>
                 <?php 
                $sno=1;
             
                          
                $sql4 = " SELECT *,s1.orderno as orderno,s1.descr as descr FROM sewing_inward s left join sewing_inward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                $result4 = mysqli_query($conn, $sql4);
                while($wz1 = mysqli_fetch_array($result4)){
                 

                    ?>
                   <tr>
              <td style="text-align:center"><?php echo $sno; ?></td>      
              <td ><?php echo $wz1['name']; ?></td>                     
              <td ><?php echo $wz1['code']; ?></td>      
              <td><?php echo $wz1['quality']; ?></td>      
              <td><?php echo $wz1['color']; ?></td>      
              <td ><?php echo $wz1['pcs']; ?></td>      
              <td><?php echo $wz1['descr']; ?></td>      
            
                 </tr>
          
            <?php $sno++;
                }
            ?>
           </tbody>
</table> 

                </div>
              </div>            
                </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div  class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h3>Sewing Outward Report</h3>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <h5 type="text">From : <?php echo date('d/m/Y',strtotime($_POST['fromdate']));?>&nbsp; | To : <?php echo date('d/m/Y',strtotime($_POST['todate']));?> | Order No.: <?php echo $orderno;?></h5>
</div>
                <div class="card-body text-nowrap table-responsive">
                <table  id="ConvertTable" width="100%" class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                 <tr >
                 <th >S.No</th>
                 <th>party&nbsp;name</th>
                 
                 <th>item&nbsp;no</th>
                 <th>Quality</th>
                 <th>color</th>
                 <th>pieces</th>
                 <th >Description</th>
                
 </tr>
               </thead>
               <tbody>
                 <?php 
                $sno=1;
             
                          
                $sql4 = " SELECT *,s1.orderno as orderno,s1.descr as descr FROM sewing_outward s left join sewing_outward1 s1 on s.id=s1.cid left join item_master m on s1.itemno=m.id left join partymaster k on s.partyname=k.id left join color j on s1.color=j.id  where date between '$fromdate' and '$todate' and s1.orderno='$orderno' and itemno='$itemno' ORDER BY s1.orderno asc";
                $result4 = mysqli_query($conn, $sql4);
                while($wz1 = mysqli_fetch_array($result4)){
                 

                    ?>
                   <tr>
              <td style="text-align:center"><?php echo $sno; ?></td>      
              <td ><?php echo $wz1['name']; ?></td>      
            
              <td ><?php echo $wz1['code']; ?></td>      
              <td><?php echo $wz1['quality']; ?></td>      
              <td><?php echo $wz1['color']; ?></td>      
              <td ><?php echo $wz1['pcs']; ?></td>      
              <td><?php echo $wz1['descr']; ?></td>      
            
                 </tr>
          
            <?php $sno++;
                }
            ?>
           </tbody>
</table> 

                </div>
              </div>            
                </div>

            
           </div>
            <div  class="container-xxl flex-grow-1 container-p-y">
                        
                  
           
            <div class="col-12">
              
<a href="order_history_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>&nbsp;&nbsp;
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