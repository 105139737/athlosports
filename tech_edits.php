<?php
$reqlevel = 3;
include("membersonly.inc.php");
$edt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');
$b=$_POST['cat'];
$sec=$_POST['sec'];
$sl=$_POST['sl'];
$hsn="NA";

$err="";

if($b=="")
{
$err="Please Enter All Fields...";	
}	

$query = "SELECT * FROM ".$DBprefix."catg where cnm='$b' and sec='$sec' and sl!='$sl'";
$result = mysqli_query($conn,$query)or die (mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
{
$err="Data Already Exists...";
}
if($err=="")
{
$query2 = "Update ".$DBprefix."catg set cnm='$b',sec='$sec' where sl='$sl'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));
$msg="Update Successfully. Thank You..!";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="pcat.php";
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







