    <h2 align = "center" >DATA GAMEPC</h2>

    <?php
        echo"<a href = 'admin.php?page=gamepc_input'><input type = 'submit' name='input' value = 'TAMBAH GAMEPC'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID GAMEPC</td>
            <td>NAMA GAMEPC</td>       
            <td>DESKRIPSI GAMEPC</td>
            <td>GAMBAR GAME PC</td>   
            <td colspan = "2">AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $gamepc_tampil = mysqli_query($connection, "SELECT * FROM tb_gamepc ORDER BY id_gamepc");
            while($hasil = mysqli_fetch_array($gamepc_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_gamepc]</td>";
                echo    "<td>$hasil[gamepc]</td>";
                echo    "<td>$hasil[deskripsi_gamepc]</td>";
                echo    "<td><img src = '$hasil[gambar_gamepc]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='?page=gamepc_input&?status=edit&id_gamepc=$hasil[id_gamepc]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='gamepc_proses.php?status=hapus&id_gamepc=$hasil[id_gamepc]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>