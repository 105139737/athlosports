<?php
$reqlevel = 1;
include("membersonly.inc.php");
include "header.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <div class="wrapper row-offcanvas row-offcanvas-left">
            <?
            include "left_bar.php";
            ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cupon Entry</title>
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
	color: #000;
	position : absolute;
	left : 350px;
	top : 250px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
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
 function si(val)
 {
	 $('#cs').load('cusi_ledgr.php?val='+val).fadeIn("slow"); 
	 if(val==4)
	 {
		 $('#c').html('Customer :');
	 }
	 else if(val==12)
	 {
		$('#c').html('Supplier :'); 
	 }
	 else
	 {
		 $('#c').html('');
	 }
	 
 }
  function si1(val)
 {
	 
	 $('#cs1').load('cusi_ledgr.php?val='+val).fadeIn("slow"); 
	 if(val==4)
	 {
		 $('#c1').html('Customer :');
	 }
	 else if(val==12)
	 {
		$('#c1').html('Supplier :'); 
	 }
	 else
	 {
		 $('#c1').html('');
	 }
	 
}

 function sfdtl4(sl)
{
	$('#cnt').load('projectop_form_det.php?sl='+sl).fadeIn("fast");
	$('#myModal').modal('show');
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

select.sc {
	width: 430px;
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
input.sc {
	width: 430px;
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
</style>
</head>
<body>
 <aside class="right-side">
  <section class="content-header">
                    <h1 align="center">
                 Opening Balance
                        <small>Entry</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> Opening Balance</li>
                    </ol>
                </section>
				   <section class="content">
<form name="Form1" method="post" action="projectop_forms.php" id="Form1">

<div class="box box-success">
<table width="860px" class="table table-hover table-striped table-bordered">
<tr>
<td align="right"><font color="red">*</font>Branch:</td>
<td align="left">
<select name="brncd" class="form-control" size="1" id="brncd" style="width:380px;" onchange="gtcrvl1();gtcrvlfi()">
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
<td align="right" width="10%"><font color="red">*</font>Project No. :</td>
<td align="left" width="40%">
<select  name="proj" id="proj"  class="form-control" style="width:380px;" onchange="si(this.value)">

<option value="0">NA</option>
<?php 
$get1 = mysqli_query($conn,"SELECT * FROM main_project") or die(mysqli_error($conn));
while($row1 = mysqli_fetch_array($get1))
{
?>
<option value="<?=$row1['sl']?>"><?=$row1['nm']?></option>
<?php 
} 
?>
</select>




</td>  

</tr>
    <tr class="odd">
  
	<td align="right" width="10%"><font color="red">*</font>Ledger Head :</td>
    <td align="left" width="40%">
    <select  name="ldgr" id="ldgr"  class="form-control" style="width:380px;" onchange="si(this.value)">
							<option value="">-- Select --</option>
							<?php 
							$get = mysqli_query($conn,"SELECT * FROM main_ledg where sl!='-1'") or die(mysqli_error($conn));
							while($row = mysqli_fetch_array($get))
							{
							?>
								<option value="<?=$row['sl']?>" <?=$row['sl'] == $rowpages['pcd'] ? 'selected' : '' ?>><?=$row['nm']?></option>
							<?php 
							} 
							?>
						</select>
				
						
						
						
	</td>  
<td align="right" width="10%">
<div id="c">
</div>
</td>
 
    <td align="left" width="30%" >
	<div id="cs">
						
						</div>
	</td>	
  </tr>
  
  <tr class="odd">
    <td align="right" width="10%"><font>*</font>Ammount :</td>
    <td align="left" width="30%">
	<font color="red">Rs.</font> <input type="text" name="amm" id="amm" size="16" style="width:200px;" value="" class="sc" >
     <select  name="drcr" id="drcr" style="width:150px" class="sc">
							<option value="">-- Select --</option>
                            <option value="1">Dr.</option>
                            <option value="-1">Cr.</option>
     </select>
	</td>
	<td align="right" width="10%"><font color="red">*</font>Narration :</td>
    <td align="left" width="40%">
      <input type="text" name="nrtn" id="nrtn" size="40" style="width:280px;" class="form-control">
	</td>   
  </tr>
   
  
  <tr class="even">
    <td colspan="4" align="right">
	<input type="submit" class="btn btn-primary" value="Submit"></td>
  </tr>

</table>
</div>

<?
$data= mysqli_query($conn,"SELECT * FROM main_drcr where typ='11' order by dt desc");

?>
<div class="box box-success">
<table class="table table-hover table-striped table-bordered">

<tr style="height: 30px;">
<th align="center" width="5%">Sl.</th>
<th align="center" width="12%">Branch</th>
<th align="center" width="15%">Ledger Head</th>
<th align="center" width="10%">Opening Balance</th>
<th align="center" width="10%">Dr. / Cr.</th>
<th align="center" width="25%">Narration</th>
<td align="center" width="5%"><b>Edit</b></td>
</tr>
<?
		$f=0;
		while ($row = mysqli_fetch_array($data))
		{
		$sl= $row['sl'];
		$pno= $row['pno'];
		$cldgr= $row['cldgr'];
		$dldgr= $row['dldgr'];
		$amm= $row['amm'];
		$nrtn= $row['nrtn'];
		$eby= $row['eby'];
		$edt= $row['edt'];
		$cid= $row['cid'];
		$sid= $row['sid'];
		$brncd= $row['brncd'];
		$cunm="";
		$query6="select * from  main_cust where sl='$cid'";
		$result5 = mysqli_query($conn,$query6);
		while($row=mysqli_fetch_array($result5))
		{
		$cnm=$row['nm'];
		}
		$snm="";
		$query6="select * from  main_suppl where sl='$sid'";
		$result5 = mysqli_query($conn,$query6);
		while($row=mysqli_fetch_array($result5))
		{
		$snm=$row['spn'];
		}
		$var="";
		if($cldgr==12  or $dldgr==12 )
		{
			$var=" : ".$snm."";
		}
		else
		{
			if($cldgr==4  or $dldgr==4 )
		{
			$var=" : ".$cnm."";
		}
		else
		{
			$var="";
		}
			
		}
		$proj="";
		$get2 = mysqli_query($conn,"SELECT * FROM main_project where sl='$pno'") or die(mysqli_error($conn));
		while($row2 = mysqli_fetch_array($get2))
		{
		$proj=$row2['nm'];
		}
		$query="Select * from main_branch where sl='$brncd'";
   $result = mysqli_query($conn,$query);
while ($R = mysqli_fetch_array ($result))
{
$slb=$R['sl'];
$bnm=$R['bnm'];
}
		
		if($pno=='0')
		{$proj='NA';
		}
		if($nrtn=='')
		{$nrtn='NA';
		}
		
		
		
		if($cldgr==-1)
		{$ldgr=$dldgr;
		 $drcr="Dr.";
		}
		else
		{$ldgr=$cldgr;
		$drcr="Cr.";
		}
		
								$data1= mysqli_query($conn,"SELECT * FROM main_ledg where sl='$ldgr'");
								while ($row1 = mysqli_fetch_array($data1))
								{
									$ldgr= $row1['nm'];
								}
								
								
															
		$f++;
		if($f%2==0)
		{$cls="odd";
		}
		else
		{$cls="even";
		}
		$dt=date('d-M-Y', strtotime($dt));
?>
<tr class="<?echo $cls;?>" style="height: 20px;">
<td align="left" valign="top"><a href="#" title="By : <?=$eby;?> | On :<?=$edt;?>"><b><?echo $f;?></b></td>
<td align="left" valign="top"><?echo $bnm;?></td>
<td align="left" valign="top"><?echo $ldgr.$var;?></td>
<td align="center" valign="top" align="right"><font color="red">Rs. <b><?echo $amm;?></b></font></td>
<td align="left" valign="top"><?echo $drcr;?></td>
<td align="left" valign="top"><?echo $nrtn;?></td>
<td align="center" valign="top">
<a href="#" onclick="sfdtl4('<? echo $sl; ?>')" title="Edit"> <i class="fa fa-edit"></i></a>
</td>
</tr>
<?
}
?>
</table>
</div>

<!-- Modal Box Start-->
<div class="modal" id="myModal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times"></i>
				</button>
				<h4>Opening Balance Edit</h4>
			</div>
			<div class="page" id="cnt" style="overflow: auto;"></div>
			<div id="ammd"></div>
		</div>
	</div>
</div>
<!-- Modal Box End -->

</form>
 </section><!-- /.content -->
 </aside><!-- /.right-side -->
</body>

</div>
</html>