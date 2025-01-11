

<?php

function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Costing Print</title>
<style type="text/css">
.style1
{
color:#990000;
font-weight:bold;
}
.style5 {font-size: 18px}
</style>

 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
   <script src="js1/jquery-1.7.1.min.js"></script>
    <script src="js1/jspdf.js"></script>
    <script src="js1/jspdf.plugin.standard_fonts_metrics.js"></script>
    <script src="js1/jspdf.plugin.split_text_to_size.js"></script>
    <script src="js1/jspdf.plugin.from_html.js"></script>
    <script src="js1/html2canvas.js"></script>
	 <script src="js1/FileSaver.js"></script>

    <script>
       $(document).ready(function () {
            $(function () {
                var doc = new jsPDF();
                var specialElementHandlers = {
                    '#editor': function (element, renderer) {
                        return true;
                    }
                };
 
                $('#cmd').click(function () {
                    doc.fromHTML($('#mydiv').html(), 15, 15, {
                        'width': 170,
                        'elementHandlers': specialElementHandlers
                    });
                    doc.save('sample-file.pdf');
                });
            });
        });
    </script>
</head>

 <?php
 include('config.php');
 $sid=base64_decode($_GET['cid']);
  $sql = " SELECT * FROM costing WHERE id='$sid'";
  $result =mysqli_query($conn, $sql);
  $so=mysqli_fetch_array($result);

 $date=date('d/m/Y',strtotime($so['date']));


?>


<?php
 $sql1 = " SELECT * FROM address";
 $result1 =mysqli_query($conn, $sql1);
 $ad=mysqli_fetch_array($result1);

 $a11=mysqli_query($conn,"SELECT * FROM printing1 where cid='$sid'");

$so1=mysqli_fetch_array($a11);
?>





<body>


    <div id="mydiv" style="font-size:20px;">
 
  <table width="872"  align="center" style="border-collapse:collapse; border:none;">
  <tr height="100px">
      <td style="border:none;" align="center">
      <img src="..\assets\img\avatars\<?php echo $ad['logo'];?>"/>
</td>
    </tr>
	  	      <tr height="40px">
      <td style="border:none;vertical-align:top;margin-top:1px;" align="center">
	  <b><img src="..\assets\img\avatars\<?php echo $ad['logo2'];?>" style=" height: 40px;
    width: 220px;"   /></b>
      
</td>
	  </tr>
      <tr height="40px">
      <td style="border:none;vertical-align:top;margin-top:1px;" align="center"><strong>COSTING</strong>
	  </BR></BR>
	
      
</td>
	  </tr>

	  </table>
    
  
  
<table  width="872" align="center" style="border: 2px solid black;border-collapse: collapse;border-color:black;border-top:none;border-right:none;border-left:none;"  align="center">

<tr><td colspan="5"  style="vertical-align:top;">



   

    <tr style="border: 1px solid black;border-collapse: collapse;border-color:black;">
    <td colspan="2" height="38"  style="border-color:black; border-left: 1px solid black; border-bottom: none;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Costing File No : </strong><?php echo $so['fileno'];?></td>
    <td  height="38"  style="border-color:black; border-left: 1px solid black; border-bottom: none;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Ref No : </strong><?php echo $so['refno'];?></td>
    <td  height="38"  style="border-color:black; border-left: 1px solid black; border-bottom: none;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Order No : </strong><?php echo $so['orderno'];?></td>
    <td height="38"  style="border-color:black; border-left: 1px solid black; border-right: 1px solid black; border-bottom:none;border-collapse: collapse;border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Date : </strong><?php echo $so['date'];?></td>
	</tr>


</td>


</tr>
<tr height="20px"></tr>

<tr >
   
      
      <td colspan="2"  style="vertical-align:top;">
     
   
      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="6"  style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Item Details</td>
    
</tr>
      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td width="50" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Item No</td>
    <!-- <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Color</td> -->
    <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Order Qty</td>
   
  <td   style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Costing For</td>
  <td   style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Costing Qty</td>

</tr>
  <?php

		   $sno=1;$i=0;$j=0;
            $sql2 = "SELECT * FROM costing5 w left join item_master q on  w.itemno=q.id  where w.cid='$sid' order by w.id asc";
$result2 = mysqli_query($conn,$sql2);

        while($row = mysqli_fetch_array($result2)){
            if($row['costplan']==1)
            $costplan='Full Quantity';
            
            else if($row['costplan']==2)
            $costplan='Partial Quantity';
            
          

          
            
        
	?>
  <tr  style="border-top:1px solid black;border-bottom:1px solid black">
    <td height="" style="border-left: 1px solid black;border-collapse: collapse;
   border-right: 1px solid black;"><div align="center"><?php echo $sno;?> </div></td>
    <td height=""  align="center"style="border-top:1px solid balck;border-bottom:1px solid balck;border-right: 1px solid black;border-left: 1px solid black;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row['code'];?></td>
    <!-- <td height=""  align="center"style="border-top:1px solid balck;border-bottom:1px solid balck;border-right: 1px solid black;border-left: 1px solid black;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row['color'];?></td> -->
    <td height=""  align="center" style="border-top:1px solid balck;border-bottom:1px solid balck;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['costqty'];?></td>
    <td height=""  align="center" style="border-top:1px solid balck;border-bottom:1px solid balck;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $costplan;?></td>
    <td height=""  align="center" style="border-top:1px solid balck;border-bottom:1px solid balck;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['reqcost'];?></td>
  </tr>
 
  
  <?php
$sno++;
} ?>

  
</td>




  

	  
      
    </tr>
  
    <tr height="20px"></tr>


<tr>
<td colspan="3"  style="vertical-align:top;"  >
      <table  width="100%"  align="center" style="border: 1px solid black;border-collapse: collapse;">
   <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="5" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Fabric Cost</td>
    
</tr>
<tr align="center" style="font-weight:bold;border-collapse: collapse;">
 <td width="50" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
 <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black">Quality</td>
 <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Cons</td>
 <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Rate/Mtr</td>

<td   style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>
</tr>
<?php

        $sno=1;$i=0;$j=0;
$sql4 = "SELECT * FROM costing4 t left join quality_master y on t.quality=y.id  where t.cid='$sid' order by t.id asc";
$result4 = mysqli_query($conn,$sql4);
while($row2 = mysqli_fetch_array($result4))
{
 ?>
<tr>
 <td height="" style="border-left: 1px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
border-right: 1px solid black;"><div align="center"><?php echo $sno;?> </div></td>
 <td height=""  align="center"style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row2['quality'];?></td>
 <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo number_format((float)$row2['consumption'], 3, '.', '');?></td>
 <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo number_format((float)$row2['price'], 2, '.', '');?></td>
 <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo number_format((float)$row2['amount'], 2, '.', '');?></td>
</tr>


<?php
$sno++;
} ?>

<tr align="center" style="border-collapse: collapse;">
    <td colspan="4" align="right" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px;">Total</td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['totalfab'], 2, '.', '');?></td>
</tr>
</table>
</td>
      
      




    
<td colspan="2"  style="vertical-align:top;">
      <table  width="100%"  align="center" style="border: 1px solid black;border-collapse: collapse;">
      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="5" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Processing Cost</td>
    
</tr>
      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
    <td width="50" style="border-center: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td align="center" colspan="2" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-left:15px;">Particulars</td>
    <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>

</tr>
  <?php

		   $sno=1;$i=0;$j=0;
 $sql3 = "SELECT * FROM costing1 e left join process r on e.processing=r.id  where e.cid='$sid' order by e.id asc";
$result3 = mysqli_query($conn,$sql3);
while($row1 = mysqli_fetch_array($result3))
{
	?>
  <tr>
    <td height="" style="border-left: 1px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
   border-right: 1px solid black;"><div align="center"><?php echo $sno;?> </div></td>
  <td height="" colspan="2" align="left" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-left:15px;"><?php echo $row1['process'];?></td>
    <td height=""  align="right"style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:5px;"><?php echo number_format((float)$row1['processvalue'], 2, '.', '');?></td>
  </tr>
 
  
  <?php 
$sno++;
} ?>

<tr align="center" style="border-collapse: collapse;">
    <td colspan="3" align="right" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px">Total</td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['processingtotal'], 2, '.', '');?></td>
</tr>
<!-- <tr align="center" style="border-collapse: collapse;">
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black">Process Loss (%)</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['processlossper'];?></td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['processloss'], 2, '.', '');?></td>
</tr> -->
<!-- <tr align="center" style="border-collapse: collapse;">
    <td colspan="3" align="left"  style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black">Process Cost</td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['processcost'], 2, '.', '');?></td>
</tr> -->

</table>
     </td>

	  
      
    </tr>
  
  
 <tr>
   
      
   <!-- <td width="450" style="vertical-align:top;">

   <table  width="100%" align="center" style=" border-top:1px solid #000000; border-collapse: collapse;border-bottom:1px solid black;">



<tr align="center" style="font-weight:bold;border-collapse: collapse;">
<td colspan="5" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Accessories Cost</td>
  
</tr>
    
 <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td width="50" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
  <td align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Particulars</td>
  <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Uom</td>
  <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>
 

</tr>
<?php

         $sno=1;$i=0;$j=0;
$sql6 = "SELECT * FROM costing3 p left join product_master a on p.accessoriesname=a.id where p.cid='$sid' order by p.id asc";
$result6= mysqli_query($conn,$sql6);
while($row4 = mysqli_fetch_array($result6))
{
  ?>
<tr>
  <td height="" style="border-left: 1px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
 border-right: 1px solid black;"><div align="center"><?php echo $sno;?> </div></td>
  <td height=""  align="left"style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:15px;"><?php echo $row4['productname'];?></td>
  <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row4['uom'];?></td>
   <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo number_format((float)$row4['accessoriesvalue'], 2, '.', '');?></td>
</tr>


<?php
$sno++;
} ?>

<tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="3" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px;">Total</td>
  <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo number_format((float)$so['accessoriestotal'], 2, '.', '');?></td>
</tr>

</table>

   </td> -->

   


   <!-- <td colspan=""width="350" style="vertical-align:top;" >
   <table  width="100%"  align="center" style="border: 1px solid black;border-collapse: collapse;">
   
   <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="3" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Production Cost</td>
    
</tr>
<tr align="center" style="font-weight:bold;border-collapse: collapse;">
 <td width="50" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
 <td align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Particulars</td>
 <td  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>
</tr>
<?php

        $sno=1;$i=0;$j=0;
$sql5 = "SELECT * FROM costing2 u left join process o on u.productionname=o.id where u.cid='$sid' order by u.id asc";
$result5 = mysqli_query($conn,$sql5);
while($row3 = mysqli_fetch_array($result5))
{
 ?>
<tr>
 <td height="" style="border-left: 1px solid black;border-bottom: 1px solid black ;border-top:none;border-collapse: collapse;
border-right: 1px solid black;"><div align="center"><?php echo $sno;?> </div></td>
 <td height=""  align="left"style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black ;   border-collapse: 1px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row3['process'];?></td>
<td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black ; border-collapse: 1px solid black;border-bottom: collapse;padding-right:5px;"><?php echo number_format((float)$row3['productionvalue'], 2, '.', '');?></td>
</tr>


<?php
$sno++;
} ?>

<tr align="center" style="border-collapse: collapse;">
    <td colspan="2" align="right" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px;">Total</td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo number_format((float)$so['productiontotal'], 2, '.', '');?></td>
</tr>
</table>
</td> -->
  

   
   
 </tr>
 <tr height="20px"></tr>
 <tr>
   
      


      <!-- <td width="400"style="vertical-align:top;">
      <table  width="100%"  align="center" style="border: 1px solid black;border-collapse: collapse;">
      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="5" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Other Costs</td>
    
</tr>
  <tr align="center" style="border-collapse: collapse;">
    <td width="50" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Particulars</td>
    <td  align="center" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">1</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Documentation</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['documentation'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td  style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">2</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Testing</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['testing'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">3</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Inspection</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['inspection'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">4</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Transport</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['transport'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">5</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Wastage</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['wastage'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">6</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Interest</td>
    <td align="right"  style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['interest'], 2, '.', '');?></td>
</tr>
  
<tr align="center" style="border-collapse: collapse;">
    <td align="right" colspan="2" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px;">Total </td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['totalgarment'], 2, '.', '');?></td>
</tr>
 
  
  

  
</table>
</td> -->
     

      <tr align="center" style="font-weight:bold;border-collapse: collapse;">
  <td colspan="5" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Total Cost</td>
    
</tr>
  <tr align="center" style="font-weight:bold;border-collapse: collapse;">
    <td width="50" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Particulars</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Value</td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">1</td>
    <td colspan="2"align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Fabric Cost</td>
    <td colspan="2"align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['totfab'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">2</td>
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Processing Cost</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['processingcost'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">3</td>
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">CMT Cost</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['productioncost'], 2, '.', '');?></td>
</tr>
<!-- <tr align="center" style="border-collapse: collapse;"> -->
    <!-- <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">4</td> -->
    <!-- <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Accessories Cost</td> -->
    <!-- <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['accessoriescost'], 2, '.', '');?></td> -->
<!-- </tr> -->
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">4</td>
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Transport</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['transport'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">5</td>
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Wastage</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['wastage'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">6</td>
    <td colspan="2" align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Interest</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['interest'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">7</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Rejection %</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['rejectionper'];?></td>
    <td colspan="2"align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['rejection'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">8</td>
    <td align="left" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Commission %</td>
    <td  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['commissionper'];?></td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['commission'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">9</td>
    <td  align="left"  style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; padding-left:15px;">Profit %</td>
    <td align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['profitper'];?></td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['profit'], 2, '.', '');?></td>
</tr>
<tr align="center" style="border-collapse: collapse;">
    <td align="right" colspan="3" style="font-weight:bold;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;padding-right:15px;">Total Price ( ₹ )</td>
    <td colspan="2" align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo number_format((float)$so['totalprs'], 2, '.', '');?></td>
</tr>
 

  </table>


<table  width="872" align="center" style="border-top:0px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;float:right;" align="right">
  <p align="justify"><br />

 For <?php echo $ad['companyname'];?>,
   <br />
   <br /><br /><br />
  (Authorized Signatory)
 </p></td>

 
 </tr>
  </table>
   

</div>

  <div align="center">
    <input type="button" value="Print" onclick="PrintElem('#mydiv')" />
     
    
  </div>
</body>
</html>


