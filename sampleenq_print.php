
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
<title>Sample Enquiry Print</title>
<style type="text/css">
.style1
{
color:#990000;
font-weight:bold;
}
.style5 {font-size: 18px}
</style>
<script src="pro_dropdown_2/stuHover.js" type="text/javascript"></script>

 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

    <link href="smart-gallery.css" rel="stylesheet" type="text/css" />

    <script src="smart-gallery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('#smart-gallery').gallery({ stickthumbnails: true, random: true});
        });
    </script>
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

   $sql = " SELECT *,e.id as id FROM sampleenq e left join staff p on e.follow=p.id WHERE e.id='$sid'";
   $result =mysqli_query($conn, $sql);
   $so=mysqli_fetch_array($result);

 $date1=date('d/m/Y',strtotime($so['date']));

?>


<?php
$a1=mysqli_query($conn,"SELECT * FROM address");

$ad=mysqli_fetch_array($a1);


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
	 <u> <b>SAMPLE INSTRUCTION</b></u></BR>
	
      
</td>
	  </tr>
	  </table>
	
    
   </br> 
    
  <table  width="878" align="center" style=" border:none;border-collapse: collapse;">
 
 <tr style="line-height:35px;">
 <td width="261" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Sample Order No. </span></td>
 <td width="605" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['book'];?></span></td>
 </tr>
 
 <tr style="line-height:35px;">
 <td width="261" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">File Ref No.</span></td>
 <td width="605" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['refno'];?></span></td>
 </tr>
 
   <tr style="line-height:35px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Follow Up</span></td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['name'];?></span></td>
 </tr>
 
 
 
   <tr style="line-height:35px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Date</span></td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $date1;?></span></td>
 </tr>
 
 <tr style="line-height:35px;">
 <td colspan="2" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong><u>Regarding Inquiry  - <?php echo $so['enq_no'];?></strong> </span></td>

 </tr>
 
 </table>
 
  <table width="878" align="center" style=" border:1px solid #000000; border-collapse: collapse;">
    <tr>
   
      <td width="161"  style=" border:1px solid #000000; "><div align="center">
        <strong>Item Description</strong>
       
      </div></td>
      <td width="98"  style=" border:1px solid #000000; "><div align="center" ><strong>Quality / Size</strong></div></td>
     
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>Quantity</strong></div></td>

	  
      
    </tr>
      
      <?php
	  $sno=1;
$i=1;

$sql2 = " SELECT *,e.id as id,e.print as print FROM sampleenq1 e left join item_master p on e.itemno=p.id WHERE cid='$sid'";
$result2 =mysqli_query($conn, $sql2);
while($b3=mysqli_fetch_object($result2))
	{ 

	
	?>
  <tr style="border-bottom:1px solid black;" >

      <td height="100" style="border-right:1px solid black;"> <div align="left" style="margin-left:2%;"><strong>
      <?php if($b3->itemno!='' && $b3->itemno!='-')
	{ ?> Item no:<?php echo $b3->code;?><?php } ?><br>
	 
</strong>

<?php echo $b3->itemdesc;?></br>
	<?php if($b3->print!='' && $b3->print!='-')
	{ ?>  
	 <strong> Print:</strong><?php echo $b3->print;
	  }	?>
	  </br>
	<?php if($b3->label!='' && $b3->label!='-')
	{ ?>  
	  <strong>Label:</strong><?php echo $b3->label;
	  }	?> </div></td>
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><strong>Quality:</strong><?php echo $b3->quality;?></br><strong></strong>
      <?php if($b3->size!='' && $b3->size!='-')
	{ ?>  
	  <strong>Size:</strong><?php echo $b3->size;
	  }	?> </div></td>
   
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->quantity;?> <?php echo $b3->unit;?></div>      </td>
        
    </tr>
   <?php
 
   
	  }
	  ?>


  </table>
    
    
   </br> 
    

<table width="878"  align="center" style="border-collapse:collapse; border:none;">
    <tr style="line-height:35px;">
 <td width="258" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">Remarks </span></td>
 <td width="608" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['remarks'];?></span></td>
 </tr>
 
</table>

 
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


