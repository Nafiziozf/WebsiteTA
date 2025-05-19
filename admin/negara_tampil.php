    <h2 align = "center" >DATA NEGARA</h2>

    <?php
        echo"<a href = 'admin.php?page=negara_input'><input type = 'submit' name='input' value = 'TAMBAH NEGARA'></a>";
    ?>
    <br> </br>
    <table border="1" align="center" width="95%">
        <tr align="center" bgcolor="#808080">
            <td>ID NEGARA</td>
            <td>NAMA NEGARA</td>       
            <td>DESKRIPSI NEGARA</td>
            <td>BENDERA</td>   
            <td colspan = "2">AKSI</td>      
        </tr>   

        <?php
            include "../config/connection.php";
            $no = 1;
            $negara_tampil = mysqli_query($connection, "SELECT * FROM tb_negara ORDER BY id_negara");
            while($hasil = mysqli_fetch_array($negara_tampil))
            {
                echo "<tr>";
                echo    "<td>$hasil[id_negara]</td>";
                echo    "<td>$hasil[negara]</td>";
                echo    "<td>$hasil[deskripsi_negara]</td>";
                echo    "<td><img src = '$hasil[bendera]' width = 125 height = 100></td>";
                echo    "<td align = 'center'><a href='admin.php?page=negara_input&?status=edit&id_negara=$hasil[id_negara]'>EDIT</a></td>";
                echo    "<td><a href='#' onclick=\"if(confirm('apakah anda yakin?')){window.location.href='negara_proses.php?status=hapus&id_negara=$hasil[id_negara]';}\"> HAPUS</a></td>";
                echo "</tr>";

                $no++;            
            }
        ?>
    </table>