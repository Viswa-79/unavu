<?php

function no_to_words($no)
{   
 $words = array('0'=> '' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fouteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Fourty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred &','1000' => 'Thousand','100000' => 'Lakh','10000000' => 'Crore');
    if($no == 0)
        return ' ';
    else {
	$novalue='';
	$highno=$no;
	$remainno=0;
	$value=100;
	$value1=1000;       
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }       
          if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
          else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
           }
    }
}


function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' and cents ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'one',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
		100000              => 'Lakh',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
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



function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? ' ' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? " " . ($words[$decimal / 10] . " " . $words[$decimal % 10])  : '';
    return $Rupees . 'and cents' . $paise ;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Invoice Print</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>


<style>
div.image

  {

  width:500px;

  height:250px;

  background:url(images.jpg);

  background-repeat:no-repeat;

  background-position:center;

  border:2px solid;

  border-color:#CD853F;

  }

div.transparentbox

  {

  width:400px;

  height:180px;

  margin:30px 50px;

  background-color:#ffffff;

  border:1px solid;

  border-color:#CD853F;

  opacity:0.6;

  filter:alpha(opacity=60);

  }
  
  </style>
   <script src="jquery-1.4.4.min.js" type="text/javascript"></script>



<script type="text/javascript">

    function PrintElem(elem)
    {
		
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="tables.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>


</head>

<body style="font-family:'Trebuchet MS'">

<div id="mydiv" >

<table align="center" width="852" style="border:none;font-family:'Trebuchet MS'">
  <tr style="border:none;">
    <td style="border:none;"  width="709"><div style="margin-left:50%"><strong style="font-size:20px;">INVOICE</strong></div></td>
    <td style="border:none;" align="right"  width="157"><strong></strong></td>
  </tr>
</table>

<table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">
  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="20" colspan="5" align="center" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse; font-size:14px;" >
	SUPPLY MEANT FOR EXPORT UNDER BOND OR LETTER OF UNDERTAKING WITHOUT PAYMENT OF INTEGRATED TAX(IGST)
       </td>
    </tr>
    </table>  
      
    
     <?php
 include("config.php");

$sid=base64_decode($_GET['cid']);


	//echo $invoiceno;
 $a0="SELECT * FROM salesinvoice e left join currency p on e.currency=p.id where e.id='$sid'";

$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);

 $invoiceno=$r1['invoiceno'];
$date=$r1['date'];
$orderno=$r1['orderno'];
if($r1['orderdate']!='0000-00-00')
{
$orderdate=date('d/m/Y',strtotime($r1['orderdate']));
}
$partyname=$r1['partyname'];
$accountname=$r1['accountname'];

$agent=$r1['agent'];
$thirdparty=$r1['thirdparty'];

$finaldestination=$r1['finaldestination'];
$delivery_address=$r1['delivery_address'];

$refno=$r1['refno'];
$duedate=$r1['duedate'];


$dis=$r1['dis'];
 $disamt=$r1['disamt'];
$partyname=$r1['partyname'];

$ocharges=$r1['ocharges'];
$othercharges=$r1['othercharges'];

 $pack=$r1['pack'];
 $packing=$r1['packamt'];

$cgst=$r1['cgst'];
$sgst=$r1['sgst'];
$igst=$r1['igst'];
$cgstamt=$r1['cgstamt'];
$sgstamt=$r1['sgstamt'];
$igstamt=$r1['igstamt'];

$freight=$r1['freight'];
$netamt=$r1['netamt'];
$remarks=$r1['remarks'];
$freight=$r1['freight'];


$netwt=$r1['netwt'];
$grwt=$r1['grwt'];
$carriage=$r1['carriage'];
$carrier=$r1['carrier'];
$vessel=$r1['vessel'];
$portofloading=$r1['portofloading'];
$portofdischarge=$r1['portofdischarge'];
$finaldestination=$r1['finaldestination'];
$terms=$r1['terms'];
$shipmentterms=$r1['shipmentterms'];
$containerno=$r1['containerno'];


 $currency=$r1['currency']; 
 $shipmentterms=$r1['shipmentterms'];
 
 $measurement=$r1['measurement'];
  $totalcartons=$r1['totalcartons'];
   $totalpcs=$r1['totalpcs'];


//$arr=split("-",$paymentduedate); // splitting the array
//$mm=$arr[1]; // first element of the array is month
//$dd=$arr[2]; // second element is date
//$yy=$arr[0]; // third element is year
//if(!checkdate($mm,$dd,$yy) || $yy<2015)
if($duedate!='' && $duedate!=NULL && $duedate!='1970-01-01')
{
	
	$duedate=$duedate;
	$duedate = date('d/m/Y',strtotime($duedate)); 
	
}

else
{

$duedate1=$duedate;
$duedate2=date('d/m/Y');

}




$a0="SELECT * FROM partymaster where id='$partyname'";

$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);


$pname=$r1['name'];
//$d1=$r1['dnosfno'];
//$s1=$r1['street'];
//$v1=$r1['village'];
//$t1=$r1['taluk'];
 $dt1=$r1['city'];
//$tngstno1=$r1['tngstno'];
//$cstno1=$r1['cstno'];
$gstno1=$r1['gstno'];
//$iecode1=$r1['iecode'];
$state1=$r1['state'];
$country1=$r1['country'];
//$statecode1=$r1['statecode'];
/*
$a1=mysqli_query("SELECT * FROM fa_accountsmaster where sno='$accountname'");

$r1=mysqli_fetch_array($a1);


$pname2=$r1['name'];
$d2=$r1['country'];
$s2=$r1['street'];

$v2=$r1['village'];
$t2=$r1['taluk'];
$dt2=$r1['district'];
$tngstno2=$r1['tngstno'];
$cstno2=$r1['cstno'];
$gstno2=$r1['gstno'];
$iecode2=$r1['iecode'];
$state2=$r1['state'];
$statecode2=$r1['statecode'];



*/
$a1=mysqli_query($conn,"SELECT * FROM partymaster where id='$agent'");

$r1=mysqli_fetch_array($a1);


$pname3=$r1['name'];
//$d3=$r1['village'];
$cpname=$r1['cpname'];
//$caddress=$r1['caddress'];
$cmobile=$r1['mobileno'];
$cdistrict=$r1['city'];


?>

 
      <table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">
   

   <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="53" rowspan="4" colspan="2" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 2px solid black;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-bottom:none;"><strong>EXPORTER</strong><br />
    
<div style="height:40px;vertical-align:top;text-transform:uppercase;font-weight:bold;" align="left">  <?php
   
	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>
        <strong style="font-size:20px;"><?php echo $rz2['companyname']; ?></strong><br />
        <?php echo $rz2['address'].","; ?>
        <?php echo $rz2['taluk']."<br>".$rz2['city'].",<br>".$rz2['state'].",".$rz2['country']."."; ?><br />
  
        <strong>GST No:<?php echo $rz2['gstno'];?></strong>
  
</span>
    </div>
    


</td>
  <td width="233" height="24"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse;">Invoice No. & Date</td>
      <td width="206" height="24" style="border-right: 2px solid  black;border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;&nbsp;Exporter's Ref</td>
  </tr>
 <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
       <td width="233"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse;"><strong style="font-size:15px;">OMT-<?php echo $invoiceno;?> / DT. <?php echo $date;?></strong></td>
      <td width="206" style="border-right: 2px solid  black;border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;<strong>IEC-<?php echo $rz2['expref'];?></strong></td>  
	  </tr>
	  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
      
       <td height="31" colspan="2" style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;">Buyers Order No. & Date</br>
	   <strong><?php echo $refno;?>   <?php if($orderdate!=''){ echo "-";echo $orderdate; }?></strong></td>
 
	  </tr>
	  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
       <td width="233" height="34"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;">Other Reference(s)</br>
	<strong>   TIN NO:<?php echo $rz2['tinno'];?></strong></td>
      <td width="206" style="border-right: 2px solid black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;<strong></br>LUT NO:<?php echo $rz2['lutno2'];?></strong></td>   
  </tr>
  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="20" colspan="2" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 2px solid black;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-bottom:none;"><strong>CONSIGNEE</strong><br />
    
    <div style="margin-left:0%;text-transform:uppercase;">
   <strong><?php echo $cpname;echo ","."<br />";/*echo $d1;echo $s1;echo "<br />";echo $v1;echo "<br />";echo $t1;*/ echo $dt1;echo $state1;echo "<br />";?>
</strong>


</div>


</td>
    <td height="20" colspan="2" style="border: 1px solid black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;"><strong>Buyer (if other than consignee)</strong>
      </br>
    <div style="margin-left:0%;text-transform:uppercase;display:none;">
   <strong><?php echo $pname2;echo ","."<br />";echo $d2;?>
</strong>


</div>

      
      
    </td>
  </tr>
 
 <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    <td width="134"  height="27"  style="vertical-align:text-top;border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;border-collapse: collapse;">Pre-Carriage by</br>
	<strong><?php echo $carriage;?></strong></td>
  <td width="257" height="27"   style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;border-bottom: 2px solid black;">Place of Receipt by Pre-Carrier</br>
  <strong><?php echo $carrier;?></strong></td>


 <td  height="27"  style="vertical-align:text-top;border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;">Country of Origin of Goods</br><div align="center"><strong style="text-transform:uppercase;"><?php echo $rz2['country'];?></strong></div></td>
  <td width="206" height="27"  style="vertical-align:text-top;border-right: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;border-right: 2px solid bottom;">Country of Final Destination</br>
    <div align="center"><strong style="text-transform:uppercase;"><?php echo $finaldestination;?></strong></div></td>
  </tr>
  
  
   <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    <td  height="23" style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;">Vessel / Flight No.</br><strong><?php echo $vessel;?> </strong></td>
  <td  height="26"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;border-bottom: 2px solid black;">Port of Loading</br><strong><?php echo $portofloading;?></strong> </td>
  
      <td  height="23" colspan="2" rowspan="2" style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;" >Terms of Delivery and Payment</br>
	 <strong style="text-transform:uppercase;"> <?php echo $terms;?></br></br><?php echo $shipmentterms;?>, <?php echo $portofloading;?></strong>
</td>


  </tr>
  
  
  
  <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    

 <td  style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;">Port of Discharge</br><strong><?php echo $portofdischarge;?></strong> </td>
  <td  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;">Final Destination</br><strong><?php echo $finaldestination;?></strong></td>
  </tr>
   
 
</table>



<table width="850"  align="center" style="border: 1.5px solid black;border-collapse: collapse;">
  <tr align="center" style="border-collapse: collapse;font-size:12px;" height="30">

    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: none;border-bottom:none;border-collapse: collapse;vertical-align:top; " width="128">Marks & Nos./</td>
    <td style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: none;border-left: none;vertical-align:top;" width="490">No. & Kind of Pkgs.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description of Goods</td>
    
  
    <td style="border: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;;border-left: 2px solid black;vertical-align:top; " width="59">Quantity</br><strong><?php echo $measurement;?></strong></td>
    <td style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;;border-left: 2px solid black;vertical-align:top; " width="74" >Rate IN <?php echo $currency;?></br><strong>PER&nbsp;<?php echo $measurement;?></strong></td>
    <td style="border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse; border-bottom: 2px solid black;;border-left: 1px solid #999;vertical-align:top;" width="73" >Amount IN</br><strong><?php echo $currency;?>&nbsp;<?php echo $shipmentterms;?></strong></td>
  </tr>
  
    <tr style="border-bottom:none;border-collapse: collapse;font-size:12px;">

    <td height="25px" style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse:collapse;
   border-right: none;vertical-align:top;" align="left"><strong></strong></td>
    <td align="left" height="" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: none; border-collapse: collapse;font-size:12px;text-transform:uppercase;"><strong><?php echo $totalcartons;?></strong></td>
 
 
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left:2px solid black;  border-collapse: collapse;vertical-align:top;"></br><strong></strong></td>
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left: 2px solid black; border-collapse: collapse;vertical-align:top;"><br /><strong></strong></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-bottom:none;border-left: 1px solid #999;vertical-align:top;" align="right"><br /><strong></strong></td>
  </tr>
       <?php
	  $sno=1;
	
	
$i=1;
$tqty=0;
$tty=0;
    $b1="select * from salesinvoice1 where cid='$sid'";
	$b2=mysqli_query($conn,$b1);
	$sno=1;
	while($b3=mysqli_fetch_object($b2))
	{ 
$lines_arr = preg_split('<br>',nl2br($b3->itemdesc));
$num_newlines = count($lines_arr); 
//echo $num_newlines;	
	
?>

  <tr style="border-bottom:none;border-collapse: collapse;font-size:12px;">

    <td style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse:collapse;
   border-right: none;vertical-align:top;" align="left"><strong><?php echo $b3->balenos;?></strong></td>
    <td align="left" height="" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: none; border-collapse: collapse;font-size:12px;text-transform:uppercase;"><strong><?php echo nl2br($b3->itemdesc);?></strong></td>
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left:2px solid black;  border-collapse: collapse;vertical-align:top;"></br><strong><?php echo $b3->quantity;?></strong></td>
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left: 2px solid black; border-collapse: collapse;vertical-align:top;"><br /><strong><?php 
		echo number_format((float)$b3->rate, 4, '.', ''); 
	?></strong></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-bottom:none;border-left: 1px solid #999;vertical-align:top;" align="right"><br /><strong><?php 
	
		echo number_format((float)$b3->amount, 2, '.', ''); 
	?></strong></td>
  </tr>
    <?php
	
		$tqty+=number_format((float)$b3->quantity, 2, '.', '');
   $tty+=number_format((float)$b3->amount, 2, '.', '');
	$sno++;
	
	  }
	  ?>
	  	  <?php
		    if($ocharges!='' && $ocharges!='-')
        
	  { ?>
	   <tr style="font-size:12px;">
    <td height="" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong><?php echo $ocharges;?><br />
</strong></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;text-align:right;vertical-align:top;"><strong><?php echo number_format((float)$othercharges, 2, '.', '');?></strong></td>
  </tr>
	  	  <?php
		  }
      if($packing!='' && $packing!='-')
      { ?>
       <tr style="font-size:12px;">
      <td height="" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
      <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>Packing</strong><br />
 </td>
    
      <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
      <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    
      <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;text-align:right;vertical-align:top;"><strong><?php echo number_format((float)$packing, 2, '.', '');?></strong></td>
    </tr>
          <?php
        }
     
      if($disamt!='' && $disamt!='-')
  { ?>
   <tr style="font-size:12px;">
  <td height="" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
  <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>Discount</strong>
</td>

  <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>

  <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;text-align:right;vertical-align:top;"><strong><?php echo number_format((float)$disamt, 2, '.', '');?></strong></td>
</tr>
      <?php
    }
	  
		  
	  $k=($sno*4);
	 
	  
	  for($i=$k;$i<=30;$i++)

{	  
	  ?>
 <tr style="">
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>
      
      
      
      
      <?php } ?>
	 <tr style="">
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>NT.WT:<?php 
	
		echo number_format((float)$netwt, 3, '.', ''); 
	?> KGS</strong></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>  
  	 <tr style="">
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>GR.WT:<?php 
	
			echo number_format((float)$grwt, 3, '.', ''); 
	?> KGS</strong></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>  
	
      
  	 <tr style="">
    <td height="2" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>  
	
		<?php if($containerno!='' && $containerno!='-'){ ?>
   	 <tr style="">
    <td height="30" colspan="2" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>CONTAINER NO : <?php echo $containerno;?></strong></td>
   
  
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
   <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>  
  <?php } ?>
<tr align="center" style="">

<?php $ttt=number_format((float)($tty-$disamt+$packing+$othercharges), 2, '.', '');


$ttt1=substr( $ttt, -1 );
if($ttt1=='0'){
$ttt2='Zero Only.';
}
else
{
$ttt2='Only.';
}

?>
    <td height="37" colspan="2" align="left" style="border-collapse:collapse; border-top: 2px solid black;border-bottom:none;border-right: 2px solid black;border-left: 2px solid black;" >Amount Chargeble( in words )</br><strong style="text-transform:uppercase;"><?php echo $currency;?> : <?php echo getIndianCurrency($ttt)
	.' '.$ttt2; 
	unset($packing);
unset($freight);?></strong></td>
 <td height="37" align="right" style="border-top: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;border-left: 2px solid black;border-collapse: collapse;"><strong><?php 
	echo $tqty;
?></strong></td>
    <td align="center" height="37" style="border-top: 2px solid black;border-bottom: 2px solid black;border-right: 1px solid #999;border-collapse: collapse;">
<strong>&nbsp;TOTAL</strong></td>
  <td height="37" align="right" style="border-top: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;border-left: 2px solid black;border-collapse: collapse;"><strong><?php 
	echo number_format((float)($ttt), 2, '.', '');
	?></strong></td>
    <?php
  	unset($packingg);
	unset($totalquantity);
	unset($tty);
	unset($cz);
	unset($totmm);
	?>
  </tr>

  
  <tr>
<td height="10" colspan="7" style="vertical-align:text-top;border-collapse: collapse;border-left: 2px solid black;border-top: none;border-bottom: none;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>
<?php /*?>  <tr >
    <td height="38" colspan="7" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;">Remarks:<strong><?php echo $remarks;?></strong></td>
  </tr><?php */?>
  <tr >
    <td height="100" colspan="2" style="vertical-align:text-top;border: 1px solid black; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-top: none;border-collapse: collapse;border-right: 2px solid black;">
<?php
 if($pname3!='')
{ ?>	
	<strong><u>CFS ADDRESS</u></br>
	<?php echo $pname3;?>
	</br><?php echo $cdistrict;?>.
</br>ATTEN: <?php echo $cpname;?>, CONT No: <?php echo $cmobile;?></br>
	
	</strong>
<?php }
else { ?><br />
<br />
<br />

<?php } ?>	
	<strong>Declaration:</strong>
 
   We declare that this invoice shows the actual price of this goods described and that all particulars are true and correct.
  
</td>
    <td  colspan="4" style="vertical-align:text-top;border: 2px solid black;border-collapse: collapse; border-color:#999;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-top: 2px solid black;border-bottom: 2px solid left;border-collapse: collapse;">

 <div align="left"> 

<strong>Signature & Date</strong></div>
      
      <br />
  <br />
  <br />
  <br />

  <div align="center">    
     
      
      </div>
      
      
    </td>
  </tr>
  

</table>




</div>
<?php $sid=$_REQUEST['cid'];?>
<div align="center"><input type="button" value="Print" onClick="PrintElem('#mydiv')" />
   	
	  <a href="#">  <input type="button" value="Export To Word" /></a> 

  
  </div>





</body>
</html>