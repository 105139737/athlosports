<?php 
include "config.php";
$sl=$_REQUEST[sl];
$up="update main_signup set password='123',imei='',devid='',numloginfail='0' where sl='$sl'";
$re=mysqli_query($conn,$up);
?>
<script>
show(); 
</script>

 









 