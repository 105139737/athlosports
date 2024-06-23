<?php 
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
include "function.php";
$sl=$_REQUEST['sl'];

$get=mysqli_query($conn,"select * from main_stock where sl='$sl'") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($get))
{
	$dt1=$row['dt']; $dt=date('d-m-Y',strtotime($dt1));
	$cat1=$row['cat'];
	$hsn=$row['hsn'];
	$unit1=$row['unit'];
	$mrp=$row['mrp'];
	$smvlu=$row['smvlu'];
	$mdvlu=$row['mdvlu'];
	$bgvlu=$row['bgvlu'];
	$betno=$row['betno'];
	$rate=$row['rate'];
	$pcd=$row['pcd']; 
	$bcd=$row['bcd'];
	$stin=$row['stin'];
	$stout=$row['stout'];
	$stk_rate=$row['stk_rate'];
  $sec=$row['sec'];
	
	if($stin>0){$adj_typ=1;}else{ $adj_typ=0;}
	
	$get1=mysqli_query($conn,"select * from main_product where sl='$pcd'") or die(mysqli_error($conn));
	while($row1=mysqli_fetch_array($get1))
	{
	$cat=$row1['cat'];
	}
	
}

$cy=date('Y');
?> 
<html>
<head>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <?
            include "left_bar.php";
            ?>
<style type="text/css"> 
th{
text-align:center;

border:1px solid #37880a;
}

input:focus{

background-color:Aqua;
}
a{
cursor:pointer;
}
</style> 
<link rel="stylesheet" href="cupertino/jquery.ui.all.css" type="text/css">
<style type="text/css">
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003 !important;
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

$("#dt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
$("#dt").datepicker(jQueryDatePicker2Opts);

});
	function isNumber(evt) 
 {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if(iKeyCode < 46 || iKeyCode > 57)
		{
            return false;
        }
        return true;
 }
 </script>
<script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>

<script type="text/javascript" src="prdcedt.js"></script>
<script>	
    function get_cat_div()  
 {
sec=document.getElementById('sec').value;
$("#get_cat_div").load("get_cat_div1.php?sec="+sec).fadeIn('fast');
}
function get_igst()
{
var prnm=document.getElementById('prnm').value;  
$("#get_igst").load("get_igst_div.php?prnm="+prnm).fadeIn('fast');  
}
function get_scat()  
{
var cat= document.getElementById('cat').value;
$("#scatdiv").load("get_scat_adj.php?cat="+cat).fadeIn('fast');
}

function get_prod()
{
var cat=document.getElementById('cat').value;
$("#prod_div").load("get_product_adj.php?cat="+cat).fadeIn('fast');	
}
function getstock()
{
var prnm=document.getElementById('prnm').value;
var brncd=document.getElementById('brncd').value;		
$("#stk_div").load("get_stk_adj.php?prnm="+prnm+"&brncd="+brncd).fadeIn('fast');	
}
function gtt_unt()
{
var prnm=document.getElementById('prnm').value;		
$("#g_unt").load("get_unt_adj.php?prnm="+prnm).fadeIn('fast');
 }
 function gtt_godwn()
{
var prnm=document.getElementById('prnm').value;	
$("#g_gwn").load("get_gwn_adj.php?prnm="+prnm).fadeIn('fast');	
 }
function show()
{
var cat=document.getElementById('cat').value;	
$("#show").load("stk_adjust_show.php?cat="+cat).fadeIn('fast');	
 }


 function get_wo_gst()
{
var rate=parseFloat(document.getElementById('rate').value);if(document.getElementById('rate').value==""){rate=0;}
var igst=parseFloat(document.getElementById('igst').value);if(document.getElementById('igst').value==""){igst=0;}

if(igst>0 && rate>0)
{
var stk_rate=rate*igst/(igst+100);

document.getElementById('stk_rate').value=(rate-stk_rate).round(2);
}
 }
 
 function get_w_gst()
{
var stk_rate=parseFloat(document.getElementById('stk_rate').value);if(document.getElementById('stk_rate').value==""){stk_rate=0;}
var igst=parseFloat(document.getElementById('igst').value);if(document.getElementById('igst').value==""){igst=0;}

if(igst>0 && stk_rate>0)
{
var rate=stk_rate*igst/100;

document.getElementById('rate').value=(rate+stk_rate).round(2);
}
 }
    Number.prototype.round = function(places) {
  return +(Math.round(this + "e+" + places)  + "e-" + places);
}
</script>
</head>
 <body onload="get_igst()">
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1 align="center">Stock Adjustment</h1>
                <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Stock Adjustment</li>
                </ol>
                </section>
				<!-- Main content -->
<section class="content">
<form method="post" action="stk_adjust_edts.php" id="form1" onSubmit="return check1()" name="form1">
<input type="hidden" name="sl" id="sl" value="<?php echo $sl;?>">
<div class="box box-success" >
<table border="0" width="860px" class="table table-hover table-striped table-bordered">
<tr>
<td  align="right" width="20%"><b>Section :</b></td>
<td width="30%" >
<select id="sec" name="sec" class="form-control">
<?
$appfor=mysqli_query($conn,"SELECT * from main_sec where sl>0 and sl='$sec'") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($appfor))
{

?>
<option value="<?=$row['sl'];?>" <?php if($row['sl']==$sec){ echo 'selected';}?>><?=$row['nm'];?> (<?=$row['als'];?>)</option>
<?
}
?>
</select>
</td>
<td  align="right" width="20%"><b>Category :</b></td>
<td width="30%" >
  <div id="get_cat_div">
<select name="cat" class="form-control" size="1" id="cat" tabindex="1" onchange="get_prod()">

<?
$data1 = mysqli_query($conn,"Select * from main_catg where sl='$cat' order by cnm");
while ($row1 = mysqli_fetch_array($data1))
{
$sl=$row1['sl'];
$cnm=$row1['cnm'];
?>
<option value="<?php echo $sl;?>" <?php if($cat==$sl){ echo 'selected';}?>><?php echo $cnm;?></option>
<?
}
?>
</select>
</div>
</td> 


</tr>
<tr>
<td align="right" ><b>Product:</b></td>
<td>
<div id="prod_div">
<select name="prnm" class="form-control"  id="prnm"  onchange="gtt_unt();getstock();gtt_godwn()" >

<?
$data13 = mysqli_query($conn,"Select * from main_product where typ='0' and sl='$pcd' order by pnm");
while ($row13 = mysqli_fetch_array($data13))
{
$psl=$row13['sl'];
$pnm=$row13['pnm'];
?>
<Option value="<?=$psl;?>" <?php if($pcd==$psl){ echo 'selected';}?>><?=reformat($pnm);?></option>
<?
}
?>
</select>
</div>
</td>

<td align="right" width="20%" ><b>Branch:</b></td>
<td width="30%" >
<div id="g_gwn">
<select name="brncd" class="form-control" size="1" id="brncd" required onchange="getstock()">

<?

if($user_current_level<0)
{
$query="Select * from main_branch where sl>0 ";
?>
<option value="">---Select---</option>
<?
}
else
{
$query="Select * from main_branch where sl>0 and sl='$branch_code' ";
}
$result = mysqli_query($conn,$query);
while ($R = mysqli_fetch_array ($result))
{
$sl=$R['sl'];
$gnm=$R['bnm'];
?>
<option value="<? echo $sl;?>" <?php if($bcd==$sl){ echo 'selected';}?>><? echo $gnm;?></option>
<?
}
?>
</select>
</div>
</td>
</tr>
<tr>
<td align="right"><b>Stock In Hand  :</b></td>
<td>
<table>
<tr>
<td width="60%">
<div id="stk_div">
<input type="text" name="sih" id="sih" class="form-control"  readonly onkeypress="return isNumber(event)">
</div>
</td>
<td width="40%">
<div id="g_unt">
<select id="unit" name="unit" class="sc" tabindex="1">
<option value="">---Select---</option>
</select>
</div>
</td>
</tr>
</table>
</td>
<td align="right"><b>Quantity  :</b></td>
<td>
<input type="text" name="qty" id="qty" readonly class="form-control" value="<?php echo $stin;?>" onkeypress="return isNumber(event)">
</td>
</tr>


<tr>
<td align="right"><b>Serial No.  :</b></td>
<td>
<input type="text" name="betno" id="betno"value="<?php echo $betno;?>" class="form-control">
</td>
<td align="right" width="20%" ><font color="red" size="4"><b>Adjust Type:</b></font></td>
<td width="30%" >
<select name="adj_typ" class="form-control" size="1" id="adj_typ" required>
<option value="1" <?php if($adj_typ==1){echo 'selected';}?>>Stock(+)</option>
<option value="0" <?php if($adj_typ==0){echo 'selected';}?>>Stock(-)</option>
</select>
</td>
</tr>
<tr>
<td align="right"><b>With GST Rate  :</b></td>
<td>
<input type="text" name="rate" id="rate" value="<?php echo $rate;?>" class="form-control" onkeypress="return isNumber(event)" onblur="get_wo_gst()">
</td>
<td align="right"><b>Without GST Rate  :</b></td>
<td>
<input type="text" name="stk_rate" id="stk_rate" value="<?php echo $stk_rate;?>" class="form-control" onkeypress="return isNumber(event)" onblur="get_w_gst()">
</td>
</tr>
<tr>
<td align="right"><b>Date  :</b></td>
<td>
<input type="text" name="dt" id="dt" value="<?php echo $dt;?>" class="form-control" >
</td>
<td align="right"><b>Product GST :</b></td>
<td>
  <div id="get_igst">
  <input type="text" name="igst" id="igst" value="" class="form-control" readonly>
  </div>
</td>
</tr>
<tr>
<td colspan="4" align="right" style="padding-right:80px">
<input type="submit" value=" Update " class="btn btn-primary">
<input type="reset" value=" Reset " class="btn btn-warning">
</td>
</tr>
</table>
</div>

</form>
<div id="show">
</div>
<!-- /.box-body -->
<div class="box-footer clearfix no-border"></div>
                       
</div>
							
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
$('#scat').chosen({
no_results_text: "Oops, nothing found!",
});
 $('#cat').chosen({
no_results_text: "Oops, nothing found!",
});
 $('#sec').chosen({
no_results_text: "Oops, nothing found!",
});

 getstock();
 gtt_unt();
</script>
 </body>
</html>