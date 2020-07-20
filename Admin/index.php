<?php 
session_start();
require 'fungsiad.php';
$conn = mysqli_connect("localhost", "root", "", "soeltanExpress");


$wkwkw = $_SESSION["ejek"];
$haha = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$wkwkw'");
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
	<title>Admin - SoeltanExpress</title>
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
				<div class="profile-usertitle-name"><?php 	echo $maha["username"]; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="userprofile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
			<li><a href="customer.php"><em class="fa fa-users">&nbsp;</em> Customer</a></li>
			<li><a href="miniadmin.php"><em class="fa fa-users">&nbsp;</em> Mini Admin</a></li>
			<li><a href="konten.php"><em class="fa fa-tasks">&nbsp;</em> Kelola Konten</a></li>
			<li><a href="faq.php"><em class="fa fa-list">&nbsp;</em> Kelola FAQ</a></li>
			<li><a href="about.php"><em class="fa fa-tasks">&nbsp;</em> About</a></li>
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
							  	<div class="card col-md-4">
							    	<a href="userprofile.php"><img src="images/edit.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar Edit"></a>
							    	<div class="card-body">
								      <h5 class="card-title">User Profile</h5>
								      <p class="card-text">Halaman ini berguna untuk melihat profile sendiri dan edit profile</p>
								    </div>
							  	</div>
							 <div class="col-md-4">
							  	<div class="card">
							  		<a href="customer.php"><img src="images/customer.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar customer"></a>
								    <div class="card-body">
								      <h5 class="card-title">Customer</h5>
								      <p class="card-text">Halaman ini berguna untuk edit data customer</p>
								    </div>
							  	</div>
							 </div>
							 <div class="col-md-4">
							  	<div class="card">
							  		<a href="miniadmin.php"><img src="images/miniadmin.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar miniadmin"></a>
								    <div class="card-body">
								      <h5 class="card-title">MiniAdmin</h5>
								      <p class="card-text">Halaman ini berguna untuk edit dan tambah miniadmin</p>
								    </div>
							  	</div>
							 </div>
							<div class="card-group">
							 <div class="col-md-4">
							  	<div class="card">
							  		<a href="konten.php"><img src="images/kirim.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar konten"></a>
								    <div class="card-body">
								      <h5 class="card-title">Kelola Konten</h5>
								      <p class="card-text">Halaman ini berguna untuk mengelola konten</p>
								    </div>
							  	</div>
							 </div>
							 <div class="col-md-4">
							  	<div class="card">
							  		<a href="faq.php"><img src="images/faq.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar faq"></a>
								    <div class="card-body">
								      <h5 class="card-title">Kelola FAQ</h5>
								      <p class="card-text">Halaman ini berguna untuk mengelola faq</p>
								    </div>
							  	</div>
							 </div>
							 <div class="col-md-4">
							  	<div class="card">
							  		<a href="about.php"><img src="images/about.png" width="200" height="200" class="card-img-top img-circle" alt="Gambar about"></a>
								    <div class="card-body">
								      <h5 class="card-title">About</h5>
								      <p class="card-text">Halaman ini berguna untuk mengelola about</p>
								    </div>
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