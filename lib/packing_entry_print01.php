

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
<title>Packing Print</title>
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
  $sql = " SELECT * FROM packing_entry j left join partymaster k on j.partyname=k.id WHERE j.id='$sid'";
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
 
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
  <tr height="100px">
      <td style="border:none;" align="center">
      <img src="..\assets\img\avatars\<?php echo $ad['logo'];?>"/>
</td>
    </tr>
	  	      <tr height="40px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b><img src="..\assets\img\avatars\<?php echo $ad['logo2'];?>" style=" height: 40px;
    width: 220px;"   /></b></BR></BR>
	
      
</td>
	  </tr>

  
      
	  
	      <tr height="20px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b>DETAILED PACKING LIST</BR>
	
      
</td>
	  </tr>
	  </table>
    
   </br> 
  <br />
  <table width="879" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">

  
 

    <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="38" colspan="3" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black; border-bottom: 1px solid black;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Book No : </strong><?php echo $so['dcno'];?>
	</td>
	  <td width="50" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-collapse: collapse;border-right:none;"><strong style="font-size:20px;padding-left:5px;"><strong style="font-size:20px;">Date</strong></td>
    <td width="10" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-collapse: collapse; border-right:none;border-left:none;"><strong style="color:#000;">:</strong></td>
    <td width="350" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-right: 1px solid black;border-collapse: collapse;border-left:none;font-size:20px;"><?php echo $so['date'];?></td>
	</tr>
	
	
    <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="38" colspan="3" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black; border-bottom: 1px solid black;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;" ><strong>&nbsp;Dc No :</strong> <?php echo $so['refno'];?>
	</td>
	  <td width="110" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-collapse: collapse;border-bottom:1px solid black;border-right:none;"><strong style="font-size:20px;padding-left:5px;">Party Name</td>
    <td width="11" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-collapse: collapse;border-bottom:1px solid black; border-right:none;border-left:none;"><strong style="color:#000;">:</strong></td>
    <td width="350" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 1px solid black;border-right: 1px solid black;border-collapse: collapse;border-bottom:1px solid black;border-left:none;font-size:20px;"><?php echo $so['name'];?></td>
	</tr>


  

  
  

</table>
<br>
<table width="879" align="center" style=" border:1px solid #000000; border-collapse: collapse;font-size:18px;">
<?php
	  $sno=1;
$i=1;

    $sql2="SELECT * FROM packing_entry1 e left join item_master d on e.itemno=d.id where e.cid='$sid' order by e.id asc";
	$result = mysqli_query($conn,$sql2);
while($row = mysqli_fetch_array($result))
{

	?>
<tr>
 <td width="80"  style=" border:1px solid #000000; "><div align="left" ><strong>Order No :</strong></div></td>
 <td  style=" border:1px solid #000000; "colspan="7"><div align="left" ><?php echo $sql2['orderno'];?></div></td>

 </tr>   

 <tr>
 <td width="80"  style=" border:1px solid #000000; "><div align="left" ><strong>Item No :</strong></div></td>
 <td   style=" border:1px solid #000000; "colspan="7"><div align="left" ><?php echo $sql2['code'];?></div></td>

 </tr> 
 <tr>
 <td width="80"  style=" border:1px solid #000000; "><div align="left" ><strong>Item Description :-</strong></div></td>
 <td   style=" border:1px solid #000000; "colspan="7"><div align="left" ><?php echo $sql2['itemdesc'];?></div></td>

 </tr>
 <tr>
 <td width="80"  style=" border:1px solid #000000; "><div align="left" ><strong>Carton Size :</strong></div></td>
 <td  style=" border:1px solid #000000; "colspan="7"><div align="left" ><?php echo $sql2['cartonsize'];?><strong></strong></div></td>

 </tr>
<tr>
   
      <td width="120"  style=" border:1px solid #000000; "><div align="center">
        <strong>Carton NOS</strong>
       
      </div></td>
      <td width="98"  style=" border:1px solid #000000; "><div align="center" ><strong>Total Carton</strong></div></td>
      <td width="98"  style=" border:1px solid #000000; "><div align="center" ><strong>Total Pcs</strong></div></td>
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>NT WT/Carton</strong></div></td>
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>GR WT/Carton</strong></div></td>
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>Total NT WT</strong></div></td>
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>Total GR WT</strong></div></td>

	  
      
    </tr>
      
   
  <tr style="border-bottom:1px solid black;" >

      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['frombox'];?>-<?php echo $sql2['tobox'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['totalbox'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['totalpcs'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['netweight'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['grossweight'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['totalnet'];?> </div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;margin-bottom:2%;margin-top:2%;"><?php echo $sql2['totalgross'];?> </div>      </td>
        
    </tr>
    
    <tr  style="border:none;">
 
	
 <td  style="border-left:1px solid black;" colspan="2" ><div align="right"><strong>Total&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
<td  style="border-right:1px solid black;" ><div align="right"><strong><?php   ?></strong></div></td>
<td  style="border-right:1px solid black;" ><div align="right"><strong><?php   ?></strong></div></td>

<td  style="border-right:1px solid black;" ><div align="right"><strong><?php ?></strong></div></td>
<td  style="border-right:1px solid black;" ><div align="right"><strong><?php  ?></strong></div></td>
</tr>
   <?php
   
   
	  }
	  ?>


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


