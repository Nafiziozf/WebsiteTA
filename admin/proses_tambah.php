<?php
include 'config/koneksi.php';

$budaya = $_POST['budaya'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file($tmp, "gambar/".$gambar);

$query = "INSERT INTO tb_budaya (budaya, gambar) VALUES ('$budaya', '$gambar')";
mysqli_query($koneksi, $query);

header("Location: index.php");
?>
