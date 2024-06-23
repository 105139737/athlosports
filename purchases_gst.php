<?php
$reqlevel = 3;
include("membersonly.inc.php");
include("Numbers/Words.php");
$cdt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s a');

$grp=4;

$sup=$_POST[sup];
$brncd=$_POST[brncd];
$inv=$_POST[inv];
$dt=$_POST[dt];
$lcd=$_POST[lcd];
$lfr=$_POST[lfr];
$tamm=$_POST[tamm];
$dldgr=$_POST[dldgr];
$mdt=$_POST[mdt];
$pamm=$_POST[pamm];
$crfno=$_POST[crfno];
$idt=$_POST[idt];
$cbnm=$_POST[cbnm];
$vat=$_POST[vat];
$sttl=$_POST[sttl];
$tdis=$_POST[tdis];
$fst=$_POST[fst];
$tst=$_POST[tst];
$addr=$_POST[addr];

$roff=$_POST[roff];
$adl=$_POST['adl'];
$adlv=$_POST['adlv'];
$tamm2=$_POST['tamm2'];
$remk=$_POST['remk'];
$vstat=$_POST['vstat'];

$cons=$_POST['cons'];
$custnm=$_POST['custnm'];

$paid=0;
$due=0;


if($dt!="")
{
$dt=date('Y-m-d', strtotime($dt));
}
else{
	$dt="0000-00-00";
}
/*
$val=date_chk($dt);
if($val==0)
{
die('<b><center><font color="red" size="5">Please Check Your Input Date. Please Go Back Previous Page....</a></font></center></b>');
}
*/
if($idt=="")
{
	$idt="0000-00-00";
}
else
{
$idt=date('Y-m-d', strtotime($idt));
}
$err="";

if($sup==""){
    $err="Please Enter Shop Name ...";
}


if($cons=="Yes" and $custnm==""){
    $err="Please Select Ship To Customer ...";
}


$query_inv="select * from main_purchase where inv='$inv'";
$result_inv = mysqli_query($conn,$query_inv) or die(mysqli_error($conn));
$inv_count=mysqli_num_rows($result_inv);
if($inv_count>0)
{
$err="Invoice No. Already Exists...";	
}

$query1 = "SELECT sum(ttl) as gttl,sum(cgst_am) as cgst,sum(sgst_am) as sgst,sum(igst_am) as igst,sum(net_am) as sttl FROM ".$DBprefix."ptemp where eby='$user_currently_loged'";
$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['gttl'];
$gttl1=$R1['gttl'];
$cgst=$R1['cgst'];
$sgst=$R1['sgst'];
$igst=$R1['igst'];
$sttl=$R1['sttl'];
}

if($gttl==0)
{
    $err="Please Add Some Product First";
}


if($err=="")
{
$m=date('m', strtotime($dt));

$y=date('y', strtotime($dt));;
if($m>=4)
{
$yy=$y."-".($y+1)."/";	
	
}
elseif($m<=3)
{
$yy=($y-1)."-".$y."/";	
}
	
    $vid=0;
$count5=1;

$query51="select * from main_purchase order by sl desc limit 0,1";
$result51 = mysqli_query($conn,$query51) or die(mysqli_error($conn));
while($rows=mysqli_fetch_array($result51))
{	
$vnos=$rows['blno'];
}	
$vid=substr($vnos,8,6);	

while($count5>0){
$vid=$vid+1;
$vno=str_pad($vid, 6, '0', STR_PAD_LEFT);

$blno=$yy.'-P'.$vno;
$query5="select * from ".$DBprefix."purchase where blno='$blno'";
$result5 = mysqli_query($conn,$query5) or die(mysqli_error($conn));
$count5=mysqli_num_rows($result5);
}
  
$query51="select * from ".$DBprefix."drcr order by vno";
$result51 = mysqli_query($conn,$query51) or die(mysqli_error($conn));
while($rows=mysqli_fetch_array($result51))
{	
$vnos=$rows['vno'];
}	
$vid1=substr($vnos,2,7);	
$count6=5;
while($count6>0)
{
$vid1=$vid1+1;
$vnoc=str_pad($vid1, 7, '0', STR_PAD_LEFT);
$vcno="SV".$vnoc;
$query5="select * from ".$DBprefix."drcr where vno='$vcno'";
$result5 = mysqli_query($conn,$query5);
$count6=mysqli_num_rows($result5);
}

 $query1 = "SELECT sum(ttl) as gttl,sum(net_am) as damm FROM ".$DBprefix."ptemp where eby='$user_currently_loged'";
   $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['gttl'];
$damm=$R1['damm'];
}

$damm=$damm-($cgst+$sgst+$igst);
$damm=$damm+$roff;
if($adl=="+")
{	
/*$damm=$damm+$adlv;*/
$damm=$damm;
}
elseif($adl=="-")
{
/*$damm=$damm-$adlv;*/	
$damm=$damm;	
}
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','Purchase','-3','12','$damm','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));

if($cgst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','C-GST','37','12','$cgst','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
}
if($sgst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','S-GST','38','12','$sgst','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
}
if($igst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','I-GST','39','12','$igst','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
}

if($remk!='')
{
if($adlv>0)
{
if($adl=="+")
{	
$damm=$damm+$adlv;

$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','Purchase ADD Charge','$remk','12','$adlv','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
}
elseif($adl=="-")
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm)
 VALUES ('$vcno','$blno','$sup','$dt','Purchase Less Charge','12','$remk','$adlv','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
	
}	
}
}


if($pamm>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,sbill,sid,dt,nrtn,idt,mtd,mtddtl,dldgr,cldgr,amm,brncd,eby,edtm,typ)
 VALUES ('$vcno','$blno','$sup','$dt','Purchase Payment','$idt','$mdt','$crfno','12','$dldgr','$pamm','$brncd','$user_currently_loged','$dttm','88')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn));
}

$query211 = "INSERT INTO ".$DBprefix."purchase (vstat,blno,sid,amm,paid,crdtp,edt,eby,pdts,inv,dt,lfr,lcd,bcd,vat,vatamm,sdis,tamm,fst,tst,gst,addr,roff,adl,adlv,tmm2,remk,sttl,cbnm) 
VALUES ('$vstat','$blno','$sup','$gttl','$pamm','$mdt','$cdt','$user_currently_loged','$dttm','$inv','$dt','$lfr','$lcd','$brncd','$vat','$vat1','$tdis','$tamm','$fst','$tst','1','$addr','$roff','$adl','$adlv','$tamm2','$remk','$sttl','$cbnm')";
$result211 = mysqli_query($conn,$query211)or die (mysqli_error($conn));

$query100 = "SELECT * FROM ".$DBprefix."ptemp where eby='$user_currently_loged' order by sl";
$result100 = mysqli_query($conn,$query100) or die(mysqli_error($conn));
while ($R100 = mysqli_fetch_array ($result100))
{
$tsl=$R100['sl'];
$cat=$R100['cat'];
$scat=$R100['scat'];
$unit=$R100['unit'];
$prsl=$R100['prsl'];
$qty=$R100['qty'];
$mrp=$R100['mrp'];
$ttl=$R100['ttl'];
$fst=$R100['fst'];
$tst=$R100['tst'];
$cgst_rt=$R100['cgst_rt'];
$cgst_am=$R100['cgst_am'];
$sgst_rt=$R100['sgst_rt'];
$sgst_am=$R100['sgst_am'];
$igst_rt=$R100['igst_rt'];
$igst_am=$R100['igst_am'];
$net_am=$R100['net_am'];
$dis=$R100['dis'];
$amm=$R100['amm'];
$usl=$R100['usl'];

$total=$R100['total'];
$disp=$R100['disp'];
$disa=$R100['disa'];
$ldis=$R100['ldis'];
$ldisa=$R100['ldisa'];
$bcd=$R100['bcd'];
$rate=$R100['rate'];
$eby=$R100['eby'];
$betno=$R100['betno'];
$rate=$net_am/$qty;
$stk_rate1=$ttl/$qty;
$get=mysqli_query($conn,"select * from ".$DBprefix."unit where cat='$prsl'") or die(mysqli_error($conn));
while($roww=mysqli_fetch_array($get))
{
	$sun=$roww['sun'];
	$mun=$roww['mun'];
	$bun=$roww['bun'];
	$smvlu=$roww['smvlu'];
	$mdvlu=$roww['mdvlu'];
	$bgvlu=$roww['bgvlu'];
}

if($unit=='sun'){$stock_in=$qty*$smvlu;$rate1=$rate/$smvlu;$uval=$smvlu;$stk_rate=$stk_rate1/$smvlu;}
if($unit=='mun'){$stock_in=$qty*$mdvlu;$rate1=$rate/$mdvlu;$uval=$mdvlu;$stk_rate=$stk_rate1/$mdvlu;}
if($unit=='bun'){$stock_in=$qty*$bgvlu;$rate1=$rate/$bgvlu;$uval=$bgvlu;$stk_rate=$stk_rate1/$bgvlu;}

$query21 = "INSERT INTO ".$DBprefix."purchasedet(cat,scat,unit,uval,prsl,qty,mrp,ttl,blno,fst,tst,cgst_rt,sgst_rt,igst_rt,cgst_am,sgst_am,igst_am,net_am,amm,usl,total,disp,disa,ldis,ldisa,bcd,rate,eby,betno,dt,stk_rate,sup)
 VALUES ('$cat','$scat','$unit','$uval','$prsl','$qty','$mrp','$ttl','$blno','$fst','$tst','$cgst_rt','$sgst_rt','$igst_rt','$cgst_am','$sgst_am','$igst_am','$net_am','$amm','$usl','$total','$disp','$disa','$ldis','$ldisa','$bcd','$rate1','$eby','$betno','$dt','$stk_rate','$sup')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 

$query21 = "INSERT INTO ".$DBprefix."stock (pcd,bcd,dt,unit,stin,nrtn,eby,dtm,stat,ret,refno,pbill,usl,uval,betno,rate,stk_rate)
 VALUES ('$prsl','$bcd','$dt','$unit','$stock_in','Purchase','$user_currently_loged','$dttm','1','$mrp','$blno','$blno','$usl','$uval','$betno','$rate1','$stk_rate')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
}

$query2 = "DELETE FROM ".$DBprefix."ptemp WHERE eby='$user_currently_loged'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));


/*---------------*/
$blno10=$blno;
if($cons=="Yes")
{
	
	
$query1 = "SELECT sum(ttl) as gttl,sum(amm) as gtamm,sum(cgst_am) as cgst,sum(sgst_am) as sgst,sum(igst_am) as igst FROM ".$DBprefix."purchasedet where blno='$blno10'";
$result1 = mysqli_query($conn,$query1)or die(mysqli_error($conn));
while ($R1 = mysqli_fetch_array ($result1))
{
$gtamm=$R1['gtamm'];
$gttl=$R1['gttl'];
$gttl1=$R1['gttl'];
$cgst=$R1['cgst'];
$sgst=$R1['sgst'];
$igst=$R1['igst'];
}




$result3 = mysqli_query($conn,"SELECT * FROM main_sec where sl='1'") or die(mysqli_error($conn));
while($row3=mysqli_fetch_array($result3))
{
$als=$row3['als'];
}
$m=date('m', strtotime($dt));
$y=date('y', strtotime($dt));;
if($m>=4)
{
$yy=$als."/".$y."-".($y+1)."/";	
	
}
elseif($m<=3)
{
$yy=$als."/".($y-1)."-".$y."/";	
}

$yyy=$yy."%";
$query51="select * from ".$DBprefix."billing where blno like '$yyy' order by sl";
$result51 = mysqli_query($conn,$query51);
while($rows=mysqli_fetch_array($result51))
{
	$vnos=$rows['blno'];
}
$vid1=substr($vnos,11,5);
$count6=5;
$vid1=0;
while($count6>0){
$vid1=$vid1+1;
$vnoc=str_pad($vid1, 5, '0', STR_PAD_LEFT);
$billno=$vid1;
$blno=$yy.$vnoc;
$query5="select * from ".$DBprefix."billing where blno='$blno'";
$result5 = mysqli_query($conn,$query5);
$count6=mysqli_num_rows($result5);
}
   
   
$query51="select * from ".$DBprefix."drcr order by vno";
$result51 = mysqli_query($conn,$query51);
while($rows=mysqli_fetch_array($result51))
{	
$vnos=$rows['vno'];
}	
$vid1=substr($vnos,2,7);	
$count6=5;
while($count6>0)
{
	$vid1=$vid1+1;
	$vnoc=str_pad($vid1, 7, '0', STR_PAD_LEFT);
	$vcno="SV".$vnoc;
	$query5="select * from ".$DBprefix."drcr where vno='$vcno'";
	$result5 = mysqli_query($conn,$query5);
	$count6=mysqli_num_rows($result5);
}
$bilamm=$gtamm+$cgst+$sgst+$igst;
$rgttl=round($bilamm);
$roff=round($rgttl-$bilamm,4);
$gstam=$cgst+$sgst+$igst;
$gtamm=$gtamm+$roff;

$totamm=$pamm;
						
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay) 
VALUES ('$vcno','$blno','$custnm','$dt','Sale','$grp','-2','$gtamm','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));

if($cgst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay)
 VALUES ('$vcno','$blno','$custnm','$dt','C-GST','$grp','37','$cgst','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}
if($sgst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay) 
VALUES ('$vcno','$blno','$custnm','$dt','S-GST','$grp','38','$sgst','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}
if($igst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay) 
VALUES ('$vcno','$blno','$custnm','$dt','I-GST','$grp','39','$igst','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}


if($pamm>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,idt,mtd,mtddtl,dldgr,cldgr,amm,brncd,eby,edtm,pay) 
VALUES ('$vcno','$blno','$custnm','$dt','Payment','$idt','$mdt','$crfno','$dldgr','$grp','$pamm','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}
$que45 = "SELECT * FROM main_cust where sl='$custnm'";
$resu45 = mysqli_query($conn,$que45);
while ($R145 = mysqli_fetch_array ($resu45))
{
$cugst=$R145['gstin'];
}


$query211 = "INSERT INTO ".$DBprefix."billing (sto_blno,blno,cid,grp,amm,tamm,gstam,roff,paid,crdtp,cbnm,dt,edt,pdts,vat,vatamm,car,dis,bcd,eby,tpoint,fst,tst,gst,tmod,psup,vno,lpd,gstin,billno,sec,als,sto) 
VALUES ('$blno10','$blno','$custnm','$grp','$rgttl','$gtamm','$gstam','$roff','$pamm','$mdt','$cbnm','$dt','$cdt','$dttm','$vat','$vatamm','$car','$dis','$brncd','$user_currently_loged','$tpoint','$fst','$tst','1','$tmod','$psup','$vno','$lpd','$cugst','$billno','$sec','$als','1')";
$result211 = mysqli_query($conn,$query211)or die(mysqli_error($conn)); 
$ppdis=0;
$query100 = "SELECT * FROM ".$DBprefix."purchasedet where blno='$blno10' order by sl";
$result100 = mysqli_query($conn,$query100);
while ($R100 = mysqli_fetch_array ($result100))
{
$cat=$R100['cat'];
$scat=$R100['scat'];
$prsl=$R100['prsl'];
$unit=$R100['unit'];
$pcs=$R100['qty'];
$prc=$R100['mrp'];
$ttl=$R100['ttl'];
$gtamm=$R100['gtamm'];
$fst=$R100['fst'];
$tst=$R100['tst'];
$cgst_rt=$R100['cgst_rt'];
$cgst_am=$R100['cgst_am'];
$sgst_rt=$R100['sgst_rt'];
$sgst_am=$R100['sgst_am'];
$igst_rt=$R100['igst_rt'];
$igst_am=$R100['igst_am'];
$net_am=$R100['net_am'];
$refno=$R100['blno'];
$usl=$R100['usl'];
$imei=$R100['imei'];
$total=$R100['total'];
$disp=$R100['disp'];
$disa=$R100['disa'];
$betno=$R100['betno'];
$srtnm=$R100['srtnm'];
$sec1=$R100['sec'];

$ret=$prc;
$rate=$net_am/$pcs;

$taxam=$net_am-($cgst_am+$sgst_am+$igst_am);
$stk_rate=$taxam/$pcs;



$get=mysqli_query($conn,"select * from ".$DBprefix."unit where cat='$prsl'") or die(mysqli_error($conn));
while($roww=mysqli_fetch_array($get))
{
$sun=$roww['sun'];
$mun=$roww['mun'];
$bun=$roww['bun'];
$smvlu=$roww['smvlu'];
$mdvlu=$roww['mdvlu'];
$bgvlu=$roww['bgvlu'];
}
$eget=mysqli_query($conn,"select * from main_product where sl='$prsl'") or die(mysqli_error($conn));
while($erow=mysqli_fetch_array($eget))
{
$mrp=$erow['mrp'];
}
if($unit=='sun'){$stout=$pcs*$smvlu;$rate1=$rate/$smvlu;$uval=$smvlu;$stk_rate1=$stk_rate/$smvlu;}
if($unit=='mun'){$stout=$pcs*$mdvlu;$rate1=$rate/$mdvlu;$uval=$mdvlu;$stk_rate1=$stk_rate/$mdvlu;}
if($unit=='bun'){$stout=$pcs*$bgvlu;$rate1=$rate/$bgvlu;$uval=$bgvlu;$stk_rate1=$stk_rate/$bgvlu;}


$query21 = "INSERT INTO ".$DBprefix."billdtls (srtnm,betno,cat,scat,prsl,imei,unit,kg,grm,pcs,srt,adp,prc,ttl,tamm,gtamm,blno,fst,tst,cgst_rt,sgst_rt,igst_rt,cgst_am,sgst_am,igst_am,net_am,refno,usl,uval,total,disp,disa,dt,mrp,rate,stk_rate,sec) 
VALUES ('$srtnm','$betno','$cat','$scat','$prsl','$imei','$unit','$kg','$grm','$pcs','$srt','$adp','$rate','$net_am','$taxam','$gtamm','$blno','$fst','$tst','$cgst_rt','$sgst_rt','$igst_rt','$cgst_am','$sgst_am','$igst_am','$net_am','$refno','$usl','$uval','$net_am','$disp','$disa','$dt','$mrp','$rate1','$stk_rate1','1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
	
$query21 = "INSERT INTO ".$DBprefix."stock (srtnm,betno,unit,pcd,bcd,dt,stout,nrtn,eby,dtm,stat,ret,refno,sbill,usl,uval,rate,stk_rate) VALUES 
('$srtnm','$betno','$unit','$prsl','$brncd','$dt','$stout','Sale','$user_currently_loged','$dttm','1','$rate','$refno','$blno','$usl','$uval','$rate1','$stk_rate1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
}


}
/*---------------*/
?>
<Script language="JavaScript">
alert('Submit Successfully. Thank You...');
document.location="purchase-gst.php";
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
?>
