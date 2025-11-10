<?php
$host = 'localhost';
$port = '5432';
$dbname = 'db_uts';
$user = 'postgres';
$pass = '123';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    die('Koneksi gagal: ' . pg_last_error());
}

pg_set_client_encoding($conn, 'UTF8');

$tampil_tentang_kami = 'SELECT
                            "isi" AS "isi"
                        FROM "tb_tentang_kami"';

$tentang_kami = pg_query($conn, $tampil_tentang_kami);
if (!$tentang_kami) {
    die('Query gagal: ' . pg_last_error($conn));
}

$tampil_menu = 'SELECT
                  "gambar" AS "gambar",
                  "nama_menu" AS "nama_menu",
                  "deskripsi" AS "deskripsi"
                FROM "menu"';

$menu = pg_query($conn, $tampil_menu);
if (!$menu) {
    die('Query gagal: ' . pg_last_error($conn));
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mie Ayam Lezat</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <div class="fixed-top bg-red">
      <div class="container" style="top: 10px;margin-top: 10px;margin-bottom: 10px;">
        <nav>
          <ul>
            <li><img src="images/mie_ayam1.png" alt="" style="width: 50px;"></li>
            <li>
              <h1 class="logo">Mie Ayam Lezat</h1>
            </li>
          </ul>
        </nav>
        <nav>
          <ul>
            <li><a href="">Beranda</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li style="margin-left:30px;"><a href="login.php" class="btn-secondary">Login</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <div class="bg-red">
  <div class="beranda1" style="position: relative;">
    <section class="hero">
      <div class="container">
        <h2>Mie Ayam Paling Lezat di Kota Malang</h2>
        <p>Rasakan kenikmatan mie ayam autentik dengan racikan bumbu khas.</p>
        <a href="menu.php" class="btn-primary">Lihat Menu</a>
      </div>
    </section>
    <img src="images/mie_ayam1.png" alt="Mie Ayam" class="beranda1-img" />
  </div>
  </div>


  <div class="drip-top">
    <svg viewBox="0 0 1920 250" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="
        M0,0 
        C150,100 200,180 250,200 
        C300,220 320,140 400,160 
        C480,180 470,70 550,100 
        C630,130 620,200 700,180 
        C780,160 780,40 860,60 
        C940,80 940,200 1020,180 
        C1100,160 1090,50 1180,90 
        C1270,130 1260,200 1340,180 
        C1420,160 1420,80 1500,100 
        C1580,120 1570,200 1650,180 
        C1730,160 1740,70 1820,100 
        C1880,130 1920,100 1920,100 
        L1920,0 
        L0,0 Z" />
    </svg>
  </div>

  <section class="about">
    <div class="container">
      <h3>Tentang Kami</h3>
      <?php $i=1; ?>
      <?php while ($row = pg_fetch_assoc($tentang_kami)): ?>
        <p>
          <?= htmlspecialchars($row["isi"], ENT_QUOTES, 'UTF-8'); ?>
        </p>
      <?php $i++; endwhile; ?>
    </div>
  </section>

  <section class="menu">
    <div class="container">
      <h3>Menu Unggulan</h3>
      <div class="menu-grid">
      <?php $i=1; ?>
      <?php while ($row = pg_fetch_assoc($menu)): ?>
        <div class="menu-item">
          <img src="images/<?= htmlspecialchars($row["gambar"], ENT_QUOTES, 'UTF-8'); ?>" alt="Mie Ayam Original">
          <h4>
              <?= htmlspecialchars($row["nama_menu"], ENT_QUOTES, 'UTF-8'); ?>
          </h4>
          <p>
              <?= htmlspecialchars($row["deskripsi"], ENT_QUOTES, 'UTF-8'); ?>
          </p>
        </div>
      <?php $i++; endwhile; ?>
      </div>
    </div>
  </section>

  <section class="testimoni">
    <div class="container">
      <h3>Apa Kata Pelanggan</h3>
      <div class="testi-grid">
        <div class="testi-item">
          <p>"Mie ayam terenak yang pernah saya coba!"</p>
          <h5>— Rina, Madiun</h5>
        </div>
        <div class="testi-item">
          <p>"Pelayanan cepat dan rasa mie-nya luar biasa."</p>
          <h5>— Andi, Jodipan</h5>
        </div>
        <div class="testi-item">
          <p>"Baksonya kenyal, mie-nya mantap. 10/10."</p>
          <h5>— Sari, Kediri</h5>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="container">
      <h3>Pesan Sekarang & Nikmati Sensasi Lezatnya!</h3>
      <a href="#kontak" class="btn-secondary">Hubungi Kami</a>
    </div>
  </section>

  <footer id="kontak">
    <div class="container">
      <p>&copy; 2025 Mie Ayam Lezat. All rights reserved.</p>
      <p>Instagram: @oaiauanai | WhatsApp: 0856-0000-0000</p>
    </div>
  </footer>
  <script>
    window.addEventListener("DOMContentLoaded", function () {
      const beranda = document.querySelector('.beranda1');
      if (beranda) {
        setTimeout(() => {
          beranda.classList.add('show');
        }, 200);
      }
    });
  </script>
</body>

</html>