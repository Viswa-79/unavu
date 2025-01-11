<?php
include "../config.php";
if(!empty($_GET['id']))
$id=$_GET['id'];
?>

<a
                                  type="button"
                                  class="btn btn-primary btn-sm waves-effect waves-light"
                                  href="approve_report.php?id=<?php echo $id;?>" 
                                  >view</a>

<table class="table table-border table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th >S.No</th>
                                  <th>Name</th>
                                  <th>phno</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                       $sql = " SELECT * FROM details_entry  where cid='$id' order by id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr  style="font-size:15px">
                        <td  style="padding-top:15px;padding-bottom:15px;" nowrap><?php echo $sno++;?></td>
                      
                      
                      <td   nowrap><?php echo $rows['name'];?></td>
                      <td  nowrap><?php echo $rows['mobile'];?></td>
                   
                                 
                          
                         
                        </tr>
                        
                        <?php
                  }
                 
                    
                    
                    }
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>  
                                
                                       
                              </tbody>
                            
                  </table>
                          
