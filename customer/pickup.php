<?php 

session_start();


$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

if(!isset($_SESSION["login"])){
	echo "
			<script>
				alert('maaf anda harus login terlebih dahulu');
								document.location.href = 'index.php';
			</script>
		";
	}
	

if(isset($_POST["kirim"])){
	echo "wkwkwk";
	if(tambahpengiriman($_POST) > 0){
		echo "
			<script>
				alert('data berhasil dikirim');
					document.location.href = 'pickup.php';
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

function tambahpengiriman($data){
	global $conn;

	$namap = $data['namapengirim'];
	$alamatp = $data["alamatpengirim"];
	$nomorp = $data["nomorpengirim"];
	$namapn = $data["namapenerima"];
	$alamatpn = $data["alamatpenerima"];
	$nomorpn = $data["nomorpenerima"];
	$note = $data["note"];
	$urutan = 0;
	$hurup = "abcde";
	$hurupp = str_shuffle($hurup);
	$nomer = "12345";
	$nomerr = str_shuffle($nomer);
	$has = $hurupp.$nomerr;


	$query = "INSERT INTO resi VALUES
			('','$has', '$urutan', '$namap', '$alamatp', '$nomorp', '$namapn', '$alamatpn', '$nomorpn', '$note')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}




 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Pick Up Barang</title>
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
		hr#c2{
			height: 10%;
			border: 0;
			box-shadow: 0 10px 10px -10px blue inset;
		}

		hr#c1{
			height: 10%;
			border: 0;
			box-shadow: 0 10px 10px -10px black inset;
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

	
        <hr id="c2">
        <div class="container">

        	<div class="text-center">
        			<img src="img/GPB.png" width="5%">
        			<img src="img/PB.jpg" width="25%">
        		
        	</div>	


        	
        </div>

        <hr id="c2" width="10%">


        <div class="container" style="border-radius: 20px; background-color: #c2c2a3">
        	<br>
        	<form action="" method="post">
        		<div class="form-group row pl-5">
        			<h4>PENGIRIM</h4>
        		</div>
        		<div class="col-sm-2">
        			
        		<hr  >
        		</div>
				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-2 col-form-label font-weight-bold"><h5>Nama </h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="namapengirim" id="nama" placeholder="Nama" required>
					</div>
					<div class="col-sm-1"></div>
				</div>
 
				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-2 col-form-label font-weight-bold"><h5>Alamat </h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="alamatpengirim" id="nama" placeholder="Alamat" required>
					</div>
					<div class="col-sm-1"></div>
				</div>

				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-2 col-form-label font-weight-bold"><h5>No.Telepon </h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nomorpengirim" id="nama" placeholder="No.telpon" pattern="[0-9]{12}" required>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<br>
				<hr>


				<div class="form-group row pl-5">
        			<h4>PENERIMA</h4>
        			<br>
        		</div>
        		<div class="col-sm-2">
        			
        		<hr  >
        		</div>

    			<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-2 col-form-label font-weight-bold"><h5>Nama</h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="namapenerima" id="nama" placeholder="Nama" required>
					</div>
					<div class="col-sm-1"></div>
				</div>

				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="alamat" class="col-sm-2 col-form-label font-weight-bold"><h5>Alamat </h5></label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="alamatpenerima" id="alamat" placeholder="Alamat" required>
				</div>
				<div class="col-sm-1"></div>
				</div>

				<div class="form-group row">
					<div class="col-sm-1"></div>
					<label for="nama" class="col-sm-2 col-form-label font-weight-bold"><h5>No.Telepon </h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nomorpenerima" id="nama" placeholder="No.telpon" pattern="[0-9]{12}" required>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<div class="form-group row">



					<div class="col-sm-1"></div>
					<label for="note" class="col-sm-2 col-form-label font-weight-bold" style="width: 50%"><h5>Note </h5></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="note" id="note" placeholder="Note" required>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<br>

				<div class="form-group text-center" >
					<button type="submit" name="kirim" class="btn btn-secondary">KIRIM</button>
				</div>
				<br>
 
			</form>
        </div>

        <br>
        <br>



	
	<!-- Footer section -->
	<footer class="footer-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-widget about-widget">
						<img src="img/soeltan.png" alt="">
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
					<div class="col-lg-4 order-2 order-lg-1 p-0">
						<div class="copyright">

							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | Developed with <i class="fa fa-heart-o"
								aria-hidden="true"></i>
							<br> by Timkerbel

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