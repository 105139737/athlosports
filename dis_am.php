<?php
$reqlevel = 1;
include("membersonly.inc.php");
$query1 = "SELECT sum(dis) as gttl FROM ".$DBprefix."ptemp where eby='$user_currently_loged'";
 $result1 = mysqli_query($query1) or die (mysqli_error($conn));
while ($R1 = mysqli_fetch_array ($result1))
{
$gttl=$R1['gttl'];
}
echo $gttl;
?>
