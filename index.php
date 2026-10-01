<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucket</title>
    <!-- fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- font awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- my style -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar start -->
     <nav class="navbar">
      <a href="#" class="navbar-logo"><span>Bloome`</span>Bucket.</a>
      <div class="navbar-nav">
        <a href="#">Home</a>
        <a href="#katalog">Catalog</a>
        <a href="#custom-bouquet">Bouquet Costume</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
      </div>
      <div class="navbar-extra">
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="keranjang.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
        <a href="<?= isset($_SESSION['id_user']) ? 'profile.php' : 'login/login.php' ?>">
            <i data-feather="user"></i>
        </a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- navbar end -->

    <!-- hero section start -->
     <section class="hero" id="home">
      <main class="content">
        <h1>Bucket Indah Untuk Momen <span>Berharga</span></h1>
        <p>Temukan buket cantikmu untuk mengungkapkan perasaan spesialmu.</p>
        <a href="#katalog" class="cta">Lihat Katalog</a>
        <a href="#custom-bouquet" class="cti">Costum Bucket</a>
      </main>
     </section>
    <!-- hero section end -->

    <!-- carousel banners start -->
  <section class="promo-section">
    <div class="promo-grid">
  <!-- ===== CAROUSEL BESAR (KIRI) ===== -->
  <div class="carousel" id="carousel">
    <div class="track" id="track">
      <div class="slide slide-1">
        <div class="cta-pill">Semua Promo →</div>
      </div>
      <div class="slide slide-2"></div>
      <div class="slide slide-3"></div>
    </div>
    <button class="nav-btn prev" onclick="move(-1)"><span>&#10094;</span></button>
    <button class="nav-btn next" onclick="move(1)"><span>&#10095;</span></button>
    <div class="dots" id="dots"></div>
  </div>

  <!-- ===== 2 BANNER STATIS (KANAN, tidak bergerak) ===== -->
  <div class="side-banners">
    <div class="static-banner banner-top">
      <div class="content">
      </div>
      <div class="deco"></div>
    </div>
    <div class="static-banner banner-bottom">
      <div class="content">
      </div>
      <div class="deco"></div>
    </div>
  </div>
</div>
</section>
<div class="wave">
  <svg xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 1440 320"
       preserveAspectRatio="none">
    <path fill="#fbbfc7e6" fill-opacity="1"
      d="M0,128L40,122.7C80,117,160,107,240,133.3C320,160,400,224,480,224C560,224,640,160,720,138.7C800,117,880,139,960,165.3C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
    </path>
  </svg>
</div>
    <!-- carousel banners end -->

    <!-- best seller start -->
    <section class="best-seller">
      <h1 class="section-title"><span>Best</span> Seller</h1>
      <div class="section-content">
        <ul class="bestseller-list">
          <li class="bestseller-item">
            <img src="image/best seller 1.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">Colorful Joy</h3>
            <p class="text">Buket bunga dengan perpaduan warna pink lembut yang memberikan kesan manis dan romantis.</p>
          </li>
          <li class="bestseller-item">
            <img src="image/best seller 2.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">SilverQueen Chunky Bar Mega Bouquet</h3>
            <p class="text">Buket yang berisi banyak coklat silverqueen ini memberikan tampilan yang menarik dan menggiurkan.</p>
          </li>
          <li class="bestseller-item">
            <img src="image/best seller 3.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">Blue Pastel Pocky Bloom</h3>
            <p class="text">Buket ini menampilkan kesan yang ceria dan sederhana, dan hiasan di sekitarnya memberikan nuansa yang ceria.</p>
          </li>
          <li class="bestseller-item">
            <img src="image/best seller 4.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">All-Star Mixed Fresh Fruit Studio Bouquet</h3>
            <p class="text">mahakarya buket buah premium yang menggabungkan berbagai jenis buah segar pilihan terbaik.</p>
          </li>
          <li class="bestseller-item">
            <img src="image/best seller 5.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">Miffy Pastel Crochet Bloom</h3>
            <p class="text">mengusung seni rajut bernilai estetika tinggi, menampilkan boneka kelinci rajut yang sangat imut dan halus.</p>
          </li>
          <li class="bestseller-item">
            <img src="image/best seller 6.png" alt="best seler 1" class="bestseller-image">
            <h3 class="name">Money Flower</h3>
            <p class="text">Buket uang dengan desain unik yang memadukan lembaran uang berbentuk bunga dengan dekorasi warna pastel.</p>
          </li>
        </ul>
      </div>
    </section>
    <!-- best seller end -->

     <!-- kategori produk start -->
<section class="kategori" id="katalog">
  <div class="kategori-container">
    <div class="kategori-header">
      <span class="kategori-label">Kategori Produk</span>
      <h2>Temukan Buket Favoritmu</h2>
      <p>Pilih kategori buket yang kamu inginkan dan temukan buket terbaik untuk setiap momen spesial.</p>
    </div>
    <div class="kategori-grid">
      <a href="kategori.php?jenis=bunga" class="kategori-card">
        <img src="image/bouquet/bunga 6.jpg" alt="Buket Bunga">
        <div class="kategori-info">
          <h3>Flower bouquet</h3>
          <p>Aneka buket bunga cantik</p>
        </div>
      </a>
      <a href="kategori.php?jenis=uang" class="kategori-card">
        <img src="image/bouquet/uang 1.jpg" alt="Buket Uang">
        <div class="kategori-info">
          <h3>Money bouquet</h3>
          <p>Hadiah spesial penuh makna</p>
        </div>
      </a>
      <a href="kategori.php?jenis=snack" class="kategori-card">
        <img src="image/bouquet/snack 4.jpg" alt="Buket Snack">
        <div class="kategori-info">
          <h3>Snack Bouquet</h3>
          <p>Cemilan favorit dalam satu buket</p>
        </div>
      </a>
      <a href="kategori.php?jenis=buah" class="kategori-card">
        <img src="image/bouquet/buah 3.jpg" alt="Buket Buah">
        <div class="kategori-info">
          <h3>Fruit Bouquet</h3>
          <p>Segar dan sehat untuk dihadiahkan</p>
        </div>
      </a>
      <a href="kategori.php?jenis=boneka" class="kategori-card">
        <img src="image/bouquet/boneka 1.jpg" alt="Buket Boneka">
        <div class="kategori-info">
          <h3>Doll Bouquet</h3>
          <p>Boneka lucu dan menggemaskan</p>
        </div>
      </a>
      <a href="kategori.php?jenis=cokelat" class="kategori-card">
        <img src="image/bouquet/coklat 3.jpg" alt="Buket coklat">
        <div class="kategori-info">
          <h3>Chocolate Bouquet</h3>
          <p>Coklat yang manis dan berkesan</p>
        </div>
      </a>
    </div>
  </div>
</section>
<!-- kategori produk end -->

<!-- custom bouquet page start -->
    <section class="custom-page" id="custom-bouquet">
      <div class="custom-header">
        <h1><span>Bouquet</span> Costume</h1>
        <p>Rangkai buket impianmu sendiri sesuai selera dan kebutuhanmu.</p>
      </div>
      <div class="custom-layout">
        <!-- ============ FORM KIRI ============ -->
        <div class="custom-form">
          <!-- step 1: warna tema -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">1</span> Pilih Warna Tema</div>
            <div class="swatch-row" data-group="warna">
              <div class="swatch active" style="background:#e94f6b" data-label="Pink" data-extra="0"><i data-feather="check"></i></div>
              <div class="swatch" style="background:#e2b48a" data-label="Peach" data-extra="0"></div>
              <div class="swatch" style="background:#b9a8d6" data-label="Ungu" data-extra="0"></div>
              <div class="swatch" style="background:#9fc0dd" data-label="Biru" data-extra="0"></div>
              <div class="swatch" style="background:#ffffff;border:1px solid #ddd" data-label="Putih" data-extra="0"></div>
              <div class="swatch" style="background:#7a1224" data-label="Merah Maroon" data-extra="0"></div>
              <div class="swatch" style="background:#222" data-label="Hitam" data-extra="0"></div>
            </div>
          </div>
          <!-- step 2: ukuran -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">2</span> Pilih Ukuran Buket</div>
            <div class="ukuran-row" data-group="ukuran">
              <div class="ukuran-card" data-label="Small (±25cm)" data-harga="50000">
                <strong>Small</strong><span>± 25 cm</span>
              </div>
              <div class="ukuran-card active" data-label="Medium (±35cm)" data-harga="70000">
                <strong>Medium</strong><span>± 35 cm</span>
                <i data-feather="check" class="check-icon"></i>
              </div>
              <div class="ukuran-card" data-label="Large (±45cm)" data-harga="100000">
                <strong>Large</strong><span>± 45 cm</span>
              </div>
              <div class="ukuran-card" data-label="Extra Large (±55cm)" data-harga="125000">
                <strong>Extra Large</strong><span>± 55 cm</span>
              </div>
            </div>
          </div>
          <!-- step 3: jenis bunga -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">3</span> Pilih Jenis Bunga</div>
            <select id="jenisBunga" class="select-box">
              <option value="Campuran (Mix Flower)" data-extra="0">Campuran (Mix Flower)</option>
              <option value="Mawar" data-extra="15000">Mawar</option>
              <option value="Tulip" data-extra="45000">Tulip</option>
              <option value="Lily" data-extra="40000">Lily</option>
              <option value="Matahari" data-extra="18000">Matahari</option>
              <option value="Gerbera" data-extra="15000">Gerbera</option>
              <option value="Carnation" data-extra="13000">Carnation</option>
              <option value="Aster" data-extra="7000">Aster</option>
              <option value="Peony" data-extra="100000">Peony</option>
              <option value="Anggrek" data-extra="28000">Anggrek</option>
              <option value="Calla Lily" data-extra="40000">Calla Lily</option>
              <option value="Bunga Kering (Dried Flower)" data-extra="25000">Bunga Kering (Dried Flower)</option>
            </select>
          </div>
          <!-- step 4: wrapping -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">4</span> Pilih Wrapping</div>
            <div class="swatch-row square" data-group="wrapping">
              <div class="swatch square active" style="background:#f6a8bb" data-label="Pink Lembut" data-extra="0"><i data-feather="check"></i></div>
              <div class="swatch square" style="background:#e9caa1" data-label="Krem" data-extra="0"></div>
              <div class="swatch square" style="background:#f2f2f2;border:1px solid #ddd" data-label="Putih" data-extra="0"></div>
              <div class="swatch square" style="background:#f4b6c2" data-label="Pink Cerah" data-extra="0"></div>
              <div class="swatch square" style="background:#222" data-label="Hitam" data-extra="0"></div>
            </div>
          </div>
          <!-- step 5: pita -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">5</span> Tambahkan Pita</div>
            <div class="swatch-row" data-group="pita">
              <div class="swatch active" style="background:#e94f6b" data-label="Pink" data-extra="0"><i data-feather="check"></i></div>
              <div class="swatch" style="background:#e2b48a" data-label="Peach" data-extra="0"></div>
              <div class="swatch" style="background:#ffffff;border:1px solid #ddd" data-label="Putih" data-extra="0"></div>
              <div class="swatch" style="background:#a9713f" data-label="Coklat" data-extra="0"></div>
              <div class="swatch" style="background:#222" data-label="Hitam" data-extra="0"></div>
              <div class="swatch" style="background:#7a1224" data-label="Merah Maroon" data-extra="0"></div>
              <div class="swatch" style="background:#9fc0dd" data-label="Biru" data-extra="0"></div>
            </div>
          </div>
          <!-- step 6: kartu ucapan -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">6</span> Kartu Ucapan (Opsional)</div>
            <div class="textarea-wrap">
              <textarea id="kartuUcapan" maxlength="150" placeholder="Tulis pesanmu di sini..."></textarea>
              <span class="char-count"><span id="countKartu">0</span>/150</span>
            </div>
          </div>
          <!-- step 7: instruksi tambahan -->
          <div class="step-block">
            <div class="step-title"><span class="step-num">7</span> Instruksi Tambahan (Opsional)</div>
            <div class="textarea-wrap">
              <textarea id="instruksiTambahan" maxlength="200" placeholder="Tuliskan catatan tambahan untuk rangkaian buketmu..."></textarea>
              <span class="char-count"><span id="countInstruksi">0</span>/200</span>
            </div>
          </div>
        </div>
        <!-- ============ RINGKASAN KANAN ============ -->
        <aside class="ringkasan-box">
          <div class="ringkasan-title">Ringkasan Pesanan <i data-feather="heart"></i></div>

          <div class="ringkasan-row"><span>Warna Tema</span><span id="rWarna">-</span></div>
          <div class="ringkasan-row"><span>Ukuran Buket</span><span id="rUkuran">-</span></div>
          <div class="ringkasan-row"><span>Jenis Bunga</span><span id="rBunga">-</span></div>
          <div class="ringkasan-row"><span>Wrapping</span><span id="rWrapping">-</span></div>
          <div class="ringkasan-row"><span>Pita</span><span id="rPita">-</span></div>
          <div class="ringkasan-row"><span>Kartu Ucapan</span><span id="rKartu">-</span></div>
          <div class="ringkasan-row"><span>Instruksi Tambahan</span><span id="rInstruksi">-</span></div>

          <div class="estimasi-block">
            <span class="estimasi-label">Estimasi Harga</span>
            <div class="estimasi-harga" id="estimasiHarga">Rp 0</div>
            <span class="estimasi-note">* Harga dapat berubah sesuai pilihan item</span>
          </div>

          <button id="btnKirimWA" class="btn-kirim-wa">
            <i data-feather="send"></i> Kirim via WhatsApp
          </button>

          <div class="info-box">
            <div class="info-title"><i data-feather="info"></i> Informasi</div>
            <ul>
              <li>Proses pembuatan 1–2 hari</li>
              <li>Untuk request mendesak, silakan hubungi kami</li>
              <li>Warna bunga dapat menyesuaikan ketersediaan</li>
            </ul>
          </div>
        </aside>
      </div>
    </section>

    <script>
      feather.replace();
      // ==== GANTI NOMOR WHATSAPP TOKO DI SINI ====
      // format: kode negara tanpa "+" atau "0" di depan, contoh 62812xxxxxxx
      const NOMOR_WA = "087808166740";

      let state = {
        warna: "Pink",
        ukuran: "Medium (±35cm)",
        hargaUkuran: 150000,
        bunga: "Campuran (Mix Flower)",
        extraBunga: 0,
        wrapping: "Pink Lembut",
        pita: "Pink",
        kartu: "",
        instruksi: ""
      };

      function pilihSwatch(groupEl, el) {
        groupEl.querySelectorAll('.swatch').forEach(s => {
          s.classList.remove('active');
          s.innerHTML = '';
        });
        el.classList.add('active');
        el.innerHTML = '<i data-feather="check"></i>';
        feather.replace();
      }

      // warna tema
      const warnaGroup = document.querySelector('[data-group="warna"]');
      warnaGroup.querySelectorAll('.swatch').forEach(el => {
        el.addEventListener('click', () => {
          pilihSwatch(warnaGroup, el);
          state.warna = el.dataset.label;
          updateRingkasan();
        });
      });

      // wrapping
      const wrappingGroup = document.querySelector('[data-group="wrapping"]');
      wrappingGroup.querySelectorAll('.swatch').forEach(el => {
        el.addEventListener('click', () => {
          pilihSwatch(wrappingGroup, el);
          state.wrapping = el.dataset.label;
          updateRingkasan();
        });
      });

      // pita
      const pitaGroup = document.querySelector('[data-group="pita"]');
      pitaGroup.querySelectorAll('.swatch').forEach(el => {
        el.addEventListener('click', () => {
          pilihSwatch(pitaGroup, el);
          state.pita = el.dataset.label;
          updateRingkasan();
        });
      });

      // ukuran
      const ukuranCards = document.querySelectorAll('.ukuran-card');
      ukuranCards.forEach(card => {
        card.addEventListener('click', () => {
          ukuranCards.forEach(c => { c.classList.remove('active'); const ic = c.querySelector('.check-icon'); if (ic) ic.remove(); });
          card.classList.add('active');
          const icon = document.createElement('i');
          icon.setAttribute('data-feather', 'check');
          icon.classList.add('check-icon');
          card.appendChild(icon);
          feather.replace();

          state.ukuran = card.dataset.label;
          state.hargaUkuran = parseInt(card.dataset.harga);
          updateRingkasan();
        });
      });

      // jenis bunga
      const selectBunga = document.getElementById('jenisBunga');
      selectBunga.addEventListener('change', () => {
        const opt = selectBunga.selectedOptions[0];
        state.bunga = opt.value;
        state.extraBunga = parseInt(opt.dataset.extra);
        updateRingkasan();
      });

      // kartu ucapan
      const kartuEl = document.getElementById('kartuUcapan');
      kartuEl.addEventListener('input', () => {
        document.getElementById('countKartu').textContent = kartuEl.value.length;
        state.kartu = kartuEl.value;
        updateRingkasan();
      });

      // instruksi tambahan
      const instruksiEl = document.getElementById('instruksiTambahan');
      instruksiEl.addEventListener('input', () => {
        document.getElementById('countInstruksi').textContent = instruksiEl.value.length;
        state.instruksi = instruksiEl.value;
        updateRingkasan();
      });

      function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
      }

      function updateRingkasan() {
        document.getElementById('rWarna').textContent = state.warna;
        document.getElementById('rUkuran').textContent = state.ukuran;
        document.getElementById('rBunga').textContent = state.bunga;
        document.getElementById('rWrapping').textContent = state.wrapping;
        document.getElementById('rPita').textContent = state.pita;
        document.getElementById('rKartu').textContent = state.kartu.trim() ? state.kartu : '-';
        document.getElementById('rInstruksi').textContent = state.instruksi.trim() ? state.instruksi : '-';

        const total = state.hargaUkuran + state.extraBunga;
        document.getElementById('estimasiHarga').textContent = formatRupiah(total);
      }

      // tombol kirim ke WhatsApp
      document.getElementById('btnKirimWA').addEventListener('click', () => {
        const total = state.hargaUkuran + state.extraBunga;

        const pesan =
          `Halo Bloomé Bucket, saya ingin pesan Custom Bouquet dengan detail berikut:

          Warna Tema: ${state.warna}
          Ukuran Buket: ${state.ukuran}
          Jenis Bunga: ${state.bunga}
          Wrapping: ${state.wrapping}
          Pita: ${state.pita}
          Kartu Ucapan: ${state.kartu.trim() ? state.kartu : '-'}
          Instruksi Tambahan: ${state.instruksi.trim() ? state.instruksi : '-'}

          Estimasi Harga: ${formatRupiah(total)}

          Mohon info lebih lanjut untuk proses pemesanannya. Terima kasih!`;

        const url = `https://wa.me/${NOMOR_WA}?text=${encodeURIComponent(pesan)}`;
        window.open(url, '_blank');
      });

      // inisialisasi awal
      updateRingkasan();
    </script>

    <!-- custom bouquet page end -->

    <!-- about section start -->
<section class="about" id="about">
  <h1 class="heading"><span>About</span> Us</h1>
  <div class="row">
    <div class="video-container">
      <video src="image/vidioflower.mp4" loop autoplay muted playsinline></video>
      <h3>Best Flower Sellers</h3>
    </div>
    <div class="content">
      <h3>Why Choose Us?</h3>
      <p>Kami menyediakan berbagai macam bunga dan buket cantik untuk menemani setiap momen spesial. Setiap buket dibuat dengan penuh perhatian agar memberikan kesan yang indah dan berkesan.</p>
      <p>Kami juga menyediakan berbagai pilihan bunga dan desain yang dapat disesuaikan dengan keinginanmu.</p>
    </div>
  </div>
</section>
<!-- about section end -->

<!-- review section start -->
<section class="review" id="review">
    <h1 class="heading"><span>Customer's</span> Review</h1>
    <div class="box-container">
        <!-- Review 1 -->
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Hai min, gila bunganya bagus banget, cewe gue suka banget katanya. bunga nya juga banyak banget jenis nya, masih pada fresh juga. gue beli buket yang garden mix, dan itu bagus banget banget. next bakal beli di sini lagi si</p>
            <div class="user">
                <img src="image/customer.jpg" alt="customer">
                <div class="user-info">
                    <h3>Anh Keonho</h3>
                    <span>Happy Customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
        <!-- Review 2 -->
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Pesan bucket bunga dan hasil nya bguss banget, sesuai sama yang gue request, bunga nya juga rapi dan cantik. pengerjaan nya cepet banget, hari ini pesan besok udah bisa diambil. pokoknya puas sama hasil nya, thank youu!</p>
            <div class="user">
                <img src="image/customer2.jpg" alt="customer">
                <div class="user-info">
                    <h3>James Chao</h3>
                    <span>Happy Customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
        <!-- Review 3 -->
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Gue pesen bucket coklat sama boneka, hasilnya gila cakep banget, recomended banget beli bucket disini, harga nya juga masih affordable banget, worth it dengan hasil yang secakep itu. nanti gue suruh temen temen gue buat beli dini pokoknya</p>
            <div class="user">
                <img src="image/customer3.jpg" alt="customer">
                <div class="user-info">
                    <h3>Eom SungHyun</h3>
                    <span>Happy Customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
    </div>
</section>
<!-- review section end -->

<!-- contact section starts -->
<section id="contact" class="contact">
  <h1><span>Contact</span> Us</h1>
  <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126791.12193784419!2d108.47163542861608!3d-6.742685203999473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee2649e6e5bbb%3A0x70a07638a7fe12fe!2sCirebon%2C%20Kota%20Cirebon%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1789739474903!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" class="map"></iframe>
      ```html
<form id="contactForm">
  <div class="input-group">
    <svg data-feather="user"></svg>
    <input type="text" id="nama" placeholder="name" required>
  </div>

  <div class="input-group">
    <svg data-feather="mail"></svg>
    <input type="email" id="email" placeholder="email" required>
  </div>

  <div class="input-group">
    <svg data-feather="phone"></svg>
    <input type="text" id="no" placeholder="no" required>
  </div>

  <button type="submit" class="btn">Send</button>
</form>

<script>
  document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Nomor WhatsApp tujuan
    const nomorWA = "087808166740";

    // Ambil data dari form
    const nama = document.getElementById("nama").value;
    const email = document.getElementById("email").value;
    const no = document.getElementById("no").value;

    // Isi pesan
    const pesan = 
      "Halo, saya ingin menghubungi Anda.%0A%0A" +
      "Nama: " + nama + "%0A" +
      "Email: " + email + "%0A" +
      "No. HP: " + no;

    // Buka WhatsApp
    const url = "https://wa.me/" + nomorWA + "?text=" + pesan;

    window.open(url, "_blank");
  });
</script>
```

  </div>
</section>
<div class="wave">
  <svg xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 1440 320"
       preserveAspectRatio="none">
    <path fill="#fbbfc7e6" fill-opacity="1"
      d="M0,128L40,122.7C80,117,160,107,240,133.3C320,160,400,224,480,224C560,224,640,160,720,138.7C800,117,880,139,960,165.3C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
    </path>
  </svg>
</div>
<!-- contact section end -->

<!-- footer section start -->
<section class="footer">
  <div class="box-container">
    <div class="box">
      <h3>Quick Links</h3>
      <a href="#">Home</a>
      <a href="#katalog">Catalog</a>
      <a href="#custom-bouquet">Bouquet Costume</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="box">
      <h3>Extra Links</h3>
      <a href="#">My Account</a>
      <a href="#">My Order</a>
      <a href="#">My Favorite</a>
    </div>

    <div class="box">
      <h3>Locations</h3>
      <a href="#">Cirebon</a>
      <a href="#">Bandung</a>
      <a href="#">Jakarta</a>
      <a href="#">Jogjakarta</a>
    </div>

    <div class="box">
      <h3>Contact Info</h3>
      <a href="#">+62 878-0816-6740</a>
      <a href="#">hellobloome@gmail.com</a>
      <a href="#">Perjuangan, Cirebon, Indonesia</a>
      <img src="image/payment.png" alt="Payment">
    </div>
  </div>
  <div class="credit">
    Created by <a href="https://www.instagram.com/bnvygll_?stkn=MW5tZmZndTdlbmM4bA=="><span>Bening Naydili</span></a> | All Rights Reserved
  </div>
</section>
<!-- footer section end -->

    <!-- feather icons -->
    <script>
      feather.replace();
    </script>
    <script src="script.js"></script>
</body>
</html>