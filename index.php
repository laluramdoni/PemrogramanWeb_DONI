<?php
// Mendapatkan URL root
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$env = parse_ini_file('.env');
// Pengalihan (redirect) ke halaman index.php
header("Location: {$root}{$env['nama_folder']}/pembeli/index.php");
exit;
?>
