<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/logout.php');
    exit;
}

$id_user = $_SESSION['id_user'];
$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

// ============ SUSUN DAFTAR ITEM YANG AKAN DIBELI ============
$items = []; // masing-masing: id_produk, jumlah, harga (harga diambil ulang dari DB, bukan dari form, biar aman)

if ($mode === 'langsung') {
    $id_produk = isset($_POST['id_produk']) ? intval($_POST['id_produk']) : 0;
    $jumlah    = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 1;

    $q = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id='$id_produk'");
    if (mysqli_num_rows($q) > 0) {
        $p = mysqli_fetch_array($q);
        $items[] = ['id_produk' => $p['id'], 'jumlah' => $jumlah, 'harga' => $p['harga'], 'stok' => $p['stok'], 'id_keranjang' => null];
    }

} elseif ($mode === 'keranjang' && isset($_POST['id_keranjang'])) {
    $id_list = array_map('intval', $_POST['id_keranjang']);
    $id_string = implode(',', $id_list);

    $q = mysqli_query($koneksi, "
        SELECT tk.id_keranjang, tk.jumlah, tp.id AS id_produk, tp.harga, tp.stok
        FROM tb_keranjang tk
        JOIN tb_produk tp ON tk.id_produk = tp.id
        WHERE tk.id_user = '$id_user' AND tk.id_keranjang IN ($id_string)
    ");

    while ($row = mysqli_fetch_array($q)) {
        $items[] = [
            'id_produk'    => $row['id_produk'],
            'jumlah'       => $row['jumlah'],
            'harga'        => $row['harga'],
            'stok'         => $row['stok'],
            'id_keranjang' => $row['id_keranjang'],
        ];
    }
}

if (count($items) === 0) {
    header('location: keranjang.php');
    exit;
}

// ============ VALIDASI STOK SEBELUM MEMBUAT TRANSAKSI ============
foreach ($items as $item) {
    if ($item['jumlah'] > $item['stok']) {
        // stok tidak cukup, batalkan proses
        header('location: keranjang.php?error=stok');
        exit;
    }
}

// ============ AMBIL & VALIDASI METODE BAYAR + KIRIM ============
$metode_bayar_diizinkan = ['Transfer Bank', 'COD (Bayar di Tempat)', 'E-Wallet (OVO/Dana/QRIS)'];
$metode_kirim_diizinkan = ['Reguler' => 0, 'Express' => 15000]; // key = nama, value = ongkir

$metode_bayar = isset($_POST['metode_bayar']) ? $_POST['metode_bayar'] : '';
$metode_kirim = isset($_POST['metode_kirim']) ? $_POST['metode_kirim'] : '';

if (!in_array($metode_bayar, $metode_bayar_diizinkan)) {
    $metode_bayar = 'Transfer Bank'; // default kalau tidak valid/kosong
}
if (!array_key_exists($metode_kirim, $metode_kirim_diizinkan)) {
    $metode_kirim = 'Reguler';
}

// ongkir dihitung ulang di server (tidak percaya nilai dari form), supaya tidak bisa dimanipulasi
$ongkir = $metode_kirim_diizinkan[$metode_kirim];

// ============ HITUNG TOTAL & BUAT TRANSAKSI ============
$total_harga = $ongkir;
foreach ($items as $item) {
    $total_harga += $item['harga'] * $item['jumlah'];
}

$tanggal = date('Y-m-d');

mysqli_query($koneksi, "
    INSERT INTO tb_transaksi (id_pelanggan, tanggal, total_harga, status, metode_bayar, metode_kirim, ongkir)
    VALUES ('$id_user', '$tanggal', '$total_harga', 'diproses', '$metode_bayar', '$metode_kirim', '$ongkir')
");

$id_transaksi = mysqli_insert_id($koneksi);

// ============ SIMPAN DETAIL TRANSAKSI + KURANGI STOK ============
foreach ($items as $item) {
    mysqli_query($koneksi, "
        INSERT INTO tb_detail (id_transaksi, id_produk, jumlah)
        VALUES ('$id_transaksi', '" . $item['id_produk'] . "', '" . $item['jumlah'] . "')
    ");

    mysqli_query($koneksi, "
        UPDATE tb_produk SET stok = stok - '" . $item['jumlah'] . "' WHERE id = '" . $item['id_produk'] . "'
    ");

    // kalau item ini asalnya dari keranjang, hapus dari keranjang setelah berhasil checkout
    if ($item['id_keranjang'] !== null) {
        mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE id_keranjang = '" . $item['id_keranjang'] . "'");
    }
}

header('location: pesanan-berhasil.php?id=' . $id_transaksi);
exit;
