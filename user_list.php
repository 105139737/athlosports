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
	$all1=" and username LIKE '$al' or name LIKE '$al' or addr LIKE '$al' or mailadres LIKE '$al'";
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
  <table  class="table table-hover table-striped table-bordered"  >
		
		     <tr>
			  <th >Action</font></th>
			  <th >Sl</font></th>
			  <th >Branch</font></th>
			  <th >Designation</font></th>
            <th >User Name</font></th>
	    <th >Password</font></th>
		<th >Name</font></th>
		<th >Address</font></th>
		<th >Mobile</font></th>
		<th >IMEI</font></th>
		<th >E-Mail</font></th>
		<th >Status</font></th>
		<th >Action</font></th>
		</tr>
<?

$sl=$start;
$sln=0;
$datatt= mysqli_query($conn,"select * from main_signup where sl>0 ")or die(mysqli_error($conn));
$rcntttl=mysqli_num_rows($datatt);
$datar= mysqli_query($conn,"select * from main_signup where  sl>0".$all1)or die(mysqli_error($conn));
$rcnt=mysqli_num_rows($datar);
 $data= mysqli_query($conn,"select * from main_signup where  sl>0 $all1 and username!='onsadmin' order by username limit $start,$ps ")or die(mysqli_error($conn));
 
while ($row = mysqli_fetch_array($data))
{
	$x=$row['sl'];
$username=$row['username'];
$password=$row['password'];
$name=$row['name'];
$brncd=$row['brncd'];
$mob=$row['mob'];
$imei=$row['imei'];
$addr=$row['addr'];
$mailadres=$row['mailadres'];
$actnum=$row['actnum'];
$userlevel=$row['userlevel'];


$data1= mysqli_query($conn,"select * from main_branch where sl='$brncd'")or die(mysqli_error($conn));
while ($row1 = mysqli_fetch_array($data1))
{
$bnm=$row1['bnm'];
}

$sln++;
         
  $sl++; 
  $deg="";
$query4 = "SELECT * FROM main_deg where lvl='$userlevel'";
   $result4 = mysqli_query($conn,$query4);
   while($row1=mysqli_fetch_array($result4))
   {
	  $deg=$row1['deg']; 
   }
   if($actnum==1)
   {
	   $stat="<input type=\"button\" class=\"btn btn-block btn-danger btn-xs\" value=\"Deactivate\" onclick=\"act('".$x."','0')\" name=\"B2\">";
   }
   else
   {
	    $stat="<input type=\"button\" value=\"Active\" class=\"btn btn-block btn-success btn-xs\" onclick=\"act('".$x."','1')\" name=\"B1\">";
   }
	
			 ?>
		   <tr  >
		  
		   <td  align="center" style="cursor:pointer" onclick="edit('<?=$x;?>')" >
			<i class="fa fa-pencil-square-o"></i>
			</td>
		
      	    <td align="center"><? echo $sln;?></td>
            <td align="center"><? echo $bnm;?></td>
            <td align="center"><? echo $deg;?></td>
			<td align="center"><? echo $username;?></td>
			<td align="center"><input type="text" name="pass<?=$x?>" id="pass<?=$x?>" onblur="chngpass(this.value,'<?=$x?>')" value="<?echo $password;?>"></td>
			<td align="center"><? echo $name;?></td>
			<td align="center"><? echo $addr;?></td>
			<td align="center"><? echo $mob;?></td>
			<td align="center"><? echo $imei;?></td>
			<td align="center"><? echo $mailadres;?></td>
			<td align="center"><? echo $stat;?></td>
			<td align="center">
			<input type="button" value="Reset" class="btn btn-block btn-primary btn-xs" onclick="if(confirm('Are you sure to reset.....')){rst('<?php echo $x;?>')}">
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
							