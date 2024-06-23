<?php
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?
            include "left_bar.php";
            ?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="advancedtable.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#sfdtl
{
	border : none;
	border-radius: 15px;
	background-image: url(images/bg1.png);
	width : 850px;
	
	display : none;
	color: #fff;
	position : absolute;
	left : 350px;
	top : 250px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
}
#underlay{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:#000;
    -moz-opacity:0.5;
    opacity:.50;
    filter:alpha(opacity=50);
}
</style>

<script>
 function mnu()
 {
 $('#pmnu').load('mnu.php').fadeIn("slow");
  $('#tmnu').load('mnu2.php').fadeIn("slow");
 }
 </script>
<style type="text/css"> 
a
{
   color: black;
   outline: none;
   text-decoration: none;
}

</style>
<link rel="stylesheet" href="cupertino/jquery.ui.all.css" type="text/css">
<style type="text/css"> 

#jQueryDatePicker1
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003 !important;
   display: none;
}

</style>


<script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>
<link rel="stylesheet" href="wb.validation.css" type="text/css">
<script type="text/javascript" src="wb.validation.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function()
{
   var jQueryDatePicker1Opts =
   {
      dateFormat: 'dd-M-yy',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: false,
      showAnim: 'show'
   };
   $("#dt").datepicker(jQueryDatePicker1Opts);
});
function gtcrvl1()
	{	
		proj = document.getElementById('proj').value;
		sl = document.getElementById('dldgr').value;
		var brncd= document.getElementById('brncd').value;
		
		$('#drbl').load('jrnl_form_gtdrvl.php?sl='+sl+'&pno='+proj+'&brncd='+brncd).fadeIn('fast');
		//$('#crbl').load('sale_ser_totalbal.php?pno='+proj).fadeIn('fast');
		
			}
			
			function gtcrvlfi()
	{	
		proj = document.getElementById('proj').value;
		sl = document.getElementById('cldgr').value;
		var brncd= document.getElementById('brncd').value;
		$('#crbl').load('incm_form_gtcrvlfi.php?sl='+sl+'&pno='+proj+'&brncd='+brncd).fadeIn('fast');
		sh();
	}
	
	function sh()
			{
				var brncd= document.getElementById('brncd').value;
				proj = document.getElementById('proj').value;
				$('#show').load('income_list.php?pno1='+proj+'&brncd='+brncd).fadeIn('fast');
				
			}
			
	function pagnt(pnog){
		var brncd= document.getElementById('brncd').value;
		proj = document.getElementById('proj').value;
		var ps=document.getElementById('ps').value;
      
    $('#show').load("income_list.php?ps="+ps+"&pnog="+pnog+"&pno1="+proj+'&brncd='+brncd).fadeIn('fast');
	$('#pgn').val=pnog;
    }
	function pagnt1(pnog){
	pnog=document.getElementById('pgn').value;
	pagnt(pnog);
	

	}
		function chk_dt(cdt)
{
    ddt=document.getElementById('dt').value;
    
    $.get('set_date_limit_chk.php?dt='+ddt, function(data) {
		if(data=='0')
		{
			
		document.getElementById('dt').value=cdt;	
		alert('You Have No Permission For Entry Date.');
		}
  
}); 


}
	
 function sfdtl3income(sl)
{
	$('#cnt').load('income_det.php?sl='+sl).fadeIn("fast");
	$('#myModal').modal('show');
}
</script>


<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<?
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
?>
<body onload="sh()">
 <aside class="right-side">
  <section class="content-header">
                    <h1 align="center">
                 Income
                        <small>Entry</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Income</li>
                    </ol>
                </section>
				   <section class="content">
<form name="Form1" method="post" action="jrnl_forms.php" id="Form1"  enctype="multipart/form-data">
<input type="hidden" name="flnm" id="flnm" value="income.php" >

<div class="box box-success" >
<table class="table table-hover table-striped table-bordered">

<tr >
<td align="right" width="15%" ><font color="red">*</font>Date :</td>
<td align="left" width="35%" >
<input type="text" name="dt" id="dt" class="form-control" value="<? echo date('d-M-Y'); ?>" onchange="chk_dt('<?=date('d-M-Y')?>')">
</td>
<td align="right" style="width:15%" >JF No. :</td>
<td align="left" style="width:35%" >
<input type="text" name="vno" id="vno" class="form-control" value="<?echo $vno;?>" readonly style="background :transparent; color : red;">
</td>   
</tr>
<tr>
<td align="right"><font color="red">*</font>Branch:</td>
<td align="left">
<select name="brncd" class="form-control" size="1" id="brncd" onchange="gtcrvl1();gtcrvlfi()" >
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
$slb=$R['sl'];
$bnm=$R['bnm'];

?>
<option value="<? echo $slb;?>"><? echo $bnm;?></option>
<?
}
?>
</select>
</td>
<td align="right"><font color="red">*</font>Project :</td>
<td align="left">
<select name="proj" id="proj" class="form-control" onchange="gtcrvl1();gtcrvlfi()">
<option value="0"> NA </option>
<?php 
$get = mysqli_query($conn,"SELECT * FROM main_project") or die(mysqli_error($conn));
while($row = mysqli_fetch_array($get))
{
?>
<option value="<?=$row['sl']?>"><?=$row['nm']?></option>
<?php 
} 
?>
</select>
</td>
</tr>
  
   <tr >
    <td align="right" ><font color="red">*</font>Cash Or Bank Ac. :</td>
    <td align="left" >
	 <select  name="dldgr" id="dldgr" class="form-control" onchange="gtcrvl1()">
							<option value="">-- Select --</option>
							<?php 
							$get = mysqli_query($conn,"SELECT * FROM main_ledg where gcd='1' or gcd='2'") or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($get))
							{
							?>
								<option value="<?=$row['sl']?>" <?=$row['sl'] == $rowpages['pcd'] ? 'selected' : '' ?>><?=$row['nm']?></option>
							<?php 
							} 
							?>
						</select>
	</td>
	<td align="right" ><font color="red">*</font>Income Head :</td>
    <td align="left" >
      <select  name="cldgr" id="cldgr" class="form-control" onchange="gtcrvlfi()">
							<option value="">-- Select --</option>
							<?php 
							$get = mysqli_query($conn,"SELECT * FROM main_ledg where gcd='3' or gcd='4'") or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($get))
							{
							?>
								<option value="<?=$row['sl']?>" <?=$row['sl'] == $rowpages['pcd'] ? 'selected' : '' ?>><?=$row['nm']?></option>
							<?php 
							} 
							?>
						</select>
	</td>   
  </tr>
  
  <tr >
    
	<td align="right" > Balance :</td>
    <td align="left" >
     <div id="drbl">
	 <img src="images\rp.png" height="15px"><input type="text" name="dbal" id="dbal" value="0.00" style="background :transparent; color : red;" readonly>
	</div>
	</td>
<td align="right" > Balance :</td>
    <td align="left" >
	<div id="crbl">
	 <img src="images\rp.png" height="15px"><input type="text" name="cbal" id="cbal" value="0.00" style="background :transparent; color : red;" readonly>
	</div>
	</td>	
  </tr>
  
  <tr >
    <td align="right" ><font color="red">*</font>Payment Mode :</td>
    <td align="left" >
	 <select  name="paymtd" id="paymtd" class="form-control">
							<option value="">-- Select --</option>
							<?php 
							$get = mysqli_query($conn,"SELECT * FROM ac_paymtd") or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($get))
							{
							?>
								<option value="<?=$row['sl']?>" <?=$row['sl'] == $rowpages['pcd'] ? 'selected' : '' ?>><?=$row['mtd']?></option>
							<?php 
							} 
							?>
						</select>
	</td>
	<td align="right" >Ref. No. :</td>
    <td align="left" >
       <input type="text" name="refno" id="refno" class="form-control">
	</td>   
  </tr>
  <tr >
    <td align="right" ><font color="red">*</font>Ammount :</td>
    <td align="left" >
	 <img src="images\rp.png" height="15px"><input type="text" name="amm" id="amm" >
	</td>
	<td align="right" ><font color="red">*</font>IT/Non-IT :</td>
    <td align="left" >
      <select  name="it" id="it" class="form-control">
							<option value="">-- Select --</option>
							<option value="1">IT</option>
							<option selected value="0">Non-IT</option>
						</select>
	</td>   
  </tr>
  
<tr >
<td align="right" ><font color="red">*</font>Narration :</td>
<td align="left" >
<input type="text" name="nrtn" id="nrtn" class="form-control">
</td>

<td align="right" >Upload File :</td>
<td >
<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-info" onchange="readURL(this);" >
</td>
</tr>

<tr >
<td colspan="4" align="right"><input type="submit" value="Submit" class="btn btn-success"></td>
</tr>
</table>
</div>

<div class="box box-success" >
<div id="show">

</div>
</div>
<!-- Modal Box Start-->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times"></i>
				</button>
				<h4>Income Update</h4>
			</div>
			<div class="page" id="cnt" style="overflow: auto;"></div>
		</div>
	</div>
</div>
<!-- Modal Box End -->
</div>
</html>