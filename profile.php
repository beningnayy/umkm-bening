<?php
session_start();
require 'config.php';

if (isset($_SESSION['login_success'])) {
    echo "<script>
            alert('Selamat datang, " . $_SESSION['nama'] . "!, Terimakasi sudah bergabung menjadi bagian Bloome');
          </script>";

    unset($_SESSION['login_success']);
}

if (!isset($_SESSION['id_user'])) {
    header('location: login/login.php');
    exit;
}

$id_user = $_SESSION['id_user'];

// ============ AMBIL DATA USER ============
$q_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id_user'");
$user = mysqli_fetch_array($q_user);

// ============ AMBIL DATA PESANAN (join transaksi + detail + produk) ============
$q_pesanan = mysqli_query($koneksi, "
    SELECT 
        td.id_detail,
        td.jumlah,
        tp.nama_produk,
        tp.poto,
        tp.harga,
        tt.id_transaksi,
        tt.tanggal,
        tt.status,
        (td.jumlah * tp.harga) AS subtotal
    FROM tb_detail td
    JOIN tb_transaksi tt ON td.id_transaksi = tt.id_transaksi
    JOIN tb_produk tp ON td.id_produk = tp.id
    WHERE tt.id_pelanggan = '$id_user'
    ORDER BY tt.tanggal DESC
    LIMIT 10
");

// ============ AMBIL RIWAYAT TRANSAKSI (khusus yang statusnya sudah "selesai") ============
$q_riwayat = mysqli_query($koneksi, "
    SELECT 
        td.id_detail,
        td.jumlah,
        tp.nama_produk,
        tp.poto,
        tp.harga,
        tt.id_transaksi,
        tt.tanggal,
        tt.status,
        (td.jumlah * tp.harga) AS subtotal
    FROM tb_detail td
    JOIN tb_transaksi tt ON td.id_transaksi = tt.id_transaksi
    JOIN tb_produk tp ON td.id_produk = tp.id
    WHERE tt.id_pelanggan = '$id_user' AND tt.status = 'selesai'
    ORDER BY tt.tanggal DESC
");

// ============ AMBIL DATA FAVORIT ============
$q_favorit = mysqli_query($koneksi, "
    SELECT tp.id, tp.nama_produk, tp.poto
    FROM tb_favorit tf
    JOIN tb_produk tp ON tf.id_produk = tp.id
    WHERE tf.id_user = '$id_user'
    ORDER BY tf.tanggal_favorit DESC
    LIMIT 8
");

// helper format harga & tanggal
function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
function formatTanggal($tgl) {
    return date('d M Y', strtotime($tgl));
}
function labelStatus($status) {
    $label = ['diproses' => 'Diproses', 'dikirim' => 'Dikirim', 'selesai' => 'Selesai'];
    return isset($label[$status]) ? $label[$status] : ucfirst($status);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Bloomé Bucket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile-style.css">
</head>
<body class="profile-body">

    <div class="profile-page">

      <!-- ============ SIDEBAR ============ -->
      <aside class="profile-sidebar">
        <a href="index.php" class="sidebar-logo">
          <span>❀</span> Bloomé Bucket
        </a>

        <nav class="sidebar-menu">
          <a href="#" class="menu-item active" data-tab="profile">
            <i data-feather="user"></i> Profile
          </a>
          <a href="#" class="menu-item" data-tab="pesanan">
            <i data-feather="shopping-bag"></i> Pesanan Saya
          </a>
          <a href="#" class="menu-item" data-tab="riwayat">
            <i data-feather="clock"></i> Riwayat Transaksi
          </a>
          <a href="#" class="menu-item" data-tab="favorit">
            <i data-feather="heart"></i> Favorit
          </a>
          <a href="index.php" class="menu-item">
            <i data-feather="home"></i> kembali ke home
          </a>
          <a href="logout.php" class="menu-item"><i data-feather="log-out"></i>Logout</a>
        </nav>

        <div class="sidebar-deco">🌸</div>
      </aside>

      <!-- ============ KONTEN UTAMA ============ -->
      <main class="profile-main">

        <!-- header profil -->
        <div class="profile-header">
          <div class="profile-photo">
            <img src="<?= $user['foto_profil'] ? htmlspecialchars($user['foto_profil']) : 'image/profile/default-avatar.jpg' ?>" alt="Foto Profil" id="fotoProfil">
            <button class="btn-camera" id="btnGantiFoto"><i data-feather="camera"></i></button>
            <input type="file" id="inputFoto" accept="image/*" hidden>
          </div>

          <div class="profile-greeting">
            <h1 id="namaTampil"><?= htmlspecialchars($user['nama'] ?: $user['username']) ?> <span>♡</span></h1>
            <p class="email-tampil" id="emailTampil"><?= htmlspecialchars($user['email'] ?: '-') ?></p>
            <p class="greeting-text">Terima kasih sudah menjadi bagian<br>dari Bloomé Bucket ♡</p>
          </div>
        </div>

        <div class="profile-grid" id="profileGrid">

          <!-- informasi akun -->
          <div class="card informasi-akun tab-content" data-tab-content="profile">
            <h2><i data-feather="user"></i> Informasi Akun</h2>

            <div class="info-item">
              <i data-feather="user"></i>
              <div>
                <span class="label">Nama Lengkap</span>
                <span class="value" id="infoNama"><?= htmlspecialchars($user['nama'] ?: '-') ?></span>
              </div>
            </div>

            <div class="info-item">
              <i data-feather="mail"></i>
              <div>
                <span class="label">Email</span>
                <span class="value" id="infoEmail"><?= htmlspecialchars($user['email'] ?: '-') ?></span>
              </div>
            </div>

            <div class="info-item">
              <i data-feather="calendar"></i>
              <div>
                <span class="label">Tanggal Lahir</span>
                <span class="value" id="infoTanggal"><?= $user['tanggal_lahir'] ? formatTanggal($user['tanggal_lahir']) : '-' ?></span>
              </div>
            </div>

            <div class="info-item">
              <i data-feather="map-pin"></i>
              <div>
                <span class="label">Alamat</span>
                <span class="value" id="infoAlamat"><?= htmlspecialchars($user['alamat'] ?: '-') ?></span>
              </div>
            </div>

            <button class="btn-ubah-profil" id="btnUbahProfil">
              <i data-feather="edit-2"></i> Ubah Profil
            </button>
          </div>

          <!-- pesanan saya -->
          <div class="card pesanan-saya tab-content" data-tab-content="pesanan">
            <div class="card-title-row">
              <h2><i data-feather="package"></i> Pesanan Saya</h2>
            </div>

            <?php if (mysqli_num_rows($q_pesanan) > 0): ?>
              <?php while ($row = mysqli_fetch_array($q_pesanan)): ?>
                <div class="pesanan-item">
                  <img src="image/bouquet/<?= htmlspecialchars($row['poto']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                  <div class="pesanan-detail">
                    <h4><?= htmlspecialchars($row['nama_produk']) ?></h4>
                    <span class="pesanan-meta"><?= $row['jumlah'] ?> x Buket</span>
                  </div>
                  <span class="status status-<?= $row['status'] ?>"><?= labelStatus($row['status']) ?></span>
                  <span class="pesanan-tanggal"><?= formatTanggal($row['tanggal']) ?></span>
                  <span class="pesanan-harga"><?= formatHarga($row['subtotal']) ?></span>
                  <a href="invoice.php?id=<?= $row['id_transaksi'] ?>" target="_blank" class="btn-invoice" title="Cetak Invoice">
                    <i data-feather="printer"></i>
                  </a>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="data-kosong">Kamu belum punya pesanan.</p>
            <?php endif; ?>
          </div>

          <!-- riwayat transaksi (khusus pesanan yang sudah selesai) -->
          <div class="card riwayat-transaksi tab-content" data-tab-content="riwayat">
            <div class="card-title-row">
              <h2><i data-feather="clock"></i> Riwayat Transaksi</h2>
            </div>

            <?php if (mysqli_num_rows($q_riwayat) > 0): ?>
              <?php while ($row = mysqli_fetch_array($q_riwayat)): ?>
                <div class="pesanan-item">
                  <img src="image/bouquet/<?= htmlspecialchars($row['poto']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                  <div class="pesanan-detail">
                    <h4><?= htmlspecialchars($row['nama_produk']) ?></h4>
                    <span class="pesanan-meta"><?= $row['jumlah'] ?> x Buket</span>
                  </div>
                  <span class="status status-selesai">Selesai</span>
                  <span class="pesanan-tanggal"><?= formatTanggal($row['tanggal']) ?></span>
                  <span class="pesanan-harga"><?= formatHarga($row['subtotal']) ?></span>
                  <a href="invoice.php?id=<?= $row['id_transaksi'] ?>" target="_blank" class="btn-invoice" title="Cetak Invoice">
                    <i data-feather="printer"></i>
                  </a>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="data-kosong">Belum ada transaksi yang selesai.</p>
            <?php endif; ?>
          </div>

          <!-- favorit saya -->
          <div class="card favorit-saya tab-content" data-tab-content="favorit">
            <div class="card-title-row">
              <h2><i data-feather="heart"></i> Favorit Saya</h2>
            </div>

            <?php if (mysqli_num_rows($q_favorit) > 0): ?>
              <div class="favorit-grid">
                <?php while ($f = mysqli_fetch_array($q_favorit)): ?>
                  <img src="image/bouquet/<?= htmlspecialchars($f['poto']) ?>" alt="<?= htmlspecialchars($f['nama_produk']) ?>">
                <?php endwhile; ?>
              </div>
            <?php else: ?>
              <p class="data-kosong">Kamu belum punya produk favorit.</p>
            <?php endif; ?>
          </div>

    <!-- ============ MODAL UBAH PROFIL ============ -->
    <div class="modal-overlay" id="modalOverlay">
      <div class="modal-box">
        <div class="modal-header">
          <h3>Ubah Profil</h3>
          <button id="btnTutupModal" class="btn-tutup"><i data-feather="x"></i></button>
        </div>

        <form id="formUbahProfil">
          <label>Nama Lengkap</label>
          <input type="text" id="editNama" required>

          <label>Email</label>
          <input type="email" id="editEmail" required>

          <label>Tanggal Lahir</label>
          <input type="date" id="editTanggal" value="<?= htmlspecialchars(isset($user['tanggal_lahir']) ? $user['tanggal_lahir'] : '') ?>">

          <label>Alamat</label>
          <input type="text" id="editAlamat">

          <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        </form>
      </div>
    </div>

    <script>
      feather.replace();

      // ==== switch tab sidebar ====
      const menuItems = document.querySelectorAll('.menu-item[data-tab]');
      const tabContents = document.querySelectorAll('.tab-content');
      const profileGrid = document.getElementById('profileGrid');

      function tampilkanTab(namaTab) {
        menuItems.forEach(item => item.classList.toggle('active', item.dataset.tab === namaTab));
        tabContents.forEach(content => {
          content.style.display = (content.dataset.tabContent === namaTab) ? 'block' : 'none';
        });
        profileGrid.classList.toggle('single-view', namaTab !== 'profile');
      }

      menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
          e.preventDefault();
          tampilkanTab(item.dataset.tab);
        });
      });

      tampilkanTab('profile');

      // ==== ganti foto profil (upload beneran ke server) ====
      const btnGantiFoto = document.getElementById('btnGantiFoto');
      const inputFoto = document.getElementById('inputFoto');
      const fotoProfil = document.getElementById('fotoProfil');

      btnGantiFoto.addEventListener('click', () => inputFoto.click());

      inputFoto.addEventListener('change', () => {
        const file = inputFoto.files[0];
        if (!file) return;

        // preview dulu sambil upload
        fotoProfil.src = URL.createObjectURL(file);

        const formData = new FormData();
        formData.append('foto', file);

        fetch('upload-foto.php', { method: 'POST', body: formData })
          .then(res => res.json())
          .then(data => {
            if (!data.success) {
              alert('Gagal upload foto: ' + data.message);
            }
          })
          .catch(() => alert('Terjadi kesalahan saat upload foto.'));
      });

      // ==== modal ubah profil ====
      const modalOverlay = document.getElementById('modalOverlay');
      const btnUbahProfil = document.getElementById('btnUbahProfil');
      const btnTutupModal = document.getElementById('btnTutupModal');
      const formUbahProfil = document.getElementById('formUbahProfil');

      const editNama = document.getElementById('editNama');
      const editEmail = document.getElementById('editEmail');
      const editTanggal = document.getElementById('editTanggal');
      const editAlamat = document.getElementById('editAlamat');

      function bukaModal() {
        editNama.value = document.getElementById('infoNama').textContent.trim();
        editEmail.value = document.getElementById('infoEmail').textContent.trim();
        editAlamat.value = document.getElementById('infoAlamat').textContent.trim();
        modalOverlay.classList.add('active');
      }

      function tutupModal() {
        modalOverlay.classList.remove('active');
      }

      btnUbahProfil.addEventListener('click', bukaModal);
      btnTutupModal.addEventListener('click', tutupModal);
      modalOverlay.addEventListener('click', (e) => { if (e.target === modalOverlay) tutupModal(); });

      formUbahProfil.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('nama', editNama.value);
        formData.append('email', editEmail.value);
        formData.append('tanggal_lahir', editTanggal.value);
        formData.append('alamat', editAlamat.value);

        fetch('update-profil.php', { method: 'POST', body: formData })
          .then(res => res.json())
          .then(data => {
            if (data.success) {
              document.getElementById('infoNama').textContent = editNama.value;
              document.getElementById('infoEmail').textContent = editEmail.value;
              document.getElementById('infoAlamat').textContent = editAlamat.value;
              document.getElementById('namaTampil').innerHTML = editNama.value + ' <span>♡</span>';
              document.getElementById('emailTampil').textContent = editEmail.value;
              tutupModal();
            } else {
              alert('Gagal menyimpan: ' + data.message);
            }
          })
          .catch(() => alert('Terjadi kesalahan saat menyimpan data.'));
      });
    </script>

    <script src="script.js"></script>
</body>
</html>
