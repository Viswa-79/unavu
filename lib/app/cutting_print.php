

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
<title>Cutting Print</title>
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
 $sql = " SELECT *,e.color as color,h.code as code FROM cutting j left join gsm k on j.fabricgsm=k.id left join item_master h on j.itemno=h.id left join quality_master g on j.fabqty=g.id left join color e on j.color=e.id WHERE j.id='$sid'";
  $result =mysqli_query($conn, $sql);
  $so=mysqli_fetch_array($result);

 $date=date('d/m/Y',strtotime($so['date']));


?>


<?php
 $sql1 = " SELECT * FROM address";
 $result1 =mysqli_query($conn, $sql1);
 $ad=mysqli_fetch_array($result1);

//  $a11=mysqli_query($conn,"SELECT * FROM printing1 where cid='$sid'");

// $so1=mysqli_fetch_array($a11);
?>





<body>


    <div id="mydiv" style="font-size:20px;">
 
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
  <tr height="120px">
      <td style="border:none;" align="center">
      <img src="..\assets\img\avatars\<?php echo $ad['logo'];?>"/>
</td>
    </tr>
	  	      <tr height="44px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b><img src="..\assets\img\avatars\<?php echo $ad['logo2'];?>" style=" height: 40px;
    width: 220px;"   /></b></BR>
	
      
</td>
	  </tr>

  
      
	  
	      <tr height="20px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b>CUTTING</BR>
	
      
</td>
	  </tr>
	  </table>

 
 <table width="878" align="center" style=" border:1px solid #000000; border-collapse: collapse;font-size:18px;">
 
 <tr style="border-bottom:1px solid black;border-top:1px solid black;" >

<td colspan="3" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Ref No :</strong><?php echo $so['bookno'];?></div></td>
<td colspan="2" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Date :</strong><?php echo $date;?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Quantity :</strong><?php echo $so['fabricqty'];?></div></td>

</tr>

<tr style="border-bottom:1px solid black;border-top:1px solid black;" >
    
<td colspan="3" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Order No : </strong><?php echo $so['orderno'];?></div></td>
<td colspan="2" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Size : </strong><?php echo $so['bsize'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Print : </strong><?php echo $so['cutprint'];?></div></td>

</tr>
<tr style="border-bottom:1px solid black;border-top:1px solid black;" >
    
<td colspan="5" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Item No : </strong><?php echo $so['code'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Cut Size : </strong><?php echo $so['cutsize'];?></div></td>

</tr>
<tr style="border-bottom:1px solid black;border-top:1px solid black;" >

<td colspan="5" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Fab.Quality : </strong><?php echo $so['quality'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Loop Size : </strong><?php echo $so['loopsize'];?></div></td>

</tr>
<tr style="border-bottom:1px solid black;border-top:1px solid black;" >

<td colspan="5" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Color : </strong><?php echo $so['color'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Table No : </strong><?php echo $so['tabno'];?></div></td>

</tr>
<tr style="border-bottom:1px solid black;border-top:1px solid black;" >

<td colspan="5" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Recevied Meter : </strong><?php echo $so['recmtr'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Gsm : </strong><?php echo $so['fabricgsm'];?></div></td>

</tr>
<tr style="border-bottom:none;border-top:1px solid black;" >

<td colspan="5"  height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Bit Waste : </strong><?php echo $so['bitwaste'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Weight : </strong><?php echo $so['weight'];?></div></td>

</tr>
<tr style="border-bottom:none;border-top:1px solid black;" >

<td colspan="5" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Side Waste : </strong><?php echo $so['swaste'];?></div></td>
<td colspan="4" height="29" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Balance Meter : </strong><?php echo $so['balanmtr'];?></div></td>

</tr>
<!-- <tr style="border-bottom:none;border-top:1px solid black;" >

<td colspan="9" height="45" style=" border:1px solid #000000; "><div align="left"style="padding-left:10px;"> <strong>Item Description : </strong><?php echo $so['itemdesc'];?></div></td>

</tr> -->
 <tr style="border-bottom:1px solid black;border-top:1px solid black;" >
   
   <td  height="35" style=" border:1px solid #000000; "><div align="center"> <strong>S.No</strong></div></td>
   <td  height="35" style=" border:1px solid #000000; "><div align="center"> <strong>Count</strong></div></td>
   <td   style=" border:1px solid #000000; "><div align="center" ><strong>Bunch</strong></div></td>
   <td   style=" border:1px solid #000000; "><div align="center" ><strong>Total</strong></div></td>
   <td  style=" border:1px solid #000000; "><div align="center" ><strong>Lot</strong></div></td>
   <td  style=" border:1px solid #000000; "><div align="center" ><strong>Bundle No</strong></div></td>
   <td  style=" border:1px solid #000000; "><div align="center" ><strong>Time</strong></div></td>
   <td  style=" border:1px solid #000000; "><div align="center" ><strong>Total Pcs</strong></div></td>
   <td  style=" border:1px solid #000000; "><div align="center" ><strong>Total Loop</strong></div></td>
   
   
 </tr>
      <?php
	  $sno=1;	  
$i=1;
$totreq=0;
$totexcess=0;
$totcut=0;
    $b1="SELECT * FROM cutting1 where cid='$sid' order by id asc ";
	$b2=mysqli_query($conn,$b1);
	while($b3=mysqli_fetch_object($b2))
	{ 
	

	
	?>
  <tr style="border-bottom:1px solid black;" >

  <td height="" style="border-left: 1px solid black;border-bottom:none;border-top:none;border-collapse: collapse;border-right: 1px solid  #999;"><div align="center"><?php echo $sno;?> </div></td>
     
     <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->cutcount;?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->bunch;?></div></td>
      <td  style="border-right:1px solid black;" ><div align="right" style="margin-left:2%;"><?php echo number_format((float)$b3->totalcut,2,'.','');?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->lot;?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->bundleno;?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo date('h:i:s A',strtotime($b3->timecut));?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="right" style="margin-left:2%;"><?php echo $b3->totalpcs;?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="right" style="margin-left:2%;"><?php echo $b3->totalloop;?> </div>      </td>
        
    </tr>
    <?php
   
   
 
   
   
   
   
   $sno++;
   $totcut+=number_format((float)$b3->totalcut,2,'.','');
	  }
	  ?>
  <tr height="20px" style="font-size:19px;">
 

 <td height="30px" style="border :none;" colspan="3"><div align="right"><strong>Total&nbsp;:&nbsp;</strong></div></td>
 <td  style="border :none;" ><div align="right"><strong><?php echo number_format((float)$totcut, 2, '.', '')?></strong></div></td>
</tr>
 


  </table>
 
<br />

 


<table  width="878" align="center" style=" border-top:1px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;" >
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


