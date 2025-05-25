<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_minuman=$_REQUEST['id_minuman'];
            $minuman=$_REQUEST['minuman'];
            $deskripsi_minuman=$_REQUEST['deskripsi_minuman'];
            
            $asal = $_FILES['gambar_minuman']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar_minuman']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $minuman_input = mysqli_query($connection, "INSERT INTO 
            tb_minuman VALUES ('$id_minuman', '$minuman', '$deskripsi_minuman' , '$simpan_gambar')");
            if ($minuman_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_minuman = $_REQUEST['id_minuman'];
    $minuman = $_REQUEST['minuman'];
    $deskripsi_minuman = $_REQUEST['deskripsi_minuman'];
    $simpan_gambar = "";

    $centang = $_REQUEST['centang'] ?? '0';
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_minuman LIKE 'gambar_minuman'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar_minuman']) && $_FILES['gambar_minuman']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar_minuman']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar_minuman']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $minuman_edit = mysqli_query($connection, "UPDATE tb_minuman SET id_minuman = '$id_minuman', minuman = '$minuman', deskripsi_minuman = '$deskripsi_minuman', gambar_minuman = '$simpan_gambar' WHERE id_minuman = '$id_minuman'");
    }
    else
    {
        $minuman_edit = mysqli_query($connection, "UPDATE tb_minuman SET id_minuman = '$id_minuman', minuman = '$minuman', deskripsi_minuman = '$deskripsi_minuman' WHERE id_minuman = '$id_minuman'");
    }

    switch ($minuman_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

    break;

        case 'hapus':
            $id_minuman = $_REQUEST['id_minuman'];

            $minuman_hapus = mysqli_query ($connection, "DELETE FROM tb_minuman
            WHERE id_minuman = '$id_minuman'");

            if($minuman_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=minuman_tampil">