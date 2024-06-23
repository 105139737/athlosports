<?php
$reqlevel = 3;
include("membersonly.inc.php");
$cper = $_POST['cper'];
$nm = $_POST['nm'];
$mob = $_POST['mob'];
$email = $_POST['email'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$addr = $_POST['addr'];
$sl = $_POST['sl'];
$edt=date('Y-m-d');
	if($cper=='' or $nm=='' or $mob=='')
	{
	?>

<script language="javascript">
alert('Please Fill All The Fields.');
window.history.go(-1);
</script>

<?	}
	else
	{
		$result4 = mysqli_query($conn,"SELECT * FROM main_signup where mob='$mob' and sl!='$sl'");
		$rrr=mysqli_num_rows($result4);
		if($rrr>0)
		{
		?>
<script language="javascript">
alert('Sorry!! Mobile No. Already Exist.');
window.history.go(-1);
</script>

<?
		}
		else
		{
			$result2 = mysqli_query($conn,"update main_signup set name='$nm',addr='$addr',mob='$mob',mailadres='$email',cper='$cper',lat='$lat',longg='$long' where sl='$sl'")or die(mysqli_error($conn));
?>
<script language="javascript">
alert('Outlet Update Successfully, Thank You.');
document.location = "outlet_setup.php";
</script>
<?
	}
	}
?>