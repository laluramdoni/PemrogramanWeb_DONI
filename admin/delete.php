<?php
session_start(); // Mulai session

// Periksa apakah data ID dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lanjutkan dengan pemrosesan data dan koneksi ke database
    require_once "../koneksi.php";

    // Proses penghapusan data
    $stmt = $conn->prepare("DELETE FROM penjual WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Data berhasil dihapus!";
        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        header("Location: penjual.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal menghapus data: " . $stmt->error;
        header("Location: penjual.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error_message'] = "ID tidak ditemukan";
    header("Location: penjual.php");
    exit;
}
?>
