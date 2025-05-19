<?php
session_start();
include "../config/connection.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$login = mysqli_query($connection, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
$jumlah_login = mysqli_num_rows($login);

if ($jumlah_login == 0) {
    echo "<script>alert('Login Failed'); window.location.href='admin.php';</script>";
} else {
    $data_login = mysqli_fetch_array($login);
    $_SESSION['nama_admin'] = $data_login['nama_admin'];
    $_SESSION['username'] = $data_login['username'];
    $_SESSION['foto_admin'] = $data_login['foto_admin'];
    echo "<script>alert('Login successfully'); window.location.href='index.php';</script>";
}
?>
<meta http-equiv="refresh" content="0;URL=index.php">