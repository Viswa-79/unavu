<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
 
$orderno=$_GET['q2'];
$itemno=$_GET['id'];

   $sql = "SELECT *,sum(bitwaste) as bitwaste,sum(swaste) as swaste  FROM cutting e  WHERE orderno='$orderno' and itemno = '$itemno' ";
//  echo $sql;
   $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
    $row = mysqli_fetch_array($result); 

     $sql1 = "SELECT *,sum(printmistake) as printmistake,sum(fabmistake) as fabmistake From printing_outward1  WHERE  orderno='$orderno' and itemno = '$itemno' ";
  //  echo $sql1;
     $result1 = mysqli_query($conn, $sql1);
    $count=mysqli_num_rows($result1);
    $row1 = mysqli_fetch_array($result1); 

    $sql2 = "SELECT *,sum(loopwaste) as loopwaste,sum(adas) as adas From sewing_outward1  WHERE  orderno='$orderno' and itemno = '$itemno' ";
  // echo $sql2;
    $result2 = mysqli_query($conn, $sql2);
    $count=mysqli_num_rows($result2);
    $row2 = mysqli_fetch_array($result2);  

    $sql2 = "SELECT *,sum(loopwaste) as loopwaste,sum(adas) as adas From sewing_outward1  WHERE  orderno='$orderno' and itemno = '$itemno' ";
      //echo $sql2;
       $result2 = mysqli_query($conn, $sql2);
       $count=mysqli_num_rows($result2);
       $row2 = mysqli_fetch_array($result2);

       $sql3 = "SELECT *,sum(mtrs) as mtrs From fabric_inward1  WHERE  orderno='$orderno' and itemno = '$itemno' ";
      // echo $sql3;
        $result3 = mysqli_query($conn, $sql3);
        $count=mysqli_num_rows($result3);
        $row3 = mysqli_fetch_array($result3);

        $sql4 = "SELECT *,sum(quantity) as quantity From salesinvoice1  WHERE  orderno='$orderno' and itemno = '$itemno' ";
       //echo $sql4;
        $result4 = mysqli_query($conn, $sql4);
        $count=mysqli_num_rows($result4);
        $row4 = mysqli_fetch_array($result4);


    
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['bitwaste'] = $row['bitwaste'];
        $data['swaste'] = $row['swaste'];
        $data['printmistake'] = $row1['printmistake'];
        $data['fabmistake'] = $row1['fabmistake'];
        $data['loopwaste'] = $row2['loopwaste'];
        $data['adas'] = $row2['adas'];
        $data['mtrs'] = $row3['mtrs'];
        $data['quantity'] = $row4['quantity'];
    
        
    }
 
    //returns data as JSON format
    echo json_encode($data);
}
?>