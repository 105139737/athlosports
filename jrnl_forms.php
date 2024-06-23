<?php
$reqlevel = 3;
include("membersonly.inc.php");
//catch the sent data
	$sl=0;
	
	$dt = $_POST['dt'];
	$vno = $_POST['vno'];
	$proj = $_POST['proj'];
	$cldgr = $_POST['cldgr'];
	$dldgr = $_POST['dldgr'];
	$cbal = $_POST['cbal'];
	$dbal = $_POST['dbal'];
	$paymtd = $_POST['paymtd'];
	$refno = $_POST['refno'];
	$amm = $_POST['amm'];
	$it = $_POST['it'];
	$nrtn = $_POST['nrtn'];
	$flnm = $_POST['flnm'];
	
	$sl = $_POST['updt'];
	$cid = $_POST['cid'];
	$sid = $_POST['sid'];
	$brncd = $_POST['brncd'];
		$dis = $_POST['dis'];
    $chhh="";
    if($flnm=='pur.php')
	{
	$typ='55';
    $paymtd='0';
	}
	if($flnm=='sale_ser.php')
	{
	$typ='22';
    $paymtd='0';
	}
	if($flnm=='jrnl_form.php')
	{
	$typ='2';
	}
	if($flnm=='income.php')
	{
	$typ='33';
	}
	
	if($flnm=='expense.php')
	{
	$typ='44';
	}
	if($flnm=='recv_reg.php')
	{
	$typ='77';
	$chhh=" and cid='$cid'";
	}
	if($flnm=='pay_reg.php')
	{
	$typ='88';
	$chhh=" and sid='$sid'";
	}
	if($flnm=='refund.php')
	{
	$typ='99';
	}
	if($flnm=='contra.php')
	{
	$typ='3';
	}
	
	if($flnm=="income.php")
	{
	$dirnm="income";
	}
	else if($flnm=="expense.php")
	{
	$dirnm="expense";
	}
	else if($flnm=="recv_reg.php")
	{
	$dirnm="recv_reg";
	}
	else if($flnm=="pay_reg.php")
	{
	$dirnm="pay_reg";
	}
	else if($flnm=="contra.php")
	{
	$dirnm="contra";
	}
	else{
	$dirnm="jrnl_form";
	}
	
	
	
	
	
	$err="";
	$current_dt=date('Y-m-d');
	$chkdt=date('Y-m-d', strtotime($dt));
	$query="Select * from main_dt";
	$result = mysqli_query($conn,$query);
	while ($R = mysqli_fetch_array ($result))
	{
	$dt_limit=$R['dt'];
	}
	$limit_dt = strtotime ( "- ".$dt_limit." day" , strtotime ( $current_dt) ) ;
		$limit_dt = date ( 'Y-m-d' , $limit_dt );
	if($user_current_level>0)
	{
		if(strtotime($chkdt)>=strtotime($limit_dt))
		{
			
		}
		else
		{
			$err="You Have No Permission For Entry Date.";
		}
	}
if($err=="")
{
	
	if($sl!=0)
	{
	if($dt=='' or $vno=='' or $cldgr=='' or $dldgr=='' or $paymtd=='' or $amm==''or $nrtn=='')
	{
	?>
<script language="javascript">
alert('Please Fill All The Fields.');
window.history.go(-1);
</script>
<?	}
	else
	{
	
$query31 = "UPDATE main_drcr set dt='$dt',nrtn='$nrtn',dldgr='$dldgr',mtd='$paymtd',mtddtl='$refno',cldgr='$cldgr',amm='$amm',cid='$cid',sid='$sid',brncd='$brncd' where sl='$sl'";
$result31 = mysqli_query($conn,$query31)or die (mysqli_error($conn));

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
?>
<script language="javascript">
alert('Updated Successfully. Thank You...');
document.location = "<?=$flnm;?>";
</script>
<?
	}
	}
	else
	{
if($dt=='' or $vno=='' or $cldgr=='' or $dldgr=='' or $paymtd=='' or $amm==''or $nrtn=='')
	{
	?>
<script language="javascript">
alert('Please Fill All The Fields.');
window.history.go(-1);
</script>
<?	}
	else
	{
	date_default_timezone_set('Asia/Kolkata');
	$edt = date('d/m/Y h:i:s a', time());
	$dt=date('Y-m-d', strtotime($dt));	
	if($cldgr==$dldgr)
	{
	?>
<script language="javascript">
alert('Sorry!! Credit Ledger & Debit Ledger Can not be Same.');
window.history.go(-1);
</script>
<?
}
else
{
$query4 = "SELECT * FROM main_drcr where pno='$proj' and cldgr='$cldgr' and dldgr='$dldgr' and dt='$dt' and amm='$amm' and mtd='$paymtd' and mtddtl='$refno' and nrtn='$nrtn' $chhh";
$result4 = mysqli_query($conn,$query4);
$cnt=0;
while ($R = mysqli_fetch_array ($result4))
{
$cnt++;
}
if($cnt>0)
{
?>
<script language="javascript">
alert('Sorry!! Entry Already Exist.');
window.history.go(-1);
</script>
<?
}
else
{
$query31 = "INSERT INTO main_drcr (pno,vno,dt,nrtn,typ,dldgr,mtd,mtddtl,cldgr,amm,eby,edtm,it,cid,sid,brncd) VALUES ('$proj','$vno','$dt','$nrtn','$typ','$dldgr','$paymtd','$refno','$cldgr','$amm','$user_currently_loged','$edt','$it','$cid','$sid','$brncd')";
$result31 = mysqli_query($conn,$query31)or die (mysqli_error($conn));

if($flnm=='recv_reg.php')
{
if($dis>0)
{
$query31 = "INSERT INTO main_drcr (pno,vno,dt,nrtn,typ,dldgr,mtd,mtddtl,cldgr,amm,eby,edtm,it,cid,sid,brncd) VALUES ('$proj','$vno','$dt','Discount','D$typ','29','$paymtd','$refno','4','$dis','$user_currently_loged','$edt','$it','$cid','$sid','$brncd')";
$result31 = mysqli_query($conn,$query31)or die (mysqli_error($conn));
}

}

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

?>
<script language="javascript">
alert('Added Successfully. Thank You.');
document.location = "<?=$flnm;?>";
</script>
<?
}
}}}
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

