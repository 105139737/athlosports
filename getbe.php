<?php
$reqlevel = 1;
include("membersonly.inc.php");
$pcd=$_REQUEST[pcd];
$scat=$_REQUEST[scat];
$brncd=$_REQUEST[brncd];
$unit=$_REQUEST[unit];

$query6="select * from  ".$DBprefix."product where sl='$pcd'";
$result5 = mysqli_query($conn,$query6);
while($row=mysqli_fetch_array($result5))
{
$scat=$row['scat'];
$cat=$row['cat'];
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
?>
<select name="refno"  id="refno" class="sc1" style="width:100%" tabindex="15" onchange="get_prc()" tabindex="10" >

<?
$data1 = mysqli_query($conn,"SELECT * FROM main_stock WHERE pcd='$pcd' group by refno order by sl");
while ($row1 = mysqli_fetch_array($data1))
	{
	$sl=$row1['sl'];
	$rtmm=$row1['rtmm'];
	$refno1=$row1['refno'];
$queryx = "SELECT * FROM main_purchasedet where blno='$refno1' and prsl='$pcd'";
$resultx = mysqli_query($conn,$queryx)or die(mysqli_error($conn));
while ($rowx = mysqli_fetch_array ($resultx))
{
$mrp=round($rowx['mrp'],4); 
}
$queryx = "SELECT * FROM main_purchase where blno='$refno1'";
$resultx = mysqli_query($conn,$queryx)or die(mysqli_error($conn));
while ($rowx = mysqli_fetch_array ($resultx))
{
$inv=$rowx['inv'];
$dt=$rowx['dt'];
$sid=$rowx['sid'];
$dt=date('d-m-Y', strtotime($dt));
$result = mysqli_query($conn,"SELECT * from main_suppl where sl='$sid'");
while($row = mysqli_fetch_array($result))
{
$srtnm=$row['srtnm'];
}
}
$stck=0;
$query4="Select sum(opst+stin-stout) as stck1 from ".$DBprefix."stock where pcd='$pcd' and bcd='$brncd' and refno='$refno1' ";
$result4 = mysqli_query($conn,$query4);
while ($R4 = mysqli_fetch_array ($result4))
{
$stck=$R4['stck1'];
}
if($stck=="")
{
$stck=0;	
}
else
{
if($stck>0)	
{
if($unit=='sun'){$stock_in=($stck/$smvlu)." ".$sun;}
if($unit=='mun'){$stock_in=($stck/$mdvlu)." ".$mun;}
if($unit=='bun'){$stock_in=($stck/$bgvlu)." ".$bun;}
}
}
if($stck>0)	
{
	?>
<option value="<?=$refno1?>"><?=$stock_in?> -- P.Rate <?=$mrp;?> -- <?=$srtnm.'-'.$inv?> -- <?=$dt?></option>
<?
	}
	}
	
?>
</select>
<input type="hidden" class="sc" id="scat_unit" readonly name="scat_unit" style="text-align:center" value="<?=$unit;?>"  size="12">
 
<script>

get_gstval();
get_prc();
</script>

