<?php
error_reporting(0);
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
    $decimal     = ' point ';
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Packing List Print 4</title>
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

<!--    <link href="smart-gallery.css" rel="stylesheet" type="text/css" />

    <script src="smart-gallery.min.js" type="text/javascript"></script>-->


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
    <td style="border:none;"  width="709"><div style="margin-left:50%"><strong style="font-size:20px;">PACKING LIST</strong></div></td>
    <td style="border:none;" align="right"  width="157"><strong></strong></td>
  </tr>
</table>


    
     <?php
 include("config.php");

$sid=base64_decode($_REQUEST['cid']);


	//echo $invoiceno;
$a0="SELECT * FROM salesinvoice where id='$sid'";

$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);
//$town=$r1['town'];
 $invoiceno=$r1['invoiceno'];
$date1=$r1['date'];
$orderno=$r1['orderno'];

$orderdate=date('d/m/Y',strtotime($r1['orderdate']));

$partyname=$r1['partyname'];
$notes=$r1['notes'];
$accountname=$r1['accountname'];
$delivery_address=$r1['delivery_address'];	

$agent=$r1['agent'];
//$partyorderno=$r1['partyorderno'];
//$vehicleno=$r1['vehicleno'];
//$transport=$r1['transport'];
//$lrno=$r1['lrno'];
//$lrdate=date('d/m/Y',strtotime($r1['lrdate']));
/*$destination=$r1['destination'];
$delivery=$r1['delivery'];
$pono=$r1['pono'];
$podate=$r1['podate'];
$bank=$r1['bank'];
$bank1=$r1['bank1'];
$lrno=$r1['lrno'];
$lrdate=date('d/m/Y',strtotime($r1['lrdate']));
$paymentduedate=$r1['paymentduedate'];
*/

$dis=$r1['dis'];
$disamt=$r1['disamt'];
$packing=$r1['packamt'];

$cgst=$r1['cgst'];
$sgst=$r1['sgst'];
$igst=$r1['igst'];
$cgstamt=$r1['cgstamt'];
$sgstamt=$r1['sgstamt'];
$igstamt=$r1['igstamt'];

$freight=$r1['freight'];
$netamt=$r1['netamt'];
//$description=$r1['description'];
$remarks=$r1['remarks'];
//$lorryfreight=$r1['lorryfreight'];
//$totalmeters=$r1['totalmeters'];
//$totalfoldless=$r1['totalfoldless'];
//$totalrate=$r1['totalrate'];
//$totalamounts=$r1['totalamounts'];


$date2 = date('d/m/Y',strtotime($date1)); 

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
$rexno=$r1['rexno'];

 $currency=$r1['currency']; 
 $shipmentterms=$r1['shipmentterms'];
  $measurement=$r1['measurement'];
   $totalcartons=$r1['totalcartons'];
   $totalpcs=$r1['totalpcs'];
  
  

//$podate1 = date('d/m/Y',strtotime($podate)); 
//$lrdate1 = date('d/m/Y',strtotime($lrdate)); 




//$paymentduedate2=$paymenttime;

/*$arr=split("-",$paymentduedate); // splitting the array
$mm=$arr[1]; // first element of the array is month
$dd=$arr[2]; // second element is date
$yy=$arr[0]; // third element is year
//if(!checkdate($mm,$dd,$yy) || $yy<2015)
if($paymentduedate!='' && $paymentduedate!=NULL && $paymentduedate!='1970-01-01')
{
	
	$paymentduedate1=$paymentduedate2;
	$paymentduedate2 = date('d/m/Y',strtotime($paymentduedate)); 
	
}

else
{

$paymentduedate1=$paymentduedate;
$paymentduedate2=date('d/m/Y');

}
*/


$a0="SELECT * FROM order1";
$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);

$shipmentport=$r1['shipport'];



$a0="SELECT * FROM fyear ";
$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);
$lutno2=$r1['lutno2'];
$fyear=$r1['fyear'];


$a0="SELECT * FROM partymaster where id='$partyname'";

$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);


$pname=$r1['name'];
$caddress2=$r1['address'];
$eorino=$r1['eorino'];
$vatno=$r1['vatno'];
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
$statecode1=$r1['pincode'];

$a1=mysqli_query($conn,"SELECT * FROM partymaster where id='$delivery_address'");

$r1=mysqli_fetch_array($a1);


$pname2=$r1['name'];
$d2=$r1['country'];
//$s2=$r1['street'];

//$v2=$r1['village'];
//$t2=$r1['taluk'];
$dt2=$r1['city'];
//$tngstno2=$r1['tngstno'];
//$cstno2=$r1['cstno'];
$gstno2=$r1['gstno'];
//$iecode2=$r1['iecode'];
$state2=$r1['state'];
//$statecode2=$r1['statecode'];




$zz=mysqli_query($conn,"select * from address");
$zz1=mysqli_fetch_array($zz);
$bank=$zz1['bank'];
$branch=$zz1['branch'];
$accountno=$zz1['acno'];
$ifsc=$zz1['ifsc'];
//$panno=$zz1['panno'];
//$hsncode=$zz1['hsncode'];



?>

 
      <table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">
   

   <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="53" rowspan="4" colspan="2" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 2px solid black;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-bottom:none;"><strong>EXPORTER</strong><br />
    
<div style=" height:40px;vertical-align:top;text-transform:uppercase;font-weight:bold;" align="left">  <?php
   
	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>
        <strong style="font-size:20px;"><?php echo $rz2['companyname']; ?></strong><br />
        <?php echo $rz2['address'].","; ?>
        <?php echo $rz2['taluk']."<br>".$rz2['city'].",<br>".$rz2['state'].",".$rz2['country']."."; ?><br />
  
        <strong>GST No:<?php echo $rz2['gstno'];?></strong>
  
</span>    </div></td>
  <td width="233" height="24"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse;">Invoice No. & Date</td>
      <td width="206" height="24" style="border-right: 2px solid  black;border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;&nbsp;Exporter's Ref</td>
  </tr>
 <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
       <td width="233"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse;"><strong style="font-size:15px;" ><strong style="font-size:15px;">OMT-<?php echo $invoiceno;?>/<?php echo $fyear;?> DT. <?php echo $date2;?></strong></td>
      <td width="206" style="border-right: 2px solid  black;border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;<strong>IEC-<?php echo $rz2['expref'];?></strong></td>  
	  </tr>
	  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
      
       <td height="31" colspan="2" style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;">Buyers Order No. & Date</br>
	   <!-- <strong><?php echo $orderno;?>   <?php if($orderdate!=''){ echo "-";echo $orderdate; }?></strong> -->
    </td>
	  </tr>
	  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
       <td width="233" height="34"  style="border-left: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;">Other Reference(s)</br>
	<strong>   TIN NO:<?php echo $rz2['tinno'];?></strong></td>
      <td width="206" style="border-right: 2px solid black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;">&nbsp;<strong></br>LUT NO:<strong><?php echo $lutno2;?></strong></strong></td>   
  </tr>
  <tr style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="20" colspan="2" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 2px solid black;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-bottom:none;"><strong>CONSIGNEE</strong><br />
    
    <div style="margin-left:0%;text-transform:uppercase;">
    <strong><?php echo $pname;echo ","."<br />".$caddress2.","."<br />";/*echo $d1;echo $s1;echo "<br />";echo $v1;echo "<br />";echo $t1;*/ echo $dt1;echo ""."&nbsp;- ";echo $statecode1;echo ","."<br />";echo $state1. "<br />".$country1."."."<br />";?><?php if($eorino!=''){ echo"Eori No&nbsp; : " .$eorino."<br/>" ;}?> <?php if ($vatno!=''){ echo "Vat&nbsp;No&nbsp;&nbsp;&nbsp;: ".$vatno ; }?>
     <td height="20" colspan="2" style="border: 1px solid black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse;"><strong>Delivery Address</strong>
      </br>
    <div style="margin-left:0%;text-transform:uppercase;">
   <strong><?php echo $pname2;echo ","."<br />";/*echo $s2;echo "<br />";echo $v2;echo "<br />";echo $t2; */echo $dt2; echo "<br />";echo $state2;echo "<br />";echo $d2;?>
   
</strong>

</div>
      
      
    </td>
  </tr>
 
 <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    <td width="134"  height="27"  style="vertical-align:text-top;border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;border-collapse: collapse;">Pre-Carriage by</br>
	<strong><?php echo $carriage;?></strong></td>
  <td width="257" height="27"   style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;border-bottom: 2px solid black;border-top: 2px solid black;">Place of Receipt by Pre-Carrier</br>
  <strong style="text-transform:uppercase;"><?php echo $carrier;?></strong></td>


 <td  height="27"  style="vertical-align:text-top;border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;">Country of Origin of Goods</br><div align="center"><strong style="text-transform:uppercase;"><?php echo $rz2['country'];?></strong></div></td>
  <td width="206" height="27"  style="vertical-align:text-top;border-right: 2px solid  black;border-collapse: collapse;border-top: 2px solid black;border-left: 1px solid black;border-collapse: collapse;border-right: 2px solid bottom;border-bottom: 2px solid black;">Country of Final Destination</br>
    <div align="center"><strong style="text-transform:uppercase;"><?php echo $finaldestination;?></strong></div></td>
  </tr>
  
  
   <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    <td  height="23" style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;">Vessel / Flight No.</br><strong style="text-transform:uppercase;"><?php echo $vessel;?> </strong></td>
  <td  height="26"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;border-bottom: 2px solid black;">Port of Loading</br><strong style="text-transform:uppercase;"><?php echo $portofloading;?></strong> </td>
  
      <td  height="23" colspan="2" rowspan="2" style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;" >Terms of Delivery and Payment</br>
	 <strong style="text-transform:uppercase;"> <?php echo $terms;?></br></br><?php echo $shipmentterms;?>, <?php echo $shipmentport;?></strong></td>
  </tr>
  
  
  
  <tr style="border: 1px solid black;border-collapse: collapse; border-color:#999;">
    

 <td  style="vertical-align:text-top;border-left: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-collapse: collapse;">Port of Discharge</br><strong style="text-transform:uppercase;"><?php echo $portofdischarge;?></strong> </td>
  <td  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse;border-color:#999;border-left: 1px solid #999;border-collapse: collapse;">Final Destination</br><strong style="text-transform:uppercase;"><?php echo $finaldestination;?></strong></td>
  </tr>
</table>
<?php 
$a0="SELECT * FROM salesinvoice1 where cid='$sid'";

$a1=mysqli_query($conn,$a0);

$r1=mysqli_fetch_array($a1);
//$town=$r1['town'];
?>
<table width="850"  align="center" style="border: 1.5px solid black;border-collapse: collapse;">
  <tr align="center" style="border-collapse: collapse;font-size:12px;" height="30">
    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: none;border-bottom:none;border-collapse: collapse;vertical-align:top; " width="128">Marks & Nos./</td>
    <td style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: none;border-left: none;vertical-align:top;" width="490">No. & Kind of Pkgs.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description of Goods</td>
    <td style="border: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;;border-left: 2px solid black;vertical-align:top; " width="59">Quantity<strong><br />
<?php echo $measurement;?></strong></td>
    <td style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;;border-left: 2px solid black;vertical-align:top; " width="74" >NET WT.</td>
    <td style="border-right: 2px solid black;border-top: 2px solid black;border-collapse: collapse; border-bottom: 2px solid black;;border-left: 1px solid #999;vertical-align:top;" width="73" >GROSS WT.</td>
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
      $tqty=0;
      $tty=0;
      $tnetwt=0;
      $tgrwt=0;
      $tnetwt=0;
$i=1;

$b1="select * from salesinvoice1 q left join item_master w on q.itemno=w.id where cid='$sid'";
$b2=mysqli_query($conn,$b1);
	$sno=1;
	while($b3=mysqli_fetch_object($b2))
	{ 
//$lines_arr = preg_split('<br>',nl2br($b3->description));
//$num_newlines = count($lines_arr); 
//echo $num_newlines;	
$orderno1=$b3->orderno;
$itemno1=$b3->itemno;
  $sql1 = "SELECT * FROM order2 e left join order1 r on e.cid=r.id where ord_no='$orderno1' and itemno='$itemno1' ";
$result1 = mysqli_query($conn, $sql1);
$rw1 = mysqli_fetch_array($result1);
	 $pono=$rw1['pono'];
  $date3 = date('d/m/Y',strtotime($rw1['date'])); 
   ?>
  <tr style="border-bottom:none;border-collapse: collapse;font-size:12px;">
    <td style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse:collapse;
   border-right: none;vertical-align:top;" align="left"><strong><?php echo $b3->balenos;?></strong></td>
    <td align="left" height="" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: none; border-collapse: collapse;font-size:12px;text-transform:uppercase;"><strong>Order No. OMT-<?php echo $orderno1;?> DT :<?php echo $date3; ?> Po No : <?php echo $pono;echo "<br>" ?> Item No:<?php echo $b3->code;?> <?php   echo nl2br($b3->descgcl);?></strong></td>
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left:2px solid black;  border-collapse: collapse;vertical-align:top;"><strong><br />
<?php echo $b3->quantity;?></strong></td>
    <td align="right" height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-bottom:none;border-left: 2px solid black; border-collapse: collapse;vertical-align:top;"><br />
      <strong>
      <?php 
		echo number_format((float)$b3->netweight, 3, '.', ''); 
	?>
      </strong></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-bottom:none;border-left: 1px solid #999;vertical-align:top;" align="right"><br />
        <strong>
          <?php 
	
		echo number_format((float)$b3->grossweight, 3, '.', ''); 
	?>
        </strong></td>
  </tr>
  
  <?php
	
		$tqty+=number_format((float)$b3->quantity, 2, '.', '');
	$tty+=number_format((float)$b3->amount, 2, '.', '');
	
		$tnetwt+=number_format((float)$b3->netweight, 3, '.', '');
	$tgrwt+=number_format((float)$b3->grossweight, 3, '.', '');
	$sno++;
	
	  }
	  ?><tr style="font-size:12px;text-transform:uppercase">
     <td height="40" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
     <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><b><?php echo $notes;?></b></td>
   
     <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
     <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
   
     <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
   </tr>
  <?php
	  $k=$sno*5;
	  
	  for($i=$k;$i<=40;$i++)

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
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>NT.WT:
          <?php 
	
		echo number_format((float)$netwt, 3, '.', ''); 
	?>
      KGS</strong></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
    <td height="" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr>
  <tr style="">
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: none;border-collapse: collapse;border-collapse: collapse;"></td>
    <td style="border-left: none;border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;border-collapse: collapse;"><strong>GR.WT:
          <?php 
	
			echo number_format((float)$grwt, 3, '.', ''); 
	?>
      KGS</strong></td>
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
  <tr align="center" style="">
    <td height="37" colspan="2" align="left" style="border-collapse:collapse; border-top: 2px solid black;border-bottom:none;border-right: 2px solid black;border-left: 2px solid black;" ><strong style="text-transform:uppercase;">
      <?php 
	unset($packing);
unset($lorryfreight);?>
    </strong></td>
    <td height="37" align="right" style="border-top: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;border-left: 2px solid black;border-collapse: collapse;"><strong>
      <?php 
	echo $tqty;
?>
    </strong></td>
    <td align="center" height="37" style="border-top: 2px solid black;border-bottom: 2px solid black;border-right: 1px solid #999;border-collapse: collapse;"><strong>
          <?php 
	echo number_format((float)($tnetwt), 3, '.', '');
	?>
    </strong></td>
    <td height="37" align="right" style="border-top: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;border-left: 2px solid black;border-collapse: collapse;"><strong>
      <?php 
	echo number_format((float)($tgrwt), 3, '.', '');
	?>
    </strong></td>
    <?php
  	unset($packingg);
	unset($totalmeters);
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
    <td height="100" colspan="2" style="vertical-align:text-top;border: 1px solid black; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-top: none;border-collapse: collapse;border-right: 2px solid black;"><strong style="display:none;"><u>CFS ADDRESS</u> <?php echo $pname3;?> <?php echo $caddress;?>ATTEN: <?php echo $cperson;?> CONT No: <?php echo $cmobile;?> </strong> <strong> <br />
          <br />
          <br />
    </strong> </td>
    <td  colspan="4" style="vertical-align:text-top;border: 2px solid black;border-collapse: collapse; border-color:#999;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-top: 2px solid black;border-bottom: 2px solid left;border-collapse: collapse;"><br />
        <div align="left"> <strong>Signature & Date</strong></div>
      <br />
        <br />
        <br />
        <br />
        <div align="center"> </div></td>
  </tr>
</table>
</div>
<?php $sid=$_REQUEST['cid'];?>
<div align="center"><input type="button" value="Print" onClick="PrintElem('#mydiv')" />
   	

  
  </div>





</body>
</html>