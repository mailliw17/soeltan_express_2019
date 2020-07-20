<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

if(isset($_POST['wkwk'])){

	$berat = $_POST['berat'];
	$tinggi = $_POST['tinggi'];
	$panjang = $_POST['panjang'];
	$lebar = $_POST['lebar'];

		$har = 1;
	
	if(($panjang>300 && $panjang<=400) || ($tinggi>300 && $tinggi<=400) || ($lebar>300 && $lebar<=400)){
		$har = 1.5;
	}
	elseif(($panjang>400 && $panjang<=500) || ($tinggi>400 && $tinggi<=500) || ($lebar>400 && $lebar<=500)){
		$har = 2;
	}
	else {
		$har = 2.5;
	}

	$jarasal = $_POST["noa"];
	$jartujuan = $_POST["not"];

	if($jarasal-$jartujuan>0){
		$jarak = $jarasal-$jartujuan;
	}
	else {
		$jarak = $jartujuan-$jarasal;
	}
	$hargaeks = $jarak*$har*15000*$berat;
	$hargareg = $jarak*$har*12000*$berat;
	$hargaeko = $jarak*$har*8000*$berat;
	$hargacar = $jarak*$har*12000*$berat;

}

 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Cek Harga</title>
	<meta charset="UTF-8">
	<meta name="description" content="Industry.INC HTML Template">
	<meta name="keywords" content="industry, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap"
		rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />


	<!-- [if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif] -->

	<style>
		hr#c1{
			height: 10%;
			border: 0;
			box-shadow: 0 10px 10px -10px blue inset;
		}

		
	</style>

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section  -->
	<header class="header-section clearfix">
		<div class="header-top">
			<div class="container-fluid">
				<div class="row">
					<!-- <div class="col-md-6">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="col-md-6 text-md-right">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div> -->
				</div>
			</div>
		</div>
		<div class="site-navbar">
			<!-- Logo -->
			<a href="index.php" class="site-logo">
				<img src="img/soeltan.png" alt="" width="20%">
			</a>
			<div class="header-right">
				<?php if(!isset($_SESSION['login'])) {?>
				  <a href="login/login.php" class="btn btn-primary">Login</a> 
				  <a href="login/regis.php" class="btn btn-primary mr-3">Registrasi</a>
				  <?php } ?>
				  <?php if(isset($_SESSION["login"])) {?>
				  <a href="login/logout.php" class="btn btn-primary">Logout</a> 
				<?php } ?>
				<div class="header-info-box">
					<div class="hib-icon">
						<img src="img/icons/phone.png" alt="" class="">
					</div>
					<div class="hib-text">
						<h6>08823654265</h6>
						<p>customercare@mail.com</p>
					</div>
				</div>
				<div class="header-info-box">
					<div class="hib-icon">
						<img src="img/icons/map-marker.png" alt="" class="">
					</div>
					<div class="hib-text">
						<h6>Timoho Timur 2 no.10</h6>
						<p>Semarang, Indonesia</p>
					</div>
				</div>
				<!-- <button class="search-switch"><i class="fa fa-search"></i></button> -->
			</div>
			<!-- Menu -->
			<nav class="site-nav-menu">
				<ul>
					<li><a href="index.php">Halaman Utama</a></li>
					<li><a href="BarangSay.php">Barang saya</a> </li>
					<li><a href="faq.php">F.A.Q</a></li>
					<li><a href="about.php">About</a></li>
				</ul>
			</nav>

		</div>
	</header>
	<!-- Header section end  -->

	
        <hr id="c1">
        <div class="container">

        	<div class="text-center">
        			<img src="img/GCH.png" width="5%">
        			<img src="img/CH.jpg" width="25%">
        		
        	</div>	


        	
        </div>

        <hr id="c1" width="10%">
        <div class="container" style="border-radius: 20px; background-color: #66a3ff">
        	<br>
        	<form>
        		<div class="form-group pl-3 text-center">
        			<h3>Silakan Cek Harga :)</h3>
        			<br>
        		</div>
        	</form>
        </div>

        <div class="container" style="border-radius: 20px; background-color: #c2c2a3">
        	<br>
        	<form action="" method="post">
				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-1 col-form-label font-weight-bold"><h5>Asal </h5></label>
					<div class="col-sm-9">
						<select class="form-control" name="noa" required> 
							<?php $kot = mysqli_query($conn,"SELECT * FROM jarak_kota");
										     foreach ($kot as $haha) :
										      		?>
											      	<option value="<?php echo $haha["jarak"]; ?>"><?php echo $haha["kota"] ?></option>
											      <?php  endforeach; ?>
						</select>
					</div>
					<div class="col-sm-1"></div>
				</div>
 				<hr>
				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-1 col-form-label font-weight-bold"><h5>tujuan </h5></label>
					<div class="col-sm-9">
						<select class="form-control" name="not" required>
							<?php $kot = mysqli_query($conn,"SELECT * FROM jarak_kota");
										     foreach ($kot as $haha) :
										      		?>
											      	<option value="<?php echo $haha["jarak"]; ?>"><?php echo $haha["kota"] ?></option>
											      <?php  endforeach; ?>
						</select>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<hr>
    			<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-1 col-form-label font-weight-bold"><h5>Berat</h5></label>
					<div class="col-sm-2">
						<input type="text" name="berat" class="form-control" id="nama" placeholder="Berat" required>
					</div>
					<div class="col-sm-1 pt-3">
						<h5>Kg</h5>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<hr>

				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="alamat" class="col-sm-1 col-form-label font-weight-bold"><h5>Dimensi </h5></label>
					<div class="col-sm-2">
						<input type="text" name="panjang" class="form-control" id="nama" placeholder="Panjang" required>
					</div>
					<div class="col-sm-1 pt-3">
						<h5>cm</h5>
					</div>
					<div class="col-sm-2">
						<input type="text" name="lebar" class="form-control" id="nama" placeholder="Lebar" required>
					</div>
					<div class="col-sm-1 pt-3">
						<h5>cm</h5>
					</div>
					<div class="col-sm-2">
						<input type="text" name="tinggi" class="form-control" id="nama" placeholder="Tinggi" required>
					</div>
					<div class="col-sm-1 pt-3">
						<h5>cm</h5>
					</div>
				<div class="col-sm-1"></div>
				</div>
				<hr>
				<br>

				<div class="form-group text-center" >
					<input type="submit" name="wkwk" class="btn btn-secondary" value="Hitung" class="tombol" data-target="#modalwkwk" data-toggle="modal" style="width: 10%">	
				</div>
				<br>
 
			</form>
        </div>
        <br>

        <br>

        <?php 
        	if(isset($_POST['wkwk'])){

        		$quer = mysqli_query($conn, "SELECT * FROM jarak_kota where jarak=$jarasal");
        		$as = mysqli_fetch_assoc($quer);
        		$quer = mysqli_query($conn, "SELECT * FROM jarak_kota where jarak=$jartujuan");
        		$tuj = mysqli_fetch_assoc($quer);
         ?>

         <hr id="c1" width="60%">

         <div class="fluid-container row">
         	<div class="col-sm-2"></div>
         	<div class="col-sm-2">Tujuan : <?php echo $as["kota"]; ?></div>
         	<div class="col-sm-2">Asal : <?php echo $tuj["kota"]; ?></div>
         	<div class="col-sm-2">Berat : <?php echo $berat ?> kg</div>
         	<div class="col-sm-3">Dimensi : (<?php echo $panjang ?>,<?php echo $lebar ?>,<?php echo $tinggi ?>) cm</div>
         </div>

         <br>
         <hr>


         <div class="fluid-container row">
         	
        <div class="col-sm-4"></div>
        <div class="col-sm-6">
        	
          	<form>
          		<div class="form-group row">
          			<div class="col-sm-1">
          				NO
          			</div>
          			<div class="col-sm-5">
          				<div class="bold">Paket</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="bold">Harga</div>
          			</div>
          		</div>
          		<hr>
          		<div class="form-group row">
          			<div class="col-sm-1">
          				1.
          			</div>
          			<div class="col-sm-5">
          				<div class="bold">Ekspress</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="bold">Rp.<?php echo $hargaeks ?></div>
          			</div>
          		</div>
          		<hr>
          		<div class="form-group row">
          			<div class="col-sm-1">
          				2.
          			</div>
          			<div class="col-sm-5">
          				<div class="bold">Regular</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="bold">Rp.<?php echo $hargareg ?></div>
          			</div>
          		</div>
          		<hr>
          		<div class="form-group row">
          			<div class="col-sm-1">
          				3.
          			</div>
          			<div class="col-sm-5">
          				<div class="bold">Ekonomy</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="bold">Rp.<?php echo $hargaeko ?></div>
          			</div>
          		</div>
          		<hr>
          		<?php if($berat >=10 ){ ?>
          		<div class="form-group row">
          			<div class="col-sm-1">
          				4.
          			</div>
          			<div class="col-sm-5">
          				<div class="bold">Cargo</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="bold">Rp.<?php echo $hargacar ?></div>
          			</div>
          		</div>
          		<hr>
          	<?php } ?>
          	</form>
        </div>
         </div>

    <?php 
    	}
     ?>
<br>

	
	<!-- Footer section -->
	<footer class="footer-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-widget about-widget">
						<img src="img/soeltan.png" alt="" style="border-radius: 20px">
						<p style="text-align: justify;">Perusahaan yang telah berdiri sejak tahun 2019. Didirikan di Semarang oleh sekumpulan anak
							kreatif yang ingin mengkoneksikan E-commerce dengan expedisi pengiriman secara langsung </p>
						<div class="footer-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">Produk & Layanan</h2>
						<ul>
							<li><a href="#">Express</a></li>
							<li><a href="#">Reguler</a></li>
							<li><a href="#">Cargo</a></li>
							<li><a href="#">Economy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget">
						<h2 class="fw-title">Mitra E-commerce</h2>
						<ul>
							<li><a href="https://www.tokopedia.com/">Tokopedia</a></li>
							<li><a href="https://www.bukalapak.com/">Bukalapak</a></li>
							<li><a href="https://www.shoope.co.id/">Shoope</a></li>
							<li><a href="https://www.blibli.com/">Blibli</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-7">
					<div class="footer-widget">
						<h2 class="fw-title">Contact Us</h2>
						<div class="footer-info-box">
							<div class="fib-icon">
								<img src="img/icons/map-marker.png" alt="" class="">
							</div>
							<div class="fib-text">
								<p>Timoho Timur 2 no.10<br>Semarang, Indonesia</p>
							</div>
						</div>
						<div class="footer-info-box">
							<div class="fib-icon">
								<img src="img/icons/phone.png" alt="" class="">
							</div>
							<div class="fib-text">
								<p>08823654265<br>customercare@mail.com</p>
							</div>
						</div>
						<!-- <form class="footer-search">
							<input type="text" placeholder="Search">
							<button><i class="fa fa-search"></i></button>
						</form> -->
					</div>
				</div>
			</div>
		</div>
		<div class="footer-buttom">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 order-2 order-lg-2 p-5">
						<div class="copyright">

							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | Developed with <i class="fa fa-heart-o"
								aria-hidden="true"></i> by Timkerbel

						</div>
					</div>
					<!-- <div class="col-lg-7 order-1 order-lg-2 p-0">
						<ul class="footer-menu">
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="about.html">About us</a></li>
							<li><a href="solutions.html">Solutions</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</footer>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>