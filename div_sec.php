<?
$reqlevel = 3;
include("membersonly.inc.php");
$query100 = "SELECT * FROM ".$DBprefix."slt where eby='$user_currently_loged' order by sl";
$result100 = mysqli_query($conn,$query100);
while ($R100 = mysqli_fetch_array ($result100))
{
$fst=$R100['sec'];	
}
$fst1="";
if($fst!=""){$fst1=" and sl='$fst'";}
?>
<select id="sec" name="sec" class="form-control" onchange="get_catg()" required> 
<?
$appfor=mysqli_query($conn,"SELECT * from main_sec where sl>0 $fst1 order by nm") or die(mysqli_error($conn));
while($row=mysqli_fetch_array($appfor))
{

?>
<option value="<?=$row['sl'];?>"><?=$row['nm'];?> (<?=$row['als'];?>)</option>
<?
}
?>
</select>
