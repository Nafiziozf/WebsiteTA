            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_gamepc']))
                {
                    $id_gamepc = $_REQUEST['id_gamepc'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_gamepc WHERE id_gamepc = '$id_gamepc'") or die (mysqli_error($connection));
                    $gamepc_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input gamepc </h2>

            <form action = "gamepc_proses.php" method = "POST" enctype = "multipart/form-data"> 
                <?php
                    if(isset($_GET['id_gamepc']))
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
                        <td>ID GAMEPC</td>
                        <td>:</td>
                        <td><input type="text" name="id_gamepc" maxlength="11" size="11" value="<?php echo @$gamepc_edit['id_gamepc']; ?>"></td>
                    </tr>

                    <tr>
                        <td>GAMEPC</td>
                        <td>:</td>
                        <td><input type="text" name="gamepc" maxlength="20" size="20" value="<?php echo @$gamepc_edit['gamepc']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>DESKRIPSI GAMEPC</td>
                        <td>:</td>
                        <td><input type="text" name="deskripsi_gamepc" maxlength="500" size="500" value="<?php echo @$gamepc_edit['deskripsi_gamepc']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>GAMBAR</td>
                        <td>:</td>
                        <td>
                            <?php
                            if(isset($_REQUEST['id_gamepc']) && $gamepc_edit)
                            {
                                echo "<img src='{$gamepc_edit['gambar_gamepc']}' width=100 height=100>";
                            }
                            ?>
                            </br>
                            <input type="file" name="gambar">
                            <?php 
                                if(isset($_REQUEST['id_gamepc']))
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
