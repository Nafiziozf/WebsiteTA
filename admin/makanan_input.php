            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_makanan']))
                {
                    $id_makanan = $_REQUEST['id_makanan'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_makanan WHERE id_makanan = '$id_makanan'") or die (mysqli_error($connection));
                    $makanan_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input makanan </h2>

            <form action = "makanan_proses.php" method = "POST" enctype = "multipart/form-data"> 
                    <?php
                        if(isset($_GET['id_makanan']))
                        {
                            echo "<input type ='hidden' name = 'status' value = 'edit'>";
                        }
                        else
                        {
                            echo "<input type ='hidden' name = 'status' value = 'tambah'>";
                        }

                        ?>
                        <table>
                            <tr>
                                <td>ID MAKANAN</td>
                                <td>:</td>
                                <td><input type = "text" name = "id_makanan" maxlength = "11" size = "11" value = "<?php echo @$makanan_edit['id_makanan']; ?>"></td>
                            </tr>

                            <tr>
                                <td>MAKANAN</td>
                                <td>:</td>
                                <td><input type = "text" name = "makanan" maxlength = "20" size = "20"  value = "<?php echo @$makanan_edit['makanan']; ?>" ></td>
                            </tr>
                            
                            <tr>
                                <td>DESKRIPSI MAKANAN</td>
                                <td>:</td>
                                <td><input type = "text" name = "deskripsi_makanan" maxlength = "500" size = "500"  value = "<?php echo @$makanan_edit['deskripsi_makanan']; ?>" ></td>
                            </tr>
                            
                                <td>GAMBAR</td>
                                <td>:</td>
                            <td>
                                <?php
                                if(isset($_REQUEST['id_makanan']) && $makanan_edit)
                                {
                                    echo "<img src = '{$makanan_edit['gambar_makanan']}' width = 100 height = 100>";
                                }
                                ?>
                                </br>
                                <input type = "file" name = "gambar">
                                <?php 
                                    if(isset($_REQUEST['id_makanan']))
                                    {
                                        
                                ?>
                                </br>
                                <input type = "checkbox" name = "centang" value = "1"> centang jika ingin ganti
                                    <?php 
                                    }
                                    ?>
                            </td>
                            </tr>
                            
                            <tr>
                                <td colspan = "3" align = "Center">
                                    <input type = "submit" value = "SAVE">
                                    <input type = "reset" value = "CANCEL">
                                </td>
                            </tr>
                            </table>    
 </form>