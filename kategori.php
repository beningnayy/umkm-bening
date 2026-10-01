<?php
session_start();
require 'config.php'; // sesuaikan path kalau berbeda

$sudah_login = isset($_SESSION['id_user']);
$id_user     = $sudah_login ? $_SESSION['id_user'] : null;

// ============ AMBIL DAFTAR KATEGORI UNTUK SIDEBAR ============
// CATATAN: saya asumsikan kolom nama kategori di tb_kategori adalah "nama_kategori".
// Kalau nama kolomnya beda, tinggal ganti semua "nama_kategori" di file ini.
$q_kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
$kategori_semua = [];
while ($k = mysqli_fetch_array($q_kategori)) {
    $kategori_semua[] = $k;
}

// ============ TENTUKAN KATEGORI AKTIF ============
$id_kategori_aktif = isset($_GET['id']) ? intval($_GET['id']) : 0;

// kalau tidak ada id di URL, otomatis pakai kategori pertama
if ($id_kategori_aktif === 0 && count($kategori_semua) > 0) {
    $id_kategori_aktif = $kategori_semua[0]['id_kategori'];
}

$nama_kategori_aktif = 'Produk';
foreach ($kategori_semua as $k) {
    if ($k['id_kategori'] == $id_kategori_aktif) {
        $nama_kategori_aktif = $k['nama_kategori'];
        break;
    }
}

// ============ AMBIL PRODUK SESUAI KATEGORI ============
$q_produk = mysqli_query($koneksi, "
    SELECT * FROM tb_produk 
    WHERE id_kategori = '$id_kategori_aktif'
");

// ============ AMBIL DAFTAR ID PRODUK YANG SUDAH DI-FAVORIT USER INI ============
$produk_favorit_ids = [];
if ($sudah_login) {
    $q_fav = mysqli_query($koneksi, "SELECT id_produk FROM tb_favorit WHERE id_user = '$id_user'");
    while ($f = mysqli_fetch_array($q_fav)) {
        $produk_favorit_ids[] = $f['id_produk'];
    }
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
    <title><?= htmlspecialchars($nama_kategori_aktif) ?> - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="kategori-page-style.css">
</head>
<body>
    <!-- halaman kategori start -->
    <section class="kategori-page">

      <a href="index.php#katalog" class="btn-kembali">
        <i data-feather="arrow-left"></i> Kembali ke Shop
      </a>

      <div class="kategori-page-header">
        <h1><?= htmlspecialchars($nama_kategori_aktif) ?></h1>
        <p>Temukan pilihan <?= htmlspecialchars(strtolower($nama_kategori_aktif)) ?> terbaik untuk momen spesialmu.</p>
      </div>

      <div class="kategori-page-layout">

        <!-- sidebar kategori (dinamis dari tb_kategori) -->
        <aside class="sidebar-kategori">
          <h3>Kategori Buket</h3>
          <ul>
            <?php foreach ($kategori_semua as $k): ?>
              <li>
                <a href="kategori.php?id=<?= $k['id_kategori'] ?>"
                   class="<?= ($k['id_kategori'] == $id_kategori_aktif) ? 'active' : '' ?>">
                  <?= htmlspecialchars($k['nama_kategori']) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>

          <div class="sidebar-cta">
            <p><strong>Bisa Custom Sesuai Keinginanmu!</strong></p>
            <span>Pilih bunga, warna, isi, dan dekorasi favorit kamu.</span>
            <a href="index.php#custom-bouquet" class="pesan-btn">Pesan Sekarang →</a>
          </div>
        </aside>

        <!-- grid produk -->
        <div class="produk-grid">

          <?php if (mysqli_num_rows($q_produk) > 0): ?>
            <?php while ($p = mysqli_fetch_array($q_produk)): ?>
              <?php $sudah_favorit = in_array($p['id'], $produk_favorit_ids); ?>
              <div class="produk-card">

                <button class="fav-btn <?= $sudah_favorit ? 'active' : '' ?>" data-id="<?= $p['id'] ?>">
                  <i data-feather="heart"></i>
                </button>

                <img src="image/bouquet/<?= htmlspecialchars($p['poto']) ?>" alt="<?= htmlspecialchars($p['nama_produk']) ?>">
                <div class="produk-info">
                  <h4><?= htmlspecialchars($p['nama_produk']) ?></h4>
                  <p class="harga"><?= formatHarga($p['harga']) ?></p>
                  <a href="produk-detail.php?id=<?= $p['id'] ?>" class="lihat-detail-btn">Lihat Detail</a>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="produk-kosong">Belum ada produk di kategori ini.</p>
          <?php endif; ?>

        </div>

      </div>

    </section>
    <!-- halaman kategori end -->

    <script>
      feather.replace();

      const sudahLogin = <?= $sudah_login ? 'true' : 'false' ?>;

      document.querySelectorAll('.fav-btn').forEach(btn => {
        btn.addEventListener('click', () => {

          if (!sudahLogin) {
            alert('Silakan login dulu untuk menambahkan favorit.');
            window.location.href = 'login/login.php'; // sesuaikan path halaman login
            return;
          }

          const idProduk = btn.dataset.id;
          const sedangAktif = btn.classList.contains('active');
          const aksi = sedangAktif ? 'hapus' : 'tambah';

          // optimistic UI: langsung ubah tampilan tanpa nunggu server
          btn.classList.toggle('active');
          btn.disabled = true;

          const formData = new FormData();
          formData.append('id_produk', idProduk);
          formData.append('aksi', aksi);

          fetch('toggle-favorit.php', { method: 'POST', body: formData })
            .then(res => res.json())
            .then(data => {
              if (!data.success) {
                // gagal -> balikin lagi tampilannya
                btn.classList.toggle('active');
                alert('Gagal: ' + data.message);
              }
            })
            .catch(() => {
              btn.classList.toggle('active');
              alert('Terjadi kesalahan, coba lagi.');
            })
            .finally(() => {
              btn.disabled = false;
            });
        });
      });
    </script>

    <script src="script.js"></script>
</body>
</html>
