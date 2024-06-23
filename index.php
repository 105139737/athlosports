<?PHP
$reqlevel = 3;
include("membersonly.inc.php");
include "header.php";
?>
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>  
<div class="wrapper row-offcanvas row-offcanvas-left">
	<?
	include "left_bar.php";
	?>
	<aside class="right-side">
		<section class="content-header">
			<h1><?=$comp_nm;?><small>Control panel</small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li class="active"> Dashboard </li>
			</ol>
		</section>

		<section class="col-lg-6 connectedSortable"></section>
	</aside>
<body>

</body>
</html>