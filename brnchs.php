<?php
$reqlevel = 3;
include("membersonly.inc.php");

$dt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');

$bnm=$_POST['bnm'];
$addr=$_POST['addr'];
$bcnt=$_POST['bcnt'];
$err="";

if($bnm=="" )
{
$err="Please Enter All Field...";	
}
$query = "SELECT * FROM ".$DBprefix."branch where bnm='$bnm'";
$result = mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
$err="Branch Already Exists. Thank You.....";
}
if($err=='')
{
$query2 = "INSERT INTO ".$DBprefix."branch (bnm,addr,bcnt) VALUES ('$bnm','$addr','$bcnt')";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));
/*
$q=mysqli_query($conn,"select * from main_branch order by sl");
while($r8=mysqli_fetch_array($q))
{
$sl=$r8['sl'];
}
$q3=mysqli_query($conn,"insert into  main_signup (username,password,name,brncd,mob,actnum,userlevel) values ('$a','pass','$a','$sl','$c','0','3')")or die (mysqli_error($conn));
*/
?>
<script language="javascript">
alert('Branch Entry Completed. Thank You.....');
document.location="nbrnch.php";
</script>
<?
}
?>
<script language="javascript">
alert('<? echo $err;?>');
window.history.go(-1);
</script>