<?
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
include "function.php";


$cy=date('Y');
date_default_timezone_set('Asia/Kolkata');

date_default_timezone_set('Asia/Kolkata');

$tdt = date('d-m-Y');
$fdt3 = date('Y');
$m = date('m');
$fdt=$fdt3."-04-01";

if($m<4)
{
$fdt1=$fdt3-1;	
}
else
{
$fdt1=$fdt3;

}
//echo $fdt1;

 $fdt=date('d-m-Y',strtotime($fdt1."-04-01"));
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
      $("#tdt").datepicker(jQueryDatePicker2Opts);
	$("#tdt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

      $("#fdt").datepicker(jQueryDatePicker2Opts);
	$("#fdt").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});


   });
   

   </script>
<script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>

<script type="text/javascript" src="prdcedt.js"></script>
<script>	
function show()
{
var brncd= document.getElementById('brncd').value;
var cat= document.getElementById('cat').value;
var scat= document.getElementById('scat').value;
var rt= document.getElementById('rt').value;
var fdt= document.getElementById('fdt').value;
var tdt= document.getElementById('tdt').value;
var prnm= document.getElementById('prnm').value;
$('#sgh').load('stk_summarys.php?brncd='+brncd+'&scat='+scat+'&cat='+cat+'&rt='+rt+'&fdt='+fdt+'&tdt='+tdt+'&prnm='+prnm).fadeIn('fast');
}


function get_cat()
{
var cat= document.getElementById('cat').value;
$('#gcat').load('get_cat_pur.php?cat='+cat).fadeIn('fast');
}

function get_prod()
{
var scat=document.getElementById('scat').value;
var cat=document.getElementById('cat').value;
$("#prod_div").load("get_product_stk.php?scat="+scat+"&cat="+cat).fadeIn('fast');	
}

function product_wise(cat_sl)
{
var brncd= document.getElementById('brncd').value;
var scat= cat_sl;
var rt= document.getElementById('rt').value;
var fdt= document.getElementById('fdt').value;
var tdt= document.getElementById('tdt').value;
/*$('#sgh').load('stk_summarys_product.php?brncd='+brncd+'&scat='+scat+'&rt='+rt+'&fdt='+fdt+'&tdt='+tdt).fadeIn('fast');*/

window.open('stk_summarys_product.php?brncd='+brncd+'&scat='+scat+'&rt='+rt+'&fdt='+fdt+'&tdt='+tdt,'_blank');
}
</script>

	</head>
 <body>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                Stock Summary
                      
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> Stock Summary </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                   

                   

                    <!-- Main row -->
                    
                        <!-- Left col -->
                       
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        
                           

                            <!-- Chat box -->
					
                     <!-- /.box (chat box) -->

                            <!-- TO DO List -->
<form method="post" action="stk_summarys.php" id="form1" name="form1">
<input type="hidden" id="val" name="val" value="1" class="form-control" > 

<div class="box box-success" >
<table border="0" width="860px" class="table table-hover table-striped table-bordered">
<tr>
<td align="left" width="15%">
<b>Form : </b>
<input type="text" id="fdt" name="fdt" value="<?echo $fdt;?>" class="form-control" placeholder="Please Enter From Date" > 
</td>

<td align="left" width="15%" >
<b>To : </b>
<input type="text" id="tdt" name="tdt" value="<?echo $tdt;?>"class="form-control" placeholder="Please Enter To Date">
</td>
<td align="left" width="20%" >
<b>Branch:</b>
<select name="brncd" class="form-control" size="1" id="brncd"   >
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

<td  align="left" width="20%">
<b>Category :</b><br>
<select name="cat"  style="width:100%" size="1" id="cat" tabindex="8" onchange="get_prod()">
<Option value="">---All---</option>
<?
$data11 = mysqli_query($conn,"Select * from main_catg order by sl");
while ($row11 = mysqli_fetch_array($data11))
{
$bsl=$row11['sl'];
$brnm=$row11['cnm'];
echo "<option value='".$bsl."'>".$brnm."</option>";
}
?>
</select>
</td>
<td  align="left" width="18%" hidden>
<b>Category :</b><br>
<div id="gcat">
<select name="scat" class="form-control" size="1" id="scat" tabindex="8">
<Option value="">---All---</option>
<?
$data1 = mysqli_query($conn,"Select * from main_scat order by nm");
while ($row1 = mysqli_fetch_array($data1))
{
$sl=$row1['sl'];
$cnm=$row1['nm'];
echo "<option value='".$sl."'>".$cnm."</option>";
}
?>
</select>
</div>
</td>
<td align="left" width="18%">
<b>Product :</b>
<div id="prod_div">
<select name="prnm" class="form-control"  id="prnm"   >
<option value="">---All---</option>
<?
$data1 = mysqli_query($conn,"Select * from main_product where typ='0' order by pnm");
while ($row1 = mysqli_fetch_array($data1))
{
$msl=$row1['sl'];
$pnm=$row1['pnm'];
?>
<Option value="<?=$msl;?>"><?=reformat($pnm);?></option>
<?
}
?>
</select>
</div>
</td>
<td  align="left" width="18%">
<b>Rate Type :</b><br>

<select name="rt" class="form-control" size="1" id="rt" tabindex="8">
<Option value="stk_rate">Without GST</option>
<Option value="rate">With GST</option>
</select>

</td>
 

</tr>
<tr>
<td colspan="6" align="right" style="padding-right:80px">
<input type="button" value=" Show " class="btn btn-info" onclick="show()">
<input type="submit" value=" Export To Excel " class="btn btn-warning">
</td>
</tr>


</tbody>
</table>
<div id="sgh">
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

	
		  $('#prnm').chosen({
  no_results_text: "Oops, nothing found!",

  });

  	  $('#cat').chosen({
  no_results_text: "Oops, nothing found!",

  });
 
</script>
     

    </body>
</html>