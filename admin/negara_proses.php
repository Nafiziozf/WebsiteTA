<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_negara=$_REQUEST['id_negara'];
            $negara=$_REQUEST['negara'];
            $deskripsi_negara=$_REQUEST['deskripsi_negara'];
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $negara_input = mysqli_query($connection, "INSERT INTO 
            tb_negara VALUES ('$id_negara', '$negara', '$deskripsi_negara' , '$simpan_gambar')");
            if ($negara_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_negara = $_REQUEST['id_negara'];
    $negara = $_REQUEST['negara'];
    $deskripsi_negara = $_REQUEST['deskripsi_negara'];
    $simpan_gambar = ""; // Initialize variable

    // Get checkbox value if set (assuming checkbox name is 'centang')
    $centang = $_REQUEST['centang'] ?? '0';

    // Check if 'gambar' column exists in tb_negara
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_negara LIKE 'gambar'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $negara_edit = mysqli_query($connection, "UPDATE tb_negara SET id_negara = '$id_negara', negara = '$negara', deskripsi_negara = '$deskripsi_negara', gambar = '$simpan_gambar' WHERE id_negara = '$id_negara'");
    }
    else
    {
        $negara_edit = mysqli_query($connection, "UPDATE tb_negara SET id_negara = '$id_negara', negara = '$negara', deskripsi_negara = '$deskripsi_negara' WHERE id_negara = '$id_negara'");
    }

    switch ($negara_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

break;

        case 'hapus':
            $id_negara = $_REQUEST['id_negara'];

            $negara_hapus = mysqli_query ($connection, "DELETE FROM tb_negara
            WHERE id_negara = '$id_negara'");

            if($negara_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=negara_tampil">