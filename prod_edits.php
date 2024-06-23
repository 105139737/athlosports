<?php
$reqlevel = 3;
include("membersonly.inc.php");
$pnm = $_POST['pnm'];
$cat = $_POST['cat'];
$detls = $_POST['detls'];
$rate = $_POST['rate'];
$sl = $_POST['sl'];
$edt=date('Y-m-d');
	if($cat=='' or $pnm=='')
	{
	?>

<script language="javascript">
alert('Please Fill All The Fields.');
window.history.go(-1);
</script>

<?	}
	else
	{
		$result4 = mysqli_query($conn,"SELECT * FROM main_product where cat='$cat' and pnm='$pnm' and sl!='$sl'");
		$rrr=mysqli_num_rows($result4);
		if($rrr>0)
		{
		?>
<script language="javascript">
alert('Sorry!! Product Already Exist.');
window.history.go(-1);
</script>

<?
		}
		else
		{

$result2 = mysqli_query($conn,"update main_product set cat='$cat',pnm='$pnm',detls='$detls',rate='$rate' where sl='$sl'");
?>
<script language="javascript">
alert('Product Update Successfully, Thank You.');
document.location = "prod_list.php";
</script>
<?
	}
	}
?>