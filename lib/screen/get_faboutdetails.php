<?php
include "../config.php";
if(!empty($_GET['refno']))
{
 

    $form=$_GET['q'];
     $sql1 = "SELECT * FROM $form WHERE refno = '".$_GET['refno']."' ";
    $result1 = mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($result1);
    
    if($count1 == 0){
      $sts=1;
 echo $sts;?>???<?php 
   


 ?>
               
                  
                

                        
         <div class="table-responsive">

<table class="table table-border border-top table-hover">
  <thead class="border-bottom">
    <tr>
      <th style="width:50px">S.No</th>
      <th>order&nbsp;No</th> 
      <th>Ref&nbsp;no</th> 
      <th>item&nbsp;No</th> 
      <th>quality</th>
      <!-- <th>Required&nbsp;qty</th> -->
     
      <th>width</th>  
      <th>color</th> 
      <th>Bales</th> 
      <th>Bale&nbsp;No's</th> 
      <th>pieces</th>
      <th>meters</th> 
      <th>Description</th> 
       

      
      
    </tr>
  </thead>

  <?php
                            
                            $refno=$_GET['refno'];
                            $i=0;
                            $sno=1;
                           
            $sql = "SELECT * FROM fabric_outward1 e left join fabric_outward w on e.cid=w.id  where w.refno='$refno' ";
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
               <input
                                  type="text"
                                  class="form-control"
                                  id="ref<?php echo $i;?>"
                                  value="<?php echo $rw['ref']; ?>"
                                  name="ref[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="itemno[]" style="width:200px" id="itemno<?php echo $i;?>"  class="select form-select" >
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
              <td style="padding: 0.3rem">
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
              <!-- <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="reqqty<?php echo $i;?>"
                                  value="<?php echo $rw['reqqty']; ?>"
                                  name="reqqty[]"
                                  readonly
                                  aria-label="Product barcode"/>
                                     
              </td> -->
             
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="width<?php echo $i;?>"
                                  value="<?php echo $rw['width']; ?>"
                                  name="width[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
              <select name="color[]" style="width:300px" id="color<?php echo $i;?>"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM color order by id asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw1 = mysqli_fetch_array($result3))
					{ ?>
                     <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td>
              <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="bundle"
                                    
                                    name="bundle[]"
                                  value=<?php echo $rw['bundle']; ?>
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="bale<?php echo $i;?>"
                                  value="<?php echo $rw['bale']; ?>"
                                  name="bale[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
                                 <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  value="<?php echo $rw['pcs']; ?>"
                                  name="pcs[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="mtrs<?php echo $i;?>"
                                  value="<?php echo $rw['mtrs']; ?>"
                                  name="mtrs[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                                  value="<?php echo $rw['descr']; ?>"
                                  name="descr[]"
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

