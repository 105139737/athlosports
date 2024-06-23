<?PHP 
$reqlevel = 3; 
include("membersonly.inc.php");
date_default_timezone_set('Asia/Kolkata');
$dt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');

$cnm=$_POST['cnm'];
$vat_no=$_POST['vat_no'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$addr=$_POST['addr'];
$gstin=$_POST['gstin'];
$gstdt=$_POST['gstdt'];
$gstdt1=$_POST['gstdt'];
$pan=$_POST['pan'];
$ctyp=$_POST['ctyp'];
$fst=$_POST['fst'];

if($cnm=="" or $mob=="" )
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
		$err='';
if($gstin!='')
{
if(!preg_match("/[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}[Zz1-9A-Ja-j]{1}[0-9a-zA-Z]{1}/", $gstin))
{
    $err = "Invalid GST number ";
} 
if($gstdt=='')
{
 $err = "Please Enter GSTIN Applicable Date. ";	
}
}
if($err=='')
{
	$dsql=mysqli_query($conn,"select * from main_cust where nm='$cnm' and cont='$mob'") or die (mysqli_error($conn));
	$drcnt=mysqli_num_rows($dsql);
	if($drcnt==0)
	{
		if($gstdt1!='')
{
		$gstdt=date('Y-m-d', strtotime($gstdt));
}
		$sql=mysqli_query($conn,"insert into main_cust(typ,nm,addr,cont,mail,edt,edtm,eby,gstin,pan,gstdt,st)
		values('$ctyp','$cnm','$addr','$mob','$email','$dt','$dttm','$user_currently_loged','$gstin','$pan','$gstdt','$fst')") or die (mysqli_error($conn));
		
		?>
		<Script language="JavaScript">
		alert('Submitted Successfully. Thank You...');
		document.location="cust_entry.php";
		</script>
		<?
	}
	else
	{
		?>
		<script>
		alert('Data Already Exists');
		history.go(-1);
		</script>
		<?
	}
}
else
{
		?>
		<script>
		alert('<?=$err;?>');
		history.go(-1);
		</script>
		<?
}
}
?>