<?
$reqlevel = 3; 
include("membersonly.inc.php");
$mnth=$_REQUEST[mnth];
$yr=$_REQUEST[yr];
$typ=$_REQUEST[typ];
$tdt=$_REQUEST[tdt];
$fdt=$_REQUEST[fdt];
$fdt=date('Y-m-d', strtotime($fdt));
$tdt=date('Y-m-d', strtotime($tdt));
 
 

if($fdt!="" and $tdt!=""){$todts=" and dt between '$fdt' and '$tdt'";}else{$todts="";}
if($typ=='1')
{
$file="$gstin-GSTR-3B-".date('F', strtotime($fdt)).".xls";
header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=$file");	
}
?>
<table width="60%"  border="1" class="table table-hover table-striped table-bordered">
<tr>
<td>
GSTIN
</td>
<td>
<b><?=$gstin;?></b>
</td>
<td>
Year
</td>
<td>
<b><?=$yr;?></b>
</td>
</tr>
<tr>
<td>
Legal name of the registered person
</td>
<td>
<b><?=$comp_nm;?></b>
</td>
<td>
Month	
</td>
<td>
<b><?=date('F', strtotime($fdt));?></b>
</td>
</tr>
</table>
<?
$taxamm=0;
$tcgst==0;
$tsgst=0;
$tigst=0;
$data1= mysqli_query($conn,"select * from  main_billing where sl>0 and cstat='0'".$todts."order by dt")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
{
$invno=$row1['blno'];
$data=mysqli_query($conn,"select sum(tamm) as amm,sum(cgst_am) as cgst_am,sum(sgst_am) as sgst_am,sum(igst_am) as igst_am from  main_billdtls where blno='$invno'")or die(mysqli_error($conn));
while($row=mysqli_fetch_array($data))
{
$taxamm+=round($row['amm'],2); 
$tcgst+=round($row['cgst_am'],2);   
$tsgst+=round($row['sgst_am'],2); 
$tigst+=round($row['igst_am'],2); 
}
}



$taxamm_ret=0;
$tcgst_ret==0;
$tsgst_ret=0;
$tigst_ret=0;
$data13= mysqli_query($conn,"select * from  main_billing_ret where sl>0 ".$todts."order by dt")or die(mysqli_error($conn));
while ($row1r = mysqli_fetch_array($data13))
{
$invnod=$row1r['blno'];
$datae=mysqli_query($conn,"select sum(tamm) as amm,sum(cgst_am) as cgst_am,sum(sgst_am) as sgst_am,sum(igst_am) as igst_am from  main_billdtls_ret where blno='$invnod'")or die(mysqli_error($conn));
while($rowe=mysqli_fetch_array($datae))
{
$taxamm_ret+=round($rowe['amm'],2); 
$tcgst_ret+=round($rowe['cgst_am'],2);   
$tsgst_ret+=round($rowe['sgst_am'],2); 
$tigst_ret+=round($rowe['igst_am'],2); 
}
}
$taxamm=$taxamm-$taxamm_ret; 
$tcgst=$tcgst-$tcgst_ret; 
$tsgst=$tsgst-$tsgst_ret; 
$tigst=$tigst-$tigst_ret; 

?>
<table width="60%"  class="table table-hover table-striped table-bordered" border="1">
<tr>
<td colspan="6">
<b>3.1 Details of Outward Supplies and inward supplies liable to reverse charge</b>			
</td>
</tr>
<tr>
<td>
<b>Nature of Supplies</b>
</td>
<td align="right">
<b>Total Taxable value</b>
</td>
<td align="right">
<b>Integrated Tax</b>
</td>
<td align="right">
<b>Central Tax</b>
</td>
<td align="right">
<b>State/UT Tax</b>
</td>
<td>
<b>Cess</b>
</td>
</tr>
<tr>
<td>
(a) Outward Taxable  supplies  (other than zero rated, nil rated and exempted)
</td>
<td align="right">
<b><?=$taxamm;?></b>
</td>
<td align="right">
<b><?=$tigst;?></b>
</td>
<td align="right">
<b><?=$tcgst;?></b>
</td>
<td align="right">
<b><?=$tsgst;?></b>
</td>
<td>

</td>
</tr>
<tr>
<td>
(e) Non-GST Outward supplies
</td>
<td>

</td>
<td>
</td>
<td>
</td>
<td>
</td>
<td>
</td>
</tr>
<tr>
<td align="right">
<b>TOTAL</b>
</td>
<td align="right">
<b><?=$taxamm;?></b>
</td>
<td align="right">
<b><?=$tigst;?></b>
</td>
<td align="right">
<b><?=$tcgst;?></b>
</td>
<td align="right">
<b><?=$tsgst;?></b>
</td>
<td>
</td>
</tr>
</table>
<?
$taxamm1=0;
$tcgst1==0;
$tsgst1=0;
$tigst1=0;
$data12= mysqli_query($conn,"select * from  main_purchase where sl>0 ".$todts."order by dt")or die(mysqli_error($conn));
while ($row13 = mysqli_fetch_array($data12))
{
$invno=$row13['blno'];
$data=mysqli_query($conn,"select sum(amm) as amm,sum(cgst_am) as cgst_am,sum(sgst_am) as sgst_am,sum(igst_am) as igst_am from  main_purchasedet where blno='$invno'")or die(mysqli_error($conn));
while($row133=mysqli_fetch_array($data))
{
$taxamm1+=round($row133['amm'],2); 
$tcgst1+=round($row133['cgst_am'],2);   
$tsgst1+=round($row133['sgst_am'],2); 
$tigst1+=round($row133['igst_am'],2); 
}
}







$tcgst1_ret==0;
$tsgst1_ret=0;
$tigst1_ret=0;



$data12t= mysqli_query($conn,"select * from  main_cdnr where sl>0 ".$todts."order by dt")or die(mysqli_error($conn));
while ($row13t = mysqli_fetch_array($data12t))
{
$sgstin=$row13t['sgstin'];

$tax=$row13t['tax'];
$result = substr($sgstin, 0, 2);
if($result==19)
{
$tcgst1_ret+=$tax/2;   
$tsgst1_ret+=$tax/2; 
}
else
{
	$tigst1_ret+=$tax; 
}



}






$tcgst1=($tcgst1+$tcgst1_ser)-$tcgst1_ret; 
$tsgst1=($tsgst1+$tsgst1_ser)-$tsgst1_ret; 
$tigst1=($tigst1+$tigst1_ser)-$tigst1_ret; 


?>
<table width="60%"  class="table table-hover table-striped table-bordered" border="1">
<tr>
<td colspan="5">
<b>4. Eligible ITC				
</b>			
</td>
</tr>
<tr>
<td>
<b>Details</b>
</td>
<td align="right">
<b>Integrated Tax</b>
</td>
<td align="right">
<b>Central Tax</b>
</td>
<td align="right">
<b>State/UT Tax</b>
</td>
<td>
<b>Cess</b>
</td>
</tr>
<tr>
<td>
(5)   All other ITC
</td>
<td align="right">
<b><?=$tigst1;?></b>
</td>
<td align="right">
<b><?=$tcgst1;?></b>
</td>
<td align="right">
<b><?=$tsgst1;?></b>
</td>
<td>
<b></b>
</td>
</tr>
<tr>
<td>
<b>(C) Net ITC Available (A)-(B)</b>
</td>
<td align="right">
<b><?=$tigst1;?></b>
</td>
<td align="right">
<b><?=$tcgst1;?></b>
</td>
<td align="right">
<b><?=$tsgst1;?></b>
</td>
<td>
<b></b>
</td>
</tr>

</table>
