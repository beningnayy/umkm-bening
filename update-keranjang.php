<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user       = $_SESSION['id_user'];
$id_keranjang  = isset($_GET['id']) ? intval($_GET['id']) : 0;
$aksi          = isset($_GET['aksi']) ? $_GET['aksi'] : '';

// pastikan item ini memang milik user yang sedang login (keamanan)
$q = mysqli_query($koneksi, "
    SELECT tk.jumlah, tp.stok 
    FROM tb_keranjang tk 
    JOIN tb_produk tp ON tk.id_produk = tp.id
    WHERE tk.id_keranjang = '$id_keranjang' AND tk.id_user = '$id_user'
");

if (mysqli_num_rows($q) > 0) {
    $row = mysqli_fetch_array($q);
    $jumlah_baru = $row['jumlah'];

    if ($aksi === 'tambah' && $jumlah_baru < $row['stok']) {
        $jumlah_baru++;
    } elseif ($aksi === 'kurang' && $jumlah_baru > 1) {
        $jumlah_baru--;
    }

    mysqli_query($koneksi, "UPDATE tb_keranjang SET jumlah='$jumlah_baru' WHERE id_keranjang='$id_keranjang'");
}

header('location: keranjang.php');
exit;
