<?php
include "../config.php";
if(!empty($_GET['refno']))
{
 

    $form=$_GET['q'];
   
     $sql1 = "SELECT * FROM $form WHERE refno = '".$_GET['refno']."' ";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
    
 if($count1 == 0)
  {
      $sts=1;
 echo $sts;?>???<?php 
   


 ?>
               
                  
                

                        
         <div class="table-responsive">

<table class="table table-border border-top table-hover">
  <thead class="border-bottom">
    <tr>
      <th style="width:50px">S.No</th>
        
      <th>order&nbsp;No</th> 
      
      <th>item&nbsp;No</th> 
      <!-- <th>Quantity</th> 
      <th>Color</th>  -->
      <th>pieces</th>
      <th>Description</th> 

    </tr>
  </thead>

  <?php
                              $value2=$_GET['q2'];
                            $refno=$_GET['refno'];
                            $i=0;
                            $sno=1;
                         if($value2=='Cutting'){  
            $sql = "SELECT * FROM cutpanel_outward1 e left join cutpanel_outward w on e.cid=w.id  where w.refno='$refno' ";
          
                         }
                         else{
                          $sql = "SELECT * FROM printing_outward1 e left join printing_outward w on e.cid=w.id  where w.refno='$refno' ";
                        
                         }
                         $result = mysqli_query($conn, $sql);
           while($rw = mysqli_fetch_array($result))
		   {
      
         ?>
  <tbody>

    
                 
   
                              
                         
    <tr>
    
      <td  style="padding: 0.3rem;text-align:center">
     
       <?php echo $sno; ?>
        
</td>
<td style="padding: 0.3rem">
               <input  
                                  type="text"
                                  class="form-control"
                                  id="orderno"
                                  value="<?php echo $rw['orderno']; ?>"
                                  name="orderno[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="itemno[]"  id="itemno<?php echo $i;?>"  class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM item_master order by code asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              <!-- <td style="padding: 0.3rem">
              <select name="quality[]" style="width:300px" id="quality<?php echo $i;?>"  class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM quality_master order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['quality']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
             
              <td style="padding: 0.3rem">
              <select name="color[]" style="width:300px" id="color<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM color order by id asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw1 = mysqli_fetch_array($result3))
					{ ?>
                     <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td> -->
             
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  value="<?php echo $rw['pcs']; ?>"
                                  name="pcs[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                                  value="<?php echo $rw['descr']; ?>"
                                  name="descr[]"
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
                                 
                                  
                                </tr>
    <?php
                        $i++;$sno++;
                    }        
                             
                            
                             ?>  
                                             
  </tbody>
</table>
</div>

                <?php 

}
  		


else
  {
    $sts=2;
     echo $sts;
  }
                }

?>

