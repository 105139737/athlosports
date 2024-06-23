<?
$reqlevel = 1;
include("membersonly.inc.php");
include "header.php";
$sl=$_REQUEST['sl'];

$query3 = "SELECT * FROM ".$DBprefix."sec where sl='$sl'";
$result3 = mysqli_query($conn,$query3);
while ($R = mysqli_fetch_array ($result3))
{
$x=$R['sl'];
$nm=$R['nm'];
$als=$R['als'];
}
?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?
            include "left_bar.php";
            ?>
<style type="text/css"> 
th{
text-align:center;
color:#FFF;
border:1px solid #37880a;
}

input:focus{

background-color:Aqua;
}
a{
cursor:pointer;
}
#sfdtl
{
	border : none;
	border-radius: 3px;
	background-image: url(images/bg1.png);
	width : 195px;
	
	display : none;
	color: #fff;
	position : absolute;
	left : 6%;
	top : 46%;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	z-index:1000;
}
</style> 

            <!-- Right side column. Contains the navbar and content of the page -->
           
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
              Section 
                        <small>Update</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">
						<a href="tech_show.php"><i class="fa fa-list"></i>Section Update</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
							
							
							
							


<center>
    <div class="box box-success" >
	<form method="post" action="section_edits.php" id="form1" onSubmit="return check1()" name="form1">
        <input type="hidden" name="sl" id="sl" value="<?php echo $sl;?>">
<div class="box-body">
<body >
<table border="0" class="table table-hover table-striped table-bordered" >
            <tr>
            <td align="right" width="15%" style="padding-top:15px;" ><b>Section :</b></td>
            <td  align="left" width="30%">
            <input type="text" class="form-control" name="sec" id="sec" onkeyup="show()" value="<?php echo $nm;?>" size="40" placeholder="Enter Section...." required>
            </td>
            <td align="right" width="15%" style="padding-top:15px;" ><b>Alise :</b></td>
            <td  align="left" width="30%">
            <input type="text" class="form-control" name="als" id="als" onkeyup="show()" value="<?php echo $als;?>" size="40" maxlength="2" readonly placeholder="Enter Alise...." required>
            </td>
            <td align="left" colspan="">
            <input type="submit" class="btn btn-warning" value="Update" name="B1" >
            </td>
            </tr>
</table>


</form>
 </center>


</body>
