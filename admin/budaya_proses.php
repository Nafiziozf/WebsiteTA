<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_budaya=$_REQUEST['id_budaya'];
            $budaya=$_REQUEST['budaya'];
            $deskripsi_budaya=$_REQUEST['deskripsi_budaya'];
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $budaya_input = mysqli_query($connection, "INSERT INTO 
            tb_budaya VALUES ('$id_budaya', '$budaya', '$deskripsi_budaya' , '$simpan_gambar')");
            if ($budaya_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_budaya = $_REQUEST['id_budaya'];
    $budaya = $_REQUEST['budaya'];
    $simpan_gambar = "";

    $centang = $_REQUEST['centang'] ?? '0';
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_budaya LIKE 'gambar'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $budaya_edit = mysqli_query($connection, "UPDATE tb_budaya SET id_budaya = '$id_budaya', budaya = '$budaya', gambar = '$simpan_gambar' WHERE id_budaya = '$id_budaya'");
    }
    else
    {
        $budaya_edit = mysqli_query($connection, "UPDATE tb_budaya SET id_budaya = '$id_budaya', budaya = '$budaya' WHERE id_budaya = '$id_budaya'");
    }

    switch ($budaya_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

    break;

        case 'hapus':
            $id_budaya = $_REQUEST['id_budaya'];

            $budaya_hapus = mysqli_query ($connection, "DELETE FROM tb_budaya
            WHERE id_budaya = '$id_budaya'");

            if($budaya_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=budaya_tampil">