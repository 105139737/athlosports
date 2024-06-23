<?php
$reqlevel = 3;
include("membersonly.inc.php");

$frmnm='';
date_default_timezone_set('Asia/Kolkata');
$dt = date('d-M-Y');

$cy=date('Y');
$all=rawurldecode($_REQUEST[all]);
$al="%".$all."%";
if($all!="")
{
	$all1=" and nm LIKE '$al' or addr LIKE '$al' or cont LIKE '$al' or mail LIKE '$al'";
}
else
{
	$all1="";	
}


$pno=rawurldecode($_REQUEST[pno]);

//echo $src;
$ps=rawurldecode($_REQUEST[ps]);
if($ps=="")
{
$ps=10;
}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;


?>
<div align="left">
<input type="text" name="ps" id="ps" value="<?=$ps;?>" size="7" onblur="pagnt1(this.value)">
</div>

<table class="table table-hover table-striped table-bordered">	
<tr>
<th>Sl</th>
<th>Customer Name</th>
<th>Address</th>
<th>Mobile No.</th>
<th>E-Mail ID</th>
<th>GSTIN</th>
<th>GSTIN Applicable Date</th>
<th>PAN No</th>
<th>State</th>
<th>Action</th>
</tr>
<?
$sl=$start;
$sln=0;
$datatt=mysqli_query($conn,"select * from main_cust where sl>0")or die(mysqli_error($conn));
$rcntttl=mysqli_num_rows($datatt);
$datar=mysqli_query($conn,"select * from main_cust where  sl>0".$all1)or die(mysqli_error($conn));
$rcnt=mysqli_num_rows($datar);
$data=mysqli_query($conn,"select * from main_cust where  sl>0 $all1 order by nm limit $start,$ps ")or die(mysqli_error($conn));
while($row=mysqli_fetch_array($data))
{
	$x=$row['sl'];
	$nm=$row['nm'];
	$addr=$row['addr'];
	$cont=$row['cont'];
	$email=$row['mail'];
	$vat_no=$row['vat_no'];
	$gstin=$row['gstin'];
	$pan=$row['pan'];
	$typ=$row['typ'];
    $gstdt=$row['gstdt'];
    $st=$row['st'];
	
	$sn='';
	$cd='';
	$result = mysqli_query($conn,"SELECT * FROM main_state WHERE sl='$st'") or die(mysqli_error($conn));
	while($row=mysqli_fetch_array($result))
	{
	$sn=$row['sn'];
	$cd=$row['cd'];
    }
  /*
	$ctyp="";
	$p=mysqli_query($conn,"select * from main_cus_typ where sl='$typ'") or die (mysqli_error($conn));
			while($rw2=mysqli_fetch_array($p))
		{
			$ctyp=$rw2['tp'];
		}
	*/

	if($email==""){$email='NA';}
	if($cont==""){$cont='NA';}
	$sln++;   
	$sl++; 
	$sll=base64_encode($x);
	$err="";
if($gstin!='')
{
if(!preg_match("/[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}[Zz1-9A-Ja-j]{1}[0-9a-zA-Z]{1}/", $gstin))
{
$err = "<font color='red'>Invalid GST number</font>";
} 
}
?>
<tr>
<td align="center"><? echo $sln;?></td>
<td align="center"><? echo $nm;?></td>
<td align="center"><? echo $addr;?></td>
<td align="center"><? echo $cont;?></td>
<td align="center"><? echo $email;?></td>
<td align="center"><? echo $gstin;?><br><?=$err;?></td>
<td align="center"><?if($gstdt!='0000-00-00'){echo $gstdt;};?></td>
<td align="center"><? echo $pan;?></td>
<td align="center"><? echo $sn." ".$cd;?></td>
<?
if($user_current_level<0)
{
	?>
	<td align="center" style="cursor:pointer;"><a href="c_update.php?sl=<?=$sll;?>" target="_BLANK"><i class="fa fa-pencil-square-o" title="Click to Update"></i></a></td>
	<?
}
else
{
	?>
	<td align="center">You need to be<br>an admin for <br>this page</td>
	<?
}
?>		
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
							