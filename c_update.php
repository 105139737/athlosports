<?
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";

$sl=base64_decode($_REQUEST['sl']);
$data= mysqli_query($conn,"select * from main_cust where sl='$sl'")or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($data))
{
	$nm=$row['nm'];
	$addr=$row['addr'];
	$cont1=$row['cont'];
	$mail=$row['mail'];
	$vat_no=$row['vat_no'];
	$gstin1=$row['gstin'];
	$pan=$row['pan'];
	$typ=$row['typ'];
	$gstdt=$row['gstdt'];
	$st=$row['st'];
}

if($gstdt!='0000-00-00')
{
$gstdt=date('d-m-Y', strtotime($gstdt));
}
else
{
	$gstdt='';
}
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
color:#000;
border:1px solid #37880a;
}

input:focus{

background-color:Aqua;
}
a{
cursor:pointer;
}
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

<script type="text/javascript" src="js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.min.js"></script>

<script>
function isNumber(evt) 
 {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if(iKeyCode < 48 || iKeyCode > 57)
		{
            return false;
        }
        return true;
 }    
   $(document).ready(function()
{
	var jQueryDatePicker1Opts =
	{
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		changeYear: true,
		showButtonPanel: false,
		showAnim: 'show'
	};
	$("#gstdt").datepicker(jQueryDatePicker1Opts);
});
	
function check1()
{

if(document.getElementById('cnm').value=='')
{
alert("Please Enter Customer Name !");
document.form1.cnm.focus();
return false;
}
if(document.getElementById('mob').value=='')
{
alert("Please Enter Mobile No. !");
document.form1.mob.focus();
return false;
}

else
{
document.forms["form1"].submit();
}
}

function gstinn()
{
var gstin=document.getElementById('gstin').value;
$.get('gst_pan.php?gstin='+gstin, function(data) {

var str= data;
var stra = str.split("@")
var pan = stra.shift()
var st = stra.shift()
if(gstin!='')
{
$('#pan').val(pan);
$('#fst').val(st);
}
else
{
$('#pan').val('');
$('#fst').val('1');
}
//$("#myselect").val(3);
}); 
}
</script>
</head>
<body>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                Customer
                        <small>Update</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Customer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
 

<form method="post" action="c_updates.php" id="form1"  name="form1" onsubmit="return check1()">
<input type="hidden" id="sl" name="sl" value="<?=$sl;?>">
<center>
<div class="box box-success" >
<table class="table table-hover table-striped table-bordered">
<tr>
<td style="text-align:right; padding-top:15px;">Customer Name:</td>
<td>
<input type="text" id="cnm" name="cnm" value="<?php echo $nm;?>" class="form-control" placeholder="Please Enter Customer Name">
</td>

<td style="text-align:right; padding-top:15px;">Mobile No. :</td>
<td>
<input type="text" class="form-control" id="mob" name="mob" value="<?php echo $cont1;?>" placeholder="Please Enter Mobile No.">
</td>
</tr>
<tr>
<td style="text-align:right; padding-top:15px;">E-Mail ID :</td>
<td>
<input type="text" class="form-control" id="email" name="email" value="<?php echo $mail?>" placeholder="Please Enter E-Mail">
</td>

<td style="text-align:right; padding-top:15px;">GSTIN :</td>
<td>
<input type="text" class="form-control" id="gstin" name="gstin" value="<?php echo $gstin1?>" onblur="gstinn()" placeholder="Please Enter GSTIN">
</td>
</tr>
<tr>
<td style="text-align:right; padding-top:15px;">PAN No :</td>
<td>
<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $pan?>" placeholder="Please Enter PAN No">
</td>
<td align="right" style="padding-top:15px">STATE :</td>
<td>
<select id="fst"  name="fst" class="form-control" >
	<?
	$sql="SELECT * FROM main_state WHERE sl>0 ORDER BY sn";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_array($result))
	{
	?>
    <option value="<?=$row['sl'];?>" <?if($row['sl']==$st){echo 'selected';}?>><?=$row['sn'];?> - <?=$row['cd'];?></option>
	<?}?>
</select>
</td>
</tr>
<tr>
<td align="right">
GSTIN Applicable Date :
</td>
<td>
<input type="text" class="form-control" id="gstdt" name="gstdt" value="<?php echo $gstdt?>" placeholder="Enter GSTIN Applicable Date">
</td>
<td style="text-align:right; padding-top:15px;">Address:</td>
<td colspan="3">
<input type="text" class="form-control" id="addr" name="addr" value="<?php echo $addr?>" placeholder="Please Enter Address">
</td>

</tr>
<tr>
<td colspan="4" align="right"  style="padding-right: 8px;">
<input type="submit" class="btn btn-success" id="Button1" name="" value="Update">
<input type="reset" class="btn btn-warning" id="Button2" name="" value="Reset">
</td>
</tr>
</table>
	 
</div>
</form><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                
                                </div>
                       
							</div>
							
							<!-- /.box -->

                        <!-- right col -->
                   <!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
   

        <!-- add new calendar event modal -->

     

    </body>
</html>