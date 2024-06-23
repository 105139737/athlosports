<?
$reqlevel = 0;
include("membersonly.inc.php");
$fdt=$_REQUEST['fdt'];
$tdt=$_REQUEST['tdt'];
$tdt=$_REQUEST['tdt'];
$fdt=date('Y-m-d', strtotime($fdt));
$tdt=date('Y-m-d', strtotime($tdt));
$snm=$_REQUEST['snm'];
if($snm!=""){$snm1=" and cid='$snm'";}else{$snm1="";}



if($fdt!="" and $tdt!=""){$todt=" and rdt between '$fdt' and '$tdt'";}else{$todt="";}
if($fdt!="" and $tdt!=""){$todts=" and dt between '$fdt' and '$tdt'";}else{$todts="";}

$filename = "GSTR_1_B2B_Report.csv";
$fp = fopen('php://output', 'w');


$header = array('GSTIN/UIN of Recipient','Receiver Name','Invoice Number','Invoice date','Invoice Value','Place Of Supply','Reverse Charge','Invoice Type','E-Commerce GSTIN','Rate','Applicable % of Tax Rate','Taxable Value','Cess Amount');	
	

/*$header[0]='GSTIN/UIN of Recipient';
$header[1]='Invoice Number';
$header[2]='Invoice date';
$header[3]='Invoice Value';
$header[4]='Place Of Supply';
$header[5]='Reverse Charge';
$header[6]='Invoice Type';
$header[7]='E-Commerce GSTIN';
$header[8]='Rate'; 
$header[9]='Taxable Value'; 
$header[10]='Cess Amount';
*/
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
$header = str_replace('"', '', $header);

fputs($fp, implode($header, ',')."\n");
$num_column = count($header);


$sln=0;
		$tamm1=0;


$data12= mysqli_query($conn,"select * from  main_billing where sl>0 and gstin!='' and cstat='0'".$todts.$snm1."order by dt")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data12))
{

$blno=$row1['blno'];
$invno=$row1['blno'];
$dt=$row1['dt'];
$gstin=$row1['gstin'];
$cid=$row1['cid'];
$amm=$row1['amm'];
$tst=$row1['tst'];
$invto=$row1['invto'];
$dt=date('d-M-Y', strtotime($dt));
$sln++;

$query4="Select sum(net_am) as tamm from ".$DBprefix."billdtls where blno='$blno'";
$result4 = mysqli_query($conn,$query4);
  while ($R4 = mysqli_fetch_array ($result4))
{
$tamm=$R4['tamm'];
}
$tamm1=$tamm1+$tamm;

if($invto!='')
{
$cid=$invto;	
}
else
{
$cid=$cid;	
}
$datad= mysqli_query($conn,"select * from main_cust where sl='$cid'")or die(mysqli_error($conn));
while ($rowd = mysqli_fetch_array($datad))
{
$nmp=$rowd['nmp'];
$nm=$rowd['nm'];
$mob1=$rowd['cont'];
}
if($nmp!="")
{
$nm=$nmp;	
}


$gbit=mysqli_query($conn,"select * from main_state where sl='$tst'") or die (mysqli_error($conn));
while($GBi=mysqli_fetch_array($gbit))
{
$statnm=$GBi['sn'];
$statcd=$GBi['cd'];
}

	$amm=0;
	$net_am=0;
	$cgst_rt=0;   
	$cgst_am=0;   
	$sgst_rt=0;   
	$sgst_am=0; 
	$log=0;
	$ttto=0;

	$data=mysqli_query($conn,"select *,sum(net_am) as net_am,sum(tamm) as amm,sum(cgst_am) as cgst_am,sum(sgst_am) as sgst_am from  main_billdtls where  blno='$invno' group by sgst_rt,igst_rt")or die(mysqli_error($conn));
	while($row=mysqli_fetch_array($data))
	{
		$amm=$row['amm'];
		$net_am=$row['net_am'];
		$cgst_rt=$row['cgst_rt'];   
		$tcgst=$row['cgst_am'];   
		$sgst_rt=$row['sgst_rt'];   
		$igst_rt=$row['igst_rt'];   
		$tsgst=$row['sgst_am'];   
			
		$tiamm+=$net_am;
		$tttamm+=$amm;
		$ttcgst+=$tcgst;
		$ttsgst+=$tsgst;
		$ttto+=$net_am;
		
		
		

$data1[0]=$gstin;
$data1[1]=$nm;
$data1[2]=$blno;
$data1[3]=$dt;
$data1[4]=round($tamm,2);
$data1[5]=$statcd.'-'.$statnm;
$data1[6]='N';
$data1[7]='Regular';
$data1[8]='';
$data1[9]=$cgst_rt+$sgst_rt+$igst_rt;
$data1[10]='';
$data1[11]=round($amm,2);
$data1[12]='';

fputcsv($fp, $data1);


}}
	
exit;
?>
