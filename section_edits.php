<?php
$reqlevel = 3;
include("membersonly.inc.php");
$edt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');
$nm=$_POST['sec'];
$als=$_POST['als'];
$sl=$_POST['sl'];
$hsn="NA";

$err="";

if($nm=="" or $als=="")
{
$err="Please Enter All Field...";	
}	
$query = "SELECT * FROM ".$DBprefix."sec where als='$als' and sl!='$sl'";
$result = mysqli_query($conn,$query)or die (mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
{
$err="Data Already Exists...";
}
if($err=="")
{
$query2 = "Update ".$DBprefix."sec set nm='$nm',als='$als' where sl='$sl'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));
$msg="Update Successfully. Thank You..!";
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







