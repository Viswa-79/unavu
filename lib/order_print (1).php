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
<title>Order Print</title>
<style type="text/css">
.style1
{
color:#990000;
font-weight:bold;
}
.style5 {font-size: 18px}
</style>

 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

  <!--  <link href="smart-gallery.css" rel="stylesheet" type="text/css" />-->


  
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
 include("config.php");
error_reporting(0);
$sid=base64_decode($_GET['cid']);

 $sql = " SELECT * FROM order1 e1 left join currency im on e1.currency=im.id WHERE e1.id='$sid'";
                  $result =mysqli_query($conn, $sql);
                  $so=mysqli_fetch_array($result);

$date1=date('F d,Y',strtotime($so['date']));

$party=$so['partyname'];

?>


<?php
 $sql1 = " SELECT * FROM address where id='1'";
 $result1 =mysqli_query($conn, $sql1);
 $ad=mysqli_fetch_array($result1);


$b1=mysqli_query($conn,"SELECT * FROM partymaster where id='$party'");

$pm=mysqli_fetch_array($b1);

/*
$b2=mysql_query("SELECT * FROM partymaster where sno='$agent'");

$am=mysql_fetch_array($b2); */
?>





<body>


    <div id="mydiv" style="height:1200px;font-size:17px;font-family:'Arial', Gadget, sans-serif">
   <?php
      $sql = " SELECT * FROM order2  WHERE cid='$sid'";
      $result =mysqli_query($conn, $sql);
      while($b3=mysqli_fetch_object($result))
	{ 
	if($b3->pono!='' && $b3->pono!='-')
	{
	$pono2[]=$b3->pono;
	$ponos=implode("/",$pono2);
	//echo $ponos;
	}
	
	}
	?>
	
	  <table width="878"  align="center" style="border-collapse:collapse;border:none;height:1600px;">
 

    <tr height="1050px">
      <td style="border:none;vertical-align:top;" >
      

	
	
	
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
 

    <tr height="130px">
      <td style="border:none;" >
      
</td>
	  </tr>
	      <tr height="20px">
      <td style="border:none;" align="right">
      <b><?php echo $date1;?></b>
</td>
	  </tr>
	      <tr height="70px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b>ORDER CONFIRMATION</BR>
	  Order No : <?php echo $ad['cname'];?> / <?php echo $so['ord_no'];?></br>
      
      <?php if($ponos!='' && $so['pono']=='')
	  { ?>
	  Po No : <?php echo $ponos;?>
      <?php } ?>
	  
	    <?php if($so['pono']!='' && $so['pono']!='-')
	  { ?>
	  Po No : <?php echo $so['pono'];?></b>
      <?php } ?>
      </b>
</td>
	  </tr>
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
      
    <span style="font-size:25px;"><strong>
   <?php 
       echo $pm['firstname'];echo $pm['name'];echo ","."<br />";?></strong></span> 
      
      <strong><?php 
            echo $pm['address'];echo ","."<br />";

   if($pm['street']!='') { echo $pm['street'];echo ",";echo "<br />"; }
   if($pm['village']!='') { echo $pm['village'];echo ",";echo "<br />"; }
   if($pm['city']!='') {  echo $pm['city'];echo "&nbsp;"; echo "-"; echo "&nbsp;";if($pm['pincode']!='')  echo $pm['pincode'];echo ",";echo "<br />"; }
   if($pm['state']!='') {  echo $pm['state'];echo "&nbsp;"; echo "-"; echo "&nbsp;";if($pm['country']!='')  echo $pm['country'];echo ",";echo "<br />"; }
   
   
?>

   
      <?php
   if($pm['telephone']!='')
   {
	   echo "Telephone No :&nbsp;".$pm['telephone'];
     echo "<br />";

	   
   }
   
   if($pm['mobileno']!='')
   {
	   echo "Mobile No : ".$pm['mobileno'];
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
   <table width="878"  align="center" style="border:none;margin-top:5px;">
    
        <tr >
      <td style="border:none; vertical-align:text-top;" align="left">
	  
	  <u>For the attention of <strong><?php echo $so['title'];?> &nbsp;<?php echo $so['contact'];?></strong></u>
	  </br></br>
	  Dear Sir/Madam,
	   </br></br>
	   We, at <?php echo $ad['companyname'];?>, thank you very much for your order confirmation.
	  
	 </td></tr>
    
    
    
  </table>


  
  <table width="875" align="center" style=" border:1px solid #000000; border-collapse: collapse;">
    <tr>
   
      <td width="296"  style=" border:1px solid #000000; "><div align="center" >
        <strong>Item Description</strong>
      </div></td>
      <td width="265"  style=" border:1px solid #000000; "><div align="center" ><strong>Quality / Size</strong></div></td>
      <td width="99"  style=" border:1px solid #000000; "><div align="center"><strong>Price in </br><?php echo $so['currency'];?>&nbsp;<?php echo $so['shipterm'];?></strong></div></td>
      <td width="99"  style=" border:1px solid #000000; "><div align="center"><strong>Quantity <?php if($so['ordertype']=='MADEUPS'){ echo "Pcs"; } else {echo "Pcs"; }?> (+/- <?php echo $so['tolerance'];?>%)</strong></div></td>
	  <td width="92"  style=" border:1px solid #000000; "><div align="center"><strong>Total <?php echo $so['currency'];?>&nbsp;<?php echo $so['shipterm'];?></strong></div></td>
      
    </tr>
      
      <?php
	  $sno=1;
	
	  


$i=1;

$sql1 = " SELECT *,e.id as id,e.print as print FROM order2 e left join item_master p on e.itemno=p.id WHERE e.cid='$sid'";
$result1 =mysqli_query($conn, $sql1);
while($b3=mysqli_fetch_object($result1))
	{ 

	?>
  <tr style="border-bottom:1px solid black;" >

      <td height="21" style="border-right:1px solid black;vertical-align:top;"> <div align="left" style="margin-left:2%;"><strong>
 
      <?php if($b3->itemno!='' && $b3->itemno!='-' && $b3->visible!='0'){ ?>Item no : <?php echo $b3->code;echo"</br>"; }?></strong>
	  <?php echo $b3->itemdesc;?>
	<br>
	<?php if($b3->print!='' && $b3->print!='-' )
	{ ?>  
	  <b>Print : </b><?php echo $b3->print;
	  }	?> <br>
	  	
	<?php if($b3->label!='' && $b3->label!='-')
	{ ?> 
	 <strong>Label :</strong> <?php echo $b3->label;
	  }	?> </div></td>
      <td  style="border-right:1px solid black;vertical-align:top;" ><div align="left" style="margin-left:2%;">
	  
	 <?php if($b3->quality!='' && $b3->quality!='-'){ ?>   <strong>Quality:</strong><?php echo $b3->quality;?></br> <?php } ?>
	  
	  
 <?php
  if($b3->size!='' && $b3->size!='-'){ ?>     <strong>Size:</strong><?php echo $b3->size; }?>
      </div></td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->price;?> / <?php echo substr($b3->unit, 0, -1);?>
	  
	  <?php /*?><?php if($so['ordertype']=='MADEUPS'){ echo "pc"; } else {echo "mtrs"; }?><?php */?>
	  
	  </div></td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->quantity;?> <?php echo $b3->unit;?></div>      </td>
          <td  style="border-right:1px solid black;" ><div align="center" ><?php echo number_format((float)$b3->totamt, 2, '.', ''); ?></div>      </td>
    </tr>
   <?php
   
   
 
   
   $totamount+=$b3->totamt;
   
   $totqty+=$b3->quantity;
   
   
   
	  }
	  ?>

  <tr  style="border:none;">
 
      <td height="21" style="border-left:1px solid #FFFFFF;border-bottom:1px solid #FFFFFF;" colspan="2"> <div align="center"> </div></td>
	
      <td  style="border-left:1px solid black;" ><div align="center"><strong>Total</strong></div></td>
	  <td  style="border-left:1px solid black;" ><div align="center"><strong><?php echo $totqty; ?></strong></div></td>
      <td  style="border:1px solid black;" ><div align="center"><strong><?php echo number_format((float)$totamount, 2, '.', ''); ?></strong></div>      </td>
      
    </tr>







  </table>
    
    
   </br> 
    
  <table  width="878" align="center" style=" border:none;border-collapse: collapse;">
 <?php
 if($so['remark']!='' && $so['remark']!='-')
 { ?>
 
  <tr style="line-height:25px;">
 <td width="281" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Remarks</strong> </span></td>
 <td width="31" style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td width="550" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['remark'];?></span></td>

 
 </tr>
 <?php } ?>
 
 
 <tr style="line-height:25px;">
 <td width="281" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Date of Shipment</strong> </span></td>
 <td width="31" style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td width="550" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['shipment'];?></span></td>

 
 </tr>
 
  <tr style="line-height:25px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Port of Loading</strong> </span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['loads'];?></span>
</td>

 
 </tr>
 
   <tr style="line-height:25px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Port of Destination </strong></span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['Destination'];?></span>
</td>

 
 </tr>
 
 
 
   <tr style="line-height:25px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Payment</strong> </span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['payment'];?></span>
</td>

 
 </tr>
 <?php
$sql1 = " SELECT * FROM order2  WHERE cid='$sid'";
$result1 =mysqli_query($conn, $sql1);
$b3=mysqli_fetch_array($result1);
	?>
 
   <tr style="line-height:25px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Packing Method</strong> </span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $b3['pack'];?></span>
</td>

 
 </tr>
 
 <?php if($so['ordertype']!='MADEUPS' && $so['length']!='' && $so['length']!='-' ){ ?>
 
   <tr style="line-height:25px;">
 <td style="border:nonoe; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Piece Length</strong> </span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $so['length'];?></span>
</td>

 
 </tr>
 
 <?php
 }
 ?>

 <tr style="line-height:25px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Our Bankers</strong> </span>
</td>
<td style="border:none; border-right:none; vertical-align:text-top;" >:</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><?php echo $ad['bank'];?></br><?php echo $ad['branch'];?></br>Swift: <?php echo $ad['ifsc'];?></span>
</td>

 
 </tr>
</table>

</td>
</tr>
<td>




<table  width="878" align="center" style=" border-top:1px solid #000000; border-collapse: collapse;margin-top:5px;float:bottom;align:bottom;">
<tr><td></td></tr>
</table>
<table  width="864" align="center" style="border-collapse: collapse;margin-top:5px;float:bottom;align:bottom;">
 
 <tr>
 <td width="541" style="border:none; border-right:none;vertical-align:top;" >
  <p align="justify">
 <span class="style5">Kindly attest and send the same back to us.</span><br />
 We look forward to a successful business relationship.<br /> <br />
 Yours Sincerely,
   <br />
   <br /><br />
   For <?php echo $ad['companyname'];?>
 </p></td>
 <td width="311" style="border:1px solid #000000;vertical-align:top;"><div align="center"><strong>Buyer Confirmation</strong></strong><br />(Attestation with company seal)
       <br />
   <br />
  <br /><br /><br />
   </div></td>
 
 </tr>
 
  </table>
  
  
  
  
  </td>
  </tr>
  </table>
  <?php ?>  <div align="center">
    <input type="button" value="Print" onclick="PrintElem('#mydiv')" />
     
  
  </div><?php ?>
  <span class="footer">
<p>&nbsp;</p>
</span>
</div>
<?php $sid=$_GET['cid']; ?>

</body>
</html>

<style>
.footer {

    left: 0;
    bottom: 0;
    width: 100%;
    
    color: white;
    text-align: center;
}
</style>

