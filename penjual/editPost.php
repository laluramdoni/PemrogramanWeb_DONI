<?php
session_start(); // Mulai session

// Periksa apakah data telah terkirim dari formulir
if (isset($_POST['id'], $_POST['nama_konser'], $_POST['kuota'], $_POST['keterangan'], $_POST['harga'])) {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $nama_konser = $_POST['nama_konser'];
    $kuota = $_POST['kuota'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];

    // Periksa apakah file gambar diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar'];

        // Pindahkan file gambar ke direktori tujuan
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $destination = "../gambar/" . $gambar_name;
        if (move_uploaded_file($gambar_tmp, $destination)) {
            // Lanjutkan dengan pemrosesan data dan koneksi ke database
            require_once "../koneksi.php";

            // Proses pengeditan data
            $stmt = $conn->prepare("UPDATE konser SET nama_konser = ?, kuota = ?, keterangan = ?, harga = ?, gambar = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $nama_konser, $kuota, $keterangan, $harga, $destination, $id);
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Data berhasil diubah!";
                // Redirect ke halaman sukses atau halaman lain yang diinginkan
                header("Location: tiket.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Gagal mengubah data: " . $stmt->error;
                header("Location: tiket.php");
                exit();
            }

            $stmt->close();
            $conn->close();
        } else {
            $_SESSION['error_message'] = "Gagal mengunggah gambar";
            header("Location: tiket.php");
            exit();
        }
    } else {
        // Lanjutkan dengan pemrosesan data dan koneksi ke database
        require_once "../koneksi.php";

        // Proses pengeditan data tanpa mengupdate gambar
        $stmt = $conn->prepare("UPDATE konser SET nama_konser = ?, kuota = ?, keterangan = ?, harga = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nama_konser, $kuota, $keterangan, $harga, $id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Data berhasil diubah!";
            // Redirect ke halaman sukses atau halaman lain yang diinginkan
            header("Location: tiket.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Gagal mengubah data: " . $stmt->error;
            header("Location: tiket.php");
            exit();
        }

        $stmt->close();
        $conn->close();
    }
} else {
    $_SESSION['error_message'] = "Data tidak lengkap";
    header("Location: tiket.php");
    exit;
}
?>
