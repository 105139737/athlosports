<?php
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
$sl=$_REQUEST['sl'];
$get=mysqli_query($conn,"select * from main_product where sl='$sl'") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($get))
{
	$psl=$row['sl'];
	$cat1=$row['cat'];
	$pnm=$row['pnm'];
	$detls=$row['detls'];
	$rate=$row['rate'];
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

 <div class="wrapper row-offcanvas row-offcanvas-left">
<?
include "left_bar.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>
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
a

{

   color: black;

   outline: none;

   text-decoration: none;

}
</style>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
</script>
</head>
<body >
 <aside class="right-side">
  <section class="content-header">

                    <h1 align="center">
                    </h1>
                    <ol class="breadcrumb">

                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>

                        <li class="active">Product Edit</li>

                    </ol>

                </section>

				   <section class="content">

<form name="Form1" method="post" action="prod_edits.php" id="Form1">
<div class="col-md-12" >

              <div class="box box-success box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Product</h3>

                  <div class="box-tools pull-right">
              </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body" >

          <table  width="800px"  align="center" class="table table-hover table-striped table-bordered">
<tr class="odd">

    <td align="left" width="50%">
	<label><b>Category Name :</b></label>
	<select class="form-control" name="cat" id="cat" Required>
	<option value="">---Select---</option>
	<?
	$data= mysqli_query($conn,"SELECT * FROM main_cat order by sl desc");
		while ($row = mysqli_fetch_array($data))
		{
		$sl0= $row['sl'];
		$pnm0=$row['nm'];
		?>
		<option value="<?=$sl0;?>"<?if($cat1==$sl0){echo "selected";}?>><?=$pnm0;?></option>
		<?
		}
	?>
	</select>
	</td> 
	<td align="left" width="50%">
	<label><b>Product Name :</b></label>
	<input class="form-control" type="text" name="pnm" value="<?=$pnm;?>" id="pnm" size="40" Required>
	</td>
</tr>
<tr>
<td align="left" width="50%">
	<label><b>Details :</b></label>
	<input class="form-control" type="text" name="detls" value="<?=$detls;?>" id="detls" size="40">
	<input type="hidden" name="sl" value="<?=$sl;?>" id="sl">
	</td>
	<td align="left" width="50%">
	<label><b>Rate :</b></label>
	<input class="form-control" type="text" name="rate" value="<?=$rate;?>" id="rate" size="40" onkeypress="return isNumberKey(event);">
	</td>
</tr>
<tr >

    <td colspan="4" align="right"><input type="submit" value="Update" class="btn btn-success"></td>

  </tr>
</table>
</div><!-- /.box-body -->

              </div><!-- /.box -->

            </div><!-- /.col -->
			</form>
 </section><!-- /.content -->

 </aside><!-- /.right-side -->
</body>
<div id="underlay" style="z-index:200;">

</div>

</div>

</html>

