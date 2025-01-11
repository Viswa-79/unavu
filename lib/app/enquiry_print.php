
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
<title>Enquiry Print</title>
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
error_reporting(0);
 $sid=base64_decode($_GET['cid']);


 $sql = " SELECT * FROM enquiry WHERE id='$sid'";
                  $result =mysqli_query($conn, $sql);
                  $so=mysqli_fetch_array($result);
 $date1=date('F d,Y',strtotime($so['date']));

 $party=$so['partyname'];

?>


<?php
 $sql1 = " SELECT * FROM address";
 $result1 =mysqli_query($conn, $sql1);
 $ad=mysqli_fetch_array($result1);


$b1=mysqli_query($conn,"SELECT * FROM partymaster m left join currency o on m.currency=o.id where m.id='$party'");

$pm=mysqli_fetch_array($b1);
$currency=$pm['currency'];
$shipterm=$pm['shipterm'];
/*
$b2=mysqli_query($conn,"SELECT * FROM partymaster where sno='$agent'");

$am=mysqli_fetch_array($b2); */
?>




<body>


    <div id="mydiv" style="font-size:20px;">
 
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
 

    <tr height="100px">
      <td style="border:none;" align="center">
      <img src="..\assets\img\avatars\<?php echo $ad['logo'];?>"/>
</td>
    </tr>
	  	      <tr height="40px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b><img src="..\assets\img\avatars\<?php echo $ad['logo2'];?>" style=" height: 40px;
    width: 220px;"   /></b></BR>
	
      
</td>
	  </tr>
	      <tr height="50px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	 <u> <b>ENQUIRY</b></u></BR>
	
      
</td>
	  </tr>
	  </table>
	
    
   </br> 
    
	
	
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
 

	   
	  </table>
	   <table width="878"  align="center" style="border-collapse:collapse; border-bottom:1px solid black;">
	   

    <tr >
	<?php if($agent!=0)
	{ ?>
	 <td style="border:none; vertical-align:text-top;" align="left"><strong>
      Agent:</strong>
      
      <br />

      <span style="font-size:20px;"><strong><?php echo $am['name'];echo ","."<br />";?></strong></span> 
      
   <strong><?php 
   if($am['street']!='') { echo $am['street'];echo ",";echo "<br />"; }
  if($am['village']!='') { echo $am['village'];echo ",";echo "<br />"; }
 if($am['district']!='') {  echo $am['district'];echo ",";echo "<br />"; }
 if($am['state']!='') {   echo $am['state']; echo ",";echo "<br />"; }
if($am['country']!='') {	echo $am['country'];echo ".";echo "<br />"; }
?>

   
      <?php
   if($pm['telephone']!='')
   {
	   echo "Tel:".$pm['telephone'];
	   echo "<br />";

	   
   }
   if($cstno1!='')
   {
	   
	   echo "CST NO:".$cstno1;
   }

   ?>
      
     </strong> 
      

      </td><?php } ?>
      <td style="border:none; vertical-align:text-top;" align="right"><strong>
      Buyer Address:</strong>
      
      <br />

      <span style="font-size:20px;"><strong><?php echo $pm['firstname'];echo $pm['name'];echo ","."<br />";?></strong></span> 
      
   <strong><?php 
   if($pm['street']!='') { echo $pm['street'];echo ",";echo "<br />"; }
  if($pm['village']!='') { echo $pm['village'];echo ",";echo "<br />"; }
 if($pm['district']!='') {  echo $pm['district'];echo ",";echo "<br />"; }
 if($pm['state']!='') {   echo $pm['state']; echo ",";echo "<br />"; }
if($pm['country']!='') {	echo $pm['country'];echo ".";echo "<br />"; }
?>

   
      <?php
   if($pm['telephone']!='')
   {
	   echo "Tel: ".$pm['telephone'];
	   echo "<br />";

	   
   }
   if($cstno1!='')
   {
	   
	   echo "CST NO:".$cstno1;
   }

   ?>
      
     </strong> 
      

      </td>
 
      
    </tr>
</table>
  <table  width="878" align="center" style=" border:none;border-collapse: collapse;">
 


 
 
   <tr style="line-height:35px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Date</span></td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $date1;?></span></td>
 </tr>
 
  
 <tr style="line-height:35px;">
 <td colspan="2" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong><u>Regarding Enquiry No. - <?php echo $so['partyref'];?></strong> </span></td>

 </tr>
 
 </table>
     <?php
	  $sno=1; 
$i=1;

$sql = " SELECT *,e1.quality as quality,e1.size as size,e1.print as print FROM enquiry1 e1 left join item_master im on e1.itemno=im.id WHERE cid='$sid'";
$result =mysqli_query($conn, $sql);
while($rw=mysqli_fetch_array($result))
	{ 
 $quality = $rw['quality'];
	
	?>
  <table width="878" align="center" style=" border:1px solid #000000; border-collapse: collapse;">
  
  
  <?php if($b3->itemno!='' && $b3->itemno!='-' && $b3->visible!='0'){ ?>
    <tr>
   
      <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Item Ref</strong>
       
      </div></td>
      <td width="566"  style=" border:1px solid #000000; "><div align="left" style="margin-left:2%;"><strong><?php echo $rw['code'];?></strong></div></td>
    </tr>
  <?php } ?>   
	   
   <tr style="border-bottom:1px solid black;" >
   
      <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Item Description</strong>
       
      </div></td>
   
 <td height="70" style="border-right:1px solid black;"> <div align="left" style="margin-left:2%;"><strong>
</strong><?php echo $rw['itemdesc'];?></br>
	<!-- <?php if($b3->print!='' )
	{ ?>  
	  Print:<?php echo $b3->print;
	  }	?>
	  </br>
	<?php if($b3->handtag!='' && $b3->handtag!='-')
	{ ?>  
	  Label/Handtag:<?php echo $b3->handtag;
	  }	?>  --></div></td>
	  
      
    </tr>
      
  
  <tr style="border-bottom:1px solid black;" >
    <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Quality</strong>
       
      </div></td>
     
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php echo $quality;?></br></div></td>
   
   </tr>
   
     <tr style="border-bottom:1px solid black;" >
    <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Size</strong>
       
      </div></td>
     
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php 
	  if($rw['size']!='' && $rw['size']!='-')
	  {
	 echo $rw['size'];
	  }?></div></td>
   
   </tr>
      <tr style="border-bottom:1px solid black;" ><?php
      if($rw['print']!='' && $rw['print']!='-')
	  {
      ?>
    <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Print</strong>
       
      </div></td>
     
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"> 
	  <?php
	  echo $rw['print'];
	  }?></div></td>
   
   </tr>
        <tr style="border-bottom:1px solid black;" >
    <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Packing</strong>
       
      </div></td>
     
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php echo $so['boxsize'];?></div></td>
   
   </tr>
  <tr style="border-bottom:1px solid black;" >
   <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Quantity</strong>
       
      </div></td>
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php echo $rw['quantity'];?> <?php echo $b3->unit;?></div>      </td>
    </tr> 

	<tr style="border-bottom:1px solid black;" >
	 <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Price</strong>
       
      </div></td>
	    <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php echo $currency;?>&nbsp;&nbsp;<?php echo $rw['price']; echo"/";echo $rw['unit'];?>&nbsp;&nbsp;<?php echo $shipterm;?></div>      </td>
        
    </tr>
	<!-- <tr style="border-bottom:1px solid black;" >
	 <td width="300"  style=" border:1px solid #000000; "><div align="left">
        <strong>Price</strong>
       
      </div></td>
	    <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><?php echo $rw['price'];?></div>      </td>
        
    </tr> -->



  </table>
    <br />

      <?php
   
   
 
   
   $totamount+=$b3->amt;
   
   
   
	  }
	  ?> 
   </br> 
    

<?php ?><table width="878"  align="center" style="border-collapse:collapse; border:none;">

   <tr style="line-height:35px;">
 <td width="258" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Carton Box Size </span></td>
 <td width="608" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['boxsize'];?></span></td>
 </tr>

    <tr style="line-height:35px;">
 <td width="258" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Remarks </span></td>
 <td width="608" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['remarks'];?></span></td>
 </tr>
 
</table><?php ?>

 
<br />


<table  width="878" align="center" style=" border-top:1px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;" >
  <p align="justify"><br />

 <b>For <?php echo $ad['companyname'];?>,
  </b> <br />
   <br /><br /><br />
 <b> (Authorized Signatory)</b>
 </p></td>

 
 </tr>
  </table>
   

</div>
  <div align="center">
    <input type="button" value="Print" onclick="PrintElem('#mydiv')" />
     
    
  </div>
</body>
</html>


