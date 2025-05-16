<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="cssindex.css" />
  <title>Website Negara</title>
</head>
<body>

  <header class="top-header">
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#negara">Negara</a></li>
        <li><a href="#budaya">Budaya</a></li>
        <li><a href="#makanan">Makanan</a></li>
        <li><a href="#minuman">Minuman</a></li>
        <li><a href="#baju">Baju</a></li>
        <li><a href="project.php">Game</a></li>
        <span class="logout-button">
          <input type="button" value="Logout" onclick="window.location.href='logout.php'">
        </span>

      </ul>
    </nav>
  </header>

  <section id="home" class="middle">
    <h1>Belgia</h1>
  </section>

<section id="budaya" class="section-content">
  <h2>Budaya</h2>
  <?php
    include '../config/connection.php';

    $query = mysqli_query($connection, "SELECT * FROM tb_budaya");
    while ($data = mysqli_fetch_assoc($query)) {
      echo "<h3>" . htmlspecialchars($data['budaya']) . "</h3>";
      echo "<img src='../gambar/" . htmlspecialchars($data['gambar']) . "' width='300' alt='budaya'><br><br>";
    }
  ?>
  <a href="budaya_tampil.php">Tambah Budaya</a>
</section>


  <section id="negara" class="section-content">
    <h2>Negara</h2>
    <p>Belgia</p>
    <p>Belgia adalah negara yang terletak di Eropa Barat. Negara ini dikenal dengan budaya yang kaya, arsitektur yang indah, dan makanan yang lezat. 
      Belgia terkenal dengan cokelatnya yang berkualitas tinggi, bir yang bervariasi, dan wafel yang terkenal di seluruh dunia.</p>
      <img src="../gambar/belgia.jpeg" alt="belgia" />
  </section>

    <section id="makanan" class="section-content">
  <h2>makanan</h2>
  <?php
    include '../config/connection.php';

    $query = mysqli_query($connection, "SELECT * FROM tb_makanan");
    while ($data = mysqli_fetch_assoc($query)) {
      echo "<h3>" . htmlspecialchars($data['deskripsi_makanan']) . "</h3>";
      echo "<img src='../gambar/" . htmlspecialchars($data['gambar_makanan']) . "' width='300' alt='Makanan'><br><br>";
    }
  ?>
  <a href="makanan_tampil.php">Tambah Makanan</a>
</section>

<section id="minuman" class="section-content">
  <h2>Budaya</h2>
  <?php
    include '../config/connection.php';

    $query = mysqli_query($connection, "SELECT * FROM tb_minuman");
    while ($data = mysqli_fetch_assoc($query)) {
      echo "<h3>" . htmlspecialchars($data['deskripsi_minuman']) . "</h3>";
      echo "<img src='../gambar/" . htmlspecialchars($data['gambar_minuman']) . "' width='300' alt='Minuman'><br><br>";
    }
  ?>
  <a href="minuman_tampil.php">Tambah Budaya</a>
</section>

  <section id="baju" class="section-content">
    <h2>Baju</h2>
    <p>Belgia memiliki berbagai jenis pakaian tradisional yang mencerminkan budaya dan sejarahnya. Salah satu pakaian tradisional yang terkenal adalah "Gilles de Binche", yang dikenakan selama festival tahunan di kota Binche.</p>
    <div class="image">
      <img src="../gambar/baju.jpeg" alt="Baju Tradisional Belgia" />
    </div>
  </section>

  <footer>
    &copy; 2025 Kelompok Belgia. All rights reserved.
  </footer>

</body>
</html>
