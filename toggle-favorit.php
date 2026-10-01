<?php
session_start();
require 'config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['id_user'])) {
    echo json_encode(['success' => false, 'message' => 'Kamu belum login.']);
    exit;
}

$id_user   = $_SESSION['id_user'];
$id_produk = isset($_POST['id_produk']) ? intval($_POST['id_produk']) : 0;
$aksi      = isset($_POST['aksi']) ? $_POST['aksi'] : '';

if ($id_produk === 0 || !in_array($aksi, ['tambah', 'hapus'])) {
    echo json_encode(['success' => false, 'message' => 'Data tidak valid.']);
    exit;
}

if ($aksi === 'tambah') {
    // cek dulu supaya tidak dobel (jaga-jaga meski sudah ada UNIQUE KEY di tabel)
    $cek = mysqli_query($koneksi, "SELECT id_favorit FROM tb_favorit WHERE id_user='$id_user' AND id_produk='$id_produk'");
    if (mysqli_num_rows($cek) > 0) {
        echo json_encode(['success' => true, 'message' => 'Sudah ada di favorit.']);
        exit;
    }

    $query = "INSERT INTO tb_favorit (id_user, id_produk) VALUES ('$id_user', '$id_produk')";
} else {
    $query = "DELETE FROM tb_favorit WHERE id_user='$id_user' AND id_produk='$id_produk'";
}

if (mysqli_query($koneksi, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => mysqli_error($koneksi)]);
}
