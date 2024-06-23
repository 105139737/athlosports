<?php
$reqlevel = 3;
include("membersonly.inc.php");
$cnm = $_POST['cnm'];
$sl = $_POST['sl'];
if($sl!=''){$slo=" and sl!='$sl'";}else{$slo="";}
$edt=date('Y-m-d');
	if($cnm=='')
	{
	?>
<script language="javascript">
alert('Please Fill The Fields.');
window.history.go(-1);
</script>
<?	}
	else
	{
	$result4 = mysqli_query($conn,"SELECT * FROM main_catg where cnm='$cnm' $slo");
	$rrr=mysqli_num_rows($result4);
	if($rrr>0)
	{
?>
<script language="javascript">
alert('Sorry!! Category Already Exist.');
window.history.go(-1);
</script>
<?
		}
		else
		{
		if($sl=='')
		{
$result2 = mysqli_query($conn,"INSERT INTO main_catg (cnm,edt,eby) VALUES ('$cnm','$edt','$user_currently_loged')");
?>
<script language="javascript">
alert('Category Added Successfully, Thank You.');
document.location = "cat_form.php";
</script>
<?
		}
		else
		{
$result = mysqli_query($conn,"UPDATE main_catg set cnm='$cnm' where sl='$sl'");
?>
<script language="javascript">
alert('Updated Successfully. Thank You...');
document.location = "cat_form.php";
</script>

<?
		}
	}
	}
?>