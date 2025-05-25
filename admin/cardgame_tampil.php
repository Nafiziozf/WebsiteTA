    <h2 align = "center" >DATA CARDGAME</h2>

    <?php
        echo"<a href = 'admin.php?page=cardgame_input'><input type = 'submit' name='input' value = 'TAMBAH CARDGAME'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID CARDGAME</td>
            <td>NAMA CARDGAME</td>       
            <td>DESKRIPSI CARDGAME</td>
            <td>GAMBAR CARDGAME</td>   
            <td colspan = "2">AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $cardgame_tampil = mysqli_query($connection, "SELECT * FROM tb_cardgame ORDER BY id_cardgame");
            while($hasil = mysqli_fetch_array($cardgame_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_cardgame]</td>";
                echo    "<td>$hasil[cardgame]</td>";
                echo    "<td>$hasil[deskripsi_cardgame]</td>";
                echo    "<td><img src = '$hasil[gambar_cardgame]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='?page=cardgame_input&?status=edit&id_cardgame=$hasil[id_cardgame]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='cardgame_proses.php?status=hapus&id_cardgame=$hasil[id_cardgame]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>