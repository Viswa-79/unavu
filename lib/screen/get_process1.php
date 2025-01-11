<?php
include "../config.php";
if(!empty($_GET['id']))
{
  $dc=$_GET['id'];

 ?>
               
                  
               <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th>order&nbsp;No</th> 
                                  <th>itemno&nbsp;No</th> 
                                  <th>Fabric&nbsp;quality</th> 
                                  <th style="padding-right:100px">HSN</th> 
                                  <th>color</th> 
                                  <th>pieces</th>
                                  <th>delivered&nbsp;meter</th> 
                                  <th>received&nbsp;meter</th>
                                  <th>loss&nbsp;qty</th> 
                                  <!-- <th>Amount</th>  -->
                                  <!-- <th>Fabric&nbsp;qty</th>  -->

                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                    $sno=1; $i=0;           
                        $sql1 = "SELECT *,m.dcno as dcno FROM process_outward m left join process_outward1 n on m.id=n.cid WHERE refno = '".$_GET['id']."'";
                       $result1 = mysqli_query($conn, $sql1);
                       while($rows=mysqli_fetch_array($result1)){
                        $ordno= $rows['orderno'];
                        $item= $rows['itemno'];
                        $qty= $rows['quality'];
                        $color= $rows['color'];
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">                 
                                   <?php echo $sno; ?>
                                     </td>

                <td style="padding: 0.3rem">
                 <input  
                                    type="text"
                                    class="form-control"
                                    id="orderno<?php echo $i;?>"
                                    value="<?php echo $rows['orderno']; ?>"
                                    name="orderno[]"
                                    aria-label="Product barcode"/>      
                </td>

                <td style="padding: 0.3rem">
                               <select name="itemno[]"    style="width:200px" id="itemno<?php echo $i;?>" class="select form-select" onchange="get_quality(this.id,this.value);get_item_details(this.id,this.value);" >
                                <option value="">Select</option>
                            		<?php 
					$sql = "SELECT * FROM order2 m left join order1 s on s.id=m.cid join item_master n on m.itemno=n.id where s.ord_no='$ordno' order by itemno asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($item==$rows['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="quality[]"    style="width:300px" id="quality<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM costing4 m left join costing s on s.id=m.cid join quality_master n on m.quality=n.id where s.orderno='$ordno' order by m.quality asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($qty==$rows['quality']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['quality'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="hsncode<?php echo $i;?>"
                                   value="<?php echo $rows['hsncode'];?>"
                                    name="hsncode[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                               <select name="color[]"    style="width:200px" id="color<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM color order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>       
     <option <?php if($color==$rows['color']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pcs<?php echo $i;?>"
                                   value="<?php echo $rows['pcs'];?>"
                                    name="pcs[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="delmeter<?php echo $i;?>"
                                    value="<?php echo $rows['mtrs'];?>"
                                    name="delmeter[]"
                                    onkeyUp="tott(mtrs<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="mtrs<?php echo $i;?>"
                                    onkeyUp="tott(mtrs<?php echo $i;?>.id);"
                                    name="mtrs[]"                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="loss<?php echo $i;?>"
                                  onkeyUp="tott(mtrs<?php echo $i;?>.id);"
                                  name="loss[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <!--  <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    onKeyDown="ee1(this.id);"
                                    name="amount[]"
                                    aria-label="Product barcode"/> 
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="descr<?php echo $i;?>"
                                 
                                    name="descr[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/> 
                                       
                </td> -->
                                       
                <!-- <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="fabqty<?php echo $i;?>"
                               
                                  name="fabqty[]"
                                  aria-label="Product barcode"/>
                                     
              </td> -->
              
                                </tr>
                                 
                <?php 
$sno++;
$i++;
}       ?>
                              </tbody>
                            </table>
<?php

                }

?>

