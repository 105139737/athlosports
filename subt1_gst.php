<?php
$reqlevel = 3;
include("membersonly.inc.php");
$query1 = "SELECT sum(amm) as gttl FROM ".$DBprefix."ptemp where eby='$user_currently_loged'";
$result1 = mysqli_query($conn,$query1);
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['gttl'];
}
?>
<input type="text" name="sttl" id="sttl" class="form-control" value="<?=sprintf('%0.2f', $gttl);?>" style="text-align:right;font-size:14pt;color:red" readonly> 
<script>
cal1();
</script>