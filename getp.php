<?
$reqlevel = 1;
include("membersonly.inc.php");
$refno=rawurldecode($_REQUEST[refno]);
$scat=$_REQUEST[scat];
$unit=$_REQUEST[unit];
$dt=$_REQUEST[dt];
$dt=date('Y-m-d', strtotime($dt));
$data1 = mysqli_query($conn,"Select * from main_gst where cat='$scat' and '$dt' between fdt and tdt") or die (mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
{
$cgst=$row1['cgst'];
$sgst=$row1['sgst'];	
$igst=$row1['igst'];	
}
$gst=$cgst+$sgst;
$query6="select * from  ".$DBprefix."product where sl='$scat'";
$result5 = mysqli_query($conn,$query6);
while($row=mysqli_fetch_array($result5))
{
$smvlu=$row['smvlu'];
$mdvlu=$row['mdvlu'];
$bgvlu=$row['bgvlu'];
}
if($unit=='sun'){$mrp=$smvlu;}
if($unit=='mun'){$mrp=$mdvlu;}
if($unit=='bun'){$mrp=$bgvlu;}

$gst_am=($mrp*$gst)/(100+$gst);
$mrp=round($mrp-$gst_am,2);

?>
<input type="text" class="sc"  tabindex="18" id="prc" name="prc" style="text-align:right" value="<?=$mrp;?>" onblur="cal()" tabindex="6" size="15"  >
<input type="hidden" class="sc"  id="srt" name="srt" style="text-align:right" value="<?=$mrp;?>"   >