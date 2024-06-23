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
$old_blno=$_POST[blno];

                                                                                                                                         
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

$m=date('m', strtotime($dt));
$y=date('y', strtotime($dt));;
if($m>=4)
{
$yy="RHT"."/".$y."-".($y+1)."/";	
	
}
elseif($m<=3)
{
$yy="RHT"."/".($y-1)."-".$y."/";	
}
if($err=="")
{
$yyy=$yy."%";
$query51="select * from ".$DBprefix."billing_ret where blno like '$yyy' order by sl";
$result51 = mysqli_query($conn,$query51)or die(mysqli_error($conn));
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

$blno=$yy.$vnoc;

$billno=$vid1;
$query5="select * from ".$DBprefix."billing_ret where blno='$blno'";
$result5 = mysqli_query($conn,$query5)or die(mysqli_error($conn));
$count6=mysqli_num_rows($result5);

}
   
   
$ppdis=0;
$query100 = "SELECT * FROM main_billdtls where blno='$old_blno' order by sl";
$result100 = mysqli_query($conn,$query100)or die(mysqli_error($conn));
while ($R100 = mysqli_fetch_array ($result100))
{
$tsl=$R100['sl'];
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

$ret=$prc;


$qt=$_POST['q'.$tsl];
if($qt>0)
{
$disa=0;	
$total=round($qt*$prc,4);
if($disp>0)
{
$disa=round(($total*$disp)/100,4);	
}
$lttl=$total-$disa;
$amm=$lttl;
if($fst==$tst)
	{
		if($cgst_rt>0 and $sgst_rt>0)
		{
		$Tcgst_am=round((($cgst_rt+$sgst_rt)*$amm)/(100+$cgst_rt+$cgst_rt),4);
		$sgst_am=round($Tcgst_am/2,4);
		$cgst_am=round($Tcgst_am/2,4);
		$igst_am=0;
		$igst_rt=0;
		}
	}
	else
	{
if($sgst_rt>0){/*$sgst_am=round(($sgst_rt*$amm)/(100+$cgst_rt),2);*/}
if($igst_rt>0){$igst_am=round(($igst_rt*$amm)/(100+$igst_rt),4);}
	$sgst_rt=0;
	$cgst_rt=0;
	$sgst_am=0;
	$cgst_am=0;
	}
$net_am=$amm;
$tamm=$amm-($cgst_am+$sgst_am+$igst_am);
$rate=$net_am/$qt;	
$stk_rate=$tamm/$qt;
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

if($unit=='sun'){$stout=$qt*$smvlu;$rate1=$rate/$smvlu;$uval=$smvlu;$stk_rate1=$stk_rate/$smvlu;}
if($unit=='mun'){$stout=$qt*$mdvlu;$rate1=$rate/$mdvlu;$uval=$mdvlu;$stk_rate1=$stk_rate/$mdvlu;}
if($unit=='bun'){$stout=$qt*$bgvlu;$rate1=$rate/$bgvlu;$uval=$bgvlu;$stk_rate1=$stk_rate/$bgvlu;}

$result=mysqli_query($conn,"Update main_billdtls set rqty=('$qt'+rqty) where sl='$tsl'")or die(mysqli_error($conn));


$query21 = "INSERT INTO ".$DBprefix."billdtls_ret(srtnm,betno,cat,scat,prsl,imei,unit,kg,grm,pcs,srt,adp,prc,ttl,tamm,blno,old_blno,fst,tst,cgst_rt,sgst_rt,igst_rt,cgst_am,sgst_am,igst_am,net_am,refno,usl,uval,total,disp,disa,dt,mrp,rate,stk_rate) 
VALUES ('$srtnm','$betno','$cat','$scat','$prsl','$imei','$unit','$kg','$grm','$qt','$srt','$adp','$prc','$lttl','$tamm','$blno','$old_blno','$fst','$tst','$cgst_rt','$sgst_rt','$igst_rt','$cgst_am','$sgst_am','$igst_am','$net_am','$refno','$usl','$uval','$total','$disp','$disa','$dt','$mrp','$rate1','$stk_rate1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
	
$query21 = "INSERT INTO ".$DBprefix."stock (srtnm,betno,unit,pcd,bcd,dt,stin,nrtn,eby,dtm,stat,ret,refno,rbill,usl,uval,rate,stk_rate) VALUES 
('$srtnm','$betno','$unit','$prsl','$brncd','$dt','$stout','Sale-Return','$user_currently_loged','$dttm','1','$ret','$refno','$blno','$usl','$uval','$rate1','$stk_rate1')";
$result21 = mysqli_query($conn,$query21)or die (mysqli_error($conn)); 
}
}

$query1 = "SELECT sum(tamm) as gttl,sum(cgst_am) as cgst,sum(sgst_am) as sgst,sum(igst_am) as igst FROM ".$DBprefix."billdtls_ret where blno='$blno'";
$result1 = mysqli_query($conn,$query1)or die (mysqli_error($conn));
$count_row = mysqli_num_rows($result1);
while ($R1 = mysqli_fetch_array ($result1))
{
$gtamm=$R1['gttl'];
$gttl1=$R1['gttl'];
$cgst=$R1['cgst'];
$sgst=$R1['sgst'];
$igst=$R1['igst'];
}
$bilamm=$gtamm+$cgst+$sgst+$igst;
$rgttl=round($bilamm);
$roff=round($rgttl-$bilamm,4);
$gstam=$cgst+$sgst+$igst;
$gtamm=$gtamm+$roff;


$query211 = "INSERT INTO ".$DBprefix."billing_ret (grp,blno,refno,cid,amm,tamm,gstam,roff,paid,crdtp,cbnm,dt,edt,pdts,vat,vatamm,car,dis,bcd,eby,tpoint,fst,tst,gst,tmod,psup,vno,lpd,gstin,billno,invdt) 
select grp,'$blno',blno,cid,'$rgttl','$gtamm','$gstam','$roff',0,crdtp,cbnm,'$dt','$cdt','$dttm',vat,vatamm,car,dis,bcd,'$user_currently_loged',tpoint,fst,tst,gst,tmod,psup,vno,lpd,gstin,'$billno',dt from main_billing where blno = '$old_blno'";
$result211 = mysqli_query($conn,$query211)or die(mysqli_error($conn)); 

$query51="select * from ".$DBprefix."drcr order by sl desc limit 0,1";
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
$query21 = "INSERT INTO ".$DBprefix."drcr (vno,cbill,cid,dt,nrtn,dldgr,cldgr,amm,brncd,eby,edtm,pay,retn_stat) VALUES 
('$vcno','$blno','$custnm','$dt','Credit-Note','-2','4','$rgttl','$brncd','$user_currently_loged','$dttm','1','1')";
$result21 = mysqli_query($conn,$query21)or die(mysqli_error($conn));




$query1 = "SELECT sum(net_am) as gttl FROM ".$DBprefix."billdtls_ret where blno='$blno'";
$result1 = mysqli_query($conn,$query1)or die(mysqli_error($conn));
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['gttl'];
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
<font size="5"> <b><a href="sale_show.php" ><u>Back</u></a></b></font>
</td>
<td  align="left">
<font size="5"> <b><a href="bill_new_gst_ret.php?blno=<?=rawurlencode($blno);?>" target="_blank"><font color="red"><u>Print</u></font></a></b></font>
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
//window.history.go(-1);
</script>
<?
}
?>
