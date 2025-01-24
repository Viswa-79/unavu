
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample Print</title>
<style type="text/css">
.style1
{
color:#990000;
font-weight:bold;
}
.style5 {font-size: 18px}
</style>


 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>


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
      $sql = " SELECT * FROM sample WHERE id='$sid'";
     $result =mysqli_query($conn, $sql);
     $so=mysqli_fetch_array($result);

 $date=date('d/m/Y',strtotime($so['date']));

?>


 <?php
$a1=mysqli_query($conn,"SELECT * FROM address");

$ad=mysqli_fetch_array($a1);
?>




<body>


    <div id="mydiv">
   <?php
      $sql = " SELECT * FROM sample1  WHERE cid='$sid'";
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

  <table width="800"  align="center" style="border-collapse:collapse; border:none;">
 

    <tr height="100px">
      <td style="border:none;" align="right">
      Date : <?php echo $date;?>
</td>
	  </tr>
	  
	      <tr height="70px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b>SAMPLE</BR></BR>
	  Order No : OMT/<?php echo $so['orderno'];?>&nbsp;&nbsp;
	     <?php if($ponos!='')
	  { ?>
	  Po No : <?php echo $ponos;?></b>
      <?php } ?></b>
      
</td>
	  </tr>
	  </table>

   <table width="800"  align="center" style="border:none;">
    
        <tr >
      <td style="border:none; vertical-align:text-top;" align="left">
	  

	  
	 </td></tr>
    
    
    
  </table>




  
  <table width="800" align="center" style=" border:1px solid #000000; border-collapse: collapse;">
    <tr>
   
      <td width="161"  style=" border:1px solid #000000; "><div align="center">
        <strong>Item Description</strong>
       
      </div></td>
      <td width="98"  style=" border:1px solid #000000; "><div align="center" ><strong>Quality / Size</strong></div></td>
     
	  <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>Order Qty</strong></div></td>
      <td width="79"  style=" border:1px solid #000000; "><div align="center" ><strong>Sample Qty</strong></div></td>
	  
      
    </tr>
      
      <?php
	  $sno=1;
$i=1;

$sql = " SELECT *,e.id as id,e.print as print FROM sample1 e left join item_master p on e.itemno=p.id  WHERE e.cid='$sid'";
$result =mysqli_query($conn, $sql);
while($b3=mysqli_fetch_object($result))
	{ 
		$oid=$b3->itemno;
	$sql2="SELECT quantity FROM order2 where itemno='$oid'";
$retval12 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($retval12);
$orderqty=$row2['quantity'];
	?>
  <tr style="border-bottom:1px solid black;" >

      <td height="100" style="border-right:1px solid black;"> <div align="left" style="margin-left:2%;"><strong>
	 <?php if($b3->itemno!='' && $b3->itemno!='-')
	{ ?> Item no:<?php echo $b3->code;?>/<?php } ?>&nbsp;
	  <?php 
	  if($b3->pono!='' && $b3->pono!='-')	{ ?> PO No:<?php echo $b3->pono;?><?php } ?>
	</strong></br><strong>Description : </strong><?php echo $b3->itemdesc;?></br>
	<?php if($b3->print!='' && $b3->print!='-')
	{ ?>  
	 <strong> Print: </strong><?php echo $b3->print;
	  }	?> </div></td>
      <td  style="border-right:1px solid black;" ><div align="left" style="margin-left:2%;"><strong>Quality:</strong><?php echo $b3->quality;?></br>
      <?php if($b3->size!='' && $b3->size!='-')
	{ ?>  
	 <strong> Size: </strong><?php echo $b3->size;
	  }	?>
      </div></td>
     
	  <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $orderqty;?> <?php echo $b3->unit;?></div>      </td>
      <td  style="border-right:1px solid black;" ><div align="center" style="margin-left:2%;"><?php echo $b3->quantity;?> <?php echo $b3->unit;?></div>      </td>
        
    </tr>
   <?php
   
	  }
	  ?>


  </table>
    
    
   </br> 
    




<table  width="800" align="center" style=" border-top:1px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;" >
  <p align="justify"><br />
 <span class="style5"></span><br />
 <br />
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


