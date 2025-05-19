<?php session_start();?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negara</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="header">
    </div>
    <?php
        if (isset($_SESSION['username'])){
        ?>
    <?php
        }include "login.php";
     ?>

</body>
</html>
