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
		$result4 = mysqli_query($conn,"SELECT * FROM main_signup where mob='$mob'");
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
$result2 = mysqli_query($conn,"INSERT INTO main_signup (username,password,name,addr,mob,mailadres,cper,lat,longg,signupdate,userlevel,actnum)
 VALUES ('$mob','123','$nm','$addr','$mob','$email','$cper','$lat','$long','$edt','10','0')") or die(mysqli_error($conn));
?>
<script language="javascript">
alert('Outlet Added Successfully, Thank You.');
document.location = "outlet_setup.php";
</script>
<?
	}
	}
?>