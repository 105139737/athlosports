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

	
/*	$val=date_chk($dt);
	if($val==0)
	{
		die('<b><center><font color="red" size="5">Please Check Your Input Date. Please Go Back Previous Page....</font></center></b>');
	}
*/
$err="";
if($sup==''){$err="Please Select Supplier ...";}
if($sgstin==''){$err="Please Select GSTIN ...";}
$query1="select * from main_cdnr where note_no='$note_no'";
$result1 = mysqli_query($conn,$query1);
$conn=mysqli_num_rows($result1);
if($conn>0)
{
$err="Note No. Already Exists...";	
}
$query12="select * from main_cdnr where refno='$refno'";
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
$net=$amm+$tax;

$query51="select * from ".$DBprefix."drcr where vno!='' order by vno";
$result51 = mysqli_query($conn,$query51);
while($rows=mysqli_fetch_array($result51))
{
	$vnos=$rows['vno'];
}
	$vid1=substr($vnos,2,7);
$count6=5;

while($count6>0){
$vid1=$vid1+1;
$vnoc=str_pad($vid1, 7, '0', STR_PAD_LEFT);

$vno="SV".$vnoc;
$query5="select * from ".$DBprefix."drcr where vno='$vno'";
$result5 = mysqli_query($conn,$query5);
$count6=mysqli_num_rows($result5);
}
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
 $query21 = "INSERT INTO ".$DBprefix."drcr(vno,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,ttyp,sbill,typ) VALUES 
('$vno','$sup','$dt','$nrtn','$dldgr','$cldgr','$net','$branch_code','$user_currently_loged','$dttm','$typ','$refno','C02')";
$result21 = mysqli_query($conn,$query21);

$query="select * from ".$DBprefix."drcr order by sl desc limit 0,1";
$result = mysqli_query($conn,$query);
while($rows=mysqli_fetch_array($result))
{
	$dsl=$rows['sl'];
}

$result=mysqli_query($conn,"insert into main_cdnr(sup,sgstin,name,note_no,dt,inv,invdt,note_typ,amm,styp,edt,typ,tax_rate,tax,net,dsl,refno)values('$sup','$sgstin','$name','$note_no','$dt','$inv','$invdt','$note_typ','$amm','$styp','$edt','$typ','$tax_rate','$tax','$net','$dsl','$refno')");		
$err="Submit Successfully. Thank You...";
}
?>
<Script language="JavaScript">
alert('<?=$err;?>');
document.location="debit_note.php";
</script>