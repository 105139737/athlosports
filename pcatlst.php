<?php
$reqlevel = 3;
include("membersonly.inc.php");
$edt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');
$cat=$_POST['cat'];
$sec=$_POST['sec'];
/*$hsn=$_POST['hsn'];
$sun=$_POST['sun'];
$smvlu=$_POST['smvlu'];
$mun=$_POST['mun'];
$mdvlu=$_POST['mdvlu'];
$bun=$_POST['bun'];
$bgvlu=$_POST['bgvlu'];*/
$hsn="NA";
$err="";
//if($cat=="" or $sec=="")
if($cat=="")
{
$err="Please Fill all Fields...";	
}	
	
$query = "SELECT * FROM ".$DBprefix."catg where cnm='$cat'";
$result = mysqli_query($conn,$query)or die (mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count>0)
{
$err="Data Already Exists...";
}
if($err=="")
{
$query2 = "INSERT INTO ".$DBprefix."catg (cnm,sec,edt,eby) VALUES ('$cat','$sec','$edt','$user_currently_loged')";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));
$msg="Submit Successfully. Tankn You";
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






