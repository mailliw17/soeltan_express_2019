<?php 
session_start();


$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");
 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>F.A.Q.</title>
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
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />


    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section  -->
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
                    <li class="active"><a href="faq.php">F.A.Q</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>

        </div>
    </header>
    <!-- Header section end  -->

    <!-- Page top section  -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2>F.A.Q</h2>
                    <p> Kumpulan pertanyaan untuk mempermudah customer dalam mendapatkan informasi</p>
                    <!-- <a href="" class="site-btn">Contact us</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Page top section end  -->


    <!-- About section -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-6">
                    <img src="img/about2.jpg" alt="">
                </div> -->
                <div class="col-lg-6">
                    <div class="about-text">
                        <ol>
                            <?php 
                            $faqq = mysqli_query($conn, "SELECT * FROM faq");

                            while($row = mysqli_fetch_assoc($faqq)){
                             ?>
                            <li><?php echo $row['pertanyaan']; ?></li>
                            <p style="text-align: justify;"><?php echo $row['jawaban']; ?></p>
                            <hr width="80%">

                             <?php } ?>
                            
                        </ol>
                        <!-- <p>Dengan armada yang memadai dan SDM yang handal, kita menjamin pengiriman anda tidak akan
                            melebihi waktu yang sudah ditentukan. Kami mementingkan kepuasan pelanggan. Banyak riset
                            yang kami lakukan untuk mencegah terjadinya kemoloran waktu. We serve the best for you</p> -->
                        <!-- <div class="about-sign">
                            <div class="sign">
                                <img src="img/sign.png" alt="">
                            </div>
                            <div class="sign-info">
                                <h5>William</h5>
                                <span>CEO Soeltan Express</span>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- About section end -->

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
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
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
    <!-- Footer section end -->

    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>