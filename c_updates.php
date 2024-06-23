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
$pan=$_POST['pan'];
$sl=$_POST['sl'];
$ctyp=$_POST['ctyp'];
$gstdt=$_POST['gstdt'];
$gstdt1=$_POST['gstdt'];
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
	$dsql=mysqli_query($conn,"select * from main_cust where nm='$cnm' and cont='$mob' and sl!='$sl'") or die (mysqli_error($conn));
	$drcnt=mysqli_num_rows($dsql);
	if($drcnt==0)
	{		
if($gstdt1!='')
{
		$gstdt=date('Y-m-d', strtotime($gstdt));
}
		$sql=mysqli_query($conn,"Update main_cust set typ='$ctyp',nm='$cnm',vat_no='$vat_no',addr='$addr',cont='$mob',mail='$email',gstin='$gstin',pan='$pan',gstdt='$gstdt',st='$fst' where sl='$sl'") or die(mysqli_error($conn));
		if($gstdt1!='')
{
$query9 = "SELECT * FROM main_cust where sl='$sl'";
$result9 = mysqli_query($conn,$query9);
while ($R9 = mysqli_fetch_array ($result9))
{
	$gstin=$R9['gstin'];
	$sid=$R9['sl'];
    $query3 = mysqli_query($conn,"update main_billing set gstin='$gstin' where cid ='$sid' and dt>='$gstdt' and gst='1'");	
}
}
		?>
		<Script language="JavaScript">
		alert('Update Successfully. Thank You...');
		document.location="c_show.php";
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