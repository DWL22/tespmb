<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_tes_mahasiswa';

//Buat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

//cek koneksi
if ($conn->connect_error) {
    die("koneksi gagal: " .$conn->connect_error);
}
?>