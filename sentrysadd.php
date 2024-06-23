<?PHP 
$reqlevel = 3; 
include("membersonly.inc.php");
$dt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s');
 $cnm=rawurldecode($_REQUEST['cnm']);
$mob=rawurldecode($_REQUEST['mob']);
$email=rawurldecode($_REQUEST['email']);
$gstin=rawurldecode($_REQUEST['gstin']);
$pan=rawurldecode($_REQUEST['pan']);
$fst=rawurldecode($_REQUEST['fst']);
$gstdt=rawurldecode($_REQUEST['gstdt']);
$addr=rawurldecode($_REQUEST['addr']);

if($gstdt!='')
{
$gstdt=date('Y-m-d', strtotime($gstdt));
}

$err="";

if($cnm=='' or $mob=='')
{
	$err="Please Fill All The Fields.....";
}

$queryx="select * from ".$DBprefix."cust where nm='$cnm' and cont='$mob'";
$resultx = mysqli_query($conn,$queryx);
$cntx=mysqli_num_rows($resultx);
if($cntx>0){
    $err="Data Already Exist";
}

if($err=="")
{
mysqli_query($conn,"insert into main_cust(typ,nm,addr,cont,mail,edt,edtm,eby,gstin,pan,gstdt,st)
		values('$ctyp','$cnm','$addr','$mob','$email','$dt','$dttm','$user_currently_loged','$gstin','$pan','$gstdt','$fst')") or die (mysqli_error($conn));

$query111 = "SELECT * FROM ".$DBprefix."cust order by sl desc limit 0,1";
$result111 = mysqli_query($conn,$query111);
while ($R111 = mysqli_fetch_array ($result111))
{
$sl=$R111['sl'];
}	
	
	?>
	<Script language="JavaScript">

	$('#compose-modal').modal('hide');
	
	$('#custnm').append('<option value="<?=$sl;?>"><?=$cnm;?> <?if($mob!=""){?>( <?=$mob;?> )<?}?></option>');
		$('#custnm').trigger('chosen:updated');
	   document.getElementById('custnm').value='<?=$sl;?>';
	    $('#custnm').trigger('chosen:updated');
		
	gtid();
	</script>
	<?

}
else
{
?>
<Script language="JavaScript">
alert('<? echo $err;?>');
</script>
<?
}
?>