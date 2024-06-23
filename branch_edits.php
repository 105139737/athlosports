<?PHP 
$reqlevel = 3; 
include("membersonly.inc.php");
$dt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');

$bnm=$_POST['bnm'];
$addr=$_POST['addr'];
$bcnt=$_POST['bcnt'];
$sl=$_POST['sl'];
$err="";
if($bnm=="" )
{
$err="Please Enter All Field...";	
}	
$queryx=mysqli_query($conn,"select * from ".$DBprefix."branch where bnm='$bnm' and sl!='$sl'")or die(mysqli_error($conn));
$cntx=mysqli_num_rows($queryx);
if($cntx>0)
{
$err="Branch Already Exist !";	
}
if($err=='')
{
$query6 = "Update ".$DBprefix."branch set bnm='$bnm',addr='$addr',bcnt='$bcnt' where sl='$sl'";
$result6 = mysqli_query($conn,$query6)or die (mysqli_error($conn));
?>
<script language="javascript">
alert('Data Update Sucsessfully...');
document.location="nbrnch.php";
</script>
<?
}
?>
<Script language="JavaScript">
alert('<?=$err;?>');
window.history.go(-1);
</script>