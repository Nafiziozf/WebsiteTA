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
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
            move_uploaded_file($asal, $simpan_gambar);
            
            $budaya_input = mysqli_query($connection, "INSERT INTO 
            tb_budaya VALUES ('$id_budaya', '$budaya', '$simpan_gambar')");
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
            $id_budaya=$_REQUEST['id_budaya'];
            $budaya=$_REQUEST['budaya'];
            
            
            if ($centang == '1')
            {
                $asal = $_FILES['gambar']['tmp_name'];
                $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
                move_uploaded_file($asal, $simpan_gambar);
            }
 
            $id_budaya = mysqli_query($connection, "UPDATE tb_budaya SET id_budaya = '$id_budaya', budaya = '$budaya', gambar = '$simpan_gambar' WHERE id_budaya = '$id_budaya'");
            if ($budaya_edit == true)
            {
                echo"<script>alert ('update in db')</script>";
            }
            else
            {
                echo"<script>alert ('input in db failed')</script>";
            }
            
        break;

        case 'hapus':
            $id_budaya = $_REQUEST['id_budaya'];

            $budaya_hapus = mysqli_query ($connection, "DELETE FROM tb_budaya
            WHERE id_budaya = '$id_budaya'");

            if($budaya_hapus == true)
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
<meta http-equiv="refresh" content="0;URL=admin.php?page=budaya_tampil">