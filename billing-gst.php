<?
$reqlevel = 1;
include("membersonly.inc.php");
include "header.php";
?>
<html>
    
    
<head>
<style type="text/css"> 
th{
text-align:center;
color:#000;
border:1px solid #37880a;
}


a{
cursor:pointer;
}

select.sc {
	width: 280px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #666666;
	border: 1px solid #d8d8d8;
	padding-top: 2px;
	padding-right: 0px;
	padding-bottom: 2px;
	padding-left: 7px;
	padding: 7px;
}
select.sc1 {
	width: 150px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #666666;
	border: 1px solid #d8d8d8;
	padding-top: 2px;
	padding-right: 0px;
	padding-bottom: 2px;
	padding-left: 7px;
	padding: 4px;
}

#sfdtl
{
	border : none;
	border-radius: 3px;
	background-image: url(images/bg1.png);
	width : 195px;
	display : none;
	color: #fff;
	position : absolute;
	left: 6%;
	top: 46%;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	z-index:1000;
}
</style> 

   <link rel="stylesheet" href="cupertino/jquery.ui.all.css" type="text/css">
<style type="text/css">
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003;
   display: none;
   
}
</style>

<script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
   $(document).ready(function()
{

   var jQueryDatePicker2Opts =
   {
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: false,
      showAnim: 'show'
   };
      $("#dt").datepicker(jQueryDatePicker2Opts);
	$("#dt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
		  	   $("#idt").datepicker(jQueryDatePicker2Opts);
	  $("#idt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	   $("#dob").datepicker(jQueryDatePicker2Opts);
	  $("#dob").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	   $("#doa").datepicker(jQueryDatePicker2Opts);
	  $("#doa").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});	  
 
 h();
   });
   
  </script>
      <script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>
<link href="advancedtable.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
   
<script type="text/javascript">
function getb()
{
prnm=document.getElementById('prnm').value;
brncd=document.getElementById('brncd').value;
$("#gbet").load("getbe.php?pcd="+prnm+"&brncd="+brncd).fadeIn('fast');
}

</script>

<script type="text/javascript" src="jquery.ui.widget.min.js"></script>


<script type="text/javascript">
function gtid()
{
    sid=document.getElementById('custnm').value;
    if(sid=='Add')
	{
		
		$('#cnt1').load('adcstnm.php?typ=Debtors').fadeIn("fast");
		$('#compose-modal').modal('show');
	}
	else
	{
    $.get('cname.php?cid='+sid, function(data) {
        
                var str= data;
				var stra = str.split("@@") 
                var typ = stra.shift() 
				var fstr1 = stra.shift()
				var addr = stra.shift()  
                var mob = stra.shift() 
                var mail = stra.shift()
                var pp = stra.shift()
                var bal = stra.shift()
				var sl = stra.shift()
                var tst = stra.shift()
    $('#addr').val(addr);
    $('#mob').val(mob);
    $('#mail').val(mail);
    $('#pbal').val('0');
	$('#tst').val(tst);
	$('#tst').trigger('chosen:updated');
    
     
}); 

setTimeout(function(){ v(); }, 500);
	}
}
function gtt_unt()
 {
		prnm=document.getElementById('prnm').value;
	 $("#g_unt").load("get_unt_sale.php?prnm="+prnm).fadeIn('fast');
 }
function addspnm()
{
	var cnm=encodeURIComponent(document.getElementById('cnm3').value);
	var mob=encodeURIComponent(document.getElementById('mob3').value);
	var email=encodeURIComponent(document.getElementById('email3').value);
	var gstin=encodeURIComponent(document.getElementById('gstin').value);
	var pan=encodeURIComponent(document.getElementById('pan').value);
	var fst3=encodeURIComponent(document.getElementById('fst3').value);
	var gstdt=encodeURIComponent(document.getElementById('gstdt').value);
	var addr=encodeURIComponent(document.getElementById('addr3').value);

$('#adpnm').load("sentrysadd.php?cnm="+cnm+"&mob="+mob+"&email="+email+"&gstin="+gstin+"&pan="+pan+"&fst="+fst3+"&gstdt="+gstdt+"&addr="+addr).fadeIn('fast');
}


function h()
{
$("#asd").hide();
}
function pmod(a)
{


	if(a=="1")
	{ 
		document.getElementById('gtdl1').style.display='none';
		document.getElementById('crfno').value='';
		document.getElementById('idt').value='';
		document.getElementById('cbnm').value='';
    }
	else
	{
	  document.getElementById('gtdl1').style.display='table-row';
	  $("#xxx").load("getbank.php").fadeIn('fast');
	}
}

function v()
{
		var vatt=0;
		var tt=0;
		var tam=0;
		var pbal= parseFloat(document.getElementById('pbal').value);if(document.getElementById('pbal').value==""){pbal=0;}		
		var car= parseFloat(document.form1.car.value);if(document.form1.car.value==""){car=0;}
		var vat= parseFloat(document.form1.vat.value);if(document.form1.vat.value==""){vat=0;}
		var tam= parseFloat(document.form1.tamm1.value);if(document.form1.tamm1.value==""){tam=0;}
		var dis= parseFloat(document.form1.dis.value);if(document.form1.dis.value==""){dis=0;}		
		vatt=(tam*vat)/100;
		document.getElementById('vatamm').value=vatt;
		tt=((tam+vatt)-dis)+car;		
		document.getElementById('pay').value=Math.round(tt+pbal);	
}
function cal()
{
var pcs=parseFloat(document.getElementById('pcs').value);if(document.getElementById('pcs').value==''){pcs=0;}
var prc=parseFloat(document.getElementById('prc').value);if(document.getElementById('prc').value==''){prc=0;}
var total=parseFloat(document.getElementById('total').value);if(document.getElementById('total').value==''){total=0;}
var disp=parseFloat(document.getElementById('disp').value);if(document.getElementById('disp').value==''){disp=0;}
var disa=parseFloat(document.getElementById('disa').value);if(document.getElementById('disa').value==''){disa=0;}
var lttl=parseFloat(document.getElementById('lttl').value);if(document.getElementById('lttl').value==''){lttl=0;}
var cgst_rt=parseFloat(document.getElementById('cgst_rt').value);if(document.getElementById('cgst_rt').value==''){cgst_rt=0;}
var sgst_rt=parseFloat(document.getElementById('sgst_rt').value);if(document.getElementById('sgst_rt').value==''){sgst_rt=0;}
var igst_rt=parseFloat(document.getElementById('igst_rt').value);if(document.getElementById('igst_rt').value==''){igst_rt=0;}
var sgst=0;
var cgst=0;
var igst=0;
var lttl1=0;
var total1=0;
var disa1=0;
total1=(pcs*prc).round(2);
if(disp>0)
{
disa1=(total1*disp/100).round(2);
}
lttl=total1-disa1;
/*if(sgst_rt>0)
	{
	var sgst=((lttl*sgst_rt)/100).round(2);
	}
	if(cgst_rt>0)
	{
	var cgst=((lttl*cgst_rt)/100).round(2);
	}
	if(igst_rt>0)
	{
	var igst=((lttl*igst_rt)/100).round(2);
	}*/
	
		if(sgst_rt>0 && cgst_rt>0)
	{
		
	var Tsgst=((lttl*(sgst_rt+cgst_rt))/(100+sgst_rt+cgst_rt)).round(2);
	sgst=(Tsgst/2).round(2);
	cgst=(Tsgst/2).round(2);
	}
	if(cgst_rt>0)
	{
	/*var cgst=((lttl*cgst_rt)/(100+cgst_rt)).round(2);*/
	}
	if(igst_rt>0)
	{
	var igst=((lttl*igst_rt)/(100+igst_rt)).round(2);
	}
	
	
	
	
	
	document.getElementById('sgst_am').value=sgst.round(2);
	document.getElementById('cgst_am').value=cgst.round(2);
	document.getElementById('igst_am').value=igst.round(2);
	//net_amm=sgst+cgst+igst+lttl;
	document.getElementById('total').value=total1;	
	document.getElementById('disa').value=disa1;
	document.getElementById('lttl').value=lttl;
	document.getElementById('net_amm').value=lttl.round(2);	
	document.getElementById('brate').value=((lttl-(sgst+cgst+igst))/pcs).round(2);	
	

}

 function get_catg()  
 {
sec=document.getElementById('sec').value;
//$("#cat_div").load("get_catg.php?sec="+sec).fadeIn('fast');
}

 function get_cat()  
 {
catg=document.getElementById('catg').value;
/*scat=document.getElementById('scat').value;
$("#scat_div").load("get_cat_pur.php?cat="+cat).fadeIn('fast');*/
$("#prod_div").load("get_product_bill.php?cat="+catg).fadeIn('fast');
}
 function get_prod()
 {
$("#prod_div").load("get_product_bill.php").fadeIn('fast');	
}
function get_stock()
{
prnm=document.getElementById('prnm').value;
brncd=document.getElementById('brncd').value;
brncd=document.getElementById('brncd').value;
adp=document.getElementById('adp').value;
unit=document.getElementById('unit').value;

$("#gbet").load("getbe.php?pcd="+prnm+"&brncd="+brncd+"&unit="+unit).fadeIn('fast');
}


	function add1()
	{
		
		var betno=document.getElementById('betno').value;
		var catg=document.getElementById('catg').value;
		var prnm=document.getElementById('prnm').value;
		var unit=document.getElementById('unit').value;
		var pcs=document.getElementById('pcs').value;
		var prc=document.getElementById('prc').value;
		var total=document.getElementById('total').value;
		var disp=document.getElementById('disp').value;
		var disa=document.getElementById('disa').value;
		var lttl=document.getElementById('lttl').value;
		var cgst_rt=document.getElementById('cgst_rt').value;
		var sgst_rt=document.getElementById('sgst_rt').value;
		var igst_rt=document.getElementById('igst_rt').value;
		var cgst_am=document.getElementById('cgst_am').value;
		var sgst_am=document.getElementById('sgst_am').value;
		var igst_am=document.getElementById('igst_am').value;
		var brncd=document.getElementById('brncd').value;
		var refno=document.getElementById('refno').value;
		var sec=document.getElementById('sec').value;
		 fst=document.getElementById('fst').value;
		 tst=document.getElementById('tst').value;
		 usl=document.getElementById('usl').value;
		 net_amm=document.getElementById('net_amm').value;
	

	
		if(prnm=='')
		{
		alert("Product Can't be blank");
		}	
		else if(sec=='')
		{
		alert("Section Can't be blank");
		}		
		else if(catg=='')
		{
		alert("Category Can't be blank");
		}
		else if(refno=='')
		{
		alert("Purchase Invoice Can't be blank");
		}
		else if(lttl=='')
		{
		alert("Amount Can't be blank");	
		}
		else if(net_amm=='')
		{
		alert("Net Amount Can't be blank");	
		}
		else
		{
		
	//$('#wb_Text13').load('adtmppr.php?prnm='+prnm+'&pcs='+pcs+'&prc='+prc+'&lttl='+lttl+'&brncd='+brncd+'&fst='+fst+'&tst='+tst+'&cgst_rt='+cgst_rt+'&sgst_rt='+sgst_rt+'&igst_rt='+igst_rt+'&cgst_am='+cgst_am+'&sgst_am='+sgst_am+'&igst_am='+igst_am+'&refno='+encodeURIComponent(refno)+'&unit='+unit+'&usl='+usl).fadeIn('fast');
	$('#wb_Text13').load('adtmppr.php?catg='+catg+'&prnm='+prnm+'&unit='+unit+'&pcs='+pcs+'&prc='+prc+'&total='+total+'&disp='+disp+'&disa='+disa+'&lttl='+lttl+'&brncd='+brncd+'&fst='+fst+'&tst='+tst+'&cgst_rt='+cgst_rt+'&sgst_rt='+sgst_rt+'&igst_rt='+igst_rt+'&cgst_am='+cgst_am+'&sgst_am='+sgst_am+'&igst_am='+igst_am+'&refno='+encodeURIComponent(refno)+'&usl='+usl+'&betno='+betno+'&sec='+sec).fadeIn('fast');
		}
	
		
	}
	function reset()
	{
		document.getElementById('betno').value='';
		document.getElementById('unit').value='';
		document.getElementById('pcs').value='';
		document.getElementById('prc').value='';
		document.getElementById('total').value='';
		document.getElementById('disp').value='';
		document.getElementById('disa').value='';
		document.getElementById('lttl').value='';
		document.getElementById('cgst_rt').value='';
		document.getElementById('sgst_rt').value='';
		document.getElementById('igst_rt').value='';
		document.getElementById('cgst_am').value='';
		document.getElementById('sgst_am').value='';
		document.getElementById('igst_am').value='';
		document.getElementById('net_amm').value='';
		document.getElementById('usl').value='';
		document.getElementById('brate').value='';
		$('#refno option').each(function() {
        $(this).remove();
}); 
	}
	
function temp()
{
$('#wb_Text13').load("tmppr_gst.php").fadeIn('fast');
//$('#fst_div').load("fst_get1.php").fadeIn('fast');
$('#tst_div').load("tst_get1.php").fadeIn('fast');
$('#sec_div').load("div_sec.php").fadeIn('fast');
}
function deltpr(un,sl)
{
$('#wb_Text13').load("deltpr.php?sl="+sl+"&tsl="+un).fadeIn('fast');
}
function t()
	{

	$('#billamm').load('stotal-gst.php').fadeIn('fast');
	$('#gst_am').load('gst_am.php').fadeIn('fast');
	}
	function isNumber(evt) 
 {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if(iKeyCode < 48 || iKeyCode > 57)
		{
            return false;
        }
        return true;
 }
function get_gst()
{
var fst=document.getElementById('fst').value;	
var tst=document.getElementById('tst').value;
if(fst==tst)	
{
document.getElementById("sgst_am").readOnly = false;	
document.getElementById("cgst_am").readOnly = false;	
document.getElementById("igst_am").readOnly = true;
}
else
{
document.getElementById("sgst_am").readOnly = true;	
document.getElementById("cgst_am").readOnly = true;	
document.getElementById("igst_am").readOnly = false;
	
}
get_gstval();
} 
function get_gstval()
{
dt=document.getElementById('dt').value;	
prnm=document.getElementById('prnm').value;	
var fst=document.getElementById('fst').value;	
var tst=document.getElementById('tst').value;
$.get('get_gst.php?dt='+dt+'&prnm='+prnm, function(data) 
{
        
                var str= data
				var stra = str.split("@")
				var cgst = stra.shift()
				var sgst = stra.shift()  
                var igst = stra.shift() 
if(fst==tst)	
{
igst=0;	
}	
else
{
cgst=0;	
sgst=0;	
}	
    $('#cgst_rt').val(cgst);
    $('#sgst_rt').val(sgst);
	
    $('#igst_rt').val(igst);
     cal();
}); 

}
   Number.prototype.round = function(places) {
  return +(Math.round(this + "e+" + places)  + "e-" + places);
}
function get_prc()
{
dt=document.getElementById('dt').value;		
refno=encodeURIComponent(document.getElementById('refno').value);	
scat=document.getElementById('prnm').value;	
unit=document.getElementById('unit').value;	
$("#p").load("getp.php?scat="+scat+'&unit='+unit+'&dt='+dt).fadeIn('fast');	
}
</script>
</head>
<body onload="temp(),get_catg()">
 
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side strech">
                <!-- Content Header (Page header) -->
              

                <!-- Main content -->
                <section class="content">
                   

                   

                    <!-- Main row -->
                    
                        <!-- Left col -->
                       
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        
                           

                            <!-- Chat box -->
					
                     <!-- /.box (chat box) -->

                            <!-- TO DO List -->
                          
<form method="post" target="" name="form1" id="form1"  action="billings-gst.php">
<div class="box box-success" >
<b>Invoice Details : </b>
  <center>
 <table border="0" width="860px" class="table table-hover table-striped table-bordered">
  <tr>
  <td align="right" style="padding-top:15px;" width="15%"><b>Customer Name :</b>
  </td>
  <td colspan="" width="35%"> 

  <select id="custnm" name="custnm" tabindex="1"  class="form-control"  onchange="gtid()" >
	<option value="">---Select---</option>
	<option value="Add">---Add New Customer---</option>
	<?
		$query="select * from main_cust  WHERE sl>0 order by nm";
		$result=mysqli_query($conn,$query);
		while($rw=mysqli_fetch_array($result))
		{
			$typ1=$rw['typ'];
			$ctyp1="";
			$p=mysqli_query($conn,"select * from main_cus_typ where sl='$typ1'") or die (mysqli_error($conn));
			while($rw2=mysqli_fetch_array($p))
		{
			$ctyp1=$rw2['tp'];
		}
			
			
			
			
			?>
			<option value="<?=$rw['sl'];?>"><?=$rw['nm'];?> <?if($rw['cont']!=""){?>( <?=$rw['cont'];?> )<?}?> <?=$ctyp1;?></option>
			<?
		}
	?>
	</select>

  </td>
     <td align="right" style="padding-top:15px;" width="13%"><b>Contact No. :</b></td>

<td width="37%" >
<input type="text" id="mob" class="form-control" style="font-weight: bold;" readonly="true" name="mob" value=""  tabindex="2" size="35" placeholder="Customer Contact No.">

</td>
  </tr>
  <tr>
     <td align="right" style="padding-top:15px;"><b>Address : </b></td>

<td>
 <input type="tex"  class="form-control" style="font-weight: bold;" id="addr" readonly="true" name="addr" value="" tabindex="3" placeholder="Customer Address">
 
 </td>
   <td align="right" style="padding-top:15px;"><b>E-Mail :</b></td>

<td colspan="">
<input type="text" id="mail" class="form-control" style="font-weight: bold;" readonly="true" name="mail" value="" tabindex="4" size="35" placeholder="Customer E-Mail">
 
</td>

  </tr>

  <tr>
  <td align="right" style="padding-top:15px">
<b>Branch : </b>
</td>
<td align="left" >

<select name="brncd" class="form-control" tabindex="5" size="1" id="brncd" onchange="getb()"  >
<?
if($user_current_level<0)
{
$query="Select * from main_branch";
}
else
{
$query="Select * from main_branch where sl='$branch_code'";
}
   $result = mysqli_query($conn,$query);
while ($R = mysqli_fetch_array ($result))
{
$sl=$R['sl'];
$bnm=$R['bnm'];

?>
<option value="<? echo $sl;?>"><? echo $bnm;?></option>
<?
}
?>
</select>

</td>
    <td align="right" style="padding-top:15px;"> <b>Date : </b></td>
  <td>
  <input type="text" class="form-control"  id="dt"  name="dt" value="<? echo date('d-m-Y');?>" tabindex="6" size="35" placeholder="Enter Date">
  </td>
</tr>
  <tr>
    <td align="right" style="padding-top:15px;"> <b>From State : </b></td>
  <td>
  <div id="fst_div">
<select id="fst" data-placeholder="Choose Your Supplier" name="fst"  tabindex="7" class="form-control" onchange="get_gst()" >

	<?
	$sql="SELECT * FROM main_state WHERE sl='1'";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row=mysqli_fetch_array($result))
		{
	?>
    <option value="<?=$row['sl'];?>"<?if($row['sl']=='1'){echo 'selected';}?>><?=$row['sn'];?> - <?=$row['cd'];?></option>
<?}?>
</select>
</div>
  </td>
    <td align="right" style="padding-top:15px;"> <b>To State : </b></td>
  <td>
<div id="tst_div">
<select id="tst" data-placeholder="Choose Your Supplier" name="tst"  tabindex="8" class="form-control" onchange="get_gst()"  >

	<?
	$sql="SELECT * FROM main_state WHERE sl>0 ORDER BY sn";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while($row=mysqli_fetch_array($result))
		{
	?>
    <option value="<?=$row['sl'];?>"<?if($row['sl']=='1'){echo 'selected';}?>><?=$row['sn'];?> - <?=$row['cd'];?></option>
<?}?>
</select>
</div>
  </td>
</tr>
  <tr>
     <td align="right" style="padding-top:15px;"><b>Transportation Mode : </b></td>

<td>
 <input type="tex"  class="form-control" style="font-weight: bold;" id="tmod" name="tmod" value="" tabindex="9" >
 
 </td>
   <td align="right" style="padding-top:15px;"><b>Place Of Supply :</b></td>

<td colspan="">
<input type="text" id="psup" class="form-control" style="font-weight: bold;" name="psup" value="" tabindex="10" size="35" >
 
</td>

  </tr>
    <tr>
     <td align="right" style="padding-top:15px;"><b>Vehicle Number : </b></td>

<td>
 <input type="tex"  class="form-control" style="font-weight: bold;" id="vno" name="vno" value="" tabindex="11" >
 
 </td>
   <td align="right" style="padding-top:15px;"><b>Last Payment Days</b></td>

<td >
 <input type="tex"  class="form-control" style="font-weight: bold;" id="lpd" name="lpd" value="" tabindex="12" >

</td>

  </tr>
    <tr hidden>
     <td align="right" style="padding-top:15px;"><b>Section : </b></td>

<td>
<!--<select id="sec" name="sec" class="form-control" onchange="get_catg()">--->
<select id="sec" name="sec" class="form-control" >
<?
$appfor=mysqli_query($conn,"SELECT * from main_sec where sl>0 order by sl") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($appfor))
{

?>
<option value="<?=$row['sl'];?>"><?=$row['nm'];?> (<?=$row['als'];?>)</option>
<?
}
?>
</select>
</td>
 <td></td>
 <td></td>

  </tr>
</table>
</div>

 <div class="box box-success" >
 <b>Product Details :</b>
	  <table width="800px" class="table table-hover table-striped table-bordered">
	   <tr>
	   <td  colspan="7">
<table border="0" width="100%" class="advancedtable">
<tr class="odd">
<td  align="left" width="7%"><b>Category</b></td>
<td  align="left" width="7%"><b>Product</b></td>

<td  align="center" width="5%"><b>Unit</b></td>
<td align="center" width="5%"><b>Stock In Hand</b></td>

<td  align="left" width="4%" hidden><b>Sl.No.</b></td>
<td align="center" width="4%" ><b>Quantity</b></td>

<td align="center" width="5%" ><b>Sale Rate</b></td>
<td align="center" width="5%"><b>Total</b></td>

<td align="center" width="4%"><b>Dis.%</b></td>
<td align="center" width="5%"><b>Dis. Am.</b></td>

<td align="center" width="6%"><b>After Dis. Am</b></td>

<td width="4%" align="center"><B>C-GST%</B></td>
<td width="5%" align="center"><B>C-GST Am.</B></td>

<td width="4%" align="center"><B>S-GST%</B></td>
<td width="5%" align="center"><B>S-GST Am.</B></td>

<td width="4%" align="center"><B>I-GST%</B></td>
<td width="5%" align="center"><B>I-GST Am.</B></td>

<td align="center" width="6%" ><b>Net Amount</b></td>
<td align="center" width="6%" ><b>Basic Rate</b></td>
<td align="center" width="4%"><b>Action</b></td>
</tr>
<tr>

<input type="hidden" class="sc" autocomplete="off" id="kg" name="kg" readonly style="text-align:center" onblur="cal()"  value="" tabindex="11" size="15"  >
<input type="hidden" id="grm" class="sc" autocomplete="off"  name="grm" readonly value="" style="text-align:center" onblur="cal()" maxlength="3" tabindex="12" size="15" >

<td>
	<div id="cat_div">
<select id="catg" name="catg" class="form-control" onchange="get_cat()" tabindex="13">
<option value="">---Select---</option>
<?
$data15 = mysqli_query($conn,"Select * from main_catg order by cnm");
while ($row15 = mysqli_fetch_array($data15))
	{
	$sl=$row15['sl'];
	$cnm=$row15['cnm'];
?>
<Option value="<?=$sl;?>"><?=$cnm;?></option>
<?}?>
</select>
</div>
</td>
<td>
<div id="prod_div">
<select id="prnm" name="prnm" class="form-control"  tabindex="14" onchange="gtt_unt();get_gstval()">
<option value="">---Select---</option>
<?
$data1 = mysqli_query($conn,"Select * from main_product order by pnm");
while ($row1 = mysqli_fetch_array($data1))
	{
	$sl=$row1['sl'];
	$pnm=$row1['pnm'];
?>
<Option value="<?=$sl;?>"><?=$pnm;?></option>
<?}?>
</select>
</div>
</td>
<td>
<div id="g_unt">
<select id="unit" name="unit" class="sc1" style="width:100%"  tabindex="15" onchange="get_stock()">
<option value="">---Select---</option>
</select>
</div>
</td>
<td>
<div id="gbet">
<input type="text" class="sc" autocomplete="off" id="sih" readonly name="sih" style="text-align:center"  value="" tabindex="16" size="15"  >
</div>
</td>
<td hidden>
<input type="text" id="betno" class="sc" autocomplete="off"  name="betno" value="" onkeypress=" return isNumber(event)">
</td>

<td>
<input type="text" id="pcs" class="sc" autocomplete="off"  name="pcs" value=""  style="text-align:center" onblur="cal()" tabindex="17"  >
</td>
<input type="hidden" class="sc" id="adp"  name="adp" value="0"  style="text-align:center" onblur="cal()" tabindex="170">

<td> 
<div id="p">
<input type="text" class="sc" id="prc"  name="prc" value=""  style="text-align:right" onblur="cal()" tabindex="18">
</div>
</td>
<td> 
<input type="text" class="sc" id="total"  name="total" value="" style="text-align:right" tabindex="19">
</td>
<td> 
<input type="text" class="sc" id="disp"  name="disp" value="" style="text-align:right" onblur="cal()" tabindex="20">
</td>
<td> 
<input type="text" class="sc" id="disa"  name="disa" value="" style="text-align:right" tabindex="21">
</td>
<td> 
<input type="text" class="sc" id="lttl"  name="lttl" value="" readonly="true"  style="text-align:right" tabindex="22">
</td>
<td align="center">
<input type="text" name="cgst_rt" id="cgst_rt" class="sc" tabindex="23" readOnly class="sc" onfocus="this.select();"  style="text-align:center">
</td>
<td  align="center">
<input type="text" name="cgst_am" id="cgst_am" class="sc" tabindex="24" class="sc" onfocus="this.select();"  style="text-align:right">
</td>
<td  align="center">
<input type="text" name="sgst_rt" id="sgst_rt" class="sc" tabindex="25" readOnly class="sc" onfocus="this.select();"  style="text-align:center">
</td>
<td  align="center">
<input type="text" name="sgst_am" id="sgst_am" class="sc" tabindex="26" class="sc" onfocus="this.select();"  style="text-align:right">
</td>
<td  align="center">
<input type="text" name="igst_rt" id="igst_rt" class="sc" tabindex="27" readOnly class="sc" onfocus="this.select();"  style="text-align:center">
</td>
<td align="center">
<input type="text" name="igst_am" id="igst_am" class="sc" readOnly tabindex="28" class="sc" onfocus="this.select();"  style="text-align:right">
</td>
<td>
<input type="text" class="sc" id="net_amm" name="net_amm" value="" tabindex="29" readonly  autocomplete="off"  style="text-align:right" size="15"  >
</td>
<td>
<input type="text" class="sc" id="brate" name="brate" value="" tabindex="29" readonly  autocomplete="off"  style="text-align:right" size="15"  >
</td>
<td>
<input type="button" class="btn btn-primary" id="Button1" name="" value="Add"  onclick="add1()" tabindex="30" style="width:100%;padding:2px" >
</td>
</tr>
</table>
   </td>
	   </tr>
	       <tr height="180px">
	   <td colspan="7">
	<div id="wb_Text13" >

		</div>
	  	</td>
	   </tr>


<tr >


<input type="hidden" name="dis" id="dis"  readOnly onblur="v()" value=""  tabindex="31" class="form-control"  style="text-align:right">
<input type="hidden" name="car" id="car"  readOnly onblur="v()" value=""  tabindex="32" class="form-control"  style="text-align:right">
<input type="hidden" name="vat" id="vat" onblur="v()" readOnly class="form-control"  tabindex="33" style="text-align:right" >
<input type="hidden" name="vatamm" id="vatamm" class="form-control"  tabindex="34" style="background-color:#f3f4f5;text-align:right" readonly="true" >
<td align="left" ><b>Bill Amount :</b><br>
<font >
<b>
<div id="billamm">
<input type="text" name="tamm" id="tamm" class="form-control"  tabindex="35" style="background-color:#f3f4f5;font-size:13pt;color:blue" readonly="true"> 
</div>
</b>
</font>
</td>
<td align="left" ><b>Tax Amount : GST :</b><br>
<div id="gst_am">
<input type="text" name="gst" id="gst"  readOnly  value=""  tabindex="36" class="form-control"  style="text-align:right">
</div>
</td>
<td align="left" hidden><b>Previou Balance :</b><br>
<font >
<b>

<input type="text" name="pbal" id="pbal" class="form-control"  tabindex="37" style="background-color:#f3f4f5;font-size:13pt;color:blue" readonly="true"> 

</b>
</font>
</td>
<td align="left" ><b>Pay Amount :</b><br>
<font >
<b>

<input type="text" name="pay" id="pay" class="form-control"  tabindex="38" style="background-color:#f3f4f5;font-size:13pt;color:blue" readonly="true"> 

</b>
</font>
</td>
</tr>

	   </table>
</div>
 <div class="box box-success" >

<b>Payment Details :</b>
  <table border="0" width="860px" class="table table-hover table-striped table-bordered">
<tr>

    <td align="left" >
	<font color="red">*</font><b>Cash Or Bank Ac. :</b>
	 <select  name="dldgr" id="dldgr"   class="form-control"  tabindex="39">
							<?php 
							$get = mysqli_query($conn,"SELECT * FROM main_ledg where gcd='1' or gcd='2'") or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($get))
							{
							?>
								<option value="<?=$row['sl']?>"<?=$row['sl'] == '3' ? 'selected' : '' ?>><?=$row['nm']?></option>
							<?php 
							} 
							?>
						</select>
	</td>

<td>
 <b>Payment Mode: </b>
<select name="mdt" size="1" id="mdt" tabindex="40" onchange="pmod(this.value)" class="form-control">

<?
$data2 = mysqli_query($conn,"select * from ac_paymtd ");

		while ($row2 = mysqli_fetch_array($data2))
	{
	$mtd = $row2['mtd'];
	$msl = $row2['sl'];
	echo "<option value='".$msl."'>".$mtd."</option>";
	}
	?>
</select>
 </td>

 <td>
 <b>Payment Amount:</b> 
 <input type="text" class="form-control" id="pamm" name="pamm" value=""  tabindex="41" placeholder ="Enter Payment Amount" style="text-align:right" size="25">
 </td>

 

</tr>
<tr id="gtdl1" style="display:none">
<td>
<b>Reference No: </b>
<input type="text" class="form-control" id="crfno"  name="crfno"  tabindex="42" value="" >
</td>
<td>
<b>Date: </b>
<input type="text" class="form-control" id="idt" name="idt" value=""  tabindex="43" readonly >
</td>

<td>
<b>Issued By:</b>
<input type="text" class="form-control" id="cbnm"  name="cbnm" value=""  tabindex="44" >
</td>

</tr>

 <tr class="odd" >
<td colspan="6" align="right">

<input type="submit" class="btn btn-success btn-sm" id="Button2" onclick="return confirm('Are Yoy Sure To Submit !'); " name="bt1" tabindex="45" value="Submit"  >
</td>
</tr>
</table>

<input type="hidden" id="prid"  name="prid" value="<? echo $cid;?>">
<input type="hidden" id="stk" >
<input type="hidden" id="fls" >
</form>






</div>
                                <div class="box-footer clearfix no-border">
                                
                                </div>
<div id="adpnm"></div>
	<!-- Light Box -->
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true"  >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body" id="cnt1">
			</div>
        </div>
    </div>
</div>
<!-- End -->		
								
								
               
							
							
							<!-- /.box -->

                        <!-- right col -->
                   <!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
   

        <!-- add new calendar event modal -->

     <link rel="stylesheet" href="chosen.css">
 
<script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="prism.js" type="text/javascript" charset="utf-8"></script>

<script>

 $('#prnm').chosen({
no_results_text: "Oops, nothing found!",
});	
$('#cat').chosen({
no_results_text: "Oops, nothing found!",
});
$('#catg').chosen({
no_results_text: "Oops, nothing found!",
});		
$('#scat').chosen({
no_results_text: "Oops, nothing found!",
});	

     $('#custnm').chosen({
  no_results_text: "Oops, nothing found!",

  });
       $('#fst').chosen({
  no_results_text: "Oops, nothing found!",
   }); 
      $('#tst').chosen({
  no_results_text: "Oops, nothing found!",
   });
</script>

    </body>

</html>