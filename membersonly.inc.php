<?PHP
// get the cookievars if they exist
//$rememberCookieUname = $_COOKIE["rememberCookieUname"];
//$rememberCookiePassword = $_COOKIE["rememberCookiePassword"];

// the security header which should be included in al memberpaga's
// first we include the configuration file which contains the database data
// also it will connect to the database.
include("config.php");
// tell we want to work with sessions
session_start();
$last_login=$_SESSION[lastlog];
// the $HTTP_SESSION_VARS[id] in this query indicates that we want to retrieve the username from the session.
$query = "Select * from ".$DBprefix."signup where username='".$_SESSION[id]."' And password = '".$_SESSION[pass]."'";
$result = mysqli_query($conn,$query); 

// if there are results check it the accesslevel is high enough. If there aren't results tell the user to log-in and stop (die) after that.
if ($row = mysqli_fetch_array($result)){ 
	// set the current level into a variable for use on a page.
	$user_current_level = $row["userlevel"];
	$user_nm = $row["name"];
	// check if the user's access level is higher than zero. since if it is lower than zero he is an admin which have access to al pages.
	// and check if the user's level is high enough for this page.
	if ($reqlevel == 0 && $row["userlevel"] > 0){
		die("You need to be an admin for this page");
	}else{
		if ($row["userlevel"] < $reqlevel && $row["userlevel"] > 0){
			// it seems that the user's access level isn't high enough. Therefore 'die' (stop processing the page) with that message that the access level isn't high enough.
			die("Your acces level is not high enough for this page, <BR> Your access level: $row[userlevel] <BR>Level required: $reqlevel");
		}
	}

}else{
	// if there are no results, check for an cookie
	if ($rememberCookiePassword != "" && $rememberCookieUname != ""){
		// validate the cookie
		$query = "Select * from ".$DBprefix."signup where username='".$rememberCookieUname."'";
		$result = mysqli_query($conn,$query); 
		// if there are results check it the accesslevel is high enough. If there aren't results tell the user to log-in and stop (die) after that.
		if ($row = mysqli_fetch_array($result)){ 
			// check the password
			if (md5($row["password"]) == $rememberCookiePassword){
				// if the user has a valid cookie, set the session vars:
					// remove al the data from the session (auto logoff)
					session_unset();
					// remove the session itself
					session_destroy();
					// put the password in the session
					 session_register("pass");
					$_SESSION["pass"] = $rememberCookiePassword;
					// put the username in the session
					 session_register("id");
					$_SESSION_VARS["id"] =  $rememberCookieUname;
				//set the current level into a variable for use on a page.
				$user_current_level = $row["userlevel"];
				$user_nm = $row["name"];
				//check if the user's access level is higher than zero. since if it is lower than zero he is an admin which have access to al pages.
				//and check if the user's level is high enough for this page.
				if ($reqlevel == 0 && $row["userlevel"] > 0){
					die("You need to be an admin for this page");
				}else{
					if ($row["userlevel"] < $reqlevel && $row["userlevel"] > 0){
						//it seems that the user's access level isn't high enough. Therefore 'die' (stop processing the page) with that message that the access level isn't high enough.
						die("Your acces level is not high enough for this page, <BR> Your access level: $row[userlevel] <BR>Level required: $reqlevel");
					}
				}
			}else{die(include("login.php"));}
		}else{die(include("login.php"));}		
	}else{die(include("login.php"));}
}
// Below we set al variables which can be used in pages, things like the current logged user and his or hers level

// This will set the user_currently_loged variable
// first we remove the htmlcode from the username saved in a cookie
$user_currently_loged = htmlspecialchars($_SESSION["id"],ENT_NOQUOTES);
// Then we replace \" with "
$user_currently_loged = str_replace ('\"', "&quot;", $user_currently_loged);
$user_currently_loged = str_replace ("\'", "&#039", $user_currently_loged);
// and a variable where u get the plain username (only use for scripting!)
$user_currently_loged_plain = $_SESSION["id"];

if ($user_current_level < 0){
	$user_current_Rank = "ADMIN";}
else{
	$user_current_Rank = $ranks[$user_current_level];
}
$branch_code=$row["brncd"];
$mob_user=$row["mob"];
$staff_name=$row["name"];
// check if there are unread messages
function get_branch_name($current_branch_code){
    
 $query1111 = "SELECT * FROM main_branch where sl='$current_branch_code'";
   $result1111 = mysqli_query($conn,$query1111);
while($rw1111=mysqli_fetch_array($result1111))
{
    $current_branch_name=$rw1111['bnm'];

}  
return $current_branch_name; 
}
$query1="Select * from main_cnm ";		 
 $result1 = mysqli_query($conn,$query1);
while ($R = mysqli_fetch_array ($result1))
{
$comp_nm=$R['cnm'];
$comp_addr=$R['addr'];
$cont=$R['cont'];
$gstin=$R['gstin'];
$branch1=$R['branch1'];
$branch2=$R['branch2'];
$ifsc1=$R['ifsc1'];
$ifsc2=$R['ifsc2'];
$ac1=$R['ac1'];
$ac2=$R['ac2'];
$acnm1=$R['acnm1'];
$acnm2=$R['acnm2'];
}
date_default_timezone_set("Asia/Kolkata");

function date_chk($dt)
{
$dt=date("Y-m-d", strtotime($dt));	
$query1="Select * from main_ssn where '$dt' between fdt and tdt ";		 
$result1 = mysqli_query($conn,$query1);
$countt=mysqli_num_rows($result1);
 
return $countt;
}

function avg_rate($pcd)
{
$query4="Select ((sum((main_stock.stin+main_stock.opst)*stk_rate))/sum(main_stock.stin+main_stock.opst)) as stk_rate,((sum((main_stock.stin+main_stock.opst)*rate))/sum(main_stock.stin+main_stock.opst)) as rate from main_stock where pcd='$pcd' and main_stock.stin+main_stock.opst>0  ";
$result4 = mysqli_query($conn,$query4);
while ($R4 = mysqli_fetch_array ($result4))
{
$stk_rate=round($R4['stk_rate'],2);
$rate=round($R4['rate'],2);
}
return $stk_rate."@@".$rate;	
}


?>