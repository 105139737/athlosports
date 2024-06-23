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
<link rel="shortcut icon" href="favicon.ico"/>
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
	var brncd= document.getElementById('brncd').value;
		proj = document.getElementById('proj').value;
		sl = document.getElementById('cldgr').value;
		cid = document.getElementById('cid').value;
		
		$('#drbl').load('jrnl_form_gtdrvl.php?sl='+sl+'&cid='+cid+'&brncd='+brncd).fadeIn('fast');
		//$('#crbl').load('sale_ser_totalbal.php?pno='+proj).fadeIn('fast');
		
			}
			
			function gtcrvlfi()
	{	
		proj = document.getElementById('proj').value;
		sl = document.getElementById('dldgr').value;
		var brncd= document.getElementById('brncd').value;
		
		$('#crbl').load('jrnl_form_gtdrvl.php?sl='+sl+'&pno='+proj+'&brncd='+brncd).fadeIn('fast');
		sh();
	}
	
	function sh()
			{
				proj = document.getElementById('proj').value;
				var brncd= document.getElementById('brncd').value;
				$('#show').load('recv_list.php?pno1='+proj+'&brncd='+brncd).fadeIn('fast');
				
			}
			
	function pagnt(pnog){
		proj = document.getElementById('proj').value;
		var ps=document.getElementById('ps').value;
      	var brncd= document.getElementById('brncd').value;
    $('#show').load("recv_list.php?ps="+ps+"&pnog="+pnog+"&pno1="+proj+'&brncd='+brncd).fadeIn('fast');
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

 function sfdtlrecv(sl)
{
	$('#cnt').load('recv_det.php?sl='+sl).fadeIn("fast");
	$('#myModal').modal('show');
}
</script>
 <link rel="stylesheet" href="chosen.css">
 
<script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="prism.js" type="text/javascript" charset="utf-8"></script>


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
                 Received 
                        <small>Register</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Received Register</li>
                    </ol>
                </section>
				   <section class="content">
<form name="Form1" method="post" action="jrnl_forms.php" id="Form1" enctype="multipart/form-data">
<input type="hidden" name="flnm" id="flnm" value="recv_reg.php" >
<input type="hidden" name="proj" id="proj" value="NA" readonly>
<input type="hidden" name="it" id="it" value="NA" readonly >

 <div class="box box-success" >
          <table  width="860px" class="table table-hover table-striped table-bordered">

          <tbody>
  <tr class="">
    <td align="right" width="20%" ><font color="red">*</font><b>Date :</b></td>
    <td align="left" width="30%" >
	<input type="text" name="dt" id="dt" class="form-control" value="<? echo date('d-M-Y'); ?>" onchange="chk_dt('<?=date('d-M-Y')?>')">
	</td>
	<td align="right" width="20%" ><b>JF No. :</b></td>
    <td align="left" width="30%" >
      <input type="text" name="vno" class="form-control" id="vno" value="<?echo $vno;?>" readonly style="background :transparent; color : red;">
	</td>   
  </tr>
  <tr class="">
      <td align="right" ><font color="red">*</font><b>Branch :</b></td>
    <td align="left" >

						
						    <select name="brncd" class="form-control" size="1" id="brncd"  onchange="gtcrvl1();gtcrvlfi()" >
<?
if($user_current_level<0)
{

}
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

  


  </tr>
  
   <tr class="">
    <td align="right" ><font color="red">*</font><b>Customer :</b></td>
    <td align="left" >
	<input type="hidden" value="4" id="cldgr" name="cldgr"/> 
		<select id="cid"  name="cid"   tabindex="2" class="form-control" onchange="gtcrvl1()" >
		<option value="">---Select---</option>

<?
$query="Select * from  main_cust order by nm";
   $result = mysqli_query($conn,$query);
while ($R = mysqli_fetch_array ($result))
{
$sid=$R['sl'];
$spn=$R['nm'];
$cont=$R['cont'];
?>
<option value="<? echo $sid;?>"><? echo $spn;?> - <? echo $cont;?></option>
<?
}
?>
			</select>
	</td>
	<td align="right" ><font color="red">*</font><b>Cash Or Bank Ac. :</b></td>
    <td align="left" >
      <select  name="dldgr" id="dldgr" class="form-control"  onchange="gtcrvlfi()">
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
  </tr>
  
  <tr class="">
    
	<td align="right" > <b>Balance :</b></td>
    <td align="left" >
     <div id="drbl">
	 <img src="images\rp.png" height="15px"><input type="text" name="dbal" id="dbal"  value="0.00" style="background :transparent; color : red;" readonly>
	</div>
	</td>
<td align="right" ><b> Balance :</b></td>
    <td align="left" >
	<div id="crbl">
	 <img src="images\rp.png" height="15px">
	 <input type="text" name="cbal" id="cbal"  value="0.00" style="background :transparent; color : red;" readonly>
	</div>
	</td>	
  </tr>
  
  <tr class="">
    <td align="right" ><font color="red">*</font><b>Payment Mode :</b></td>
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
	<td align="right" ><b>Ref. No. :</b></td>
    <td align="left" >
       <input type="text" name="refno" class="form-control" id="refno" >
	</td>   
  </tr>
  <tr class="">
    <td align="right" ><font color="red">*</font><b>Amount :</b></td>
    <td align="left" >
	 <img src="images\rp.png" height="15px">
	 <input class="sc" type="text" name="amm" id="amm" style="width:90%" >
	</td>
		   <td align="right" style="padding-top:15px;" ><b>Discount :</b></td>
    <td align="left" >
<input type="text" name="dis" id="dis" class="form-control">
	</td>   
  </tr>
  
  <tr class="">
    <td align="right" ><font color="red">*</font><b>Narration :</b></td>
    <td align="left" >
	<input type="text" name="nrtn" id="nrtn" class="form-control">
	</td>


<td align="right" ><b>Upload File :</b></td>
<td >
<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-info" onchange="readURL(this);" >
</td>
	 

  </tr>
  
  
  
  
  <tr class="odd">
    <td colspan="4" align="right">
	<input type="submit" value="Submit" class="btn bt btn-success">
	</td>
  </tr>

</table>
</div>
 <div class="box box-success" >
<div id="show">

</div>
</div>


											         <!-- COMPOSE MESSAGE MODAL -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-bars"></i>Member List </h4>
                    </div>
                 
                        <div class="modal-body">
					<div class="row">
	
	<div class="col-md-12">


<div id="list">


</div></div></div></div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!-- Modal Box Start-->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times"></i>
				</button>
				<h4>Received Register Update</h4>
			</div>
			<div class="page" id="cnt" style="overflow: auto;"></div>
		</div>
	</div>
</div>
<!-- Modal Box End -->
</form>
 </section><!-- /.content -->
 </aside><!-- /.right-side -->

</body>


<script type="text/javascript">
  $('#cid').chosen({
  no_results_text: "Oops, nothing found!",
  
  });
</script>

</div>
</html>