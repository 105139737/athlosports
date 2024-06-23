<?php
include("membersonly.inc.php");
$pnog=rawurldecode($_REQUEST[pnog]);
//echo $src;
$ps=rawurldecode($_REQUEST[ps]);
if($ps=="")
{
$ps=10;
}
if($pnog==""){$pnog=1;}
$start=($pnog-1)*$ps;
?>
<div align="left">
<input type="text" name="ps" id="ps" value="<?=$ps;?>" size="7" onblur="pagnt1(this.value)">
</div>
<table width="860px" class="table table-hover table-striped table-bordered">
          <tr >
          <th align="center" width="10%">
          Sl.
          </th>
		  <th align="center" width="25%">
        Primary Account
          </th>
		  <th align="center" width="25%">
         Account Group
          </th>
		  <th align="center" width="25%">
          Ledger Head
          </th>
          <th align="center" width="10%">
          Edit
          </th>
		  </tr>
          <tbody>
		<?
		$f=0;
$sl=$start;
$sln=0;
$data= mysqli_query($conn,"SELECT * FROM main_ledg order by gcd");
$datatt= mysqli_query($conn,"SELECT * FROM main_ledg where sl>'0'")or die(mysqli_error($conn));
$rcntttl=mysqli_num_rows($datatt);
$datar= mysqli_query($conn,"SELECT * FROM main_ledg where sl>'0'")or die(mysqli_error($conn));
$rcnt=mysqli_num_rows($datar);
$data= mysqli_query($conn,"select * from main_ledg where sl>'0' order by gcd limit $start,$ps")or die(mysqli_error($conn));
		while ($row = mysqli_fetch_array($data))
		{
		$sl= $row['sl'];
		$p=$row['gcd'];
		$stat=$row['stat'];
		$nm = $row['nm'];
								$data1= mysqli_query($conn,"SELECT * FROM main_group where sl='$p'");
								while ($row1 = mysqli_fetch_array($data1))
								{
								$p= $row1['nm'];
								$pcd= $row1['pcd'];
								}
								$data2= mysqli_query($conn,"SELECT * FROM main_primary where sl='$pcd'");
								while ($row2 = mysqli_fetch_array($data2))
								{
								$pcd= $row2['nm'];
								}

		$f++;

		if($f%2==0)

		{$cls="odd";

		}

		else

		{$cls="even";

		}

		$dt=date('d-M-Y', strtotime($dt));

		?>

  <tr class="<?echo $cls;?>" style="height: 20px;">

  <td align="left" valign="top"><?echo $f;?></td>

  <td align="left" valign="top"><?echo $pcd;?></td>

    <td align="left" valign="top"><?echo $p;?></td>

    <td align="left" valign="top"><?echo $nm;?></td>

	<td align="center" valign="top">
	<?
	if($stat==1)
	{
	?>
	<a href="acldgr_form_edit.php?sl=<?=$sl;?>"  title="Edit"><img src="images/edit.png" width="20"/></a>
<br/>   <?
    }
    ?>
  </td>
	</td>

	 </tr>

  <?

  }

  ?>

  </tbody>

</table>







<?

$tp=$rcnt/$ps;

if(($rcnt%$ps)>0)

{

    $tp=floor($tp)+1;

}

if($pnog==1)

{

    $prev=1;

}

else

{

$prev=$pnog-1;    

}

if($pnog==$tp)

{

 $next=$tp;   

}

else

{

$next=$pnog+1;

}

$flt="";

if($rcnt!=$rcntttl)

{

    $flt="(filtered from ".$rcntttl." total entries)";

}

echo "<font color=\"#FFF\">Showing ".($start+1)." to ".($sl)." of ".$rcnt." entries".$flt."</font>";

?>

<div align="left"><input type="text" size="10" id="pgn" name="pgn" value="<? echo $pnog;?>"><input Type="button" value="Go" onclick="pagnt1('')"></div>

<div class="pagination pagination-centered">

                            <ul class="pagination pagination-sm inline">

							<li <? if($pnog==1){ echo "class=\"disabled\"";}?>><a onclick="pagnt('1')"><i class="icon-circle-arrow-left"></i>First</a></li>

                            <li <? if($pnog==1){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $prev;?>')"><i class="icon-circle-arrow-left"></i>Previous</a></li>

                            <?

                            

                            if($tp<=5)

                            {

                              $n=1;  

                              while($n<=$tp)

                              {

                                ?>

                             <li <? if($pnog==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   

                                <?

                                $n+=1;

                              }  

                            }

                            else

                            {

                                if($pnog<4)

                                {

                                  $n=1;

                                  while($n<=5)

                              {

                                ?>

                             <li <? if($pnog==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   

                                <?

                                $n+=1;

                              }     

                                }

                                elseif($pnog>$tp-3)

                                {

                                    $n=$tp-5;

                                    while($n<=5)

                              {

                                ?>

                             <li <? if($pnog==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   

                                <?

                                $n+=1;

                              }   

                                }

                                else

                                {

                                $n=$pnog-2; 

                                 while($n<=$pnog+2)

                              {

                                ?>

                             <li <? if($pnog==$n){ echo "class=\"active\"";}?>><a onclick="pagnt('<?echo $n;?>')"><?echo $n;?></a></li>   

                                <?

                                $n+=1;

                              }     

                                }

                               

                                

                                

                            }

                            ?>

                            <li <? if($pnog==$tp){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $next;?>')">Next<i class="icon-circle-arrow-right"></i></a></li>

                            <li <? if($pnog==$tp){ echo "class=\"disabled\"";}?>><a onclick="pagnt('<?echo $tp;?>')">Last<i class="icon-circle-arrow-right"></i></a></li>

                            </ul>

                            </div>