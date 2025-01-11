<?php
include "../config.php";
if(!empty($_GET['id']))
  $id=$_GET['id'];
 if($id=='Yes'){
   
 
 ?>
  <label class="lb">Reason</label>
  <input
                              type="text"
                              class="form-control"
                              id="reason"
                              name="reason"
                        
                            
                              />
           <?php
 }
 ?>