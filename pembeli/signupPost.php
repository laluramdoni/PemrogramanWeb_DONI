<?php
session_start();

// Memasukkan file koneksi.php
require_once "../koneksi.php";

// Cek apakah ada permintaan POST dari formulir signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai nama, email, dan password dari formulir
    $nama = $_POST["name_user"];
    $email = $_POST["email_user"];
    $password = $_POST["password_user"];

    // Lakukan validasi atau verifikasi data yang diterima
    // Misalnya, periksa apakah email sudah terdaftar sebelumnya

    // Query SQL untuk memeriksa apakah email sudah terdaftar
    $query = "SELECT * FROM pembeli WHERE email = '$email'";
    $result = $conn->query($query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result->num_rows > 0) {
        // Email sudah terdaftar, tampilkan pesan error atau lakukan tindakan lainnya
        $errors[] = "Email sudah terdaftar!";
        header("Location: signup.php");
        exit;
    } else {
        // Email belum terdaftar, lakukan proses pendaftaran

        // Enkripsi password menggunakan password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query SQL untuk menyimpan data pendaftaran ke dalam tabel pembeli
        $insertQuery = "INSERT INTO pembeli (name, email, password) VALUES ('$nama', '$email', '$hashedPassword')";
        if ($conn->query($insertQuery) === TRUE) {
            // Pendaftaran berhasil
            // echo "Pendaftaran berhasil!";
            $_SESSION['logged_in'] = true; // Set session 'logged_in' sebagai true
            $_SESSION['email'] = $email; // Simpan email pengguna dalam session
            // Setelah berhasil mendaftar, Anda dapat melakukan pengalihan ke halaman login atau halaman lainnya
            header("Location: ../index.php");
            exit;
        } else {
            // Pendaftaran gagal, tampilkan pesan error atau lakukan tindakan lainnya
            $errors[] = "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Menutup koneksi
$conn->close();
?>
