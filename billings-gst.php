<?php
$reqlevel = 1;
include("membersonly.inc.php");
include("Numbers/Words.php");
include "header.php";
date_default_timezone_set('Asia/Kolkata');
$cdt=date('Y-m-d');
$dttm=date('d-m-Y H:i:s a');
$grp=4;
$custnm=$_POST[custnm];
$addr=$_POST[addr];
$mob=$_POST[mob];
$mail=$_POST['mail'];
$brncd=$_POST[brncd];
$dt=$_POST[dt];
$dis=$_POST[dis];
$car=$_POST[car];
$vat=$_POST[vat];
$vatamm=$_POST[vatamm];
$tamm=$_POST[tamm];
$dldgr=$_POST[dldgr];
$mdt=$_POST[mdt];
$pamm=$_POST[pamm];
$crfno=$_POST[crfno];
$idt=$_POST[idt];
$cbnm=$_POST[cbnm];
$fst=$_POST[fst];
$tst=$_POST[tst];
$tmod=$_POST[tmod];
$psup=$_POST[psup];
$vno=$_POST[vno];
$lpd=$_POST[lpd];
$sec=$_POST['sec'];

$result3 = mysqli_query($conn,"SELECT * FROM main_sec where sl='$sec'") or die(mysqli_error($conn));
while($row3=mysqli_fetch_array($result3))
{
$als=$row3['als'];
}                                                                                                                                
$dt=date('Y-m-d', strtotime($dt));
if($idt=="")
{
	$idt="0000-00-00";
}
else
{
$idt=date('Y-m-d', strtotime($idt));
}

$err="";
if($custnm=="")
{
$err="Please Enter Customer Name...";
}
$query1 = "SELECT sum(ttl) as gttl,sum(tamm) as gtamm,sum(cgst_am) as cgst,sum(sgst_am) as sgst,sum(igst_am) as igst FROM ".$DBprefix."slt where eby='$user_currently_loged'";
$result1 = mysqli_query($conn,$query1);
while ($R1 = mysqli_fetch_array ($result1))
{
$gtamm=$R1['gtamm'];
$gttl=$R1['gttl'];
$gttl1=$R1['gttl'];
$cgst=$R1['cgst'];
$sgst=$R1['sgst'];
$igst=$R1['igst'];
}
if($gttl==0){
$err="Please Add Some Product First";
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
if($err=="")
{
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
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay) VALUES ('$vcno','$blno','$custnm','$dt','S-GST','$grp','38','$sgst','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}
if($igst>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay) VALUES ('$vcno','$blno','$custnm','$dt','I-GST','$grp','39','$igst','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}

/*
if($roff!="")
{
if($roff<0)
{
$roff=($roff*(-1));
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,idt,mtd,mtddtl,dldgr,cldgr,amm,brncd,eby,edtm) VALUES ('$vcno','$blno','$custnm','$dt','Round Off','$idt','$mdt','$crfno','40','$grp','$roff','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));	
}
else
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,idt,mtd,mtddtl,dldgr,cldgr,amm,brncd,eby,edtm) VALUES ('$vcno','$blno','$custnm','$dt','Round Off','$idt','$mdt','$crfno','$grp','40','$roff','$brncd','$user_currently_loged','$dttm')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));	
}
}
*/
if($pamm>0)
{
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,idt,mtd,mtddtl,dldgr,cldgr,amm,brncd,eby,edtm,pay) VALUES ('$vcno','$blno','$custnm','$dt','Payment','$idt','$mdt','$crfno','$dldgr','$grp','$pamm','$brncd','$user_currently_loged','$dttm','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));
}
$que45 = "SELECT * FROM main_cust where sl='$custnm'";
$resu45 = mysqli_query($conn,$que45);
while ($R145 = mysqli_fetch_array ($resu45))
{
$cugst=$R145['gstin'];
}


$query211 = "INSERT INTO ".$DBprefix."billing (blno,cid,grp,amm,tamm,gstam,roff,paid,crdtp,cbnm,dt,edt,pdts,vat,vatamm,car,dis,bcd,eby,tpoint,fst,tst,gst,tmod,psup,vno,lpd,gstin,billno,sec,als) 
VALUES ('$blno','$custnm','$grp','$rgttl','$gtamm','$gstam','$roff','$pamm','$mdt','$cbnm','$dt','$cdt','$dttm','$vat','$vatamm','$car','$dis','$brncd','$user_currently_loged','$tpoint','$fst','$tst','1','$tmod','$psup','$vno','$lpd','$cugst','$billno','$sec','$als')";
$result211 = mysqli_query($conn,$query211)or die(mysqli_error($conn)); 
$ppdis=0;
$query100 = "SELECT * FROM ".$DBprefix."slt where eby='$user_currently_loged' order by sl";
$result100 = mysqli_query($conn,$query100);
while ($R100 = mysqli_fetch_array ($result100))
{
$cat=$R100['cat'];
$scat=$R100['scat'];
$prsl=$R100['prsl'];
$unit=$R100['unit'];
$pcs=$R100['pcs'];
$prc=$R100['prc'];
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
$refno=$R100['refno'];
$usl=$R100['usl'];
$imei=$R100['imei'];
$total=$R100['total'];
$disp=$R100['disp'];
$disa=$R100['disa'];
$betno=$R100['betno'];
$srtnm=$R100['srtnm'];
$sec1=$R100['sec'];

$ret=$prc;
$rate=round($net_am/$pcs,2);

$taxam=$net_am-($cgst_am+$sgst_am+$igst_am);
$stk_rate=round($taxam/$pcs,2);



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
VALUES ('$srtnm','$betno','$cat','$scat','$prsl','$imei','$unit','$kg','$grm','$pcs','$srt','$adp','$prc','$ttl','$taxam','$gtamm','$blno','$fst','$tst','$cgst_rt','$sgst_rt','$igst_rt','$cgst_am','$sgst_am','$igst_am','$net_am','$refno','$usl','$uval','$total','$disp','$disa','$dt','$mrp','$rate1','$stk_rate1','$sec1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
	
$query21 = "INSERT INTO ".$DBprefix."stock (srtnm,betno,unit,pcd,bcd,dt,stout,nrtn,eby,dtm,stat,ret,refno,sbill,usl,uval,rate,stk_rate) VALUES 
('$srtnm','$betno','$unit','$prsl','$brncd','$dt','$stout','Sale','$user_currently_loged','$dttm','1','$ret','$refno','$blno','$usl','$uval','$rate1','$stk_rate1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
}


$query2 = "DELETE FROM ".$DBprefix."slt WHERE eby='$user_currently_loged'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error($conn));



$query1 = "SELECT sum(net_am) as net_am FROM ".$DBprefix."billdtls where blno='$blno'";
$result1 = mysqli_query($conn,$query1);
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['net_am'];
}
if($vat!="")
{
$vat1=($gttl*$vat)/100;
$gttl1=($gttl+$vat1+$car)-$dis;
}
else
{
	$gttl1=($gttl+$car)-$dis;
}

$nw = new Numbers_Words();
$aiw=$nw->toWords($gttl1);

?>
<html>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?
            include "left_bar.php";
            ?>
<head>

<style>
.bor{
	
border: 1px solid #000;
  
}
.css{
	border:1px solid #000;
	padding: 0px 0px;

	font-size:14px;
	
	color: #000000;
}
#line{
    border-bottom: 1px black solid;

    height:9px;        
   
}

</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="advancedtable.css" rel="stylesheet" type="text/css" />




</head>
<body >
 <center>						
							
<form method="post" action="centrys.php" name="form1"  id="form1">
<table border="0" width="677px">
<tr>
<td  align="center" colspan="2">
<font size="7"><b><?=$comp_nm;?></b></font>
<br>
<font size="4"><b><?=$comp_addr;?></b></font>
</td>
</tr>
<tr>
<td  align="right" style="padding-right:10px">
<font size="5"> <b><a href="billing-gst.php" ><u>Back</u></a></b></font>
</td>
<td  align="left">
<font size="5"> <b><a href="bill_new_gst.php?blno=<?=rawurlencode($blno);?>" target="_blank"><font color="red"><u>Print</u></font></a></b></font>
</td>
</tr>

<tr>
<td  align="center" colspan="2" >
<font size="4" color="red"> <b> Bill No. : <?=$blno;?></b></font>
</td>

</tr>
</table>


 </form>      
    </center> 
</body>
</div>
</html>
<?
}
else
{
    ?>
<Script language="JavaScript">
alert('<? echo $err;?>');
document.location="billing-gst.php";
</script>
<?
}
?>
