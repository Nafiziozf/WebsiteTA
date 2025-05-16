    <h2 align = "center" >DATA BUDAYA</h2>

    <?php
        echo"<a href = 'budaya_input.php'><input type = 'submit' name 'input' value = 'TAMBAH BUDAYA'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID BUDAYA</td>
            <td>BUDAYA</td>       
            <td>GAMBAR</td>   
            <td colspan = "2".>AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $budaya_tampil = mysqli_query($connection, "SELECT * FROM tb_budaya ORDER BY id_budaya");
            while($hasil = mysqli_fetch_array($budaya_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_budaya]</td>";
                echo    "<td>$hasil[budaya]</td>";
                echo    "<td><img src = '$hasil[gambar]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='index.php?page=budaya_input&?status=edit&id_budaya=$hasil[id_budaya]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='budaya_proses.php?status=hapus&id_budaya=$hasil[id_budaya]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>