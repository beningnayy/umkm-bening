<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user = $_SESSION['id_user'];
$mode = isset($_POST['mode']) ? $_POST['mode'] : (isset($_GET['mode']) ? $_GET['mode'] : '');

$items = [];
$total_harga = 0;

if ($mode === 'langsung') {
    // dari tombol "Beli Sekarang"
    $id_produk = isset($_GET['id_produk']) ? intval($_GET['id_produk']) : 0;
    $jumlah    = isset($_GET['jumlah']) ? intval($_GET['jumlah']) : 1;

    $q = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id='$id_produk'");
    if (mysqli_num_rows($q) > 0) {
        $p = mysqli_fetch_array($q);
        $items[] = [
            'id_produk'   => $p['id'],
            'nama_produk' => $p['nama_produk'],
            'poto'        => $p['poto'],
            'harga'       => $p['harga'],
            'jumlah'      => $jumlah,
            'subtotal'    => $p['harga'] * $jumlah,
        ];
        $total_harga += $p['harga'] * $jumlah;
    }

} elseif ($mode === 'keranjang' && isset($_POST['pilih'])) {
    // dari halaman keranjang (item yang dicentang)
    $id_terpilih = array_map('intval', $_POST['pilih']);
    $id_string = implode(',', $id_terpilih);

    $q = mysqli_query($koneksi, "
        SELECT tk.id_keranjang, tk.jumlah, tp.id AS id_produk, tp.nama_produk, tp.poto, tp.harga
        FROM tb_keranjang tk
        JOIN tb_produk tp ON tk.id_produk = tp.id
        WHERE tk.id_user = '$id_user' AND tk.id_keranjang IN ($id_string)
    ");

    while ($row = mysqli_fetch_array($q)) {
        $items[] = [
            'id_keranjang' => $row['id_keranjang'],
            'id_produk'    => $row['id_produk'],
            'nama_produk'  => $row['nama_produk'],
            'poto'         => $row['poto'],
            'harga'        => $row['harga'],
            'jumlah'       => $row['jumlah'],
            'subtotal'     => $row['harga'] * $row['jumlah'],
        ];
        $total_harga += $row['harga'] * $row['jumlah'];
    }
}

// kalau tidak ada item sama sekali, balik ke keranjang
if (count($items) === 0) {
    header('location: keranjang.php');
    exit;
}

// ambil data user untuk alamat pengiriman
$q_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id_user'");
$user = mysqli_fetch_array($q_user);

function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="keranjang-style.css">
</head>
<body>
    <section class="checkout-page">

      <h1><i data-feather="clipboard"></i> Checkout</h1>

      <div class="tombol-kanan">
          <a href="index.php" class="btn-kembali"> 
              <i data-feather="arrow-left"></i> Kembali
          </a>
      </div>

      <div class="checkout-layout">

        <div class="checkout-kiri">

          <div class="card">
            <h3><i data-feather="map-pin"></i> Alamat Pengiriman</h3>
            <p class="alamat-tampil">
              <strong><?= htmlspecialchars($user['nama'] ?: $user['username']) ?></strong><br>
              <?= htmlspecialchars($user['alamat'] ?: 'Alamat belum diisi, silakan lengkapi di halaman Profile.') ?><br>
              <?= htmlspecialchars($user['hp'] ?: '') ?>
            </p>
          </div>

          <div class="card">
            <h3><i data-feather="package"></i> Produk Dipesan</h3>

            <?php foreach ($items as $item): ?>
              <div class="checkout-item">
                <img src="image/bouquet/<?= htmlspecialchars($item['poto']) ?>" alt="<?= htmlspecialchars($item['nama_produk']) ?>">
                <div class="checkout-item-info">
                  <h4><?= htmlspecialchars($item['nama_produk']) ?></h4>
                  <span><?= $item['jumlah'] ?> x <?= formatHarga($item['harga']) ?></span>
                </div>
                <div class="checkout-item-subtotal"><?= formatHarga($item['subtotal']) ?></div>
              </div>
            <?php endforeach; ?>
          </div>

        </div>

        <div class="checkout-kanan">

          <div class="card">
            <h3><i data-feather="credit-card"></i> Metode Pembayaran</h3>
            <div class="pilihan-group">
              <label class="pilihan-item">
                <input type="radio" name="metode_bayar" value="Transfer Bank" form="formCheckoutFinal" checked>
                <span>Transfer Bank</span>
              </label>
              <label class="pilihan-item">
                <input type="radio" name="metode_bayar" value="COD (Bayar di Tempat)" form="formCheckoutFinal">
                <span>COD (Bayar di Tempat)</span>
              </label>
              <label class="pilihan-item">
                <input type="radio" name="metode_bayar" value="E-Wallet (OVO/Dana/QRIS)" form="formCheckoutFinal">
                <span>E-Wallet (OVO/Dana/QRIS)</span>
              </label>
            </div>
          </div>

          <div class="card">
            <h3><i data-feather="truck"></i> Metode Pengiriman</h3>
            <div class="pilihan-group">
              <label class="pilihan-item">
                <input type="radio" name="metode_kirim" value="Reguler" data-ongkir="0" form="formCheckoutFinal" checked>
                <span>Reguler <small>(2-3 hari, Gratis)</small></span>
              </label>
              <label class="pilihan-item">
                <input type="radio" name="metode_kirim" value="Express" data-ongkir="15000" form="formCheckoutFinal">
                <span>Express <small>(1 hari, Rp15.000)</small></span>
              </label>
            </div>
          </div>

          <div class="card ringkasan-checkout">
            <h3>Ringkasan Pembayaran</h3>

            <div class="ringkasan-row">
              <span>Subtotal</span>
              <span id="txtSubtotal"><?= formatHarga($total_harga) ?></span>
            </div>
            <div class="ringkasan-row">
              <span>Ongkos Kirim</span>
              <span id="txtOngkir">Gratis</span>
            </div>
            <div class="ringkasan-row total">
              <span>Total Bayar</span>
              <span id="txtTotal"><?= formatHarga($total_harga) ?></span>
            </div>

            <form action="proses-checkout.php" method="POST" id="formCheckoutFinal">
              <input type="hidden" name="mode" value="<?= htmlspecialchars($mode) ?>">
              <?php foreach ($items as $item): ?>
                <?php if ($mode === 'langsung'): ?>
                  <input type="hidden" name="id_produk" value="<?= $item['id_produk'] ?>">
                  <input type="hidden" name="jumlah" value="<?= $item['jumlah'] ?>">
                <?php else: ?>
                  <input type="hidden" name="id_keranjang[]" value="<?= $item['id_keranjang'] ?>">
                <?php endif; ?>
              <?php endforeach; ?>

              <button type="submit" class="btn-buat-pesanan">Buat Pesanan</button>
            </form>
          </div>
        </div>

      </div>

    </section>

    <script>
      feather.replace();

      const totalHargaAwal = <?= (int) $total_harga ?>;

      function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
      }

      function hitungUlangTotal() {
        const radioTerpilih = document.querySelector('input[name="metode_kirim"]:checked');
        const ongkir = radioTerpilih ? parseInt(radioTerpilih.dataset.ongkir) : 0;

        document.getElementById('txtOngkir').textContent = ongkir === 0 ? 'Gratis' : formatRupiah(ongkir);
        document.getElementById('txtTotal').textContent = formatRupiah(totalHargaAwal + ongkir);
      }

      document.querySelectorAll('input[name="metode_kirim"]').forEach(radio => {
        radio.addEventListener('change', hitungUlangTotal);
      });

      hitungUlangTotal();
    </script>
    <script src="script.js"></script>
</body>
</html>
