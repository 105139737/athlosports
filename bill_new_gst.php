<?php
$reqlevel = 3;
include("membersonly.inc.php");
include("Numbers/Words.php");
$blno=rawurldecode($_REQUEST[blno]);

$query111 = "SELECT * FROM ".$DBprefix."billing where blno='$blno'";
$result111 = mysqli_query($conn,$query111)or die (mysqli_error($conn));
while ($R111 = mysqli_fetch_array ($result111))
{
$invdt=$R111['dt'];
$vno=$R111['vno'];
$fst=$R111['fst'];
$tst=$R111['tst'];
$tmode=$R111['tmod'];
$psup=$R111['psup'];
$tp=$R111['tp'];
$cid=$R111['cid'];
$bgstin=$R111['gstin'];
$invto=$R111['invto'];
$adrs=$R111['adrs'];
$sfno=$R111['sfno'];
$dpay=$R111['dpay'];
$finam=$R111['finam'];
$emiam=$R111['emiam'];
$emi_mnth=$R111['emi_mnth'];
$sale_per=$R111['sale_per'];
$disl=$R111['disl'];
$remk=$R111['remk'];
$damm=$R111['damm'];
}
$data11= mysqli_query($conn,"select * from main_ledg where sl='$disl'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data11))
{
$dislam=$row1['nm'];
}
$invdt=date("d-m-Y", strtotime($invdt));	


$gbit=mysqli_query($conn,"select * from main_state where sl='$tst'") or die (mysqli_error($conn));
while($GBi=mysqli_fetch_array($gbit))
{
$statnm=$GBi['sn'];
$statcd=$GBi['cd'];
}

$nw = new Numbers_Words();
$aiw=$nw->toWords($iamm);
$str = strtoupper($aiw);
if($psup=="")
{
//$psup="Krishnagar";
}
?>
<html>
<head>
<title>TAX INVOICE</title>
<style>
.tb
{
border-collapse: collapse;
border: 1px solid black;
border-left: none;
border-right: none;
}
.ff{
border-collapse: collapse;
border: 1px solid black;
}
#tdb
{

	border-bottom: 0px solid #FFF;
	border-top: 0px solid #FFF;
}

.tdlr
{

	border-bottom: 0px solid #FFF;
	border-top: 0px solid #FFF;
}
.tdr
{

	border-bottom: 0px solid #FFF;
	border-top: 0px solid #FFF;
	border-left: 0px solid #FFF;
	border-right: 1px solid #000;
}
</style>

</head>
<body onload="blprnt()">
<script type="text/javascript">
function blprnt(){
  if(confirm('Are You Sure?')){
    
   window.print();
  }
   
}

</script>


<?
   for($CNT=0;$CNT<2;$CNT++){

   if($CNT==0){$cp="Orginal Buyer's Copy";}
   if($CNT==1){$cp='Saler Copy';}
   if($CNT==2){$cp='Transportation Copy';}
   $csss="";
   if($CNT!=2)
   {
	   $csss="page-break-after:always";
   }
	?>
<div style="<?=$csss;?>">

<center>
<br>
<font style="font-size:20px;"><b>TAX INVOICE</b></font><br>
</center>
<table align="center" style="border-collapse:collapse; border: 1px solid black; text-align:center;width:800px">
<tr>
<td> 

<!-- Sub Table 1 Start-->
<table style="border-collapse:collapse; border: 1px solid black; width:100%;">
<tr>
<td style="text-align:center; border: 1px solid black; width:70%;">
<font style="font-size:30px;"><b><? echo $comp_nm;?></b></font><br/>

<font style="font-size:18px;"><b>Dealers In : TMT ROD AND STRUCTURE</b></font><br/>
<font style="font-size:18px;"><?=$comp_addr;?></font><br/>
<font style="font-size:14px;">GSTIN/UIN : <?=$gstin?></font> , 
<font style="font-size:14px;"> Mobile : <?=$cont?></font>
</td>
<td style="border: 1px solid black; width:15%;text-align:center">
<?=$cp;?>
</td>
</tr>
</table>
<!-- Sub Table 1 End-->

</td>
</tr>
<tr>
<td>

<!-- Sub Table 2 Start-->
<table style="border-collapse:collapse; border: 1px solid black; width:100%;">
<tr>
<td style="text-align:left; border: 1px solid black; width:50%;">
<table style="width:100%;">
<tr>
<td style="width:30%;"><font size="2">Invoice No. </font><span style="float:right"><font size="2">:</font><span></td><td><font size="2"><?=$blno;?></font></td>
</tr>
<tr>
<td><font size="2">Invoice Date </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?=$invdt;?></font></td>
</tr>
<?
if($sfno!='')
{
?>
<tr>
<td><font size="2">Ref.\SF </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?=$sfno;?></font></td>
</tr>
<?
}

?>
</table>
</td>
<td style="text-align:left; border: 1px solid black; width:50%;">
<table style="width:100%;">
<tr>
<td style="width:45%;"><font size="2">Transportation Mode </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?echo $tmode;?></font></td>
</tr>
<tr>
<td><font size="2">Vehicle Number </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?echo $vno;?></font></td>
</tr>
<tr>
<td><font size="2">Place of Supply </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?echo $psup;?></font></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- Sub Table 2 End-->

</td>
</tr>
<tr>
<td>

<?
if($invto!='')
{
$cid=$invto;	
}
else
{
$cid=$cid;	
}

$gbt=mysqli_query($conn,"select * from main_cust where sl='$cid'")or die (mysqli_error($conn));
while($GB=mysqli_fetch_array($gbt))
{
$bto=$GB['nm'];
$nmp=$GB['nmp'];
$baddr=$GB['addr'];
$baddr1=$GB['addr1'];
$baddr2=$GB['addr2'];
$bmob=$GB['cont'];
$bvat=$GB['vatno'];
$bpan=$GB['pan'];
}
if($nmp!='')
{
$bto=$nmp;	
}
?>

<!-- Sub Table 3 Start-->
<table style="border-collapse:collapse; border: 1px solid black; width:100%;">
<tr bgcolor="#e4e4e4">
<td style="text-align:center; border: 1px solid black;"><font size="2">Billed to :</font></td>
<td style="text-align:center; border: 1px solid black;"><font size="2">Sales Person :</font></td>
</tr>
<tr>
<td style="text-align:left; border: 1px solid black; width:50%;">
<table style="width:100%;">
<tr>
<td style="width:20%;"><font size="2">Name </font><span style="float:right"><font size="2">:</font></span></td><td colspan="3"><font size="2"><b><?=$bto;?></b></font></td>
</tr>
<tr>
<td style="text-align:left;vertical-align:top;"><font size="2">Address </font><span style="float:right"><font size="2">:</font></span></td>
<td colspan="3"><font size="2"><?=$baddr;?>
</font>
</td>
</tr>
<?
if($bmob!="")
{

	?>
	<tr>
	<td><font size="2">Mobile </font><span style="float:right"><font size="2">:</font></span></td>
	<td colspan="3"><font size="2"><?echo $bmob;?></font></td>
	</tr>
<?}
?>
<tr>
<td><font size="2">GSTIN </font><span style="float:right"><font size="2">:</font></span></td><td ><font size="2"><?=$bgstin;?></font></td>
<td  colspan="2" align="right">
<font size="2">State : <?=$statnm;?></font>
</td>
</tr>
<tr>
<td><font size="2">PAN </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?=$bpan;?></font></td>
<td colspan="2" align="right"><font size="2">State Code : <?=$statcd;?></font></td>
</tr>
</table>
</td>
<td style="text-align:left; border: 1px solid black; width:50%;" valign="top">
<?



$gbt1=mysqli_query($conn,"select * from main_cust where sl='$cid1'")or die (mysqli_error($conn));
while($GB=mysqli_fetch_array($gbt1))
{
$bto=$GB['nm'];
$nmp=$GB['nmp'];
$baddr=$GB['addr'];
$baddr1=$GB['addr1'];
$baddr2=$GB['addr2'];
$bmob=$GB['cont'];
$bvat=$GB['vatno'];
$bpan=$GB['pan'];
}
if($nmp!='')
{
$bto=$nmp;	
}
?>


<table style="width:100%;">
<tr>
<td style="width:20%;"><font size="2">Name </font><span style="float:right"><font size="2">:</font></span></td><td colspan="3"><font size="2"><b><?=$sale_nm;?></b></font></td>
</tr>
<tr>
<td style="text-align:left;vertical-align:top;"><font size="2">Mobile </font><span style="float:right"><font size="2">:</font></span></td>
<td colspan="3"><font size="2"><?=$sale_mob;?>
</font>
</td>
</tr>
<?
?>

<?
?>
<?/*
<tr>
<td><font size="2">GSTIN </font><span style="float:right"><font size="2">:</font></span></td><td ><font size="2"><?=$bgstin;?></font>
</td>
<td colspan="2" align="right">
<font size="2">State : <?=$statnm;?></font>
</td>
</tr>
<tr>
<td><font size="2">PAN </font><span style="float:right"><font size="2">:</font></span></td><td><font size="2"><?=$bpan;?></font></td>
<td colspan="2" align="right"><font size="2">State Code : <?=$statcd;?></font></td>
</tr>
*/?>
</table></td>
</tr>
</table>
<!-- Sub Table 3 End-->

</td>
</tr>
<tr>
<td>

<!-- Sub Table 4 Start-->
<table border="1" class="ff" style="width:100%;">
<tr bgcolor="#e4e4e4">
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">S.No</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;" ><font size="2">Description of Goods</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">HSN Code<br>(GST)</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Quantity</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Rate</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Total<br>Am.</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Disc.<br>%</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Disc.<br>Am.</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;" colspan=""><font size="2">Taxable<br>Am.</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Tax Rate</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;"><font size="2">Tax Value</font></td>
<td rowspan="1" style="text-align:center; border: 1px solid black;" ><font size="2">Net<br>Amount</font></td>
</tr>


<?
$height="380";
$sln=0;
$pcs1=0;
$cgst_rt1=0;   
$cgst_am1=0;   
$sgst_rt1=0;   
$sgst_am1=0;   
$igst_rt1=0;   
$igst_am1=0;  
$rsmm1=0;
$tamm1=0;
$gttl=0;
$gttl2=0;
$pcs1=0;
$tasqm=0;
$total_amm=0;
$disa_amm=0;
$total_amm=0;
$disa_amm=0;
$gttl=0;
$tgst=0;
$pnm1="";
$total_qty=0;
$data= mysqli_query($conn,"select *,sum(pcs) as pcs,sum(cgst_am) as cgst_am,sum(sgst_am) as sgst_am,sum(igst_am) as igst_am from  main_billdtls where sl>0 and blno='$blno' group by prsl,prc")or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($data))
{
$cat=$row['cat'];
$scat=$row['scat'];	
$pcd=$row['prsl'];
$prc=$row['prc'];
$total=$row['total'];
$ttl=$row['ttl'];
$blno1=$row['blno'];
$unit=$row['unit'];
$pcs=$row['pcs'];
$cgst_rt=$row['cgst_rt'];   
$cgst_am=$row['cgst_am'];   
$sgst_rt=$row['sgst_rt'];   
$sgst_am=$row['sgst_am'];   
$igst_rt=$row['igst_rt'];   
$igst_am=$row['igst_am'];   
$net_am=$row['net_am'];  
$imei=$row['imei'];  
$disp=$row['disp'];  
$disa1=$row['disa'];  
$betno=$row['betno'];  
$bcd=$row['bcd'];  
$pgst=$cgst_am+$sgst_am+$igst_am;
$pgstr=$cgst_rt+$sgst_rt+$igst_rt;
$cgst_am1=$cgst_am1+$cgst_am;   
$sgst_am1=$sgst_am1+$sgst_am;   
$igst_am1=$igst_am1+$igst_am; 
$sln++;
$total_qty+=$pcs;
$cnm="";				
$data12= mysqli_query($conn,"select * from main_catg where sl='$cat'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data12))
{
$cnm=$row1['cnm'];
}
$scat_nm="";				
$data2= mysqli_query($conn,"select * from main_scat where sl='$scat'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data2))
{
$scat_nm=$row1['nm'];
}
$pnm="";
$query6="select * from  ".$DBprefix."product where sl='$pcd'";
$result5 = mysqli_query($conn,$query6);
while($row=mysqli_fetch_array($result5))
{
$pnm=$row['pnm'];
$hsn=$row['hsn'];
}

$get=mysqli_query($conn,"select * from ".$DBprefix."unit where cat='$pcd'") or die(mysqli_error($conn));
while($roww=mysqli_fetch_array($get))
{
	$sun=$roww['sun'];
	$mun=$roww['mun'];
	$bun=$roww['bun'];
	$smvlu=$roww['smvlu'];
	$mdvlu=$roww['mdvlu'];
	$bgvlu=$roww['bgvlu'];
}
if($unit=='sun'){$stock_in=$pcs." ".$sun;}
if($unit=='mun'){$stock_in=$pcs." ".$mun;}
if($unit=='bun'){$stock_in=$pcs." ".$bun;}

if($disp==0)
{
 if($disa1>0)  
{
$disp=round(($disa1*100)/$total,2);
}
}


$gst=$cgst_rt+$sgst_rt+$igst_rt;
$gst_rate=round($prc/($gst+100),4);
$rate=round($gst_rate*100,2);
$total=round($rate*$pcs,2);


$disa=round(($total*$disp)/100,2);

$ttl=round($total-$disa,2);

$net_am=$ttl+$pgst;
if($pnm1==$pnm){$pnm2="";$pnm2="<b>".$pnm."</b><br>";}else{$pnm2="<b>".$pnm."</b>";}
$betno1="";
$data1= mysqli_query($conn,"select * from  main_billdtls where sl>0 and blno='$blno' and prsl='$pcd' and prc='$prc'")or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($data1))
{
$betno=$row['betno']; 	
if($betno!='')
{
if($betno1==""){$betno1="<br>Sl. No. -".$betno;}else{$betno1.="<br>Sl. No. -".$betno;}
}
$height=$height-20;
}
?>
<tr id="tdb">
<td style="text-align:center; width:2%;" valign="top"><font size="2"><?=$sln;?></font></td>
<td style="text-align:left;" valign="top" ><font size="2"><?=$pnm2;?>
<?=$betno1;?><br>
<?/*Godown -  <?=get_branch_name_godown($bcd);*/?> 
</font></td>
<td style="text-align:center; " valign="top"><font size="2"><?=$hsn;?></font></td>
<td style="text-align:center; width:8%;" valign="top"><font size="2"><?=$stock_in;?></font></td>

<td style="text-align:right; " valign="top"><font size="2"><?=number_format($rate,2);?></font></td>
<td style="text-align:right; " valign="top"><font size="2"><?=number_format($total,2);?></font></td>
<td style="text-align:right; " valign="top" ><font size="2"><?=number_format($disp,2);?></font></td>
<td style="text-align:right; " valign="top"><font size="2"><?=number_format($disa,2);?></font></td>
<td style="text-align:right; " valign="top" ><font size="2"><?=number_format($ttl,2);?></font></td>
<td style="text-align:right; " valign="top" ><font size="2"><?=$pgstr;?>%</font></td>
<td style="text-align:right; " valign="top"><font size="2"><?=number_format($pgst,2);?></font></td>
<td style="text-align:right; " valign="top"><font size="2"><?=number_format($net_am,2);?></font></td>



</tr>
<?
$total_amm+=$total;
$disa_amm+=$disa;
$gttl=$gttl+$ttl;
$tgst+=$pgst;
$pnm1=$pnm;
}


$gttl2=round($gttl,2)+$tgst;


$rgttl=round($gttl2);
$roff=round($rgttl-$gttl2,2);



?>
<tr style="height:<?=$height;?>px;">
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>
<td style="text-align:center;"><font size="2">&nbsp;</font></td>

</tr>
<tr bgcolor="#e4e4e4">
<td colspan="3" style="text-align:center; border: 1px solid black;"><font size="2">Sub Total</font></td>
<td style="text-align:center; border: 1px solid black;"><font size="2"><?=$total_qty;?></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format($total_amm,2);?></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format($disa_amm,2);?></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format($gttl,2);?></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"></font></td>
<td style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($tgst,2),2);?></font></td>
<td  style="text-align:right; border: 1px solid black;" colspan=""><font size="2"><?=number_format($gttl+$tgst,2);?></font></td>
</tr>


<tr bgcolor="#e4e4e4">
<td colspan="5" style="text-align:center; border: 1px solid black;"><font size="2">Invoice Value (In Words) : <b> <? $nw = new Numbers_Words();$aiw=$nw->toWords(round($rgttl));echo $aiw;?> only</font></b></td>
<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Total Amount Before Tax</font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;" colspan=""><font size="2"><?=number_format(round($gttl,2),2);?></font></td>
</tr>
<tr>
<td colspan="5" rowspan="5" style="text-align:left; border: 1px solid black;"><font size="2">
<font size="2">Bank Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><font size="3">: <?=$comp_nm;?> :</font>
<table width="100%">



<tr>
<td><font size="2"><b>Bank Name</b></font></td>
<td class="tdr"><font size="2">: <?=$acnm1;?></font></td>
<td><font size="2"><b>Bank Name</b></font></td>
<td><font size="2">: <?=$acnm2;?></font></td>
</tr>
<tr>
<td><font size="2"><b>A/C No.</b></font></td>
<td class="tdr"><font size="2">: <b><?=$ac1;?></b></font></td>
<td><font size="2"><b>A/C No.</b></font></td>
<td><font size="2">: <b><?=$ac2;?></b></font></td>
</tr>
<tr>
<td><font size="2"><b>IFSC</b></font></td>
<td class="tdr"><font size="2">: <b><?=$ifsc1;?></b></font></td>
<td><font size="2"><b>IFSC</b></font></td>
<td><font size="2">: <b><?=$ifsc2;?></b></font></td>
</tr>
<tr>
<td><font size="2"><b>Branch</b></font></td>
<td class="tdr"><font size="2">: <?=$branch1;?></font></td>
<td><font size="2"><b>Branch</b></font></td>
<td><font size="2">: <?=$branch2;?></font></td>
</tr>
</table>
</td>
<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Add : CGST </font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($cgst_am1,2),2);?></font></td>
</tr>
<tr>

<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Add : SGST </font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($sgst_am1,2),2);?></font></td>
</tr>

<tr>

<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Add : IGST </font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($igst_am1,2),2);?></font></td>
</tr>

<tr>

<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Tax Amount : GST</font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($tgst,2),2);?></font></td>
</tr>
<tr bgcolor="#e4e4e4">

<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">Total</font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><font size="2"><?=number_format(round($gttl2,2),2);?></font></td>
</tr>

<tr>
<td colspan="5" rowspan="4" style="text-align:left; border: 1px solid black;">
<font size="2"><center>Certified that the particulars given above are true and correct.</center></font>
<font size="1">
Term and Conditions :-<br>
01.	Goods once sold cannot be taken back.<br>
02.	Any discrepancy found in the invoice should be informed immediately at Unloading time. No claim shall be entertained thereafter.<br>
03.	After sales any technical problems is to be attended by the service centre of the respective Company as per norms of the Mfg. Co.
</font>


</td>
<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">ROUND OFF</font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;"><?
if($roff==""){$roff=0;}
if($damm==""){$damm=0;}

?>
<font size="2" ><?=$roff;?></font></td>
</tr>
<tr>
<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2"><?if($damm>0){echo $dislam;}?></font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;">
<font size="2" ><?if($damm>0){echo number_format($damm,2);}?></font></td>
</tr>
<tr>



<td colspan="5" bgcolor="#e4e4e4" style="text-align:right; border: 1px solid black;"><font size="2">Net Payable</font></td>
<td colspan="2" style="text-align:right; border: 1px solid black;" bgcolor="#e4e4e4"><font size="2"><?=number_format($rgttl-$damm,2);?></font></td>
</tr>
<tr>



<td colspan="5" style="text-align:right; border: 1px solid black;"><font size="2">GST Payable on Reverse Charge</font></td>
<td colspan="2" bgcolor="#e4e4e4" style="text-align:center; border: 1px solid black;"><font size="2">N.A.</font></td>
</tr>


<tr>
<td colspan="5"   valign="top">

<?
if($emiam>0)
{
?>
<table width="100%">
<tr>
<td>
<table width="100%">
<tr align="center" >
<td><font style="font-size:16px;"></font></td>
</tr>
<tr >
<td ></td>
</tr>
<tr align="center" style="vertical-align:bottom;">
<td >
<br>
<br>
Customer Signatory
</td>
</tr>
</table>
</td>
<td>
<table width="100%">
<tr align="center" >
<td><font style="font-size:14px;"><b>For, <?=$comp_nm;?></b></font></td>
</tr>
<tr >
<td ></td>
</tr>
<tr align="center" style="vertical-align:bottom;">
<td >
<br>
Authorised Signatory
</td>
</tr>
</table>
</td>
</tr>
</table>
<?}
else
{
?>
<table width="100%">
<tr align="center" >
<td><font style="font-size:16px;"></font></td>
</tr>
<tr >
<td ></td>
</tr>
<tr align="center" style="vertical-align:bottom;">
<td >
<br>
<br>
Customer Signatory
</td>
</tr>
</table>
<?}?>
</td>
<td colspan="7"   valign="top">

<?
if($emiam>0)
{
?>
<table width="100%" style="border-collapse:collapse; border: 1px solid black;">
<tr>
<td style="border-collapse:collapse; border: 1px solid black;text-align:center" colspan="2">
<b>Finance Details</b>
</td>
</tr>
<tr>
<td style="border-collapse:collapse; border: 1px solid black;" width="50%">
Down Payment : 
</td>
<td style="border-collapse:collapse; border: 1px solid black;" width="50%">
<?=$dpay?>
</td>
</tr>
<tr>
<td style="border-collapse:collapse; border: 1px solid black;">
Finance Amount :
</td>
<td style="border-collapse:collapse; border: 1px solid black;">
<?=$finam?>
</td>
</tr>
<tr>
<td style="border-collapse:collapse; border: 1px solid black;">
EMI Amount : 
</td>
<td style="border-collapse:collapse; border: 1px solid black;">
<?=$emiam?>
</td>
</tr>
<tr>
<td style="border-collapse:collapse; border: 1px solid black;">
EMI Month : 
</td>
<td style="border-collapse:collapse; border: 1px solid black;">
<?=$emi_mnth?>
</td>
</tr>
</table>
<?}
else
{

?>
<table width="100%">
<tr align="center" >
<td><font style="font-size:14px;"><b>For, <?=$comp_nm;?></b></font></td>
</tr>
<tr >
<td ></td>
</tr>
<tr align="center" style="vertical-align:bottom;">
<td >
<br>
Authorised Signatory
</td>
</tr>
</table>

<?}?>
</td>
</tr>


</table>
<!-- Sub Table 4 End-->

</td>
</tr>
</table>

   </div><?}?>

</body>
</html>