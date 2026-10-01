<?php
session_start();
require 'config.php'; // sesuaikan path kalau berbeda

$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

$produk = null;
if ($id_produk > 0) {
    $q = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id = '$id_produk'");
    if (mysqli_num_rows($q) > 0) {
        $produk = mysqli_fetch_array($q);
    }
}

if (!$produk) {
    http_response_code(404);
}

function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produk ? htmlspecialchars($produk['nama_produk']) : 'Produk Tidak Ditemukan' ?> - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="detail-produk">

    <a href="javascript:history.back()" class="btn-kembali">
        <i data-feather="arrow-left"></i>
        Kembali ke Kategori
    </a>

    <?php if ($produk): ?>

        <div class="detail-layout">

    <!-- GAMBAR PRODUK -->
    <div class="detail-gambar">
        <img 
            src="image/bouquet/<?= htmlspecialchars($produk['poto']) ?>" 
            alt="<?= htmlspecialchars($produk['nama_produk']) ?>"
        >
    </div>


    <!-- INFORMASI PRODUK -->
    <div class="detail-info">

        <h1><?= htmlspecialchars($produk['nama_produk']) ?></h1>

        <p class="detail-harga">
            <?= formatHarga($produk['harga']) ?>
        </p>

        <p class="detail-deskripsi">
            <?= nl2br(htmlspecialchars($produk['deskripsi'])) ?>
        </p>


        <!-- STOK -->
        <div class="stok-info">
            <i data-feather="package"></i>
            <span>Stok tersedia:</span>
            <strong><?= (int) $produk['stok'] ?></strong>
        </div>


        <!-- FORM -->
        <form action="keranjang-proses.php" method="POST">

            <input 
                type="hidden" 
                name="id_produk" 
                value="<?= $produk['id'] ?>"
            >


            <!-- JUMLAH -->
            <div class="jumlah-field">

                <label for="jumlah">
                    Jumlah
                </label>

                <input 
                    type="number" 
                    id="jumlah" 
                    name="jumlah" 
                    value="1" 
                    min="1" 
                    max="<?= (int) $produk['stok'] ?>"
                >

            </div>


            <!-- REQUEST TAMBAHAN -->
            <div class="custom-field">

                <label for="request_tambahan">
                    Request Tambahan
                </label>

                <textarea
                    id="request_tambahan"
                    name="request_tambahan"
                    rows="3"
                    placeholder="Contoh: ganti warna bunga menjadi pink, tambahkan pita, dll..."
                ></textarea>

            </div>


            <!-- KARTU UCAPAN -->
            <div class="custom-field">

                <label for="kartu_ucapan">
                    Kartu Ucapan
                </label>

                <textarea
                    id="kartu_ucapan"
                    name="kartu_ucapan"
                    rows="3"
                    placeholder="Tulis pesan untuk kartu ucapan..."
                ></textarea>

            </div>


            <!-- BUTTON -->
            <div class="detail-tombol">

                <button 
                    type="submit" 
                    name="aksi" 
                    value="keranjang" 
                    class="btn-keranjang"
                >
                    <i data-feather="shopping-cart"></i>
                    Tambah ke Keranjang
                </button>

                <button 
                    type="submit" 
                    name="aksi" 
                    value="beli" 
                    class="btn-beli"
                >
                    Beli Sekarang
                </button>

            </div>

        </form>

    </div>

</div>
    <?php else: ?>

        <div class="produk-tidak-ada">

            <h2>Produk tidak ditemukan</h2>

            <p>
                Maaf, produk yang kamu cari sudah tidak tersedia 
                atau linknya salah.
            </p>

            <a href="index.php#katalog" class="pesan-btn">
                Kembali ke Katalog
            </a>

        </div>

    <?php endif; ?>


    <script>
      feather.replace();
    </script>
    <script src="script.js"></script>
</body>
</html>
