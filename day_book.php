<?php
$reqlevel=1;

include("membersonly.inc.php");
include "header.php";
$fy=date('Y');
$fm=date('m');
if($fm<4)
{$fy--;
}
$fdt="01-04-".$fy; 


?>
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?

            include "left_bar.php";

            ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<link rel="stylesheet" href="dark-hive/jquery.ui.all.css" type="text/css">
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
   font-size: 18px;
   z-index: 1003 !important;
   display: none;
}
</style>
<style type="text/css">
#sfdtl
{
	border : none;
	border-radius: 15px;
	background-image: url(images/bg.jpg);
	width : 950px;
	
	display : none;
	color: #fff;
	position : absolute;
	left : 350px;
	top : 250px;
	font-family: Verdana, Geneva, sans-serif;

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


<script type="text/javascript" src="jquery.ui.core.min.js"></script>
<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker.min.js"></script>

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
   $("#fdt").datepicker(jQueryDatePicker2Opts);

   $("#tdt").datepicker(jQueryDatePicker2Opts);

   });
   

</script>

<script>
    
  function inexdtls()
   {
        fdt = document.getElementById('fdt').value;
     pno = document.getElementById('pno').value;
   var brncd= document.getElementById('brncd').value;	
	  $('#data').load('day_book_det.php?fdt='+fdt+'&pno='+pno+'&brncd='+brncd).fadeIn('fast');  



   }


</script>



</head>
 

            <!-- Right side column. Contains the navbar and content of the page -->

            <aside class="right-side">

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <h1 align="center">

                    </h1>

                    <ol class="breadcrumb">

                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>

                        <li class="active">Day Book </li>

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

						


<body >

         <center>
               
 	<form method="post" action="day_book_xls.php" id="form1"  name="form1">

     <input type="hidden" value="0" name="pno" id="pno">
<div class="col-md-12" >
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Day Book </h3>
                  <div class="box-tools pull-right">
				
              </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" >
				
        <table border="0"   align="center" class="table table-hover table-striped table-bordered">

        <tr class="odd">
			<td align="right" ><font color="red">*</font>Branch :</td>
    <td align="left" >

						
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
$slb=$R['sl'];
$bnm=$R['bnm'];

?>
<option value="<? echo $slb;?>"><? echo $bnm;?></option>
<?
}
?>
</select>
	</td>

    <td align="right" ><font color="red">*</font>From :</td>

    <td align="left" >

	<input type="text" name="fdt" class="form-control" id="fdt" value="<? echo date('d-m-Y'); ?>">

	</td>

     <td align="right"  >

   <input type="button" value=" Show " onclick="inexdtls()" class="btn btn-primary"/>

    </td>

  </tr>



 

    <tr class="odd">

    <td align="center" width="100%" colspan="5">

    <div id="data">

    </div>

    </td>

    </tr>

     
     </table>



	 



                                </div>




                                </div>

								

								<input type="hidden" id="edtbx"/>

								

								


                            </div></div>

							

							

							<!-- /.box -->



                        <!-- right col -->

                   <!-- /.row (main row) -->



                </section><!-- /.content -->

            </aside><!-- /.right-side -->

   



        <!-- add new calendar event modal -->


								<input type="hidden" id="edtbx"/>


</form>
 </center>
</body>


<div id="underlay" style="z-index:200;">
</div>

</html>
