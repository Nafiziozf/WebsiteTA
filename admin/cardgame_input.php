            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_cardgame']))
                {
                    $id_cardgame = $_REQUEST['id_cardgame'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_cardgame WHERE id_cardgame = '$id_cardgame'") or die (mysqli_error($connection));
                    $cardgame_edit = mysqli_fetch_array($query);
                }
            ?>

            <h2 align = "Center" > input cardgame </h2>

            <form action = "cardgame_proses.php" method = "POST" enctype = "multipart/form-data"> 
                <?php
                    if(isset($_GET['id_cardgame']))
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
                        <td>ID CARDGAME</td>
                        <td>:</td>
                        <td><input type="text" name="id_cardgame" maxlength="11" size="11" value="<?php echo @$cardgame_edit['id_cardgame']; ?>"></td>
                    </tr>

                    <tr>
                        <td>CARDGAME</td>
                        <td>:</td>
                        <td><input type="text" name="cardgame" maxlength="20" size="20" value="<?php echo @$cardgame_edit['cardgame']; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>DESKRIPSI CARDGAME</td>
                        <td>:</td>
                        <td>
                            <textarea name="deskripsi_cardgame" maxlength="750" cols="60" rows="4"><?php echo @$cardgame_edit['deskripsi_cardgame']; ?></textarea>
                        </td>
                    </tr>            
                    <tr>
                        <td>GAMBAR</td>
                        <td>:</td>
                        <td>
                            <?php
                            if(isset($_REQUEST['id_cardgame']) && $cardgame_edit)
                            {
                                echo "<img src='{$cardgame_edit['gambar_cardgame']}' width=100 height=100>";
                            }
                            ?>
                            </br>
                            <input type="file" name="gambar_cardgame">
                            <?php 
                                if(isset($_REQUEST['id_cardgame']))
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
