<?
$reqlevel = 3;
include("membersonly.inc.php");

$prnm=$_REQUEST['prnm'];
$unit_nm=$_REQUEST['unit_nm'];
if($unit_nm==""){$unit_nm="mun";}
$geti=mysqli_query($conn,"select * from main_unit where cat='$prnm'") or die(mysqli_error($conn));
while($rowi=mysqli_fetch_array($geti))
{
	//sun	mun	bun	smvlu	mdvlu	bgvlu	
	$sl=$rowi['sl'];
	$sun=$rowi['sun'];
	$mun=$rowi['mun'];
	$bun=$rowi['bun'];
	$smvlu=$rowi['smvlu'];
	$mdvlu=$rowi['mdvlu'];
	$bgvlu=$rowi['bgvlu'];
}
?>
<select id="unit" name="unit" class="sc" tabindex="11" style="padding:3px;width:100%">
<?if($sun!=''){?><option value="sun" <?if($unit_nm=="sun"){ echo "selected";}?>><?=$sun;?></option><?}?>
<?if($mun!=''){?><option value="mun" <?if($unit_nm=="mun"){ echo "selected";}?>><?=$mun;?></option><?}?>
<?if($bun!=''){?><option value="bun" <?if($unit_nm=="bun"){ echo "selected";}?>><?=$bun;?></option><?}?>
</select>
<input type="hidden" value="<?=$sl?>" name="usl" id="usl">