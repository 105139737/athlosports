<?
$reqlevel = 3;
include("membersonly.inc.php");
$cat=$_REQUEST[cat];

$cat1="";
$scat1="";
if($cat!=""){$cat1=" and cat='$cat'";}

?>

<select id="prnm" name="prnm" class="form-control"  tabindex="14" onchange="">
<option value="">---Select---</option>
<?
$data1 = mysqli_query($conn,"Select * from main_product where sl>0 and typ='0' $cat1   order by pnm");
while ($row1 = mysqli_fetch_array($data1))
	{
	$sl=$row1['sl'];
	$pnm=$row1['pnm'];
?>
<Option value="<?=$sl;?>"><?=$pnm;?></option>
<?}?>
</select>
<script>
  $('#prnm').chosen({
  no_results_text: "Oops, nothing found!",

  });
</script>
