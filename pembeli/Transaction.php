<?php
session_start();
require_once "../koneksi.php";
// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Jika pengguna belum login, redirect ke halaman login
	header("Location: login.php");
	exit;
}


if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];

	// Mendapatkan data user_id dari tabel users berdasarkan email
	$sql = "SELECT id, name FROM pembeli WHERE email = '$email'";
	$result = $conn->query($sql);

	// Memeriksa apakah query berhasil dieksekusi
	if ($result && $result->num_rows > 0) {
		$user = $result->fetch_assoc();
		$idLogin = $user['id'];
		$namaLogin = $user['name'];
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	// Jika email tidak ada, berikan tindakan yang sesuai
	// Misalnya, redirect ke halaman login atau menampilkan pesan kesalahan
	echo "User not logged in.";
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
	<link rel="stylesheet" href="../asset/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../asset/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../asset/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../asset/css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../asset/css/style.css">

	<!-- Modernizr JS -->
	<script src="../asset/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">

		<?php
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
									<th>Nama</th>
									<th>Jumlah Orang</th>
									<th>Konser</th>
									<th>Tanggal Transaksi</th>
									<th>Bukti Bayar</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>

								<?php
								// Query to retrieve transaction details
								$sql = "SELECT * FROM transaksi WHERE user_id = '$idLogin'";
								$result = mysqli_query($conn, $sql);
								$no = 1;

								// Menampilkan data konser
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo '<tr>
												<td>' . $no++ . '</td>
												<td>' . $row['nama'] . '</td>
												<td>' . $row['orang'] . '</td>';

										// Query to retrieve concert details based on the transaction's nama
										$konserSql = "SELECT * FROM konser WHERE id = '" . $row['konser_id'] . "'";
										$konserResult = mysqli_query($conn, $konserSql);

										if ($konserResult && mysqli_num_rows($konserResult) > 0) {
											$konserRow = mysqli_fetch_assoc($konserResult);
											echo '<td>' . $konserRow['nama_konser'] . '</td>';
										} else {
											echo '<td>Unknown Concert</td>';
										}

										echo '<td>'.$row['tanggal_transaksi'].'</td>';
										if($row['approve'] == true){
											echo '<td><img src="uploads/'.$row['bukti_bayar'].'" width=75"> </td>';
											echo '<td>Transaksi Selesai</td>';
										}else{
											echo '<td>Belum Melakukan Pembayaran</td>';
											echo '<td>Transaksi Belum Lengkap</td>';

										}
										'</tr>';
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

					<!-- <div class="col-md-6 col-md-push-6 col-sm-6 col-sm-push-6">
						<form action="#" id="form-wrap">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="name">Your Name</label>
									<input type="text" class="form-control" id="name">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="many">How Many People</label>
									<input type="number" id="many" class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="">Concert</label>
									<select name="many" id="many" class="form-control custom_select">
										<option value="#">Coldplay</option>
										<option value="#">Charlie Puth</option>
										<option value="#">Fiersa Besari</option>
										<option value="#">Raisa</option>
									</select>
								</div>
							</div>
						</form>
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

	<!-- Date Time -->
	<script src="../asset/js/moment.min.js"></script>
	<script src="../asset/js/bootstrap-datetimepicker.js"></script>


	<!-- Main -->
	<script src="../asset/js/main.js"></script>

</body>

</html>