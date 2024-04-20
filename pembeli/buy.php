<?php
session_start();
require_once "../koneksi.php";

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Jika pengguna belum login, redirect ke halaman login
	header("Location: login.php");
	exit;
}

// Mendapatkan parameter ID dari URL
$id = $_GET['id'];

// Mendapatkan data dari tabel konser
$sql = "SELECT * FROM konser WHERE id = $id";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
	$concert = $result->fetch_assoc();
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
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

// Memeriksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Mendapatkan data dari form
	$name = $_POST["name"];
	$people = $_POST["orang"];
	$concertId = $_POST["konser_id"];
	$tanggal_transaksi = date("Y-m-d H:i:s");

	// Mendapatkan kuota konser
	$query = "SELECT kuota FROM konser WHERE id = '$concertId'";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$kuota = $row["kuota"];

		// Memeriksa apakah kuota mencukupi
		if (($kuota - $people) >= 0) {
			// Memasukkan data ke dalam database
			$sql = "INSERT INTO transaksi (user_id, nama, orang, konser_id, tanggal_transaksi, approve, bukti_bayar) VALUES ('$idLogin', '$name', '$people', '$concertId', '$tanggal_transaksi', '0', null)";

			if ($conn->query($sql) === TRUE) {
				echo "Produk diproses.";
				$lastInsertedId = $conn->insert_id;

				// Pembaruan kuota pada tabel konser
				$updatedKuota = $kuota - $people;
				$updateQuery = "UPDATE konser SET kuota = '$updatedKuota' WHERE id = '$concertId'";
				if ($conn->query($updateQuery) === TRUE) {
					echo "Kuota diperbarui.";
				} else {
					echo "Error updating kuota: " . $conn->error;
				}

				header("Location: payment.php?id=" . $lastInsertedId);
				exit;
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
			// Kuota tidak mencukupi, kembali ke halaman buy.php
			// echo "Error: " . $sql . "<br>" . $conn->error;
			header("Location: buy.php?error=kuota_habis&id=" . $concertId . "&errorMessage=" . urlencode($errorMessage));
			exit;
		}
	} else {
		echo "Konser tidak ditemukan.";
	}
}



$conn->close();
?>



<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Myconcert-Buy</title>
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
	<!-- Menampilkan user_id -->
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
							<h1>Reserved Today!</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	<div id="fh5co-reservation-form" class="fh5co-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6 col-sm-6 col-sm-push-6">
					<form action="#" id="form-wrap" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="name">Your Name</label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $namaLogin; ?>">
							</div>
						</div>
						<div class="row form-group">
						<div class="col-md-12">
    <label for="many">How Many People</label>
    <input type="number" id="many" class="form-control" name="orang">
    <?php if (isset($_GET['error']) && $_GET['error'] == 'kuota_habis') { ?>
        <div class="error-message"><?php echo isset($_GET['errorMessage']) ? $_GET['errorMessage'] : ''; ?></div>
    <?php } ?>
</div>

						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="">Concert</label>
								<select name="konser_id" id="many" class="form-control custom_select">
									<?php
									$sql = "SELECT id, name FROM konser WHERE email = '$email'";
									echo '<option value="' . $concert['id'] . '">' . $concert['nama_konser'] . '</option>';
									?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary btn-outline btn-lg" value="Buy">
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