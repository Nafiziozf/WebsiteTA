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
            
            $asal = $_FILES['gambar']['tmp_name'];
            $simpan_gambar = "../gambar/".$_FILES['gambar']['name']; 
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
            $centang = isset($_REQUEST['centang']) ? $_REQUEST['centang'] : '0';
            $simpan_gambar = '';
    
            // Jika checkbox dicentang, proses upload gambar baru
            if ($centang == '1' && isset($_FILES['gambar_makanan'])) {
            $asal = $_FILES['gambar']['tmp_name'];
                $nama_file = $_FILES['gambar']['name'];
                $simpan_gambar = "../gambar/".$nama_file;
                move_uploaded_file($asal, $simpan_gambar);
            } else {
                // Ambil path gambar lama dari database jika tidak upload baru
                $result = mysqli_query($connection, "SELECT gambar_makanan FROM tb_makanan WHERE id_makanan = '$id_makanan'");
                $row = mysqli_fetch_assoc($result);
                $simpan_gambar = $row['gambar'];
            }
            
            // Query UPDATE yang benar
            $query = "UPDATE tb_makanan SET 
                      makanan = '$makanan', 
                      deskripsi_makanan = '$deskripsi_makanan', 
                      gambar_makanan = '$simpan_gambar' 
                      WHERE id_makanan = '$id_makanan'";
            
            $makanan_edit = mysqli_query($connection, $query);
            
            if ($makanan_edit) {
                echo "<script>alert('Update berhasil')</script>";
            } else {
                echo "<script>alert('Gagal update: ".mysqli_error($connection)."')</script>";
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