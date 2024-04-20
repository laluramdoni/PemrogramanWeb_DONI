<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Jika pengguna belum login, redirect ke halaman login
	header("Location: login.php");
	exit;
}

// Mendapatkan pesan dari session
if (isset($_SESSION["message"])) {
	$message = $_SESSION["message"];
	unset($_SESSION["message"]); // Menghapus pesan dari session agar tidak ditampilkan lagi
} else {
	$message = ""; // Jika tidak ada pesan, mengatur pesan menjadi string kosong
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Myconcert-sell</title>
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
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

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
								<h1>new Penjual</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<div id="fh5co-reservation-form" class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 fh5co-heading animate-box">
						<h2>Add New Penjual</h2>
					</div>

					<div class="col-md-6 col-md-push-6 col-sm-6 col-sm-push-6">
						<h1 class="text-white"><?php echo $message; ?></h1>
						<form action="addPost.php" method="post" id="form-wrap">

							<div class="row form-group">
								<div class="col-md-12">
									<label for="nama_konser">Nama</label>
									<input type="text" name="name" id="nama_konser" class="form-control" placeholder="Masukan Nama ..." required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="kuota">Email</label>
									<input type="email" name="email" id="kuota" class="form-control" placeholder="Masukan Email ..." required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="harga">Password</label>
									<input type="text" name="password" id="harga" class="form-control" placeholder="Masukan Password" required>
								</div>
							</div>

							<div class="form-group">
								<input type="submit" value="Add Penjual" class="btn btn-primary">
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
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					</div>
					<div class="col-md-2 col-md-push-1 fh5co-widget">
						<h4>Links</h4>
						<ul class="fh5co-footer-links">
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Penjual</a></li>
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

	<!-- Date Time -->
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>


	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>