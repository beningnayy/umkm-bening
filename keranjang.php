<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user = $_SESSION['id_user'];

$q_keranjang = mysqli_query($koneksi, "
    SELECT tk.id_keranjang, tk.jumlah, tp.id AS id_produk, tp.nama_produk, tp.harga, tp.poto, tp.stok
    FROM tb_keranjang tk
    JOIN tb_produk tp ON tk.id_produk = tp.id
    WHERE tk.id_user = '$id_user'
    ORDER BY tk.tanggal_ditambahkan DESC
");

function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="keranjang-style.css">
</head>
<body>
    <section class="keranjang-page">

      <h1><i data-feather="shopping-cart"></i> Keranjang Belanja</h1>

      <div class="tombol-kanan">
          <a href="index.php" class="btn-kembali"> 
              <i data-feather="arrow-left"></i> kembali 
          </a>
      </div>

      <?php if (mysqli_num_rows($q_keranjang) > 0): ?>

        <form action="checkout.php" method="POST" id="formCheckout">
          <input type="hidden" name="mode" value="keranjang">

          <div class="keranjang-list">

            <?php while ($item = mysqli_fetch_array($q_keranjang)): ?>
              <div class="keranjang-item">
                <input type="checkbox" name="pilih[]" value="<?= $item['id_keranjang'] ?>"
                       class="checkbox-item" checked
                       data-harga="<?= $item['harga'] ?>" data-jumlah="<?= $item['jumlah'] ?>">

                <img src="image/bouquet/<?= htmlspecialchars($item['poto']) ?>" alt="<?= htmlspecialchars($item['nama_produk']) ?>">

                <div class="item-info">
                  <h4><?= htmlspecialchars($item['nama_produk']) ?></h4>
                  <span class="item-harga"><?= formatHarga($item['harga']) ?></span>
                </div>

                <div class="item-jumlah">
                  <a href="update-keranjang.php?id=<?= $item['id_keranjang'] ?>&aksi=kurang" class="btn-jumlah">-</a>
                  <span><?= $item['jumlah'] ?></span>
                  <a href="update-keranjang.php?id=<?= $item['id_keranjang'] ?>&aksi=tambah" class="btn-jumlah <?= $item['jumlah'] >= $item['stok'] ? 'disabled' : '' ?>">+</a>
                </div>

                <div class="item-subtotal"><?= formatHarga($item['harga'] * $item['jumlah']) ?></div>

                <a href="hapus-keranjang.php?id=<?= $item['id_keranjang'] ?>" class="btn-hapus"
                   onclick="return confirm('Hapus produk ini dari keranjang?')">
                  <i data-feather="trash-2"></i>
                </a>
              </div>
            <?php endwhile; ?>

          </div>

          <div class="keranjang-ringkasan">
            <div class="ringkasan-total">
              <span>Total (<span id="jumlahDipilih">0</span> item dipilih)</span>
              <strong id="totalHarga">Rp 0</strong>
            </div>
            <button type="submit" class="btn-checkout">Checkout</button>
          </div>
        </form>

      <?php else: ?>
        <div class="keranjang-kosong">
          <i data-feather="shopping-cart"></i>
          <p>Keranjang kamu masih kosong.</p>
          <a href="index.php#katalog" class="pesan-btn">Mulai Belanja</a>
        </div>
      <?php endif; ?>

    </section>

    <script>
      feather.replace();

      function hitungTotal() {
        let total = 0;
        let jumlahDipilih = 0;

        document.querySelectorAll('.checkbox-item:checked').forEach(cb => {
          total += parseInt(cb.dataset.harga) * parseInt(cb.dataset.jumlah);
          jumlahDipilih++;
        });

        document.getElementById('totalHarga').textContent = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('jumlahDipilih').textContent = jumlahDipilih;
      }

      document.querySelectorAll('.checkbox-item').forEach(cb => {
        cb.addEventListener('change', hitungTotal);
      });

      // cegah submit checkout kalau tidak ada item yang dipilih
      const formCheckout = document.getElementById('formCheckout');
      if (formCheckout) {
        formCheckout.addEventListener('submit', (e) => {
          const adaCheklist = document.querySelectorAll('.checkbox-item:checked').length > 0;
          if (!adaCheklist) {
            e.preventDefault();
            alert('Pilih minimal 1 produk untuk checkout.');
          }
        });
      }

      hitungTotal();
    </script>

    <script src="script.js"></script>
</body>
</html>
