<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_gamepc=$_REQUEST['id_gamepc'];
            $deskripsi_gamepc=$_REQUEST['deskripsi_gamepc'];
            $gamepc=$_REQUEST['gamepc'];
            
            $asal = $_FILES['gambar_gamepc']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar_gamepc']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $gamepc_input = mysqli_query($connection, "INSERT INTO 
            tb_gamepc VALUES ('$id_gamepc', '$gamepc','$deskripsi_gamepc', '$simpan_gambar')");
            if ($gamepc_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_gamepc = $_REQUEST['id_gamepc'];
    $gamepc = $_REQUEST['gamepc'];

    
    if (isset($_FILES['gambar_gamepc']) && $_FILES['gambar_gamepc']['error'] == 0) {
        $asal = $_FILES['gambar_gamepc']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar_gamepc']['name'];
        move_uploaded_file($asal, $simpan_gambar);
        
        $gamepc_edit = mysqli_query($connection, "UPDATE tb_gamepc SET id_gamepc = '$id_gamepc', gamepc = '$gamepc', deskripsi_gamepc = '$deskripsi_gamepc', gambar_gamepc = '$simpan_gambar' WHERE id_gamepc = '$id_gamepc'");
    } else {
        
        $gamepc_edit = mysqli_query($connection, "UPDATE tb_gamepc SET id_gamepc = '$id_gamepc', gamepc = '$gamepc' WHERE id_gamepc = '$id_gamepc'");
    }

    if ($gamepc_edit == true) {
        echo "<script>alert ('update in db')</script>";
    } else {
        echo "<script>alert ('input in db failed')</script>";
    }

break;

        case 'hapus':
            $id_gamepc = $_REQUEST['id_gamepc'];

            $gamepc_hapus = mysqli_query ($connection, "DELETE FROM tb_gamepc
            WHERE id_gamepc = '$id_gamepc'");

            if($gamepc_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=gamepc_tampil">