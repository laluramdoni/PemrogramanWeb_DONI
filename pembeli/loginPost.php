<?php
session_start();

// Memasukkan file koneksi.php
require_once "../koneksi.php";

// Cek apakah ada permintaan POST dari formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai email dan password dari formulir
    $email = $_POST["email_user"];
    $password = $_POST["password_user"];

    // Lakukan validasi atau verifikasi login di sini
    // Misalnya, periksa apakah email dan password sesuai dengan yang ada dalam database

    // Query SQL untuk memeriksa email dalam tabel pembeli
    $query = "SELECT * FROM pembeli WHERE email = '$email'";
    $result = $conn->query($query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result->num_rows == 1) {
        // Email ditemukan, verifikasi password
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Memverifikasi password menggunakan password_verify()
        if (password_verify($password, $storedPassword)) {
            // Login berhasil
            $_SESSION['logged_in'] = true; // Set session 'logged_in' sebagai true
            $_SESSION['email'] = $email; // Simpan email pengguna dalam session
            $_SESSION['user_id'] = $row['user_id']; // Simpan user_id dalam session
            header("Location: index.php"); // Ganti "beranda.php" dengan halaman beranda yang sesuai
            exit;
        }
    }

    // Login gagal, tampilkan pesan error atau lakukan tindakan lainnya
    header("Location: login.php");
}

// Menutup koneksi
$conn->close();
?>
