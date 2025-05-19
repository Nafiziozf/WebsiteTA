<?php session_start();?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admincss.css">
</head>
<body>

    <div id="header">
        Halaman Admin
    </div>
    <?php
        if (isset($_SESSION['username'])){
        ?>
    <div id="kiri">
        <?php include "menu.php" ?>
    </div>

    <div id="kanan">
        <?php include "isi.php"; ?>
    </div>
    <?php
        }else include "login.php";
     ?>
    <div id="footer">
        Copyright &copy; belum mandi dari pagi
    </div>

</body>
</html>
