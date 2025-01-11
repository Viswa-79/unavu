<?php
require("config.php");	
session_start();



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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fabric Stock Print</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
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









</script>
</head>

<body>

<div id="mydiv" >


<?php
error_reporting(0);

	$sid=base64_decode($_REQUEST['cid']);
	
		if($sid=='')
{
$s1="SELECT * FROM purchase_invoice order by id desc";
$sel=mysqli_query($connection,$s1);
$row=mysqli_fetch_array($sel);

$sid=$row['cid'];
}
else
{
$sid=base64_decode($_REQUEST['cid']);
}

// $wz=mysqli_query($connection,"select * from invoice_settings");
// $wz1=mysqli_fetch_array($wz);

// $color=$wz1['color'];
// $font_color=$wz1['font_color'];
// $ino_prefix=$wz1['ino_prefix'];
// $ino_year=$wz1['ino_year'];
// $ino_start=$wz1['ino_start'];

// $logo=$wz1['logo'];
// $logo_height=$wz1['logo_height'];
// $logo_width=$wz1['logo_width'];
// $terms=$wz1['terms'];




?>
    



<table align="center" width="852" style="border:none; page-break-before:always;">

  <tr style="border:none;">
    <td  width="709" height="25" style="border:none;"><div style="margin-left:35%"><strong style="font-size:22px;">FABRIC STOCK TRANSFER</strong></div></td>
  </tr>
</table>


  <?php

 $wz=mysqli_query($conn,"select * from fabric_stock      where id='$sid'");
$wz1=mysqli_fetch_array($wz);
$book=$wz1['book'];
$date=$wz1['date'];
$dcno=$wz1['dcno'];
$partyname=$wz1['partyname'];
$process=$wz1['process'];



?>  

<?php
     	
     	 $f51=strlen($invoiceno);
if($f51=='1')
{
$f52='00';
}
if($f51=='2')
{
$f52='0';
}
if($f51=='3')
{
$f52='';
}

  
  $invno=$f52.$invoiceno; 
      
       ?>
<table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">

  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td  colspan="5"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse; vertical-align:text-top;" >
   <?php
   
	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>   
          <div style="height:auto; vertical-align:top; margin-left:20px;margin-top:10px; text-transform:capitalize;width:100%;">
  
      <img src="..\assets\img\avatars\logo.png" style=" height: 100px;
    width: 140px;"   /><br />


        <strong style="font-size:20px;"><?php echo $rz2['companyname']; ?></strong><br />
        <?php echo $rz2['address'].","; ?><br />
        <?php echo $rz2['city']."-".$rz2['pincode'].",<br>".$rz2['state'].",".$rz2['country']."."; ?><br />
  		 <strong>Mobile No : <?php echo $rz2['telephone'];?></strong><br />
		
    </div>
 <strong>Email : <?php echo $rz2['emailid'];?></strong>
    <div align="left" style="width:100%;margin-bottom:5px;">
    <!-- <div align="left" style="width:50%;float:left;"><strong>&nbsp;GST No. : <?php echo $rz2['gstno'];?></strong></div> -->
	<!--<div align="right" style="width:50%;float:right;"><strong>PAN No. : <?php echo $rz2['pan'];?>&nbsp;</strong></div> -->
	</div><br />

    </td>
  </tr>
 

    <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="38" colspan="2" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black; border-bottom: 1px solid #999;border-collapse: collapse; border-top: 2px solid black;border-collapse: collapse;" ><strong style="font-size:20px;">&nbsp;Recepit No :</strong>&nbsp;<?php echo $book;?>
	</td>
  
	  <td width="183" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-collapse: collapse;border-right:none;"><strong style="font-size:20px;padding-left:5px;"><strong>Dc No</strong></td>
    <td width="11" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-collapse: collapse; border-right:none;border-left:none;"><strong style="color:#000;">:</strong></td>
    <td width="205" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;border-left:none;font-size:20px;"> <?php echo $dcno;?></td>
	
  
  </tr>
	
	
  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="50" colspan="2" rowspan="3" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black;border-collapse: collapse; border-top: 1px solid #999;border-bottom: 1px solid #999;border-collapse: collapse; vertical-align:text-top;" >
<div style="margin-left:15%;margin-top:2%">
        <?php  
          $a0="SELECT * FROM fabric_stock   where id='$sid'";
//echo $a0;
$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);

          
        echo "<span style='text-transform:capitalize;'>".$r1['name']."</span>";?>
<br /><br />


      </div>   	
    
    </td>

    <td height="28" style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right:none;padding-left:5px;"><strong> Date</strong></td>
    <td style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right:none;border-left:none;"><strong>:</strong></td>
    <td style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-left:none;"><?php echo $date;?></td>
  </tr>
</table>

<table  width="850"  align="center" style="border: 1.5px solid black;border-collapse: collapse;">
  <tr align="center" style="font-weight:bold;border-collapse: collapse;background-color:#<?php echo $color;?>;color:#<?php echo $font_color;?>;">
    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black">Ref No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black">From Order No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">From Item No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Quality</td>
   
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Color</td>
  <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black">To Order No</td>
  <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">To Item No</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Unit</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Quantity</td>

</tr>
  <?php

		   $sno=1;$i=0;$j=0;
 $sql = "SELECT *,l.color as color,k.quality as quality,x.unit as unit  FROM fabric_stock1 j  left join quality_master k on j.quality=k.id left join color l on j.color=l.id  left join item_master z on j.itemno=z.id left join item_master y on j.itemno=y.id left join unit_master x on j.unit=x.id where j.cid='$sid' order by j.id asc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
$sql5 = "SELECT * FROM item_master z where id='".$row['toitem']."'";
$result2 = mysqli_query($conn,$sql5);
$rows = mysqli_fetch_array($result2);

	?>
  <tr style="border-bottom:none;border-collapse: collapse;font-size:12px;">
    <td height="" style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse: collapse;border-right: 1px solid #999;"><div align="center"><?php echo $sno;?> </div></td>
    <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['ref'];?> </td>
    <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['orderno'];?> </td>
    <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['code'];?> </td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['quality']; ?></td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['color']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['toorder']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $rows['code']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['unit']; ?></td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['quantity']; ?></td>
  </tr>

  <?php

$tlquantity+=number_format((float)$row['quantity'], 2, '.', '');

	$sno++;

	$j++;
	  }
  
	  $k=$sno;
	  
	  if($k>10)
	  {
		 $rr=20;
	  }
	  else
	  {
		 $rr=16;  
	  }
	  
	  
	  for($i=$sno;$i<=$rr;$i++)
  
 {
  ?>
  <tr >
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>
    <td height="18" style="border-left: 1px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>
    <td height="18" style="border-left: 1px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>

	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
</tr>
  <?php }
 ?>
 <tr  style="border:none;">
 
	
 <td  style="border-left:2px solid black;" colspan="9" ><div align="right"><strong>Total&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
<td  style="border-right:2px solid black;" ><div align="right"><strong><?php echo $tlquantity; ?></strong></div></td>
</tr>
  
</table>


<table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center"> 
 
    
     
     
  <tr >
  
  
    <td width="452" height="68"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;">
	<strong>
      Remarks:&nbsp;&nbsp;&nbsp;</strong>
      </br>

      <div align="left"><?php echo $r1['remarks'];?> </div>
    </td>
	
	
    <td width="386" height="80"  align="center"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;"><strong>For <?php echo $rz2['companyname']; ?></strong>  <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    
    <div align="center"> Authorised Signatory. </div></td>
  </tr>
</table>




</div>
</div>
<div align="center">


<input type="button" value="Print" onClick="PrintElem('#mydiv')" />
   	
	 <?php /*?>	  <a href="purchaseorder_print11.php?cid=<?php echo $sid;?>" >  <input type="button" value="Export To Word" /></a> <?php */?>

  
</div>





</body>
</html>
