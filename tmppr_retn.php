<?php
$reqlevel = 3;
include("membersonly.inc.php");
$blno=$_REQUEST['blno'];
?>
<table border="0" width="100%" class="advancedtable">
<?
$total_am=0;
$total_cgst=0;
$total_sgst=0;
$total_igst=0;
$total_gst=0;
$total_tax=0;

$total_net=0;

$total_dis=0;
$query100 = "SELECT * FROM main_purchasedet where blno='$blno' order by sl";
$result100 = mysqli_query($conn,$query100);
while ($R100 = mysqli_fetch_array ($result100))
{
$tsl=$R100['sl'];
$cat=$R100['cat'];
$scat=$R100['scat'];
$unit=$R100['unit'];
$dis=$R100['dis'];
$prsl=$R100['prsl'];
$qty=$R100['qty'];
$mrp=$R100['mrp'];
$ttl=$R100['ttl'];
$cgst_rt=$R100['cgst_rt'];
$cgst_am=$R100['cgst_am'];
$sgst_rt=$R100['sgst_rt'];
$sgst_am=$R100['sgst_am'];
$igst_rt=$R100['igst_rt'];
$igst_am=$R100['igst_am'];
$net_am=$R100['net_am'];
$total=$R100['total'];
$disp=$R100['disp'];
$disa=$R100['disa'];
$ldis=$R100['ldis'];
$ldisa=$R100['ldisa'];
$bcd=$R100['bcd'];
$rate=$R100['rate'];
$betno=$R100['betno'];
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
/*
$bcdnm="";
$getii=mysqli_query($conn,"select * from main_godown where sl='$bcd'") or die(mysqli_error($conn));
while($rowii=mysqli_fetch_array($getii))
{
$bcdnm=$rowii['gnm'];
}
*/
$query5="Select sum(stout) as stout from ".$DBprefix."stock where pcd='$prsl' and bcd='$bcd' and refno='$blno' group by pcd";
$result5 = mysqli_query($conn,$query5);
while ($R4 = mysqli_fetch_array ($result5))
{
$stout=$R4['stout'];
}
$query4="Select sum(opst+stin-stout) as stck1 from ".$DBprefix."stock where pcd='$prsl' and bcd='$bcd' and refno='$blno' group by pcd";
$result4 = mysqli_query($conn,$query4);
while ($R4 = mysqli_fetch_array ($result4))
{
$stck=$R4['stck1'];
}
$cnm="";				
$data1= mysqli_query($conn,"select * from main_catg where sl='$cat'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
{
$cnm=$row1['cnm'];
}
?>
<tr class="even">
<td  align="left" width="10%"><b><?=$cnm;?></b></td>
<td  align="left" width="10%"><b><?=$pnm;?></b></td>
<td align="center" width="5%" ><b><?=$unit_nm;?></b></td>

<td align="center" width="5%"><b></b>
<b><?=$qty;?> - <font color="red"><?=$stout;?></font> = <?=$stck;?></b><input type="text" name="q<?=$tsl;?>" id="q<?=$tsl;?>" size="3" style="padding:1px;" value="" onkeypress="return isNumber(event)" onblur="if(this.value><?=$stck?>){$('.upb'+<?=$tsl?>).html('<br><font color=\'red\'>Please Check  Quantity. Your Current Stock Is <?=$stck?>/pcs</font>');this.focus();document.getElementById('chk').value=1;}else{$('.upb'+<?=$tsl?>).html('');document.getElementById('chk').value=0;}" /><span class="upb<?=$tsl?>"></span>
</td>
<td align="right" width="5%" ><b><?=round($mrp,2);?></b></td>			
<td align="right" width="6%" ><b><?=$total;?></b></td>
<td align="center" width="5%" ><b><?=$disp;?></b></td>
<td align="right" width="5%" ><b><?=$disa;?></b></td>
<td align="right" width="5%" ><b><?=round($ttl,2);?></b></td>
<td align="center" width="3%" ><b><?=$cgst_rt;?></b></td>
<td align="right" width="5%" ><b><?=round($cgst_am,2);?></b></td>
<td align="center" width="3%" ><b><?=$sgst_rt;?></b></td>
<td align="right" width="5%" ><b><?=round($sgst_am,2);?></b></td>
<td align="center" width="3%" ><b><?=$igst_rt;?></b></td>
<td align="right" width="5%" ><b><?=round($igst_am,2);?></b></td>
<td align="right" width="5%" ><b><?=round($net_am,2);?></b></td>
<td align="right" width="5%" ><b><?=round($rate,2);?></b></td>

</tr>
<?
$total_am+=$total;
$total_cgst+=$cgst_am;
$total_sgst+=$sgst_am;
$total_igst+=$igst_am;
$total_gst+=$cgst_am+$sgst_am+$igst_am;
$total_tax+=$ttl;
$total_net+=$net_am;
$total_dis+=$disa+$ldisa;
}
$bilamm=$total_net;
$rgttl=round($bilamm);
$roff=round($rgttl-$bilamm,2);
?>
</table>
<script>
document.getElementById('ttl_amm').value="<?=$total_am;?>";
document.getElementById('cgst_amm').value="<?=$total_cgst;?>";
document.getElementById('sgst_amm').value="<?=$total_sgst;?>";
document.getElementById('igst_amm').value="<?=$total_igst;?>";
document.getElementById('gst').value="<?=$total_gst;?>";
document.getElementById('sttl').value="<?=$total_net;?>";
document.getElementById('roff').value="<?=$roff;?>";
document.getElementById('tamm').value="<?=$rgttl;?>";
document.getElementById('tamm1').value="<?=$bilamm;?>";
document.getElementById('tddis').value="<?=$total_dis;?>";
document.getElementById('taxable_amm').value="<?=$total_tax;?>";
t2();
</script>