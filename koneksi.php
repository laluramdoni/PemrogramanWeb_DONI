<?php

$env = parse_ini_file('.env');
// Informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "project_konser";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}