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

      </ul>
    </nav>
  </header>
  
  <section id="home" class="middle">
    <h1>Belgia</h1>
  </section>

  <section id="negara" class="section-content">
    <h2>Negara</h2>
    <?php
    include "../config/connection.php";
    $query = mysqli_query($connection, "SELECT * FROM tb_negara");
    while ($data = mysqli_fetch_array($query)) {
        echo "<p>" . $data['negara'] . "</p>";
        echo "<p>" . $data['deskripsi_negara'] . "</p>";
        echo "<img src='" . $data['bendera'] . "' alt='gambar bendera' width='150'>";
        echo "<hr>";
    }
  ?>
  </section>
  
<section id="budaya" class="section-content">
  <h2>Budaya</h2>
  <?php
    include "../config/connection.php";
    $query = mysqli_query($connection, "SELECT * FROM tb_budaya");

    while ($data = mysqli_fetch_array($query)) {
        echo "<p>" . $data['budaya'] . "</p>";
        echo "<img src='" . $data['gambar'] . "' alt='gambar budaya' width='150'>";
        echo "<hr>";
    }
  ?>
</section>

    <section id="makanan" class="section-content">
      <h2>Makanan</h2>
    <?php
    include "../config/connection.php";
    $query = mysqli_query($connection, "SELECT * FROM tb_makanan");

    while ($data = mysqli_fetch_array($query)) {
        echo "<p>" . $data['makanan'] . "</p>";
        echo "<p>" . $data['deskripsi_makanan'] . "</p>";
        echo "<img src='" . $data['gambar_makanan'] . "' alt='gambar budaya' width='150'>";
        echo "<hr>";
    }
  ?>
  </section>

<section id="minuman" class="section-content">
    <h2>Minuman</h2>
     <?php
    include "../config/connection.php";
    $query = mysqli_query($connection, "SELECT * FROM tb_minuman");

    while ($data = mysqli_fetch_array($query)) {
        echo "<p>" . $data['minuman'] . "</p>";
        echo "<p>" . $data['deskripsi_minuman'] . "</p>";
        echo "<img src='" . $data['gambar_minuman'] . "' alt='gambar budaya' width='150'>";
        echo "<hr>";
    }
  ?>
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
