<?php
include "config.php";
$sl=$_REQUEST[sl];
$pass=$_REQUEST[pass];
$up="update main_signup set password='$pass' where sl='$sl'";
$re=mysqli_query($conn,$up);
?>

   









