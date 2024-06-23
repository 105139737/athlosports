<?PHP 
$reqlevel = 3; 
include("membersonly.inc.php");

$dt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');

$spn=$_POST['spnm'];
$cprsn=$_POST['cprsn'];
$srtnm=$_POST['srtnm'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$mob1=$_POST['mob1'];
$mob2=$_POST['mob2'];
$gstin=$_POST['gstin'];
$pan=$_POST['pan'];
//$gstno=$_POST['gstno'];
$fst=$_POST['fst'];

$err=="";
if($spn=='')
{
?>
<script>
alert('Please Fill All The Fields.');
history.go(-1);
</script>
<?	
}
else
{
$queryx="select * from ".$DBprefix."suppl where spn='$spn' and mob1='$mob1'";
$resultx = mysqli_query($conn,$queryx) or die(mysqli_error($conn));
$cntx=mysqli_num_rows($resultx);

if($cntx>0)
{
$err="Data Already Exist";
}

if($err=="")
{
$query6 = "INSERT INTO ".$DBprefix."suppl (spn,nm,mob1,mob2,email,edt,edtm,eby,srtnm) VALUES ('$spn','$cprsn','$mob1','$mob2','$email','$dt','$dttm','$user_currently_loged','$srtnm')";
$result6 = mysqli_query($conn,$query6)or die (mysqli_error($conn));

$get=mysqli_query($conn,"select * from main_suppl order by sl desc limit 0,1") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($get))
{	$spn=$row['sl']; }

$result6 = mysqli_query($conn,"INSERT INTO ".$DBprefix."suppl_gst (spn,addr,edt,edtm,eby,gstin,pan,st)
 VALUES ('$spn','$addr','$dt','$dttm','$user_currently_loged','$gstin','$pan','$fst')")or die (mysqli_error($conn));
?>
<Script language="JavaScript">
alert('Submitted Successfully. Thank You...');
document.location="sentry.php";
</script>
<?
}
else
{
?>

<Script language="JavaScript">
alert('<? echo $err;?>');
window.history.go(-1);
</script>
<?
}
}
?>