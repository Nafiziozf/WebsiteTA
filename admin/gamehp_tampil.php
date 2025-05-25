    <h2 align = "center" >DATA GAMEHP</h2>

    <?php
        echo"<a href = 'admin.php?page=gamehp_input'><input type = 'submit' name='input' value = 'TAMBAH GAMEHP'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID GAMEHP</td>
            <td>NAMA GAMEHP</td>       
            <td>DESKRIPSI GAMEHP</td>
            <td>GAMBAR GAME HP</td>   
            <td colspan = "2">AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $gamehp_tampil = mysqli_query($connection, "SELECT * FROM tb_gamehp ORDER BY id_gamehp");
            while($hasil = mysqli_fetch_array($gamehp_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_gamehp]</td>";
                echo    "<td>$hasil[gamehp]</td>";
                echo    "<td>$hasil[deskripsi_gamehp]</td>";
                echo    "<td><img src = '$hasil[gambar_gamehp]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='?page=gamehp_input&?status=edit&id_gamehp=$hasil[id_gamehp]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='gamehp_proses.php?status=hapus&id_gamehp=$hasil[id_gamehp]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>