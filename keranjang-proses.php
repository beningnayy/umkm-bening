<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user   = $_SESSION['id_user'];
$id_produk = isset($_POST['id_produk']) ? intval($_POST['id_produk']) : 0;
$jumlah    = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 1;
$aksi      = isset($_POST['aksi']) ? $_POST['aksi'] : '';

if ($id_produk === 0 || $jumlah < 1) {
    header('location: index.php');
    exit;
}

if ($aksi === 'beli') {
    // "Beli Sekarang" -> langsung ke halaman checkout, tidak mampir ke keranjang
    header('location: checkout.php?mode=langsung&id_produk=' . $id_produk . '&jumlah=' . $jumlah);
    exit;
}

// aksi === 'keranjang' -> masukkan / update ke tb_keranjang
$cek = mysqli_query($koneksi, "SELECT id_keranjang, jumlah FROM tb_keranjang WHERE id_user='$id_user' AND id_produk='$id_produk'");

if (mysqli_num_rows($cek) > 0) {
    // sudah ada di keranjang -> tambahkan jumlahnya
    $row = mysqli_fetch_array($cek);
    $jumlah_baru = $row['jumlah'] + $jumlah;
    mysqli_query($koneksi, "UPDATE tb_keranjang SET jumlah='$jumlah_baru' WHERE id_keranjang='" . $row['id_keranjang'] . "'");
} else {
    mysqli_query($koneksi, "INSERT INTO tb_keranjang (id_user, id_produk, jumlah) VALUES ('$id_user', '$id_produk', '$jumlah')");
}

header('location: keranjang.php');
exit;
