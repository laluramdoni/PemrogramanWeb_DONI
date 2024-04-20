<?php
session_start();

// Menghapus semua data session
session_destroy();

// Mengalihkan pengguna ke halaman login atau halaman lainnya setelah logout
header("Location: login.php");
exit;
?>
