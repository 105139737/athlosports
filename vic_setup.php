<?php
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
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
</head>
<body >
 <aside class="right-side">
  <section class="content-header">

                    <h1 align="center">
                    </h1>
                    <ol class="breadcrumb">

                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>

                        <li class="active">Vehicle Setup</li>

                    </ol>

                </section>

				   <section class="content">

<form name="Form1" method="post" action="vic_setups.php" id="Form1">
<div class="col-md-12" >

              <div class="box box-success box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Vehicle Setup</h3>

                  <div class="box-tools pull-right">

				

              </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body" >

          <table  width="800px"  align="center" class="table table-hover table-striped table-bordered">
<tr class="odd">

    <td align="left" width="40%">
	<label><b>Driver Name :</b></label>
	<input class="form-control" type="text" name="dnm" id="dnm" size="40" Required>
	</td> 
	<td align="left" width="30%">
	<label><b>Vehicle Type :</b></label>
	<input class="form-control" type="text" name="vtyp" id="vtyp" size="40" Required>
	</td> <td align="left" width="30%">
	<label><b>Vehicle No :</b></label>
	<input class="form-control" type="text" name="vno" id="vno" size="40" Required>
	</td>
</tr>
<tr >

    <td colspan="4" align="right"><input type="submit" value="Submit" class="btn btn-success"></td>

  </tr>
</table>
</div><!-- /.box-body -->

              </div><!-- /.box -->

            </div><!-- /.col -->

 <div class="col-md-12" >

              <div class="box box-success box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Vehicle List</h3>

                  <div class="box-tools pull-right">
              </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body" >
<table width="860px" class="table table-hover table-striped table-bordered">
<tr style="height: 30px;">
          <th align="center" width="10%">Sl.</th>
		  <th align="center" width="40%">Driver Name </th> 
		  <th align="center" width="20%">Vehicle Type </th> 
		  <th align="center" width="20%">Vehicle No. </th> 
		  <th align="center" width="10%">Edit</th>
		  </tr>

		<?
		$data= mysqli_query($conn,"SELECT * FROM main_vic order by sl desc");
		$f=0;
		while ($row = mysqli_fetch_array($data))
		{
		$sl= $row['sl'];
		$vtyp=$row['vtyp'];
		$dnm=$row['dnm'];
		$vnm=$row['vno'];
		$f++;
		if($f%2==0)
		{
			$cls="odd";
		}
		else
		{
			$cls="even";
		}
		$dt=date('d-M-Y', strtotime($dt));

		?>

  <tr class="<?echo $cls;?>" style="height: 20px;">
  <td align="left" valign="top"><?echo $f;?></td>
    <td align="left" valign="top"><?echo $dnm;?></td>
    <td align="left" valign="top"><?echo $vtyp;?></td>
    <td align="left" valign="top"><?echo $vnm;?></td>
	<td align="center" valign="top"><a href="vic_edit.php?sl=<?=$sl;?>" title="Edit"><i class="fa fa-edit"/></i></a></td>
	 </tr>
<?
  }
  ?>
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

