<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_transaksi = isset($_GET['id']) ? intval($_GET['id']) : 0;
$id_user = $_SESSION['id_user'];

// pastikan transaksi ini memang milik user yang login
$q = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi' AND id_pelanggan='$id_user'");
$transaksi = mysqli_num_rows($q) > 0 ? mysqli_fetch_array($q) : null;

function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="keranjang-style.css">
</head>
<body>
  <section class="berhasil-page">
      <?php if ($transaksi): ?>
        <div class="berhasil-icon"><i data-feather="check-circle"></i></div>
        <h1>Pesanan Berhasil Dibuat!</h1>
        <p>Nomor pesanan kamu: <strong>#<?= $transaksi['id_transaksi'] ?></strong></p>
        <p>Total pembayaran: <strong><?= formatHarga($transaksi['total_harga']) ?></strong></p>
        <p class="info-status">Status pesanan saat ini: <span class="status status-diproses">Diproses</span></p>

        <div class="berhasil-tombol">
          <a href="profile.php" class="btn-lihat-pesanan">Lihat Pesanan Saya</a>
          <a href="invoice.php?id=<?= $transaksi['id_transaksi'] ?>" target="_blank" class="btn-lanjut-belanja">
            <i data-feather="printer"></i> Cetak Invoice
          </a>
        </div>
      <?php else: ?>
        <h1>Transaksi tidak ditemukan</h1>
        <a href="index.php" class="btn-lanjut-belanja">Kembali ke Beranda</a>
      <?php endif; ?>
    </section>

    <script>
      feather.replace();
    </script>
    <script src="script.js"></script>
</body>
</html>
