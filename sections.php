<?php
$reqlevel = 3;
include("membersonly.inc.php");
$edt=date('Y-m-d');
$edtm=date('d-m-Y H:i:s');
$sec=$_POST['sec'];
$als=$_POST['als'];

$hsn="NA";
$err="";
if($sec=="" or $als=="")
{
$err="Please Fill all Fields...";	
}	
	
$query = "SELECT * FROM ".$DBprefix."sec where als='$als'";
$result = mysqli_query($conn,$query)or die (mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
{
$err="Data Already Exists...";
}
if($err=="")
{
$query2 = "INSERT INTO ".$DBprefix."sec (nm,als,edt,edtm,eby) VALUES ('$sec','$als','$edt','$edtm','$user_currently_loged')";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));
$msg="Submit Successfully. Tankn You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="section.php";
</script>
<?
}
else
{
?>
<script language="javascript">
alert('<?=$err;?>');
window.history.go(-1);
</script>
<?	
}
?>






