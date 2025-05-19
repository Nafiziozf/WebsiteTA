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
            $id_negara=$_REQUEST['id_negara'];
            $negara=$_REQUEST['negara'];
            $deskripsi_negara=$_REQUEST['deskripsi_negara'];
            
            if ($centang == '1')
            {
                $asal = $_FILES['gambar']['tmp_name'];
                $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
                move_uploaded_file($asal, $simpan_gambar);
            }
 
            $negara_edit = mysqli_query($connection, "UPDATE tb_negara SET id_negara = '$id_negara', negara = '$negara', deskripsi_negara = '$deskripsi_negara', gambar = '$simpan_gambar' WHERE id_negara = '$id_negara'");
            if ($negara_edit == true)
            {
                echo"<script>alert ('update in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
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