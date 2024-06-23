<?php
$reqlevel = 3;
include("membersonly.inc.php");
//catch the sent data
	$sl = $_POST['sl'];
	$vno = $_POST['vno'];
	$dt = $_POST['dt'];
	$brncd = $_POST['brncd'];
	$cldgr = $_POST['cldgr'];
	$dldgr = $_POST['dldgr'];
	$sid = $_POST['sid'];
	$refno = $_POST['cno'];
	$amm = $_POST['amm'];
	$nrtn = $_POST['nrtn'];

	
	
$typ='C01';
date_default_timezone_set('Asia/Kolkata');
	$edt = date('d-m-Y h:i:s a', time());
		
if($dt=='' or $cldgr=='' or $dldgr=='' or $amm=='' )
{
	?><script language="javascript">
	alert('Please Fill All The Fields.');
	window.history.go(-1);
	</script>
	<?
}
else
{
	$dt=date('Y-m-d', strtotime($dt));
	if($sl=="")
	{
	$query51="select * from ".$DBprefix."drcr order by vno";
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
		
	$query31 =mysqli_query($conn,"INSERT INTO main_drcr (vno,dt,nrtn,typ,dldgr,mtddtl,cldgr,amm,eby,edtm,sid,brncd) VALUES ('$vno','$dt','$nrtn','$typ','$dldgr','$refno','$cldgr','$amm','$user_currently_loged','$edt','$sid','$brncd')") or die(mysqli_error($conn));
	
$dirnm="crdt_notes";
$path5="img/".$dirnm;
if (!file_exists($path5)) {
mkdir($path5);
}
//echo $ext = pathinfo($_FILES['fileToUpload'], PATHINFO_EXTENSION);
$target_dir="img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$path="img/".$dirnm."/".$vno.".".$ext;
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path);

$qrupdt =mysqli_query($conn,"UPDATE main_drcr set path='$path' where vno='$vno'")or die (mysql_error($conn));


	?><script language="javascript">
		alert('Submitted Successfully. Thank You...');
		document.location = "crdt_note.php";
		</script><?
	}
	else
	{
		$query31 = mysqli_query($conn,"UPDATE main_drcr set dt='$dt',nrtn='$nrtn',dldgr='$dldgr',mtddtl='$refno',cldgr='$cldgr',amm='$amm',sid='$sid',brncd='$brncd' where sl='$sl'");

$path5="img/".$dirnm;
if (!file_exists($path5)) {
mkdir($path5);
}
//echo $ext = pathinfo($_FILES['fileToUpload'], PATHINFO_EXTENSION);
$target_dir="img/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$path="img/".$dirnm."/".$vno.".".$ext;
if (file_exists($_FILES['fileToUpload1']['tmp_name'])) {
move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $path);

$qrupdt =mysqli_query($conn,"UPDATE main_drcr set path='$path' where sl='$sl'")or die (mysql_error($conn));
}
		?><script language="javascript">
		alert('Updated Successfully. Thank You...');
		document.location = "crdt_note.php";
		</script><?
	}
}