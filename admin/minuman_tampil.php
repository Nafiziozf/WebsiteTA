    <h2 align = "center" >DATA MINUMAN</h2>

    <?php
        echo"<a href = 'admin.php?page=minuman_input'><input type = 'submit' name='input' value = 'TAMBAH MINUMAN'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID MINUMAN</td>
            <td>NAMA MINUMAN</td>       
            <td>DESKRIPSI MINUMAN</td>
            <td>GAMBAR MINUMAN</td>   
            <td colspan = "2">AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $minuman_tampil = mysqli_query($connection, "SELECT * FROM tb_minuman ORDER BY id_minuman");
            while($hasil = mysqli_fetch_array($minuman_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_minuman]</td>";
                echo    "<td>$hasil[minuman]</td>";
                echo    "<td>$hasil[deskripsi_minuman]</td>";
                echo    "<td><img src = '$hasil[gambar_minuman]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='?page=minuman_input&?status=edit&id_minuman=$hasil[id_minuman]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='minuman_proses.php?status=hapus&id_minuman=$hasil[id_minuman]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>