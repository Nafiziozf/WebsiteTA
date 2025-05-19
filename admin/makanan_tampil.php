    <h2 align = "center" >DATA MAKANAN</h2>

    <?php
        echo"<a href = 'makanan_input.php'><input type = 'submit' name 'input' value = 'TAMBAH MAKANAN'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID MAKANAN</td>
            <td>NAMA MAKANAN</td>       
            <td>DESKRIPSI MAKANAN</td>
            <td>GAMBAR MAKANAN</td>   
            <td colspan = "2".>AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $makanan_tampil = mysqli_query($connection, "SELECT * FROM tb_makanan ORDER BY id_makanan");
            while($hasil = mysqli_fetch_array($makanan_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_makanan]</td>";
                echo    "<td>$hasil[makanan]</td>";
                echo    "<td>$hasil[deskripsi_makanan]</td>";
                echo    "<td><img src = '$hasil[gambar_makanan]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='?page=makanan_input&?status=edit&id_makanan=$hasil[id_makanan]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='makanan_proses.php?status=hapus&id_makanan=$hasil[id_makanan]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>