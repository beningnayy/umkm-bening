<?php
session_start();
require 'config.php';

if (!isset($_SESSION['id_user'])) {
    header('location: login/logout.php');
    exit;
}

$id_user = $_SESSION['id_user'];
$id_transaksi = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ambil data transaksi, pastikan ini milik user yang login (atau admin)
$q_transaksi = mysqli_query($koneksi, "
    SELECT tt.*, tu.nama, tu.username, tu.email, tu.hp, tu.alamat
    FROM tb_transaksi tt
    JOIN tb_user tu ON tt.id_pelanggan = tu.id
    WHERE tt.id_transaksi = '$id_transaksi'
");

$transaksi = mysqli_num_rows($q_transaksi) > 0 ? mysqli_fetch_array($q_transaksi) : null;

$boleh_akses = false;
if ($transaksi) {
    $is_pemilik = ($transaksi['id_pelanggan'] == $id_user);
    $is_admin   = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    $boleh_akses = $is_pemilik || $is_admin;
}

if (!$transaksi || !$boleh_akses) {
    http_response_code(404);
}

$rincian = [];
if ($transaksi) {
    $q_detail = mysqli_query($koneksi, "
        SELECT tp.nama_produk, tp.harga, td.jumlah, (tp.harga * td.jumlah) AS subtotal
        FROM tb_detail td
        JOIN tb_produk tp ON td.id_produk = tp.id
        WHERE td.id_transaksi = '$id_transaksi'
    ");
    while ($d = mysqli_fetch_array($q_detail)) {
        $rincian[] = $d;
    }
}

function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
function formatTanggal($tgl) {
    return date('d F Y', strtotime($tgl));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #<?= $id_transaksi ?> - Bloomé Bucket</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
      :root { --primary: #cd5782; --bg: #fedbda; }
      * { box-sizing: border-box; margin: 0; padding: 0; }
      body { font-family: 'Poppins', sans-serif; background: #f2f2f5; color: #333; }

      .invoice-wrap {
        max-width: 720px;
        margin: 2.5rem auto;
        background: #fff;
        padding: 3rem;
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      }

      .invoice-toolbar {
        max-width: 720px;
        margin: 0 auto 1rem;
        display: flex;
        justify-content: flex-end;
      }

      .btn-print {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: 0.8rem 1.6rem;
        border-radius: 0.6rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .btn-print:hover { background: #b34b70; }

      .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 2px solid var(--bg);
        padding-bottom: 1.6rem;
        margin-bottom: 1.6rem;
      }

      .invoice-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: var(--primary);
      }

      .invoice-brand span { display: block; font-size: 0.85rem; color: #999; font-family: 'Poppins', sans-serif; margin-top: 0.2rem; }

      .invoice-meta { text-align: right; }
      .invoice-meta h2 { font-size: 1.3rem; color: #333; }
      .invoice-meta p { font-size: 0.9rem; color: #888; margin-top: 0.2rem; }

      .invoice-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        gap: 2rem;
      }

      .invoice-info h4 { font-size: 0.85rem; color: #999; text-transform: uppercase; margin-bottom: 0.4rem; }
      .invoice-info p { font-size: 0.98rem; color: #444; line-height: 1.5; }

      table.invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.6rem;
      }

      .invoice-table th {
        text-align: left;
        background: var(--bg);
        color: #7a4b55;
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
      }

      .invoice-table td {
        padding: 0.9rem 1rem;
        border-bottom: 1px solid #f0e9ea;
        font-size: 0.95rem;
      }

      .invoice-table th:last-child, .invoice-table td:last-child { text-align: right; }
      .invoice-table th:nth-child(3), .invoice-table td:nth-child(3) { text-align: center; }

      .invoice-total {
        display: flex;
        justify-content: flex-end;
      }

      .invoice-total table { width: 260px; }
      .invoice-total td { padding: 0.5rem 0; font-size: 0.95rem; }
      .invoice-total .grand-total td { font-size: 1.2rem; font-weight: 700; color: var(--primary); border-top: 2px solid var(--bg); padding-top: 0.8rem; }

      .invoice-footer {
        text-align: center;
        margin-top: 2.5rem;
        padding-top: 1.4rem;
        border-top: 1px dashed #ddd;
        color: #999;
        font-size: 0.9rem;
      }

      .status-badge {
        display: inline-block;
        padding: 0.3rem 0.9rem;
        border-radius: 1rem;
        font-size: 0.82rem;
        font-weight: 600;
      }
      .status-diproses { background: #fce3b8; color: #a1660a; }
      .status-dikirim { background: #d6f0dd; color: #1f7a3f; }
      .status-selesai { background: #e6ddf5; color: #6b3fa0; }

      /* saat diprint, sembunyikan tombol print dan bikin tampilan lebih rapi */
      @media print {
        body { background: #fff; }
        .invoice-toolbar { display: none; }
        .invoice-wrap { box-shadow: none; margin: 0; border-radius: 0; max-width: 100%; }
      }
    </style>
</head>
<body>

    <?php if ($transaksi): ?>

      <div class="invoice-toolbar">
        <button class="btn-print" onclick="window.print()">
          <i data-feather="printer"></i> Cetak Invoice
        </button>
      </div>

      <div class="invoice-wrap">

        <div class="invoice-header">
          <div class="invoice-brand">
            ❀ Bloomé Bucket
            <span>Bloom Your Day</span>
          </div>
          <div class="invoice-meta">
            <h2>INVOICE</h2>
            <p>No. Invoice: #<?= $transaksi['id_transaksi'] ?></p>
            <p>Tanggal: <?= formatTanggal($transaksi['tanggal']) ?></p>
            <p class="status-badge status-<?= $transaksi['status'] ?>"><?= ucfirst($transaksi['status']) ?></p>
          </div>
        </div>

        <div class="invoice-info">
          <div>
            <h4>Ditagihkan Kepada</h4>
            <p>
              <strong><?= htmlspecialchars($transaksi['nama'] ?: $transaksi['username']) ?></strong><br>
              <?= htmlspecialchars($transaksi['alamat'] ?: '-') ?><br>
              <?= htmlspecialchars($transaksi['hp'] ?: '-') ?><br>
              <?= htmlspecialchars($transaksi['email'] ?: '-') ?>
            </p>
          </div>
          <div>
            <h4>Metode Pembayaran</h4>
            <p><?= htmlspecialchars($transaksi['metode_bayar'] ?: '-') ?></p>
            <h4 style="margin-top:1rem;">Metode Pengiriman</h4>
            <p><?= htmlspecialchars($transaksi['metode_kirim'] ?: '-') ?></p>
          </div>
        </div>

        <table class="invoice-table">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Harga Satuan</th>
              <th>Qty</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rincian as $item): ?>
              <tr>
                <td><?= htmlspecialchars($item['nama_produk']) ?></td>
                <td><?= formatHarga($item['harga']) ?></td>
                <td><?= $item['jumlah'] ?></td>
                <td><?= formatHarga($item['subtotal']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <?php
        $ongkir_tampil = isset($transaksi['ongkir']) ? (int) $transaksi['ongkir'] : 0;
        $subtotal_tampil = $transaksi['total_harga'] - $ongkir_tampil;
        ?>

        <div class="invoice-total">
          <table>
            <tr>
              <td>Subtotal</td>
              <td style="text-align:right;"><?= formatHarga($subtotal_tampil) ?></td>
            </tr>
            <tr>
              <td>Ongkos Kirim</td>
              <td style="text-align:right;"><?= $ongkir_tampil > 0 ? formatHarga($ongkir_tampil) : 'Gratis' ?></td>
            </tr>
            <tr class="grand-total">
              <td>Total</td>
              <td style="text-align:right;"><?= formatHarga($transaksi['total_harga']) ?></td>
            </tr>
          </table>
        </div>

        <div class="invoice-footer">
          Terima kasih telah berbelanja di Bloomé Bucket ♡<br>
          Invoice ini dibuat otomatis oleh sistem.
        </div>

      </div>

    <?php else: ?>
      <div class="invoice-wrap" style="text-align:center;">
        <h2>Invoice tidak ditemukan</h2>
        <p style="color:#999; margin-top:0.6rem;">Transaksi tidak ada atau kamu tidak punya akses ke invoice ini.</p>
      </div>
    <?php endif; ?>

    <script>
      feather.replace();
    </script>
</body>
</html>
