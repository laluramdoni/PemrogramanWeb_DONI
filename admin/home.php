<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Jika pengguna belum login, redirect ke halaman login
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Myconcert-Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<?php 
	include "menu.php";
	?>

	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url(images/broken_noise.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<h1>Music is My Life</h1>
							<h2></h2>
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
					<img src="images/WhatsApp Image 2023-05-16 at 11.08.38.jpg"">
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					<div class="section-heading">
						<h2>My concert</h2>
						<p>Dalam dunia hiburan, terutama pada para pencinta musik kemudahan dalam membeli tiket serta aksesnya amat sangat di perhitungkan. sistem informasi myconcert merupakan pemesanan yang meliputi berbagai layanan yang tentunya membutuhkan tiket, sebagai tanda berhak menggunakan fasilitas terkait.</p>
						<p>Tiket adalah dokumen yang mengindikasikan telah ada perjanjian antara pemilik dan penyedia layanan. Juga dengan melakukan booking sebelumnya akan memudahkan untuk mempercepat antrean atau tahapan masuk dalam konser.</p>
						<p><a href="about.php" class="btn btn-primary btn-outline">More</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-featured-menu" class="fh5co-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 fh5co-heading animate-box">
					<h2>Coming</h2>
					<div class="row">
						<div class="col-md-6">
							<p>Meriahkan malam konsermu dengan kerabat ataupun keluarga bersama  musisi favoritmu</p>
						</div>
					</div>
				</div>
				
				<!-- read tabel musisi -->
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap animate-box">
					<div class="fh5co-item">
						<img src="images/cp.jpg" class="img-responsive" alt="">
						<h3>Coldplay</h3>
						<p>Coldplay adalah band rock Inggris yang dibentuk di London pada tahun 1997. Mereka terdiri dari vokalis dan pianis Chris Martin, gitaris Jonny Buckland, bassis Guy Berryman, drummer Will Champion dan direktur kreatif Phil Harvey.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap animate-box">
					<div class="fh5co-item margin_top">
						<img src="images/charlie-puth.jpg" class="img-responsive" alt="">
						<h3>Charlie Puth</h3>
						<p>Charles Otto Puth Jr.( lahir 2 Desember 1991)adalah penyanyi dan penulis lagu Amerika. Paparan awalnya datang melalui kesuksesan viral dari video lagunya yang diunggah ke YouTube. Puth menandatangani kontrak dengan label rekaman eleveneleven pada tahun 2011 setelah tampil di The Ellen DeGeneres Show, sambil menulis lagu dan memproduksi materi untuk artis lain.</p>
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
					<p>Sistem pemesanan tiket konser ini bertujuan untuk memberikan kemudahan membeli tiket konser melalui website sehingga pemesanan  tiket konser dapat dilakukan dengan mudah bagi semua pengguna.</p>
				</div>
				<div class="col-md-2 col-md-push-1 fh5co-widget">
					<h4>Links</h4>
					<ul class="fh5co-footer-links">
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
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
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>


	</body>
</html>

