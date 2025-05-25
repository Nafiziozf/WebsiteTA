            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_gamehp']))
                {
                    $id_gamehp = $_REQUEST['id_gamehp'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_gamehp WHERE id_gamehp = '$id_gamehp'") or die (mysqli_error($connection));
                    $gamehp_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input gamehp </h2>

            <form action = "gamehp_proses.php" method = "POST" enctype = "multipart/form-data"> 
                <?php
                    if(isset($_GET['id_gamehp']))
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
                        <td>ID GAMEHP</td>
                        <td>:</td>
                        <td><input type="text" name="id_gamehp" maxlength="11" size="11" value="<?php echo @$gamehp_edit['id_gamehp']; ?>"></td>
                    </tr>

                    <tr>
                        <td>GAMEHP</td>
                        <td>:</td>
                        <td><input type="text" name="gamehp" maxlength="20" size="20" value="<?php echo @$gamehp_edit['gamehp']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>DESKRIPSI GAMEHP</td>
                        <td>:</td>
                        <td>
                            <textarea name="deskripsi_gamehp" maxlength="500" cols="60" rows="4"><?php echo @$gamehp_edit['deskripsi_gamehp']; ?></textarea>
                        </td>
                    </tr>            
                    <tr>
                        <td>GAMBAR</td>
                        <td>:</td>
                        <td>
                            <?php
                            if(isset($_REQUEST['id_gamehp']) && $gamehp_edit)
                            {
                                echo "<img src='{$gamehp_edit['gambar_gamehp']}' width=100 height=100>";
                            }
                            ?>
                            </br>
                            <input type="file" name="gambar_gamehp">
                            <?php 
                                if(isset($_REQUEST['id_gamehp']))
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
