<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Myconcert-Contact</title>
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
								<h1>Get <em>in</em> Touch</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<div id="fh5co-contact" class="fh5co-section animate-box">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Don't be shy, let's chat.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae enim quae vitae cupiditate, sequi quam ea id dolor reiciendis consectetur repudiandae. Rem quam, repellendus veniam ipsa fuga maxime odio? Eaque!</p>
						<p><a href="#" class="btn btn-primary btn-outline">Contact Us</a></p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-push-6 col-sm-6 col-sm-push-6">
						<form action="#" id="form-wrap">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="name">Your Name</label>
									<input type="text" class="form-control" id="name">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Your Email</label>
									<input type="text" class="form-control" id="email">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Your Message</label>
									<textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<input type="submit" class="btn btn-primary btn-outline btn-lg" value="Submit Form">
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

		<footer id="fh5co-footer" role="contentinfo" class="fh5co-section">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-4 fh5co-widget">
						<h4>Myconcert</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente earum dignissimos voluptatum ducimus quibusdam ipsam tempore laboriosam inventore! Omnis, error veniam obcaecati id voluptates facilis sit molestias animi possimus vitae?</p>
					</div>
					<div class="col-md-2 col-md-push-1 fh5co-widget">
						<h4>Links</h4>
						<ul class="fh5co-footer-links">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="tiket.php">Ticket</a></li>
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