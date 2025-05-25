<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_makanan=$_REQUEST['id_makanan'];
            $makanan=$_REQUEST['makanan'];
            $deskripsi_makanan=$_REQUEST['deskripsi_makanan'];
            
            $asal = $_FILES['gambar_makanan']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar_makanan']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $makanan_input = mysqli_query($connection, "INSERT INTO 
            tb_makanan VALUES ('$id_makanan', '$makanan', '$deskripsi_makanan' , '$simpan_gambar')");
            if ($makanan_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_makanan = $_REQUEST['id_makanan'];
    $makanan = $_REQUEST['makanan'];
    $deskripsi_makanan = $_REQUEST['deskripsi_makanan'];
    $simpan_gambar = "";

    $centang = $_REQUEST['centang'] ?? '0';
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_makanan LIKE 'gambar_makanan'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar_makanan']) && $_FILES['gambar_makanan']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar_makanan']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar_makanan']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $makanan_edit = mysqli_query($connection, "UPDATE tb_makanan SET id_makanan = '$id_makanan', makanan = '$makanan', deskripsi_makanan = '$deskripsi_makanan', gambar_makanan = '$simpan_gambar' WHERE id_makanan = '$id_makanan'");
    }
    else
    {
        $makanan_edit = mysqli_query($connection, "UPDATE tb_makanan SET id_makanan = '$id_makanan', makanan = '$makanan', deskripsi_makanan = '$deskripsi_makanan' WHERE id_makanan = '$id_makanan'");
    }

    switch ($makanan_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

    break;

        case 'hapus':
            $id_makanan = $_REQUEST['id_makanan'];

            $makanan_hapus = mysqli_query ($connection, "DELETE FROM tb_makanan
            WHERE id_makanan = '$id_makanan'");

            if($makanan_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=makanan_tampil">