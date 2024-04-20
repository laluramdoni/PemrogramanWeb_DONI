<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Myconcert-About</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="../asset/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../asset/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../asset/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../asset/css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../asset/css/style.css">

	<!-- JS -->
	<script src="../asset/js/modernizr-2.6.2.min.js"></script>


</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<?php
		session_start();
				// Periksa apakah pengguna sudah login atau belum
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
			// Jika pengguna belum login, redirect ke halaman login
			include "layout/menu.php";
		} else {
			include "layout/menuLogin.php";
		}
		?>

		<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url(images/broken_noise.png);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="display-t js-fullheight">
							<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
								<h1>About Myconcert</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-about" class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-pull-4 img-wrap animate-box" data-animate-effect="fadeInLeft">
						<img src="images/458bedfdb79e4bd19dfdd3b766bf04ee.png" alt="">
					</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="section-heading">
							<h2>My Concert</h2>
							<p>Dalam dunia hiburan, terutama pada para pencinta musik kemudahan dalam membeli tiket serta aksesnya amat sangat di perhitungkan. sistem informasi myconcert merupakan pemesanan yang meliputi berbagai layanan yang tentunya membutuhkan tiket, sebagai tanda berhak menggunakan fasilitas terkait. Tiket adalah dokumen yang mengindikasikan telah ada perjanjian antara pemilik dan penyedia layanan. Juga dengan melakukan booking sebelumnya akan memudahkan untuk mempercepat antrean atau tahapan masuk dalam konser.</p>
							<p>Sistem pemesanan tiket konser ini bertujuan untuk memberikan kemudahan membeli tiket konser melalui website sehingga pemesanan tiket konser dapat dilakukan dengan mudah bagi semua pengguna. Sistem ini membantu menghubungkan pembeli dan penjual dalam proses jual beli tiket konser. Penjual dapat dengan mudah mempromosikan konser-konser melalui website ini dan untuk pembeli dapat melakukan pemesanan tiket konser dengan mudah melalui website. Keunggulan utama sistem dari sisi pembeli adalah dapat melakukan pencarian tiket konser dengan menginputkan kata pada kolom pencarian yang ada.</p>
							<!-- <p><a href="#" class="btn btn-primary btn-outline">More</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="fh5co-footer" role="contentinfo" class="fh5co-section">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-4 fh5co-widget">
						<h4>Myconcert</h4>
					</div>
					<div class="col-md-2 col-md-push-1 fh5co-widget">
						<h4>Links</h4>
						<ul class="fh5co-footer-links">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="ticket.php">Ticket</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-md-push-1 fh5co-widget">
						<h4>Categories</h4>
						<ul class="fh5co-footer-links">
							<li><a href="#">Landing Page</a></li>
							<li><a href="#">Partners</a></li>
						</ul>
					</div>

					<div class="col-md-4 col-md-push-1 fh5co-widget">
						<h4>Contact Information</h4>
						<ul class="fh5co-footer-links">
							<li><a href="mailto:info@yoursite.com">info@Myconcert.com</a></li>
						</ul>
					</div>

				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-linkedin2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
						</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
	</div>

	<!-- jQuery -->
	<script src="../asset/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../asset/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../asset/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../asset/js/jquery.waypoints.min.js"></script>
	<!-- Waypoints -->
	<script src="../asset/js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="../asset/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="../asset/js/main.js"></script>

</body>

</html>