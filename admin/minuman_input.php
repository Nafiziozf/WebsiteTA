            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_minuman']))
                {
                    $id_minuman = $_REQUEST['id_minuman'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_minuman WHERE id_minuman = '$id_minuman'") or die (mysqli_error($connection));
                    $minuman_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input minuman </h2>

            <form action = "minuman_proses.php" method = "POST" enctype = "multipart/form-data"> 
                <?php
                    if(isset($_GET['id_minuman']))
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
                        <td>ID MINUMAN</td>
                        <td>:</td>
                        <td><input type="text" name="id_minuman" maxlength="11" size="11" value="<?php echo @$minuman_edit['id_minuman']; ?>"></td>
                    </tr>

                    <tr>
                        <td>MINUMAN</td>
                        <td>:</td>
                        <td><input type="text" name="minuman" maxlength="21" size="21" value="<?php echo @$minuman_edit['minuman']; ?>"></td>
                    </tr>
                    
                     <tr>
                         <td>DESKRIPSI MINUMAN</td>
                         <td>:</td>
                         <td>
                          <textarea name="deskripsi_minuman" maxlength="500" cols="60" rows="4"><?php echo @$minuman_edit['deskripsi_minuman']; ?></textarea>
                         </td>
                     </tr>

                     </td>
                        <td>GAMBAR</td>
                        <td>:</td>
                        <td>
                            <?php
                            if(isset($_REQUEST['id_minuman']) && $minuman_edit)
                            {
                                echo "<img src='{$minuman_edit['gambar_minuman']}' width=100 height=100>";
                            }
                            ?>
                            </br>
                            <input type="file" name="gambar_minuman">
                            <?php 
                                if(isset($_REQUEST['id_minuman']))
                                {
                            ?>
                            </br>
                            <input type="checkbox" name="centang" value="1"> centang jika ingin ganti
                            <?php 
                                }
                            ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" align="Center">
                            <input type="submit" value="SAVE">
                            <input type="reset" value="CANCEL">
                        </td>
                    </tr>
                </table>    
            </form>
