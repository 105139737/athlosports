<?
$reqlevel = 3;
include("membersonly.inc.php");
$sec=$_REQUEST['sec'];

?>
<select id="catg" name="catg" class="form-control" onchange="get_cat()">
<option value="">---Select---</option>
<?
$data1 = mysqli_query($conn,"SELECT * from main_catg where sec='$sec' order by cnm");
while ($row1 = mysqli_fetch_array($data1))
	{
	$sl=$row1['sl'];
	$cnm=$row1['cnm'];
?>
<Option value="<?=$sl;?>"><?=$cnm;?></option>
<?}?>
</select>
<script>
  $('#catg').chosen({
  no_results_text: "Oops, nothing found!",

  });
</script>
