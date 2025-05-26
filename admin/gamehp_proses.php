<?php
    include "../config/connection.php";
    if(isset($_REQUEST['status']))
    {
        $status = $_REQUEST['status'];
    }
    
    switch ($status)
    {
        case 'tambah':
            $id_gamehp=$_REQUEST['id_gamehp'];
            $gamehp=$_REQUEST['gamehp'];
            $deskripsi_gamehp=$_REQUEST['deskripsi_gamehp'];
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $gamehp_input = mysqli_query($connection, "INSERT INTO 
            tb_gamehp VALUES ('$id_gamehp', '$gamehp', '$deskripsi_gamehp' , '$simpan_gambar')");
            if ($gamehp_input == true)
            {
                echo"<script>alert ('input in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

case 'edit':
    $id_gamehp = $_REQUEST['id_gamehp'];
    $gamehp = $_REQUEST['gamehp'];
    $deskripsi_gamehp = $_REQUEST['deskripsi_gamehp'];
    $simpan_gambar = "";

    $centang = $_REQUEST['centang'] ?? '0';
    $gambar_column_exists = false;
    $result = mysqli_query($connection, "SHOW COLUMNS FROM tb_gamehp LIKE 'gambar'");
    if ($result && mysqli_num_rows($result) > 0) {
        $gambar_column_exists = true;
    }

    if ($centang == '1' && isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0 && $gambar_column_exists)
    {
        $asal = $_FILES['gambar']['tmp_name'];
        $simpan_gambar = "../gambar/" . $_FILES['gambar']['name'];
        move_uploaded_file($asal, $simpan_gambar);

        $gamehp_edit = mysqli_query($connection, "UPDATE tb_gamehp SET id_gamehp = '$id_gamehp', gamehp = '$gamehp', deskripsi_gamehp = '$deskripsi_gamehp', gambar = '$simpan_gambar' WHERE id_gamehp = '$id_gamehp'");
    }
    else
    {
        $gamehp_edit = mysqli_query($connection, "UPDATE tb_gamehp SET id_gamehp = '$id_gamehp', gamehp = '$gamehp', deskripsi_gamehp = '$deskripsi_gamehp' WHERE id_gamehp = '$id_gamehp'");
    }

    switch ($gamehp_edit) {
        case true:
            echo "<script>alert ('update in db')</script>";
            break;
        default:
            echo "<script>alert ('input in db failed')</script>";
            break;
    }

    break;

        case 'hapus':
            $id_gamehp = $_REQUEST['id_gamehp'];

            $gamehp_hapus = mysqli_query ($connection, "DELETE FROM tb_gamehp
            WHERE id_gamehp = '$id_gamehp'");

            if($gamehp_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=gamehp_tampil">