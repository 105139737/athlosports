<?
set_time_limit(0);
$reqlevel = 1;

include("membersonly.inc.php");

$typ=$_REQUEST[typ];
$fdt=$_REQUEST[fdt];
$tdt=$_REQUEST[tdt];
$fdt=date('Y-m-d', strtotime($fdt));
$tdt=date('Y-m-d', strtotime($tdt));

?> 


<table class="table table-bordered dataTables-example">

<thead>

<tr style="background-color:#1EB4FE;color:#ffffff;"> 

<th style="text-align:center;" width="4%"><b>HSN Code</b></th>

<th style="text-align:left;"><b>Percentage</b></th>

<th style="text-align:left;"><b>UQC</b></th>

<th style="text-align:left;"><b>Total Quantity</b></th>

<th style="text-align:left;"><b>Total Value</b></th>

<th style="text-align:left;"><b>Total Taxable Value</b></th>

<th style="text-align:left;"><b>Integrated Tax</b></th>

<th style="text-align:left;"><b>Central Tax</b></th>

<th style="text-align:left;"><b>State/UT Tax</b></th>

<th style="text-align:left;"><b>Cess</b></th>

</tr>

<?
$tttamm=0;
$ttcgst_am=0;
$ttsgst_am=0;
$ttigst_am=0;
$ttnet_am=0;
$ttpcs=0;
$a=0;
$bqr="";
$bqr=" and (blno='a'";
if($typ==1)
{
$query9 = "SELECT blno FROM main_billing where dt between '$fdt' and '$tdt' and cstat='0'";
}
$result9 = mysqli_query($conn,$query9) or die (mysqli_error($conn) );
while($X=mysqli_fetch_array($result9))
{
$blno=$X[blno];	
if($bqr=="")
{
$bqr.=" or blno='$blno'";
}
else
{
$bqr.=" or blno='$blno'";
}
}

if($bqr!='')
{
$bqr.=")";
}
$bqr_ret="";
$bqr_ret=" and (blno='a'";
if($typ==1)
{
$query9_ret = "SELECT blno FROM main_billing_ret where dt between '$fdt' and '$tdt' and cstat='0'";
}
$result9_ret = mysqli_query($conn,$query9_ret) or die (mysqli_error($conn) );
while($X=mysqli_fetch_array($result9_ret))
{
$blno=$X[blno];	
if($bqr_ret=="")
{
$bqr_ret.=" or blno='$blno'";
}
else
{
$bqr_ret.=" or blno='$blno'";
}
}

$bqr_ret.=")";


	

$eqr="";
$res=mysqli_query($conn,"select * from main_product where hsn!='' group by hsn");
while($R=mysqli_fetch_array($res))
{
$eqr=" and ( prsl='a'";
$hsn=$R[hsn];
$sl=$R[sl];

//$sl."select * from main_product where $qr";
$res1=mysqli_query($conn,"select * from main_product where  hsn='$hsn'")or die(mysqli_error($conn));
while($R1=mysqli_fetch_array($res1))
{
$psl=$R1['sl'];
$eqr.=" or prsl='$psl'";
}
$eqr.=")";
$xqr=mysqli_query($conn,"select (cgst+sgst) as tigst from main_gst where cat='$psl'")or die(mysqli_error($conn));
while($R000=mysqli_fetch_array($xqr))
{
$igst=$R000[tigst];
}

//echo $eqr;
?>	

<?

//echo "select sum(ttl) as ttamm, sum(cgst_am) as tcgst_am, sum(sgst_am) as tsgst_am,sum(igst_am) as tigst_am, sum(net_am) as tnet_am,sum(qty) as tpcs from main_billdtls where sl>0 $eqr $bqr";
$ttamm=0;
$tcgst_am=0;
$tsgst_am=0;
$tigst_am=0;
$tnet_am=0;
$tpcs=0;

if($typ==1)
{
$res1=mysqli_query($conn,"select sum(tamm) as ttamm, sum(cgst_am) as tcgst_am, sum(sgst_am) as tsgst_am,sum(igst_am) as tigst_am, sum(net_am) as tnet_am,sum(pcs) as tpcs from main_billdtls where sl>0 $eqr $bqr") or die (mysqli_error($conn));
}
while($R1=mysqli_fetch_array($res1))
{
$ttamm=$R1[ttamm];
$tcgst_am=$R1[tcgst_am];
$tsgst_am=$R1[tsgst_am];
$tigst_am=$R1[tigst_am];
$tnet_am=$R1[tnet_am];
$tpcs=$R1[tpcs];
}

$ttamm_ret=0;
$tcgst_am_ret=0;
$tsgst_am_ret=0;
$tigst_am_ret=0;
$tnet_am_ret=0;
$tpcs_ret=0;

if($typ==1)
{
$res1_ret=mysqli_query($conn,"select sum(tamm) as ttamm, sum(cgst_am) as tcgst_am, sum(sgst_am) as tsgst_am,sum(igst_am) as tigst_am, sum(net_am) as tnet_am,sum(pcs) as tpcs from main_billdtls_ret where sl>0 $eqr $bqr_ret") or die (mysqli_error($conn));
}
while($R1=mysqli_fetch_array($res1_ret))
{
$ttamm_ret=$R1[ttamm];
$tcgst_am_ret=$R1[tcgst_am];
$tsgst_am_ret=$R1[tsgst_am];
$tigst_am_ret=$R1[tigst_am];
$tnet_am_ret=$R1[tnet_am];
$tpcs_ret=$R1[tpcs];
}

$ttamm=$ttamm-$ttamm_ret;
$tcgst_am=$tcgst_am-$tcgst_am_ret;
$tsgst_am=$tsgst_am-$tsgst_am_ret;
$tigst_am=$tigst_am-$tigst_am_ret;
$tnet_am=$tnet_am-$tnet_am_ret;
$tpcs=$tpcs-$tpcs_ret;



if($tnet_am!=0)
{
?>
<tr>
<td><?=$hsn;?></td>
<td align="center"><?echo $igst;?>% </td>
<td><?echo "PIECE-PCS";?></td>
<td><?=$tpcs;?></td>	
<td><?=round($tnet_am,2);?></td>
<td><?=round($ttamm,2);?></td>
<td><?=round($tigst_am,2);?></td>
<td><?=round($tcgst_am,2);?></td>
<td><?=round($tsgst_am,2);?></td>
<td>0.00</td>
</tr>	
<?	
}

$tttamm+=round($ttamm,2)+round($ttamm1,2);

$ttcgst_am+=round($tcgst_am,2)+round($tcgst_am1,2);

$ttsgst_am+=round($tsgst_am,2)+round($tsgst_am1,2);

$ttigst_am+=round($tigst_am,2)+round($tigst_am1,2);

$ttnet_am+=round($tnet_am,2)+round($tnet_am1,2);

$ttpcs+=$tpcs+$tpcs1;

}

?>

<tr>

<td colspan="3">TOTAL</td>

<td><?=$ttpcs;?></td>	

<td><?=round($ttnet_am,2);?></td>

<td><?=round($tttamm,2);?></td>

<td><?=round($ttigst_am,2);?></td>

<td><?=round($ttcgst_am,2);?></td>

<td><?=round($ttsgst_am,2);?></td>

<td>0.00</td>

	

</tr>	