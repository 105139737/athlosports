<?php

/**

 * @author Onnet Solution 

 * @copyright 2013

 */



$reqlevel = 3;

include("membersonly.inc.php");

include("Numbers/Words.php");



$username=$_POST['username'];

$nm=$_POST['nm'];

$mob=$_POST['mob'];

$email=$_POST['email'];

$addr=$_POST['addr'];

$brncd=$_POST['brncd'];

$userlevel=$_POST['userlevel'];

$err="";



date_default_timezone_set('Asia/Kolkata');

$edt=date('Y-m-d');

$dt=date('Y-m-d', strtotime($dt));



   $result = mysqli_query($conn,"Select * from main_signup where username='$username'");

	$cont=mysqli_num_rows($result);

	if($cont>0)

	{

		$err="User Already Exists...";

	}

		
	

if($err=="")
{
$password = 123;
$query21 = "INSERT INTO main_signup (username,password,name,brncd,mob,addr,mailadres,userlevel) VALUES ('$username','$password','$nm','$brncd','$mob','$addr','$email','$userlevel')";
$result21 = mysqli_query($conn,$query21);
$err="Submit Sucessfully. Thank You...";
 }

?>

<script language="javascript">

alert('<?=$err;?>');

document.location='user.php';

</script>

<?



