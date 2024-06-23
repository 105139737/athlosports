<?
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
date_default_timezone_set('Asia/Kolkata');
$dttm=date('d-m-Y H:i:s a');
$sl=$_POST['sl'];
$sup=$_POST['sup'];
$sgstin=$_POST['sgstin'];
$name=$_POST['name'];
$note_no=$_POST['note_no'];
$dt=$_POST['dt'];
$inv=$_POST['inv'];

$invdt=$_POST['invdt'];
$note_typ=$_POST['note_typ'];
$amm=$_POST['amm'];
$styp=$_POST['styp'];
$edt=$_POST['edt'];
$typ=$_POST['typ'];
$tax_rate=$_POST['tax_rate'];
$tax=$_POST['tax'];
$net=$_POST['net'];
$refno=$_POST['refno'];
$dsl=$_POST['dsl'];
	
$err="";
if($sup==''){$err="Please Select Supplier ...";}
if($sgstin==''){$err="Please Select GSTIN ...";}
$query1="select * from main_cdnr where note_no='$note_no' and sl!='$sl'";
$result1 = mysqli_query($conn,$query1);
$conn=mysqli_num_rows($result1);
if($conn>0)
{
$err="Note No. Already Exists...";	
}
$query12="select * from main_cdnr where refno='$refno' and sl!='$sl'";
$result12 = mysqli_query($conn,$query12);
$conn1=mysqli_num_rows($result12);
if($conn1>0)
{
$err="Refno. Already Exists...";	
}

if($err=="")
{
$dt=date("Y-m-d", strtotime($dt));	
$invdt=date("Y-m-d", strtotime($invdt));	
$edt=date('Y-m-d');

if($note_typ=='C')
{
$dldgr='12';	
$cldgr='35';	
$nrtn="CREDIT NOTE";
}
elseif($note_typ=='D')
{
$dldgr='35';	
$cldgr='12';	
$nrtn="DEBIT NOTE";
}

//echo"update main_drcr set sup='$sup',dt='$dt',amm='$net' where sl='$dsl'<br>";
mysqli_query($conn,"update main_drcr set sid='$sup',dt='$dt',amm='$net',dldgr='$dldgr',cldgr='$cldgr',nrtn='$nrtn' where sl='$dsl'");

//echo "update main_cdnr set sup='$sup',sgstin='$sgstin',name='$name',note_no='$note_no',dt='$dt',inv='$inv',invdt='$invdt',note_typ='$note_typ',amm='$amm',styp='$styp',typ='$typ',tax_rate='$tax_rate',tax='$tax',net='$net',refno='$refno' where sl='$sl'";
mysqli_query($conn,"update main_cdnr set sup='$sup',sgstin='$sgstin',name='$name',note_no='$note_no',dt='$dt',inv='$inv',invdt='$invdt',note_typ='$note_typ',amm='$amm',styp='$styp',typ='$typ',tax_rate='$tax_rate',tax='$tax',net='$net' where sl='$sl'");

$err="Update Successfully. Thank You...";
}
?>
<Script language="JavaScript">
alert('<?=$err;?>');
document.location="credit_note_gst_list.php";
</script>