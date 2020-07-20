<?php 
session_start();
require 'fungsiad.php';
$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

$wkwkw = $_SESSION["ejek"];
$haha = mysqli_query($conn, "SELECT * FROM mini_admin WHERE username = '$wkwkw'");
$maha = mysqli_fetch_assoc($haha);

$pasrah = $maha["no_ktp"];

if(!isset($_SESSION["login"])){
	echo "
			<script>
				alert('maaf anda harus login terlebih dahulu');
								document.location.href = 'login.php';
			</script>
		";
	
	
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MiniAdmin - SoeltanExpress</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Soeltan</span>Express</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="avatar">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $maha["username"]; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="userprofile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
			<li><a href="keloladata.php"><em class="fa fa-inbox">&nbsp;</em> Kelola Data Pengiriman</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b> DASHBOARD</h1></b>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">Halaman Utama</div>
					<div class="panel-body">
							<div class="card-group">
							  	<div class="card col-md-6">
							    	<a href="userprofile.php"><img src="images/edit.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar Edit"></a>
							    	<div class="card-body">
								      <h5 class="card-title">User Profile</h5>
								      <p class="card-text">Halaman ini berguna untuk mengedit profil Anda</p>
								    </div>
							  	</div>
							  	<div class="col-md-6">
							  	<div class="card">
							  		<a href="keloladata.php"><img src="images/kirim.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar kirim"></a>
								    <div class="card-body">
								      <h5 class="card-title">Kelola Data Pengiriman</h5>
								      <p class="card-text">Halaman ini berguna untuk update dan pengiriman barang</p>
								    </div>
							  	</div>
							 </div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">SoeltanExpress</p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
		
</body>
</html>