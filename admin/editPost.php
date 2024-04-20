<?php 
session_start(); // Mulai session
require_once "../koneksi.php";

// Periksa apakah data telah terkirim dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Mengambil nilai id, nama, email, dan password dari formulir
   $id = $_POST['id'];
   $nama = $_POST["name"];
   $email = $_POST["email"];
   $password = $_POST["password"];

    // Periksa apakah password baru diisi atau tidak
    if (!empty($password)) {
        // Enkripsi password menggunakan password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Proses pengeditan data dengan mengupdate password
        $stmt = $conn->prepare("UPDATE penjual SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama, $email, $hashedPassword, $id);
    } else {
        // Proses pengeditan data tanpa mengupdate password
        $stmt = $conn->prepare("UPDATE penjual SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nama, $email, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Data berhasil diubah!";
        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        header("Location: penjual.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal mengubah data: " . $stmt->error;
        header("Location: penjual.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error_message'] = "Data tidak lengkap";
    header("Location: penjual.php");
    exit;
}

?>