<?php
$reqlevel = 3;
include("membersonly.inc.php");
    $id = $_REQUEST['cid'];
	
	$pp=0;
	$result = mysqli_query($conn,"SELECT * from ".$DBprefix."cust where sl='$id'");
          while($row = mysqli_fetch_array($result))
		 {
                $sl=$row['sl'];
                $nm=$row['nm'];
                $addr=$row['addr'];
                $cont=$row['cont'];
                $mail=$row['mail'];
                $typ=$row['typ'];
				 $fst=$row['st'];
			
				$result5 = mysqli_query($conn,"SELECT sum(point)as tpp from main_cust_point where cid='$id' and stat='0'");
          while($row5 = mysqli_fetch_array($result5))
		 {
         $pp=$row5['tpp'];/* END OF ECHO*/	
		 }
		 }
	$T=0;
$t1=0;
$t2=0;
if($fst==NULL or $fst=="")
{
$fstt="1";	
}
else
{
$fstt=$fst;	
}
$data= mysqli_query($conn,"SELECT sum(amm) as t1 FROM main_drcr where dldgr='4' and cid='$id' and brncd='$branch_code'");

		while ($row = mysqli_fetch_array($data))
		{
			$t1 = $row['t1'];
		}

$data1= mysqli_query($conn,"SELECT sum(amm) as t2 FROM main_drcr where cldgr='4' and  cid='$id' and brncd='$branch_code'");
	while ($row1 = mysqli_fetch_array($data1))
		{
			$t2 = $row1['t2'];
		}
		$T=$t1-$t2;			

    echo $typ."@@".$nm."@@".$addr."@@".$cont."@@".$mail."@@".$pp."@@".$T."@@".$sl."@@".$fstt;


    



?>