<?
$reqlevel = 3;
include("membersonly.inc.php");
$prnm=$_REQUEST['prnm'];

$data1 = mysqli_query($conn,"SELECT * from main_gst where cat='$prnm'");
while ($row1 = mysqli_fetch_array($data1))
	{
	$igst=$row1['igst'];
}
?>
<input type="text" name="igst" id="igst" value="<?php echo $igst;?>" class="form-control" readonly>
