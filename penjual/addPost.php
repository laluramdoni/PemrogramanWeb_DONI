<?php
// Memasukkan file koneksi.php
require_once "../koneksi.php";

$message = ""; // Variabel untuk menyimpan pesan
$redirect = false; // Variabel untuk menentukan apakah perlu redirect atau tidak

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah file gambar telah dipilih
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $gambar = $_FILES["gambar"]["name"]; // Nama file gambar
        $gambar_tmp = $_FILES["gambar"]["tmp_name"]; // Lokasi sementara file gambar

        // Direktori tempat penyimpanan gambar
        $targetDirectory = "../gambar/";
        $targetFile = $targetDirectory . basename($gambar); // Path lengkap file gambar

        // Memindahkan file gambar ke direktori tujuan
        if (move_uploaded_file($gambar_tmp, $targetFile)) {
            // File gambar berhasil diunggah, dapat dilanjutkan dengan penyimpanan data ke database
            $nama_konser = $_POST["nama_konser"]; // Nama konser
            $kuota = $_POST["kuota"]; // Jumlah tiket
            $keterangan = $_POST["keterangan"]; // Detail konser
            $harga = $_POST["harga"]; // Harga tiket

            // Query SQL untuk menyimpan data konser ke dalam tabel konser
            $query = "INSERT INTO konser (gambar, nama_konser, kuota, keterangan, harga) 
                      VALUES ('$gambar', '$nama_konser', '$kuota', '$keterangan', '$harga')";

            if ($conn->query($query) === TRUE) {
                // Data konser berhasil ditambahkan
                $message = "Data konser berhasil ditambahkan!";
            } else {
                // Terjadi kesalahan saat menambahkan data konser
                $message = "Error: " . $query . "<br>" . $conn->error;
            }

            $redirect = true;
        } else {
            // Terjadi kesalahan saat memindahkan file gambar
            $message = "Gagal mengunggah gambar!";
            $redirect = true;
        }
    } else {
        // File gambar tidak dipilih atau terjadi kesalahan
        $message = "Harap pilih file gambar!";
        $redirect = true;
    }
}

// Menutup koneksi
$conn->close();

// Jika perlu redirect, redirect ke halaman add.php dengan membawa pesan
if ($redirect) {
    session_start();
    $_SESSION["message"] = $message;
    header("Location: add.php");
    exit;
}
?>