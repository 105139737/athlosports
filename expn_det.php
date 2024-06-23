<?php
$reqlevel=1;
include("membersonly.inc.php");

$sl=$_REQUEST[sl];		
$data= mysqli_query($conn,"SELECT * FROM main_drcr where sl='$sl'");
while ($row = mysqli_fetch_array($data))
{
	$dt= $row['dt'];
	$pno= $row['pno'];
	$vno= $row['vno'];
	$cldgr= $row['cldgr'];
	$dldgr= $row['dldgr'];
	$mtd= $row['mtd'];
	$mtddtl= $row['mtddtl'];
	$amm= $row['amm'];
	$nrtn= $row['nrtn'];
	$it= $row['it'];
	$brncd= $row['brncd'];
}
$dt=date('Y-m-d', strtotime($dt));
?>
<div class="box box-success">
<div class="box-header">
<div class="form-group col-md-6">
<label><font color="red">*</font>Date:</label>
<input type="date" name="dt" id="dt" value="<?echo $dt;?>" class="form-control">
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>JF No. :</label>
<input type="text" name="vno" id="vno"  class="form-control" value="<?echo $vno;?>" readonly style="background:transparent; color : red;">
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>Branch:</label>
	<select name="brncd" id="brncd" class="form-control">
	<?
		if($user_current_level<0)
		{
			$query="Select * from main_branch";
		}
		else
		{
			$query="Select * from main_branch where sl='$branch_code'";
		}
		$result3 = mysqli_query($conn,$query);
		while ($R = mysqli_fetch_array ($result3))
		{
			$bbsl=$R['sl'];
			$bnm=$R['bnm'];
			
			?>
			<option value="<? echo $bbsl;?>"<?=$R['sl'] == $brncd ? 'selected' : '' ?>><? echo $bnm;?></option>
			<?
		}
	?>
	</select>
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>Project :</label>
	<select name="proj" id="proj" class="form-control">
	<option value="0" <?=$pno == 0 ? 'selected' : '' ?>> NA </option>
	<?php 
		$get = mysqli_query($conn,"SELECT * FROM main_project") or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($get))
		{
			?>
			<option value="<?=$row['sl']?>" <?=$row['sl'] == $pno ? 'selected' : '' ?>><?=$row['nm']?></option>
			<?php 
		}
	?>
	</select>
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>Cash Or Bank Ac.:</label>
	<select name="cldgr" id="cldgr" class="form-control" onchange="gtcrvl(this.value)">
	<option value="">-- Select --</option>
	<?php 
		$get = mysqli_query($conn,"SELECT * FROM main_ledg where gcd='1' or gcd='2'") or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($get))
		{
		?>
		<option value="<?=$row['sl']?>" <?=$row['sl'] == $cldgr ? 'selected' : '' ?>><?=$row['nm']?></option>
		<?php 
		} 
	?>
	</select>
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>Expenses Head :</label>
	<select name="dldgr" id="dldgr" class="form-control" onchange="gtcrvl1(this.value)">
	<option value="">-- Select --</option>
	<?php 
	$get1 = mysqli_query($conn,"SELECT * FROM main_group where pcd='8'") or die(mysqli_error($conn));
	while($row1 = mysqli_fetch_array($get1))
	{
		$gcd=$row1['sl'];
		$get = mysqli_query($conn,"SELECT * FROM main_ledg where gcd='$gcd'") or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($get))
		{
			?>
			<option value="<?=$row['sl']?>" <?=$row['sl'] == $dldgr ? 'selected' : '' ?>><?=$row['nm']?></option>
			<?php 
		} 
	}
	?>
	</select>
</div>   
<div class="form-group col-md-6">
<label><font color="red">*</font>Payment Mode :</label>
	<select  name="paymtd" id="paymtd" class="form-control">
	<option value="">-- Select --</option>
	<?php 
		$get = mysqli_query($conn,"SELECT * FROM ac_paymtd") or die(mysqli_error($conn));
		while($row = mysqli_fetch_array($get))
		{
		?>
		<option value="<?=$row['sl']?>" <?=$row['sl'] == $mtd ? 'selected' : '' ?>><?=$row['mtd']?></option>
		<?php 
		} 
	?>
	</select>
</div>
<div class="form-group col-md-6">
<label>Ref. No. :</label>
   <input type="text" name="refno" id="refno" class="form-control" value="<?echo $mtddtl;?>">
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>Amount :</label><br>
<img src="images\rp.png" height="15px"><input type="text" name="amm" id="amm" class="sc" value="<?echo $amm;?>" style="width:230px; height:30px;">
</div>
<div class="form-group col-md-6">
<label><font color="red">*</font>IT/Non-IT :</label>
	<select  name="it" id="it" class="form-control">
	<option value="">-- Select --</option>
	<option value="1" <?=$it == 1 ? 'selected' : '' ?>>IT</option>
	<option value="0" <?=$it == 0 ? 'selected' : '' ?>>Non-IT</option>
	</select>
</div>   
<div class="form-group col-md-12">
<label><font color="red">*</font>Narration :</label>
<input type="text" name="nrtn" id="nrtn" class="form-control" value="<?echo $nrtn;?>">
</div>


<div class="form-group col-md-12">
<label>Upload File :</label>
<input type="file" name="fileToUpload1" id="fileToUpload1" class="btn btn-info" onchange="readURL(this);" >
</div>


<div class="form-group col-md-12" style="text-align:center;">
<label><input type="submit" value="Update" class="btn btn-success"></label>
<input type="hidden" name="updt" id="updt" value="<?echo $sl;?>">
</div>
</div>
</div>