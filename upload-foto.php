<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['id_user'])) {
    echo json_encode(['success' => false, 'message' => 'Kamu belum login.']);
    exit;
}

$id_user = $_SESSION['id_user'];

if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Tidak ada file yang diupload.']);
    exit;
}

$file = $_FILES['foto'];
$ekstensi_diizinkan = ['jpg', 'jpeg', 'png', 'webp'];
$ekstensi = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($ekstensi, $ekstensi_diizinkan)) {
    echo json_encode(['success' => false, 'message' => 'Format file harus JPG, PNG, atau WEBP.']);
    exit;
}

// batasi ukuran file maksimal 2MB
if ($file['size'] > 2 * 1024 * 1024) {
    echo json_encode(['success' => false, 'message' => 'Ukuran file maksimal 2MB.']);
    exit;
}

$folder_tujuan = 'image/profile/';
if (!is_dir($folder_tujuan)) {
    mkdir($folder_tujuan, 0755, true);
}

$nama_file_baru = 'user_' . $id_user . '_' . time() . '.' . $ekstensi;
$path_tujuan = $folder_tujuan . $nama_file_baru;

if (move_uploaded_file($file['tmp_name'], $path_tujuan)) {
    $path_sql = mysqli_real_escape_string($koneksi, $path_tujuan);
    mysqli_query($koneksi, "UPDATE tb_user SET foto_profil = '$path_sql' WHERE id = '$id_user'");

    echo json_encode(['success' => true, 'path' => $path_tujuan]);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menyimpan file ke server.']);
}
