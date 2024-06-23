<?php

/**

 * @author Onnet Solution

 * @copyright 2013

 */



$reqlevel = 3;

include("membersonly.inc.php");

include("Numbers/Words.php");

 

$nm=$_POST['nm'];

$mob=$_POST['mob'];

$email=$_POST['email'];

$addr=$_POST['addr'];

$brncd=$_POST['brncd'];

$userlevel=$_POST['userlevel'];

$sl=$_POST['sl'];

$err="";



date_default_timezone_set('Asia/Kolkata');

$edt=date('Y-m-d');

$dt=date('Y-m-d', strtotime($dt));



   $result = mysqli_query($conn,"Select * from main_signup where name='$nm' and mob='$mob' and brncd='$brncd' and sl!='$sl'");

	$cont=mysqli_num_rows($result);

	if($cont>0)

	{

		$err="User Already Exists...";

	}

	if($err=="")

	{



$query21 = "Update main_signup set name='$nm',brncd='$brncd',mob='$mob',addr='$addr',mailadres='$email',userlevel='$userlevel' where sl='$sl'";

$result21 = mysqli_query($conn,$query21);

$err="Update Sucessfully. Thank You...";

	}

?>

<script language="javascript">

alert('<?=$err;?>');

document.location='user_show.php';

</script>

<?



