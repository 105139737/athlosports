<?php
$reqlevel = 3;
include("membersonly.inc.php");
?>
<table border="0" width="100%" class="advancedtable">
 <?
$query100 = "SELECT * FROM ".$DBprefix."slt where eby='$user_currently_loged' order by sl";
$result100 = mysqli_query($conn,$query100);
while ($R100 = mysqli_fetch_array ($result100))
{
$tsl=$R100['sl'];
$prsl=$R100['prsl'];
$unit=$R100['unit'];
$pcs=$R100['pcs'];
$prc=$R100['prc'];
$ttl=$R100['ttl'];
$cat=$R100['cat'];
$cgst_rt=$R100['cgst_rt'];
$cgst_am=$R100['cgst_am'];
$sgst_rt=$R100['sgst_rt'];
$sgst_am=$R100['sgst_am'];
$igst_rt=$R100['igst_rt'];
$igst_am=$R100['igst_am'];
$net_am=$R100['net_am'];
$adp=$R100['adp'];
$disp=$R100['disp'];
$disa=$R100['disa'];
$total=$R100['total'];
$refno=$R100['refno'];
$betno=$R100['betno'];
$brate=$R100['brate'];
$cnm="";				
$data1= mysqli_query($conn,"select * from main_catg where sl='$cat'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
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
$query6="select * from  ".$DBprefix."product where sl='$prsl'";
$result5 = mysqli_query($conn,$query6);
while($row=mysqli_fetch_array($result5))
{
$pnm=$row['pnm'];
}
$geti=mysqli_query($conn,"select * from main_unit where cat='$prsl'") or die(mysqli_error($conn));
while($rowi=mysqli_fetch_array($geti))
{
$unit_nm=$rowi[$unit];
}
?>



<tr class="even">

<td  align="left" width="7%"><b><?=$cnm;?></b></td>
<td  align="left" width="7%"><b><?=$pnm;?></b></td>

<td  align="center" width="5%"><b><?=$unit_nm;?></b></td>
<td align="center" width="5%"><b></b><?=$refno;?></td>

<td align="center" width="4%" hidden><b><?=$betno;?></b></td>
<td align="center" width="4%" ><b><?=$pcs;?></b></td>

<td align="right" width="5%" ><b><?=round($prc,2);?></b></td>
<td align="right" width="5%"><b><?=round($total,2);?></b></td>

<td align="center" width="4%"><b><?=$disp;?></b></td>
<td align="right" width="5%"><b><?=$disa;?></b></td>

<td align="right" width="6%"><b><?=round($ttl,2);?></b></td>

<td align="center" width="4%" ><b><?=$cgst_rt;?></b></td>

<td align="right" width="5%" ><b><?=round($cgst_am,2);?></b></td>
<td align="center" width="4%" ><b><?=$sgst_rt;?></b></td>

<td align="right" width="5%" ><b><?=round($sgst_am,2);?></b></td>
<td align="center" width="4%" ><b><?=$igst_rt;?></b></td>
<td align="right" width="5%" ><b><?=round($igst_am,2);?></b></td>

<td align="right" width="6%" ><b><?=round($net_am,2);?></b></td>
<td align="right" width="6%" ><b><?=round($brate,2);?></b></td>
<td align="center" width="4%"><b><a onclick="if(confirm('Are you Sure?')){deltpr('<?=$tsl;?>')}"><font color="red">Delete</font></a> </b></td>

</tr>

<?}?>

</table>

<script>
t();
</script>