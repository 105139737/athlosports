<?
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
include "function.php";
$sa=date('d-m-Y');
$saa="01-".date('m-Y');
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
color:red;
border:1px solid #37880a;
}

input:focus{

background-color:Aqua;
}
a{
cursor:pointer;
}
</style> 
<link rel="stylesheet" href="advancedtable.css">
<script>


	function gpro()
{
	var cat= document.getElementById('cat').value;
	var bnm= document.getElementById('bnm').value;
	$('#gpro').load('get_pro.php?bnm='+bnm+'&cat='+cat).fadeIn('fast');

}


	function show1()
{
 var fdt= document.getElementById('fdt').value;
 var tdt= document.getElementById('tdt').value;
 var snm= document.getElementById('snm').value;
 var brncd= document.getElementById('brncd').value;
  var cat= document.getElementById('cat').value;
 var prnm= document.getElementById('prnm').value;
  var oid= encodeURIComponent(document.getElementById('oid').value);
 $('#data8').load('sale_list_ret.php?fdt='+fdt+'&tdt='+tdt+'&snm='+encodeURIComponent(snm)+'&cat='+cat+'&prnm='+prnm+'&brncd='+brncd+'&oid='+oid).fadeIn('fast');

}
	function xls()
{
 var fdt= document.getElementById('fdt').value;
 var tdt= document.getElementById('tdt').value;
 var snm= document.getElementById('snm').value;
 var brncd= document.getElementById('brncd').value;
  var cat= document.getElementById('cat').value;
 var prnm= document.getElementById('prnm').value;
document.location='sale_xls.php?fdt='+fdt+'&tdt='+tdt+'&snm='+encodeURIComponent(snm)+'&cat='+cat+'&prnm='+prnm+'&brncd='+brncd;
}
function view(blno)
{

window.open('bill_new_gst_ret.php?blno='+encodeURIComponent(blno), '_blank');
window.focus();
}

function dlt(blno)
{
$('#data8').load('sale_dlt.php?blno='+blno).fadeIn('fast');
}
function get_model()  
{

var cat= document.getElementById('cat').value;
$("#moddiv").load("getmodel_psw.php?cat="+cat).fadeIn('fast');
}
</script>
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

$("#fdt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
$("#tdt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

	   $("#fdt").datepicker(jQueryDatePicker2Opts);
      $("#tdt").datepicker(jQueryDatePicker2Opts);
});
   </script>
      <script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>


	</head>
 <body>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
              Day Wise Sale Return
                      
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Sale Return</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">			
	<form method="post" action="#" name="form1" onsubmit="return check1()" id="form1">
                  
<div class="box box-success" >
<table border="0" width="860px"  class="table table-hover table-striped table-bordered">
<thead>
<tr>


<td align="left" width="20%" >
<b>Form:</b><br>

<input type="text" id="fdt" name="fdt" size="13" value="<?echo $saa;?>" class="form-control" placeholder="Please Enter From Date" > </td>

<td align="left" width="20%"  >
<b>To:</b>
<br>
<input type="text" id="tdt" name="tdt" size="13" value="<?echo $sa;?>" class="form-control" placeholder="Please Enter To Date">
</td>



<td width="25%">
<b>Category:</b><br>
<select id="cat" name="cat" style="width:100%" class="form-control" onchange="get_model()">
<option value="">---All---</option>
<?
$data12 = mysqli_query($conn,"Select * from main_catg order by sl");
while ($row12 = mysqli_fetch_array($data12))
	{
	$sl=$row12['sl'];
	$cnm=$row12['cnm'];
?>
<Option value="<?=$sl;?>"><?=$cnm;?></option>
<?}?>
</select>
</td>
<td width="">
<b>Product:</b><br>
<div id="moddiv">
<select id="prnm" name="prnm" style="width:100%" class="form-control">
<option value="">---All---</option>
<?
$data1 = mysqli_query($conn,"Select * from main_product where typ='0' order by sl");
while ($row1 = mysqli_fetch_array($data1))
	{
	$sl=$row1['sl'];
	$pnm=$row1['pnm'];
?>
<Option value="<?=$sl;?>"><?=reformat($pnm);?></option>
<?}?>
</select>
</div>
</td>

</tr>
<tr>



<td align="left"   >
<b>Customer:</b>
<br>

<select name="snm" class="form-control"  id="snm"   >
<option value="">---All---</option>
<?
$query="Select * from  main_cust order by nm";
   $result = mysqli_query($conn,$query);
while ($R = mysqli_fetch_array ($result))
{
$sid=$R['sl'];
$nm=$R['nm'];
$cont=$R['cont'];
?>
<option value="<? echo $sid;?>"><? echo $nm;?> - <? echo $cont;?></option>
<?
}
?>
</select>
</td>

<td align="left" width="" >
<b>Branch:</b>
<br>

<select name="brncd" class="form-control czn" size="1" id="brncd"   >
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
$sl=$R['sl'];
$bnm=$R['bnm'];

?>
<option value="<? echo $sl;?>"><? echo $bnm;?></option>
<?
}
?>
</select>

</td>
<td align="left" >
<b>Order ID :</b>
<br>
<input type="text" id="oid" name="oid" size="13" value="" class="form-control" >
</td>


<td align="right" ><br>
<input type="button" class="btn btn-primary" value="Show" onclick="show1()">
<!--<input type="button" class="btn btn-info" value="Excel Export" onclick="xls()">-->
</td>
</tr>
</thead>



</table>
<div id="data8" style="overflow-x:auto;">
</div>
	 
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

     
<link rel="stylesheet" href="chosen.css">
 
<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="prism.js" type="text/javascript" charset="utf-8"></script>

<script>

	
$('#pnm').chosen({no_results_text: "Oops, nothing found!",});
$('#snm').chosen({no_results_text: "Oops, nothing found!",});
$('#cat').chosen({no_results_text: "Oops, nothing found!",});
$('#bnm').chosen({no_results_text: "Oops, nothing found!",});
$('.czn').chosen({no_results_text: "Oops, nothing found!",});
$('#prnm').chosen({no_results_text: "Oops, nothing found!",});
  
function getv()
{
var cat= document.getElementById('cat').value;
var bnm= document.getElementById('bnm').value;
$('#vv').load('get_v.php?cat='+cat+'&bnm='+bnm).fadeIn('fast');
}
</script>
    </body>
</html>