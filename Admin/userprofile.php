<?php 
session_start();
require 'fungsiad.php';
$conn = mysqli_connect("localhost", "root", "", "soeltanExpress");


$wkwkw = $_SESSION["ejek"];
$haha = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$wkwkw'");
$maha = mysqli_fetch_assoc($haha);

$pasrah = $maha["no_ktp"];

if (isset($_POST['ganti'])) {
	# code...
	if (ubahus($_POST) > 0){
		echo "
			<script>
				alert('profil berhasil diubah');
								document.location.href = 'userprofile.php';

			</script>
		";
	}
	else{
		echo "
			<script>
				alert('profil gagal diubah');
			</script>
		";
	}
		
	}


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
	<title>SoeltanShop - Admin</title>
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
				<a class="navbar-brand" href="#"><span>Soeltan</span>express</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="avatar">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $maha['username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="userprofile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
			<li><a href="customer.php"><em class="fa fa-users">&nbsp;</em> Customer</a></li>
			<li><a href="miniadmin.php"><em class="fa fa-users">&nbsp;</em> Mini Admin</a></li>
			<li><a href="konten.php"><em class="fa fa-tasks">&nbsp;</em> Kelola Konten</a></li>
			<li><a href="faq.php"><em class="fa fa-list">&nbsp;</em> Kelola FAQ</a></li>
			<li><a href="about.php"><em class="fa fa-tasks">&nbsp;</em> About</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User Profile</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b> User Profile</h1></b>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">Your Profile</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
								<div class="form-group">
									<label>NO KTP</label>
									<input class="hidden" name="no_ktp" value="<?php echo $maha["no_ktp"] ?>">
									<input class="form-control" name="no_ktp" value="<?php echo $maha["no_ktp"] ?>" disabled>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" id="disabledInput" type="text" value="<?php echo $maha["username"] ?>" disabled>
								</div>
								<div class="form-group">
									<label>Passoword</label>
									<input class="form-control" id="disabledInput" type="password" value="<?php echo $maha["password"] ?>" disabled>
								</div>
								<div class="form-group">
									<label>Nama lengkap</label>
									<input class="form-control" id="disabledInput" type="text" value="<?php echo $maha["nama"] ?>" disabled>
								</div>
								<div data-toggle="modal" data-target="#modaledit" class="btn btn-primary">Edit Profile</div>
							</form>
						</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<p class="back-link">SoeltanExpress</p>
				</div>	
			</div><!--/.row-->
		</div>	<!--/.main-->
							<div id="modaledit" class="modal fade" tabindex="-1" role="dialog">
					  			<div class="modal-dialog" role="document">
					    			<div class="modal-content">
					      				<div class="modal-header">
					        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          				<span aria-hidden="true">&times;</span>
					        				</button>
					        				<h4 class="modal-title">Edit Profile</h4>
					      				</div>
					      				<div class="modal-body">
					        				<form class="form-horizontal" action="" method="post">
					        					<div class="modal-body">
						      						<div class="messages"></div>
							      						<div class="form-group">
							      							<label class="col-sm-3 control-label">NO KTP</label>
															<div class="col-sm-9">
																<input class="hidden" name="no_ktp" placeholder="No KTP" value="<?php echo $maha["no_ktp"] ?>">
																<input class="form-control" name="no_ktp" placeholder="No KTP" value="<?php echo $maha["no_ktp"] ?>" disabled>
															</div>
															</div>
														</div>
														<div class="form-group">
															<label label for="username" class="col-sm-3 control-label">Username</label>
															<div class="col-sm-9">
																<input class="form-control" name="username" placeholder="Nama" value="<?php echo $maha["username"] ?>"required>
															</div>
														</div>
													  	<div class="form-group">
															<label label for="username" class="col-sm-3 control-label">Nama</label>
															<div class="col-sm-9">
																<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $maha["nama"] ?>" required>
															</div>
														</div>
														<div class="form-group">
															<label for="username" class="col-sm-3 control-label">Password</label>
															<div class="col-sm-9">
																<input type="password" name="password" class="form-control"placeholder="Password" value="<?php echo $maha["password"] ?>" required>
															</div>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" name="ganti">Update Profil</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
								
	
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