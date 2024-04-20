<?php
session_start();
require_once "../koneksi.php";
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
	<title>Myconcert-Ticket</title>
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
								<h1> Enjoy the music </h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<!-- read tabel tiket -->
		<div id="fh5co-featured-menu" class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 fh5co-heading animate-box">
						<h2>Upcoming concert</h2>
						<h1 class="text-white"><?php echo $message; ?></h1>
						<p><a href="add.php" class="btn btn-primary btn-outline">Add</a> 
						</p>

						<!-- <div class="row">
						<div class="col-md-6">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ab debitis sit itaque totam, a maiores nihil, nulla magnam porro minima officiis! Doloribus aliquam voluptates corporis et tempora consequuntur ipsam, itaque, nesciunt similique commodi omnis. Ad magni perspiciatis, voluptatum repellat.</p>
						</div>
					</div> -->
					</div>

					<?php


					// Query untuk mengambil data konser
					$sql = "SELECT * FROM konser";
					$result = mysqli_query($conn, $sql);

					// Menampilkan data konser
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">';
							echo '    <div class="fh5co-item animate-box">';
							echo '        <img src="../gambar/' . $row['gambar'] . '" class="img-responsive" alt="">';
							echo '        <h3>' . $row['nama_konser'] . '</h3>';
							// echo '        <span class="fh5co-price">Rp.' . $row['harga'] . '<sup>.00</sup></span>';
							echo '<span class="fh5co-price">Rp.' . number_format($row['harga'], 0, ',', '.') . '</span>';
							echo '        <p>' . $row['keterangan'] . '</p>';
							echo '    </div>';
							echo '    <div class="col-md-12">';
							echo '        <p><a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary btn-outline">Edit</a>
							<a href="delete.php?id=' . $row['id'] . '" class="btn btn-primary btn-outline">Delete</a></p>';
							echo '    </div>';
							echo '</div>';
						}
					} else {
						echo "Tidak ada data konser.";
					}

					// Menutup koneksi ke database
					mysqli_close($conn);
					?>

					<!-- <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item animate-box">
						<img src="images/cp.jpg" class="img-responsive" alt="">
						<h3>Coldplay</h3>
						<span class="fh5co-price">Rp.???<sup>.00</sup></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.</p>
					</div>
					<div class="col-md-12">
						<p><a href="edit.php" class="btn btn-primary btn-outline">Edit</a></p>
					</div>
				</div> -->
					<!-- <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item animate-box">
						<img src="images/raisa.jpg" class="img-responsive" alt="">
						<h3>Raisa</h3>
						<span class="fh5co-price">Rp.???<sup>.00</sup></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.</p>
					</div>
					<div class="col-md-12">
						<p><a href="edit.php" class="btn btn-primary btn-outline">Edit</a></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item margin_top animate-box">
						<img src="images/charlie-puth.jpg" class="img-responsive" alt="">
						<h3>Charlie Puth</h3>
						<span class="fh5co-price">Rp.???<sup>.00</sup></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.</p>
					</div>
					<div class="col-md-12">
						<p><a href="edit.php" class="btn btn-primary btn-outline">Edit</a></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
					<div class="fh5co-item margin_top animate-box">
						<img src="images/fiersa besari.jpg" class="img-responsive" alt="">
						<h3>Fiersa Besari</h3>
						<span class="fh5co-price">Rp.???<sup>.00</sup></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.</p>
					</div>
					<div class="col-md-12">
						<p><a href="edit.php" class="btn btn-primary btn-outline">Edit</a></p>
					</div>
				</div> -->
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