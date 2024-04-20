<?php
session_start();
require_once "../koneksi.php";
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
	<title>Myconcert-Transaction</title>
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
								<h1>Transaction</h1>
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
						<h2>Transaction</h2>
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Akun Pembeli</th>
									<th>Nama</th>
									<th>Jumlah Orang</th>
									<th>Konser</th>
									<th>Tanggal Transaksi</th>
								</tr>
							</thead>
							<tbody>

								<?php
								// Query to retrieve transaction details
								$sql = "SELECT * FROM transaksi";
								$result = mysqli_query($conn, $sql);
								$no = 1;

								// Menampilkan data konser
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<tr>
												<td>' . $no++ . '</td>';
										$userSql = "SELECT * FROM pembeli WHERE id = '" . $row['user_id'] . "'";
										$userResult = mysqli_query($conn, $userSql);

										if ($userResult && mysqli_num_rows($userResult) > 0) {
											$userRow = mysqli_fetch_assoc($userResult);
											echo '<td>' . $userRow['name'] . '</td>';
										} else {
											echo '<td>Tidak Ada User</td>';
										}
										echo '<td>' . $row['nama'] . '</td><td>' . $row['orang'] . '</td>';

										// Query to retrieve concert details based on the transaction's nama
										$konserSql = "SELECT * FROM konser WHERE id = '" . $row['konser_id'] . "'";
										$konserResult = mysqli_query($conn, $konserSql);

										if ($konserResult && mysqli_num_rows($konserResult) > 0) {
											$konserRow = mysqli_fetch_assoc($konserResult);
											echo '<td>' . $konserRow['nama_konser'] . '</td>';
										} else {
											echo '<td>Unknown Concert</td>';
										}

										echo '<td>' . $row['tanggal_transaksi'] . '</td>
										</tr>';
									}
								} else {
									echo "Tidak ada data konser.";
								}

								// Menutup koneksi ke database
								mysqli_close($conn);
								?>



							</tbody>
						</table>
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

	<!-- Date Time -->
	<script src="js/moment.min.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>


	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>