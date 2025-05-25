            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_negara']))
                {
                    $id_negara = $_REQUEST['id_negara'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_negara WHERE id_negara = '$id_negara'") or die (mysqli_error($connection));
                    $negara_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input Negara </h2>

            <form action = "negara_proses.php" method = "POST" enctype = "multipart/form-data"> 
                <?php
                    if(isset($_GET['id_negara']))
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
                        <td>ID NEGARA</td>
                        <td>:</td>
                        <td><input type="text" name="id_negara" maxlength="11" size="11" value="<?php echo @$negara_edit['id_negara']; ?>"></td>
                    </tr>

                    <tr>
                        <td>NEGARA</td>
                        <td>:</td>
                        <td><input type="text" name="negara" maxlength="20" size="20" value="<?php echo @$negara_edit['negara']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>DESKRIPSI NEGARA</td>
                        <td>:</td>
                        <td>
                            <textarea name="deskripsi_negara" maxlength="5000" rows="4" cols="60"><?php echo @$negara_edit['deskripsi_negara']; ?></textarea>
                        </td>
                    </tr>            
                    <tr>
                        <td>BENDERA</td>
                        <td>:</td>
                        <td>
                            <?php
                            if(isset($_REQUEST['id_negara']) && $negara_edit)
                            {
                                echo "<img src='{$negara_edit['bendera']}' width=100 height=100>";
                            }
                            ?>
                            </br>
                            <input type="file" name="gambar">
                            <?php 
                                if(isset($_REQUEST['id_negara']))
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
