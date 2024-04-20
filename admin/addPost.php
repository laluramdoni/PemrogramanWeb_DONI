<?php
// Memasukkan file koneksi.php
require_once "../koneksi.php";

$message = ""; // Variabel untuk menyimpan pesan
$redirect = false; // Variabel untuk menentukan apakah perlu redirect atau tidak

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai nama, email, dan password dari formulir
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lakukan validasi atau verifikasi data yang diterima
    // Misalnya, periksa apakah email sudah terdaftar sebelumnya

    // Query SQL untuk memeriksa apakah email sudah terdaftar
    $query = "SELECT * FROM penjual WHERE email = '$email'";
    $result = $conn->query($query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result->num_rows > 0) {
        // Email sudah terdaftar, tampilkan pesan error atau lakukan tindakan lainnya
        $errors[] = "Email sudah terdaftar!";
        header("Location: add.php");
        exit;
    } else {
        // Email belum terdaftar, lakukan proses pendaftaran

        // Enkripsi password menggunakan password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query SQL untuk menyimpan data pendaftaran ke dalam tabel penjual
        $insertQuery = "INSERT INTO penjual (name, email, password) VALUES ('$nama', '$email', '$hashedPassword')";
        if ($conn->query($insertQuery) === TRUE) {
            // Pendaftaran berhasil
            // echo "Pendaftaran berhasil!";
            $_SESSION['logged_in'] = true; // Set session 'logged_in' sebagai true
            $_SESSION['email'] = $email; // Simpan email pengguna dalam session
            // Setelah berhasil mendaftar, Anda dapat melakukan pengalihan ke halaman login atau halaman lainnya
            header("Location: penjual.php");
            exit;
        } else {
            // Pendaftaran gagal, tampilkan pesan error atau lakukan tindakan lainnya
            $errors[] = "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}
// Menutup koneksi
$conn->close();

// Jika perlu redirect, redirect ke halaman add.php dengan membawa pesan
if ($redirect) {
    session_start();
    $_SESSION["message"] = $message;
    header("Location: penjual.php");
    exit;
}
?>