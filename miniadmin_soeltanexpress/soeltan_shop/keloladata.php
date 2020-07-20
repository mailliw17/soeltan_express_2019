<?php
require 'fungsiad.php';
session_start();
$miniadmin = query("SELECT * FROM mini_admin");
$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

$wkwkw = $_SESSION["ejek"];
$haha = mysqli_query($conn, "SELECT * FROM mini_admin WHERE username = '$wkwkw'");
$maha = mysqli_fetch_assoc($haha);
$lol = 0;

$pasrah = $maha["no_ktp"];

if(isset($_POST["kirim"])){
	if(tambahpengiriman($_POST) > 0){
		$lol = 1;
		echo "
			<script>
				alert('data berhasil dikirim');

			</script>
			";
	} 
	else {
		echo "
			<script>
				alert('data gagal dikirim');
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
				<a class="navbar-brand" href="#"><span>Soeltan</span>EXPRESS</a>
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
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="userprofile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
			<li class="active"><a href="keloladata.php"><em class="fa fa-inbox">&nbsp;</em> Kelola Data Pengiriman</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Kelola Data Pengiriman</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b> Kelola Data Pengiriman</h1></b>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">Update Resi</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="" method="post">
								<div class="form-group">
									<label>Nomor Resi</label>
									<input class="form-control" name="resi" placeholder="Nomor Resi" required>
									<br>
									<button class="btn btn-primary" name="checkresi">CHECK</button>
								</div>
							</form>
							<form role="form" action="" method="post">
								
							
								<div class="form-group">
									<label>Update Resi</label>
								</div>


								<?php


if (isset($_POST['checkresi'])) {
    $res = $_POST['resi'];
    $resi = mysqli_query($conn, "SELECT * FROM resi WHERE resi='$res'");
    $update = mysqli_query($conn, "SELECT * FROM updateresi");
    $query = mysqli_fetch_assoc($resi); ?>
								<input name="nores" id="disabledInput" value="<?php echo $res; ?>" hidden>
								<div class="form-group">
									<label>No.Resi</label>
									<input class="from-control" name="nores" id="disabledInput" value="<?php echo $res; ?>" disabled>
								</div>
                                  <?php for ($i = 1;
        $i <= $query['urutan'];
        $i++) {
        $row = mysqli_fetch_row($update); if($i<=8) {?>

										<input type="checkbox" name="hobi3" checked="checked"  disabled="disabled"/><?php echo $row[1]; ?>
										<br>


								<?php
							}
    }
    $row = mysqli_fetch_row($update); if($query['urutan']<8) { ?>
									<input type="hidden" name="noktp" value=" <?php echo $res; ?> ">


									<input type="checkbox" name="hoi4" value="wkwkw"/><?php echo $row[1]; ?>


								<?php
							}
}?>



								<div class="form-group">
									<br>
									<button class="btn btn-primary" name="update">UPDATE</button>

									<?php
										if($lol == 1){
											?>
												<?php 
												$pusing = $_POST['namapengirim'];
													$querys = mysqli_query($conn, "SELECT * FROM resi WHERE namapengirim = '$pusing'");
													$tunggu = mysqli_fetch_assoc($querys);
												 ?>
												 <h4>No resi adalah <?php echo $tunggu['resi']; ?></h4>
											<?php
										}
									 ?>
								</div>
								<?php
if (isset($_POST['update'])) {
        $gomenne = $_POST['hoi4'];
        if ($gomenne == 'wkwkw') {
            $ress = $_POST['nores'];
            $updateres = mysqli_query($conn, "SELECT * FROM resi WHERE resi='$ress'");
            $upres = mysqli_fetch_assoc($updateres);
            $sim = $upres['urutan'] + 1;
            $query = "UPDATE resi SET
									urutan = $sim
									WHERE resi='$ress';
									";
            mysqli_query($conn, $query);
            echo "
											<script>
												alert('resi berhasil diupdate');
												</script>
											";
        }
    }
?>
							</form>
						</div>
				</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">Pengiriman Baru</div>
					<div class="panel-body">
						<div class="col-md-6">
							<h2><b>PENGIRIM</h2></b><hr>
							<form role="form" action="" method="post">
								<div class="form-group" >
									<label>Nama</label>
									<input class="form-control" name="namapengirim" placeholder="Nama" required>
								<div class="form-group">
									<label>Alamat</label>
									<input class="form-control" name="alamatpengirim" placeholder="Alamat" required>
								</div>
								<div class="form-group">
									<label>nomor HP</label>
									<input type="text" name="nomorpengirim" class="form-control" placeholder="Nomor HP" pattern="[0-9]{12}" required>
								</div>
								<hr>
								<h3><b>PENERIMA</h3></b><hr>
								<div class="form-group">
									<label>Nama</label>
									<input class="form-control" name="namapenerima" placeholder="Nama" required>
								<div class="form-group">
									<label>Alamat</label>
									<input class="form-control" name="alamatpenerima" placeholder="Alamat" required>
								</div>
								<div class="form-group">
									<label>nomor HP</label>
									<input type="text" name="nomorpenerima"  class="form-control" placeholder="Nomor HP" pattern="[0-9]{12}" required>
								</div>
								<div class="form-group">
									<label>Note</label>
									<textarea class="form-control" name="note" rows="5"></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" name="kirim">KIRIM</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div>
	</div>

		</div>
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