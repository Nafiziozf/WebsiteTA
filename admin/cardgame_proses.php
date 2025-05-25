<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_cardgame=$_REQUEST['id_cardgame'];
            $deskripsi_cardgame=$_REQUEST['deskripsi_cardgame'];
            $cardgame=$_REQUEST['cardgame'];
            
            $asal = $_FILES['gambar_cardgame']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar_cardgame']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $cardgame_input = mysqli_query($connection, "INSERT INTO 
            tb_cardgame VALUES ('$id_cardgame', '$cardgame','$deskripsi_cardgame', '$simpan_gambar')");
            if ($cardgame_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_cardgame = $_REQUEST['id_cardgame'];
    $cardgame = $_REQUEST['cardgame'];

    
    if (isset($_FILES['gambar_cardgame']) && $_FILES['gambar_cardgame']['error'] == 0) {
        $asal = $_FILES['gambar_cardgame']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar_cardgame']['name'];
        move_uploaded_file($asal, $simpan_gambar);
        
        $cardgame_edit = mysqli_query($connection, "UPDATE tb_cardgame SET id_cardgame = '$id_cardgame', cardgame = '$cardgame', deskripsi_cardgame = '$deskripsi_cardgame', gambar_cardgame = '$simpan_gambar' WHERE id_cardgame = '$id_cardgame'");
    } else {
        
        $cardgame_edit = mysqli_query($connection, "UPDATE tb_cardgame SET id_cardgame = '$id_cardgame', cardgame = '$cardgame' WHERE id_cardgame = '$id_cardgame'");
    }

    if ($cardgame_edit == true) {
        echo "<script>alert ('update in db')</script>";
    } else {
        echo "<script>alert ('input in db failed')</script>";
    }

break;

        case 'hapus':
            $id_cardgame = $_REQUEST['id_cardgame'];

            $cardgame_hapus = mysqli_query ($connection, "DELETE FROM tb_cardgame
            WHERE id_cardgame = '$id_cardgame'");

            if($cardgame_hapus == true)
            {
                echo"<script>alert ('DELETE DATA BARANG ISOK')</script>";
            }
            else
            {
                echo"<script>alert ('DELETE DATA BARANG GAISOK')</script>";
            }
        break;
    }
?>
<meta http-equiv="refresh" content="0;URL=admin.php?page=cardgame_tampil">