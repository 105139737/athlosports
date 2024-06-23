<?
$reqlevel = 3;
include("membersonly.inc.php");
date_default_timezone_set('Asia/Kolkata');
$blno=$_REQUEST['blno'];
if($blno!='')
{
	
$query51="select * from main_billing_log order by dblno";
$result51 = mysqli_query($conn,$query51);
while($rows=mysqli_fetch_array($result51))
{	
$vnos=$rows['dblno'];
}	
$vid1=substr($vnos,2,7);	
$count6=5;
while($count6>0)
{
	$vid1=$vid1+1;
	$vnoc=str_pad($vid1, 7, '0', STR_PAD_LEFT);
	$vcno="DL".$vnoc;
	$query5="select * from main_billing_log where dblno='$vcno'";
	$result5 = mysqli_query($conn,$query5);
	$count6=mysqli_num_rows($result5);
}	

$query214 = "insert into main_billing_log (dblno,sec,als,billno,blno,fst,tst,gst,grp,cid,amm,tamm,gstam,roff,tpoint,paid,due,crdtp,cbnm,dt,edt,pdts,vat,vatamm,car,dis,bcd,tmod,psup,vno,lpd,gstin,eby,rstat,cstat)
select '$vcno',sec,als,billno,blno,fst,tst,gst,grp,cid,amm,tamm,gstam,roff,tpoint,paid,due,crdtp,cbnm,dt,edt,pdts,vat,vatamm,car,dis,bcd,tmod,psup,vno,lpd,gstin,eby,rstat,cstat from main_billing where blno = '$blno'";
$result214 = mysqli_query($conn,$query214)or die (mysqli_error($conn)); 

$query214 = "insert into main_billdtls_log (dblno,sec,cat,scat,prsl,mrp,imei,unit,usl,uval,kg,grm,pcs,betno,srt,adp,prc,total,disp,disa,ttl,tamm,gtamm,fst,tst,cgst_rt,cgst_am,sgst_rt,sgst_am,igst_rt,igst_am,net_am,blno,refno,srtnm,retno,rdt,dt,rate,stk_rate,rqty)
select '$vcno',sec,cat,scat,prsl,mrp,imei,unit,usl,uval,kg,grm,pcs,betno,srt,adp,prc,total,disp,disa,ttl,tamm,gtamm,fst,tst,cgst_rt,cgst_am,sgst_rt,sgst_am,igst_rt,igst_am,net_am,blno,refno,srtnm,retno,rdt,dt,rate,stk_rate,rqty from main_billdtls where blno = '$blno'";
$result214 = mysqli_query($conn,$query214)or die (mysqli_error($conn)); 

	
mysqli_query($conn,"delete from main_billing  where blno='$blno'")or die(mysqli_error($conn));
mysqli_query($conn,"delete from main_billdtls where blno='$blno'")or die(mysqli_error($conn));
mysqli_query($conn,"delete from main_stock where sbill='$blno'")or die(mysqli_error($conn));
mysqli_query($conn,"delete from main_drcr where cbill='$blno' and pay='1'")or die(mysqli_error($conn));
}
?>
<script>
alert("Cancel Successfully . Thank You....");
show1();
</script>
