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
<script type="text/javascript" src="prdcedt.js"></script>
function show()
{
var all= document.getElementById('all').value;
$('#sgh').load('s_list.php?all='+encodeURIComponent(all)).fadeIn('fast');
}
function pagnt(pno)
var ps=document.getElementById('ps').value;
var src=document.getElementById('all').value;
$('#sgh').load("s_list.php?ps="+ps+"&pno="+pno+"&all="+encodeURIComponent(src)).fadeIn('fast');
$('#pgn').val=pno;
}
function pagnt1(pno)
pno=document.getElementById('pgn').value;
pagnt(pno);

function edit(sl)
{
document.location='s_update.php?sl='+sl;
}
function updt_stat(sl,stat)
{
$('#sgh').load('updt_stat.php?sl='+sl+'&stat='+stat).fadeIn('fast');	
}
</script>
<body onload="show()" >
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                Supplier
                    </h1>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Supplier</li>
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
<HR> 	
<input type="hidden">
<center>
<tr>
<td align="right" width="30%" style="padding-top:15px"> <font size="3"><b>Search :</b></font></td>
<td align="left" width="40%">
<input type="text" name="all" id="all" class="form-control" style="width:400px">
<td align="left" width="30%">
<input type="button" value=" Show " class="btn btn-primary" onclick="show()">
</td>
</tr>
</tbody>
</table>
<div id="sgh">
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