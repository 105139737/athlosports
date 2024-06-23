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

                        <li class="active">Outlet Setup</li>

                    </ol>

                </section>

				   <section class="content">

<form name="Form1" method="post" action="outlet_setups.php" id="Form1">
<div class="col-md-12" >

              <div class="box box-success box-solid">

                <div class="box-header with-border">

                  <h3 class="box-title">Outlet Setup</h3>

                  <div class="box-tools pull-right">

				

              </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body" >

          <table  width="800px"  align="center" class="table table-hover table-striped table-bordered">
<tr class="odd">

    <td align="left" width="40%">
	<label><b>Name :</b></label>
	<input class="form-control" type="text" name="nm" id="nm" size="40" Required>
	</td> 
	<td align="left" width="40%">
	<label><b>Contact Person :</b></label>
	<input class="form-control" type="cper" name="cper" id="vtyp" size="40" Required>
	</td>
	</tr>
	<tr>
	 <td align="left" width="50%">
	<label><b>Contact No :</b></label>
	<input class="form-control" type="text" name="mob" id="mob" size="40" Required>
	</td>
	<td align="left" width="50%">
	<label><b>Email Address :</b></label>
	<input class="form-control" type="email" name="email" id="email" size="40" >
	</td>
</tr>
<tr>
	 <td align="left" width="50%">
	<label><b>Latitude  :</b></label>
	<input class="form-control" type="text" name="lat" id="lat" size="40" >
	</td>
	<td align="left" width="50%">
	<label><b>Longitude  :</b></label>
	<input class="form-control" type="text" name="long" id="long" size="40" >
	</td>
</tr>
<tr>
	<td align="left" width="100%" colspan="4">
	<label><b>Address :</b></label>
	<input class="form-control" type="text" name="addr" id="addr" size="40" >
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

                  <h3 class="box-title">Outlet List</h3>

                  <div class="box-tools pull-right">
              </div><!-- /.box-tools -->

                </div><!-- /.box-header -->

                <div class="box-body" >
<table width="860px" class="table table-hover table-striped table-bordered">
<tr style="height: 30px;">
          <th align="center" >Sl.</th>
		  <th align="center" >Name </th> 
		  <th align="center" >Contact Person </th> 
		  <th align="center" >Contact No. </th> 
		  <th align="center" >Email Address </th> 
		  <th align="center" >Address </th> 
		  <th align="center" >Latitude </th> 
		  <th align="center" >Longitude </th> 
		  <th align="center" >Edit</th>
		  </tr>

		<?
		$data= mysqli_query($conn,"SELECT * FROM main_signup where userlevel>0 order by sl desc");
		$f=0;
		while ($row = mysqli_fetch_array($data))
		{
		$sl= $row['sl'];
		$cper = $row['cper'];
		$nm = $row['name'];
		$mob = $row['mob'];
		$email = $row['mailadres'];
		$lat = $row['lat'];
		$long = $row['longg'];
		$addr = $row['addr'];
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
    <td align="left" valign="top"><?echo $nm;?></td>
    <td align="left" valign="top"><?echo $cper;?></td>
    <td align="left" valign="top"><?echo $mob;?></td>
    <td align="left" valign="top"><?echo $email;?></td>
    <td align="left" valign="top"><?echo $addr;?></td>
    <td align="left" valign="top"><?echo $lat;?></td>
    <td align="left" valign="top"><?echo $long;?></td>
	<td align="center" valign="top"><a href="outlet_edit.php?sl=<?=$sl;?>" title="Edit"><i class="fa fa-edit"/></i></a></td>
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

