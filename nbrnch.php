<?
$reqlevel = 3;
include("membersonly.inc.php");
$branch_nm="Branch";
include "header.php";
date_default_timezone_set('Asia/Kolkata');
$edt=date('Y-m-d');
$m=date('m');
$y=date('y');
if($m>3)
{
$yy="G&co/".$y."-".($y+1)."/";	
}
elseif($m<3)
{
$yy="G&co/".($y-1)."-".$y."/";	
}
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
</style> 
function check1()
{
if(document.form1.sn.value=='')
{
alert("Please Enter Branch Name !");
document.form1.sn.focus();
}
if(document.form1.bls.value=='')
{
alert("Please Enter Branch Alias !");
document.form1.bls.focus();
{
alert("Please Enter Branch Address !");
document.form1.addr.focus();
}
{
alert("Please Enter Branch Contact No. !");
document.form1.bcnt.focus();
else
{
 document.forms["form1"].submit();
}
}
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                    Branch
                        <small>Entry</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Branch</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                            <!-- Chat box -->
                     <!-- /.box (chat box) -->
                            <!-- TO DO List -->
<form method="post" action="brnchs.php" id="form1" onSubmit="return check1()" name="form1">
<center>
<td align="left" >
<input type="text" name="bcnt" id=="bcnt" class="form-control" size="20" maxlength="10" onkeypress="return check(event)" placeholder="Enter Contact No"></td>
<tr>
<td align="right" >Address :</td>
<td align="left" colspan="3" >
<textarea type="text" name="addr" id="addr" class="form-control" size="20" placeholder="Enter Address"></textarea></td>
</tr>
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