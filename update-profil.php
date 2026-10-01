<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['id_user'])) {
    echo json_encode(['success' => false, 'message' => 'Kamu belum login.']);
    exit;
}

$id_user = $_SESSION['id_user'];

// ambil data dari form, dan bersihkan supaya aman dari SQL Injection
$nama          = mysqli_real_escape_string($koneksi, isset($_POST['nama']) ? $_POST['nama'] : '');
$email         = mysqli_real_escape_string($koneksi, isset($_POST['email']) ? $_POST['email'] : '');
$tanggal_lahir = mysqli_real_escape_string($koneksi, isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '');
$alamat        = mysqli_real_escape_string($koneksi, isset($_POST['alamat']) ? $_POST['alamat'] : '');

// kalau tanggal lahir dikosongkan, simpan sebagai NULL bukan string kosong
$tanggal_sql = $tanggal_lahir !== '' ? "'$tanggal_lahir'" : 'NULL';

$query = "
    UPDATE tb_user
    SET nama = '$nama',
        email = '$email',
        tanggal_lahir = $tanggal_sql,
        alamat = '$alamat'
    WHERE id = '$id_user'
";

if (mysqli_query($koneksi, $query)) {
    // update juga session nama, biar konsisten kalau dipakai di halaman lain
    $_SESSION['nama'] = $nama;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => mysqli_error($koneksi)]);
}
