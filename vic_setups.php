<?php
$reqlevel = 3;
include("membersonly.inc.php");
$vno = $_POST['vno'];
$dnm = $_POST['dnm'];
$vtyp = $_POST['vtyp'];
$sl = $_POST['sl'];
$edt=date('Y-m-d');
	if($vtyp=='' or $dnm=='' or $vno=='')
	{
	?>

<script language="javascript">
alert('Please Fill All The Fields.');
window.history.go(-1);
</script>

<?	}
	else
	{
		$result4 = mysqli_query($conn,"SELECT * FROM main_vic where vno='$vno' and vtyp='$vtyp' and sl!='$sl'");
		$rrr=mysqli_num_rows($result4);
		if($rrr>0)
		{
			?>

<script language="javascript">
alert('Sorry!! vehicle  Already Exist.');
window.history.go(-1);
</script>

<?
		}
		else
		{
		if($sl=='')
		{
$result2 = mysqli_query($conn,"INSERT INTO main_vic (dnm,vtyp,vno,edt,eby) VALUES ('$dnm','$vtyp','$vno','$edt','$user_currently_loged')");
?>
<script language="javascript">
alert('Vehicle  Added Successfully, Thank You.');
document.location = "vic_setup.php";
</script>
<?
		}
		else
		{
$result = mysqli_query($conn,"UPDATE main_vic set dnm='$dnm',vtyp='$vtyp',vno='$vno' where sl='$sl'");
?>
<script language="javascript">
alert('Updated Successfully. Thank You...');
document.location = "vic_setup.php";
</script>

<?
		}
	}
	}
?>