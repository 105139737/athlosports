<?
$reqlevel = 3; 
include("membersonly.inc.php");
$invtyp=$_REQUEST['invtyp'];
$fdt=$_REQUEST['fdt'];
$tdt=$_REQUEST['tdt'];
$snm=rawurldecode($_REQUEST['snm']);
$pnm=rawurldecode($_REQUEST['pnm']);
$cat=$_REQUEST[cat];
$bnm=$_REQUEST[bnm];
$brncd=$_REQUEST[brncd];if($brncd==""){$brncd1="";}else{$brncd1=" and bcd='$brncd'";}
if($invtyp==""){$invtyp1="";}else{$invtyp1=" and cstat='$invtyp'";}
$fdt=date('Y-m-d', strtotime($fdt));
$tdt=date('Y-m-d', strtotime($tdt));

if($fdt!="" and $tdt!=""){$todt=" and rdt between '$fdt' and '$tdt'";}else{$todt="";}
if($fdt!="" and $tdt!=""){$todts=" and dt between '$fdt' and '$tdt'";}else{$todts="";}
if($snm!=""){$snm1=" and cid='$snm'";}else{$snm1="";}
$file="Date Wise Sale Details (".$fdt." To ".$tdt.".xls";
header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=$file"); 
$dis1=0;
?>
<table  width="100%" class="advancedtable" border="1" >
		
			<tr bgcolor="#e8ecf6">
			<td  align="center" ><b>Sl</b></td>
			<td  align="center" ><b>Date</b></td>
			<td  align="center" ><b>Invoice</b></td>
			<td  align="center" ><b>Customer Name</b></td>
			<td  align="center" ><b>GSTIN</b></td>
			<td  align="center" ><b>Product Name</b></td>
			<td  align="center" ><b>HSN</b></td>
			<td  align="center" ><b>Quantity</b></td>
			<td  align="center" ><b>S.Rate</b></td>
			<td  align="center" ><b>Taxable Amt.</b></td>
			<td  align="center" ><b>CGST%</b></td>
			<td  align="center" ><b>CGST </b></td>
			<td  align="center" ><b>SGST%</b></td>
			<td  align="center" ><b>SGST </b></td>
			<td  align="center" ><b>IGST%</b></td>
			<td  align="center" ><b>IGST </b></td>
			<td  align="center" ><b>Net Payable</b></td>
			</tr>
			 <?
		$sln=0;
		$tota=0;
$tq=0;
$tslrt=0;
$tamm1=0;	
$car1=0;	
$vatamm1=0;
$ttpoint=0;
$ttsret=0;
$paid1=0;
$wgamm1=0;
$igst1=0;
$cgst1=0;
$sgst1=0;
$data1= mysqli_query($conn,"select * from  main_billing_ret where sl>0".$todts.$snm1.$brncd1.$invtyp1." order by dt,sl")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
{
$blno=$row1['blno'];
$dt=$row1['dt'];
$edt1=$row1['edt'];
$vat=$row1['vat'];
$vatamm=$row1['vatamm'];
$car=$row1['car'];
$sid=$row1['cid'];
$pdts=$row1['pdts'];
$dis=$row1['dis'];
$paid=$row1['paid'];
$gstin=$row1['gstin'];

if($car==""){$car=0;}
if($dis==""){$dis=0;}
$dt=date('d-m-Y', strtotime($dt));
$sln++;
$qtyt=0;
$asd=0;
$tamm=0;
$tpoint=0;
$wgamm=0;
$datad= mysqli_query($conn,"select * from main_cust where sl='$sid'")or die(mysqli_error($conn));
while ($rowd = mysqli_fetch_array($datad))
{
$nm=$rowd['nm'];
$mob1=$rowd['cont'];
}
$tslrt=0;
$igst=0;
$cgst=0;
$sgst=0;
$data= mysqli_query($conn,"select * from  main_billdtls_ret where sl>0 and blno='$blno'".$pqq)or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($data))
{
$cat=$row['cat'];
$scat=$row['scat'];	
$pcd=$row['prsl'];
$prc=$row['prc'];
$ttl=$row['ttl'];
$blno1=$row['blno'];
$unit=$row['unit'];
$kg=$row['kg'];
$grm=$row['grm'];
$pcs=$row['pcs'];
$cgst_rt=$row['cgst_rt'];
$cgst_am=$row['cgst_am'];
$sgst_rt=$row['sgst_rt'];
$sgst_am=$row['sgst_am'];
$igst_rt=$row['igst_rt'];
$igst_am=$row['igst_am'];
$net_am=round($row['net_am']);
if($net_am<=0)
{
$net_am=$ttl;	
}
$igst=$igst+$igst_am;
$cgst=$cgst+$cgst_am;
$sgst=$sgst+$sgst_am;
$get=mysqli_query($conn,"select * from ".$DBprefix."unit where cat='$cat'") or die(mysqli_error($conn));
while($roww=mysqli_fetch_array($get))
{
	$sun=$roww['sun'];
	$mun=$roww['mun'];
	$bun=$roww['bun'];
	$smvlu=$roww['smvlu'];
	$mdvlu=$roww['mdvlu'];
	$bgvlu=$roww['bgvlu'];
}
if($unit=='sun'){$unit_nm=$sun;}
if($unit=='mun'){$unit_nm=$mun;}
if($unit=='bun'){$unit_nm=$bun;}


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
$hsn=$row1['hsn'];
}
$pnm="";
$query6="select * from  ".$DBprefix."product where sl='$pcd'";
$result5 = mysqli_query($conn,$query6);
while($row=mysqli_fetch_array($result5))
{
$pnm=$row['pnm'];
}


	if($blno==$blno1)
	{
		$asd++;
	}
		 ?>
		<tr title="<?=$pcd." S Sl".$sl;?>">
		<?if($asd==1){?>
			<td  align="center"  ><?=$sln;?></td>
			<td  align="center" ><?=$dt;?></td>
			<td  align="center" ><?=$blno;?></td>
			<td  align="left" ><font color="blue"><?=$nm;?></font></td>
			<td  align="left" ><font color="blue"><?=$gstin;?></font></td>
			<?}
			else
			{
			?>
			<td  align="center"  ></td>
			<td  align="center" ></td>
			<td  align="center" ></td>
			<td  align="left" ></td> 
			<td  align="left" ></td> 
<?
}
?>

			<td  align="left" title="<?=$pcd;?>" ><?=$cnm;?> <?=$scat_nm;?> <?=$pnm;?></td>
			<td  align="center" ><?=$hsn;?></td>
			<td  align="center" ><?=$pcs;?> <?=$unit_nm?></td>
			<td  align="right" ><?=number_format($prc,2);?></td>
			<td  align="right" ><?=number_format($ttl,2);?></td>
			<td  align="center" ><?=$cgst_rt;?></td>
		<td  align="center" ><?=round($cgst_am,2);?></td>
			<td  align="center" ><?=$sgst_rt;?></td>
			<td  align="center" ><?=round($sgst_am,2);?></td>
			<td  align="center" ><?=$igst_rt;?></td>
			<td  align="center" ><?=round($igst_am,2);?></td>
			<td  align="right" ><?=number_format($net_am,2);?></td>
			</tr>	 

	<?


$tamm=$ttl+$tamm;
$wgamm=$net_am+$wgamm;
}
	if($ttl!=0)
	{
	?>
	<tr bgcolor="#e8ecf6">
	<td colspan="7" align="right"><b>Total</b></td>

	<td align="center"><b></td>
	<td></td>
	<td  align="right" ><b><?=number_format(round($tamm,0),2);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($cgst,2);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($sgst,2);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($igst,2);?></b></td>
	<td  align="right" ><b><?=number_format($wgamm,2);?></b></td>
	</tr>
	<?


		}
		$dis1=$dis+$dis1;
		$tamm1=$tamm+$tamm1;
		$car1=$car1+$car;
		$paid1=$paid1+$paid;
		$wgamm1=$wgamm1+$wgamm;
		
		$igst1=$igst+$igst1;
		$cgst1=$cgst+$cgst1;
		$sgst1=$sgst+$sgst1;
		}?>
		<tr>
	<td colspan="7" align="right"><b>Total</b></td>
	
	<td align="center"><b></b></td>
	<td></td>
	<td align="right"><b><?=sprintf('%0.2f',$tamm1);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($cgst1,2);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($sgst1,2);?></b></td>
	<td align="right" colspan="2"><b><?=number_format($igst1,2);?></b></td>
	<td align="right"><b><?=number_format($wgamm1,2);?></b></td>
</tr>
</table>
 