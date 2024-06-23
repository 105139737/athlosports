<?
$reqlevel = 1;
include("membersonly.inc.php");
include "header.php";

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
font-weight: 900;
color:#000;
border:1px solid #37880a;
}

input:focus{
background-color:Aqua;
}

a{
cursor:pointer;
}
</style>
<script>
 function get_scat()
{
	var cat=document.getElementById('cat').value;
	$('#div_scat').load('get_sub_cat.php?cat='+cat).fadeIn('fast');
}

 function get_list()
{
	var cat=document.getElementById('cat').value;
	var pnm=document.getElementById('pnm').value;
	$('#div_list').load('prod_lists.php?cat='+cat+'&pnm='+encodeURIComponent(pnm)).fadeIn('fast');
} 
function xls()
{
	var cat=document.getElementById('cat').value;
	var pnm=document.getElementById('pnm').value;
	document.location='prod_lists_xls.php?cat='+cat+'&pnm='+encodeURIComponent(pnm);
}

function pagnt(pno){
    var ps=document.getElementById('ps').value;
	var cat=document.getElementById('cat').value;
	var pnm=document.getElementById('pnm').value;
    
	$('#div_list').load('prod_lists.php?ps='+ps+'&pno='+pno+'&cat='+cat+'&pnm='+encodeURIComponent(pnm)).fadeIn('fast');
	$('#pgn').val=pno;
    }

	function pagnt1(pno)
	{
	pno=document.getElementById('pgn').value;
	pagnt(pno);
	}
</script>
</head>
<body onload="get_list()">
	<aside class="right-side">
		<section class="content-header">
			<h1 align="center">Product View & Edit</h1>
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Product List</li>
			</ol>
		</section>
		
		<section class="content">
<form method="post" action="#" id="form1" onSubmit="return check1()" name="form1">
<div class="box box-success">
<table class="table table-hover table-striped table-bordered">
<tr>
<td align="right" style="padding-top:17px" width="8%"><b>Category :</b></td>
<td align="left" width="20%">
	<select name="cat" id="cat" class="form-control" onchange="get_scat()">
	<Option value="">--- All ---</option>
	<?
	$get=mysqli_query($conn,"Select * from main_catg order by cnm");
	while($row=mysqli_fetch_array($get))
	{
		$csl=$row['sl'];
		$cnm=$row['cnm'];
		?>
		<option value="<?echo $csl;?>"><?echo $cnm;?></option>
		<?
	}
	?>
	</select>
</td>

<td align="right" style="padding-top:17px" width="8%"><b>Product Name:</b></td>
<td align="left" width="20%">
<input type="text" name="pnm" id="pnm" class="form-control">
</td>
<td align="left" width="16%">
<input type="button" value=" Show " onclick="get_list()" class="btn btn-info">
<!--<input type="button" value=" Excel Export " onclick="xls()" class="btn btn-warning">-->
</td>
</tr>
</table>
</div>
<div id="div_list" class="box box-success"></div>
</form><!-- /.box-body -->

                                <div class="box-footer clearfix no-border">

                                </div>

							</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->

    </body>
</html>
     <link rel="stylesheet" href="chosen.css">
 
<script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="prism.js" type="text/javascript" charset="utf-8"></script>

<script>

 $('#cat').chosen({
no_results_text: "Oops, nothing found!",
});	
 $('#scat').chosen({
no_results_text: "Oops, nothing found!",
});
</script>