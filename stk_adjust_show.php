<?php
$reqlevel = 1;
include("membersonly.inc.php");
include "function.php";
$cat=$_REQUEST['cat'];
$prnm=$_REQUEST['prnm'];
$brncd=$_REQUEST['brncd'];

if($prnm!=""){$prnm1=" and pcd='$prnm'";}else{$prnm1="";}
if($brncd!=""){$brncd1=" and bcd='$brncd'";}else{$brncd1="";}

$af="%".$pnm."%";
if($pnm!=''){$a2=" and (pnm LIKE '$af')";}else{$a2='';}

$pno=rawurldecode($_REQUEST[pno]);

//echo $src;
$ps=rawurldecode($_REQUEST[ps]);
if($ps=="")
{
$ps=10;
}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$cnt=0;

$sl=$start;
$sln=0;

$datatt= mysqli_query($conn,"select * from main_stock where sl>0 and nrtn='Adjustment' $brncd1 $cat1 $prnm1 order by sl")or die(mysqli_error($conn));
$rcntttl=mysqli_num_rows($datatt);
$datar= mysqli_query($conn,"select * from main_stock where sl>0 and nrtn='Adjustment' $cat1 $prnm1 $brncd1  order by sl")or die(mysqli_error($conn));
$rcnt=mysqli_num_rows($datar);
$data= mysqli_query($conn,"select * from main_stock where sl>0 and nrtn='Adjustment' $cat1 $prnm1 $brncd1  order by sl limit $start,$ps ")or die(mysqli_error($conn));
$total=mysqli_num_rows($data);
if($total!=0)
{
?>
<div align="left">
<input type="text" name="ps" id="ps" value="<?=$ps;?>" size="7" onblur="pagnt1(this.value)">
</div>
<table class="table table-hover table-striped table-bordered">
<tr>
<th style="text-align:center;">Sl No</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Branch</th>
<th style="text-align:center;">Category</th>
<th style="text-align:center;">Product Name</th>
<th style="text-align:center;">Stock In</th>
<th style="text-align:center;">Stock Out</th>
<th style="text-align:center;">Rate</th>

<th style="text-align:center;">Action</th>
</tr>
<?
while($row=mysqli_fetch_array($data))
{

	$cnt++;
	$sl++;
	$psl=$row['sl'];
	$dt1=$row['dt']; $dt=date('d-m-Y',strtotime($dt1));
	$cat1=$row['cat'];
	$hsn=$row['hsn'];
	$unit1=$row['unit'];
	$mrp=$row['mrp'];
	$smvlu=$row['smvlu'];
	$mdvlu=$row['mdvlu'];
	$bgvlu=$row['bgvlu'];
	$pcd=$row['pcd'];
	$bcd=$row['bcd'];
	$stin=$row['stin'];
	$stout=$row['stout'];
	$rate=$row['rate'];
	$stk_rate=$row['stk_rate'];
	
	if($stin=="0"){$stin1="";}else{$stin1=$stin;}
	if($stout=="0"){$stout1="";}else{$stout1=$stout;}
	
	$cat="";
	$pnm="";
	$get1=mysqli_query($conn,"select * from main_product where sl='$pcd'") or die(mysqli_error($conn));
	while($row1=mysqli_fetch_array($get1))
	{
	$cat=$row1['cat'];
	$pnm=$row1['pnm'];
	}
	
	
	$cnm="";
	$get2=mysqli_query($conn,"select * from main_catg where sl='$cat'") or die(mysqli_error($conn));
	while($row2=mysqli_fetch_array($get2))
	{
	$cnm=$row2['cnm'];
	}
	
	$bnm1="";
	$get3=mysqli_query($conn,"select * from main_branch where sl='$bcd'") or die(mysqli_error($conn));
	while($row3=mysqli_fetch_array($get3))
	{
	$bnm1=$row3['bnm'];
	}
	
	$unit="sun";
	$get=mysqli_query($conn,"select * from main_unit where cat='$pcd'") or die(mysqli_error($conn));
	while($row=mysqli_fetch_array($get))
	{
	//sun	mun	bun	smvlu	mdvlu	bgvlu	
	$sun=$row['sun'];
	$mun=$row['mun'];
	$bun=$row['bun'];
	$smvlu=$row['smvlu'];
	$mdvlu=$row['mdvlu'];
	$bgvlu=$row['bgvlu'];
	}
	
	if($unit=='sun'){$stock_in=($stin1/$smvlu)." ".$sun;}
	if($unit=='mun'){$stock_in=($stin1/$mdvlu)." ".$mun;}
	if($unit=='bun'){$stock_in=($stin1/$bgvlu)." ".$bun;}
	
	
	
	if($unit=='sun'){$stock_out=($stout1/$smvlu)." ".$sun;}
	if($unit=='mun'){$stock_out=($stout1/$mdvlu)." ".$mun;}
	if($unit=='bun'){$stock_out=($stout1/$bgvlu)." ".$bun;}
	
/*
	$get3=mysqli_query($conn,"select * from main_unit where sl='$psl'") or die(mysqli_error($conn));
	while($row3=mysqli_fetch_array($get3))
	{
		$sun1=$row3['sun'];
		$mun1=$row3['mun'];
		$bun1=$row3['bun'];
		$smvlu1=$row3['smvlu'];
		$mdvlu1=$row3['mdvlu'];
		$bgvlu1=$row3['bgvlu'];
	}
$color="";	
if($mun1!='' and $mdvlu1=='')
{
	$color="red";
}
if($bun1!='' and $bgvlu1=='')
{
	$color="red";
}
*/	
$dsql=mysqli_query($conn,"select * from main_gst where cat='$psl' order by sl")or die(mysqli_error($conn));
while($drow=mysqli_fetch_array($dsql))
{
$gsl=$drow['sl'];
$cgst=$drow['cgst'];
$sgst=$drow['sgst'];
$igst=$drow['igst'];
$fdt=$drow['fdt'];
$tdt=$drow['tdt'];
}
	
?>
<tr bgcolor="<?=$color;?>">
<td style="text-align:center;"><?=$sl;?></td>
<td style="text-align:center;"><?=$dt;?></td>
<td style="text-align:center;"><?=$bnm1;?></td>
<td style="text-align:center;"><?=$cnm;?></td>
<td style="text-align:center;"><?=reformat($pnm);?></td>
<td style="text-align:center;"><?=$stock_in;?></td>
<td style="text-align:center;"><?=$stock_out;?></td>
<td style="text-align:center;">
<b>With GST Rate:</b> <?=$rate;?><br>
<b>Without GST Rate:</b> <?=$stk_rate;?><br>
</td>
<?/*<td style="text-align:left;"><?=$mrp;?></td>
<td style="text-align:center;"><?=$unit;?></td>
<td style="text-align:right;">
Name : <?=$sun1;?><br>
Value : <?=$smvlu1;?><br>
Rate : <?=$smvlu;?>

</td>
<td style="text-align:right;">
Name : <?=$mun1;?><br>
Value : <?=$mdvlu1;?><br>
<?=$mdvlu;?>

</td>
<td style="text-align:right;">
Name : <?=$bun1;?><br>
Value : <?=$bgvlu1;?><br>
<?=$bgvlu;?>
</td>*/?>
<td style="text-align:center;">
<a href="stk_adjust_edt.php?sl=<?=$psl;?>"  title="Click to Update"><i class="fa fa-pencil-square-o"></i></a> 
<?/*
&nbsp;&nbsp;&nbsp;
<a onclick="if(confirm('Are you sure to delete...')){dlt('<?=$psl;?>')}" title="Click to Delete" style="color:red;"><i class="fa fa-trash-o" ></i></a>
*/?>
</td>
</tr>
<?															
}
?>
</table>
<?
$tp=$rcnt/$ps;
if(($rcnt%$ps)>0)
{
    $tp=floor($tp)+1;
}
if($pno==1)
{
    $prev=1;
}
else
{
$prev=$pno-1;    
}
if($pno==$tp)
{
 $next=$tp;   
}
else
{
$next=$pno+1;
}
$flt="";
if($rcnt!=$rcntttl)
{
    $flt="(filtered from ".$rcntttl." total entries)";
}
echo "Showing ".($start+1)." to ".($sl)." of ".$rcnt." entries".$flt;
?>
<div align="center"><input type="text" size="10" id="pgn" name="pgn" value="<? echo $pno;?>"><input Type="button" value="Go" onclick="pagnt1('')"></div>
<div class="pagination pagination-centered">
                            <ul class="pagination pagination-sm inline">
							<li <? if($pno==1){ echo "class=\"disabled\"";}?>><a onclick="pagnt('1')"><i class="icon-circle-arrow-left"></i>First</a></li>
                            <li <? if($pno==1){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $prev;?>')"><i class="icon-circle-arrow-left"></i>Previous</a></li>
                            <?
                            
                            if($tp<=5)
                            {
                              $n=1;  
                              while($n<=$tp)
                              {
                                ?>
                             <li <? if($pno==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   
                                <?
                                $n+=1;
                              }  
                            }
                            else
                            {
                                if($pno<4)
                                {
                                  $n=1;
                                  while($n<=5)
                              {
                                ?>
                             <li <? if($pno==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   
                                <?
                                $n+=1;
                              }     
                                }
                                elseif($pno>$tp-3)
                                {
                                    $n=$tp-5;
                                    while($n<=5)
                              {
                                ?>
                             <li <? if($pno==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   
                                <?
                                $n+=1;
                              }   
                                }
                                else
                                {
                                $n=$pno-2; 
                                 while($n<=$pno+2)
                              {
                                ?>
                             <li <? if($pno==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   
                                <?
                                $n+=1;
                              }     
                                }
                               
                                
                                
                            }
                            ?>
                            <li <? if($pno==$tp){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $next;?>')">Next<i class="icon-circle-arrow-right"></i></a></li>
                            <li <? if($pno==$tp){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $tp;?>')">Last<i class="icon-circle-arrow-right"></i></a></li>
                            </ul>
                            </div>
<?
}
else
{
?>
<table class="table table-hover table-striped table-bordered">
<tr>
<td style="text-align:center;"><font size="4" color="red"><b>No Records Available</b></font></td>
</tr>
</table>
<?
}
?>