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
      
      <th>item&nbsp;No</th> 
      <th>pieces</th>
      <th>Description</th> 

    </tr>
  </thead>

  <?php
                            
                            $refno=$_GET['refno'];
                            $i=0;
                            $sno=1;
                           
            $sql = "SELECT * FROM checking_outward1 e left join checking_outward w on e.cid=w.id  where w.refno='$refno' ";
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
                                  style="width:200px"
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
               <input 
                                  type="text"
                                  class="form-control"
                                  id="pcs<?php echo $i;?>"
                                  value="<?php echo $rw['pcs']; ?>"
                                  name="pcs[]"
                                  style="width:200px"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="descr<?php echo $i;?>"
                                  value="<?php echo $rw['descr']; ?>"
                                  name="descr[]"
                                  style="width:600px"
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

