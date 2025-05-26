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
            $gamepc=$_REQUEST['gamepc'];
            $deskripsi_gamepc=$_REQUEST['deskripsi_gamepc'];
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $gamepc_input = mysqli_query($connection, "INSERT INTO 
            tb_gamepc VALUES ('$id_gamepc', '$gamepc', '$deskripsi_gamepc' , '$simpan_gambar')");
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
    $deskripsi_gamepc = $_REQUEST['deskripsi_gamepc'];
    $simpan_gambar = "";

    $centang = $_REQUEST['centang'] ?? '0';
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_gamepc LIKE 'gambar'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $gamepc_edit = mysqli_query($connection, "UPDATE tb_gamepc SET id_gamepc = '$id_gamepc', gamepc = '$gamepc', deskripsi_gamepc = '$deskripsi_gamepc', gambar = '$simpan_gambar' WHERE id_gamepc = '$id_gamepc'");
    }
    else
    {
        $gamepc_edit = mysqli_query($connection, "UPDATE tb_gamepc SET id_gamepc = '$id_gamepc', gamepc = '$gamepc', deskripsi_gamepc = '$deskripsi_gamepc' WHERE id_gamepc = '$id_gamepc'");
    }

    switch ($gamepc_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

    break;

        case 'hapus':
            $id_gamepc = $_REQUEST['id_gamepc'];

            $gamepc_hapus = mysqli_query ($connection, "DELETE FROM tb_gamepc
            WHERE id_gamepc = '$id_gamepc'");

            if($gamepc_hapus == true)
            {
                echo"<script>alert ('DELETE DATA ISOK')</script>";
            }
            else
            {
                echo"<script>alert ('DELETE DATA GAISOK')</script>";
            }
        break;
    }
?>
<meta http-equiv="refresh" content="0;URL=admin.php?page=gamepc_tampil">