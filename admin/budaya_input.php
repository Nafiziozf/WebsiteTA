            <?php
                include "../config/connection.php";
                if(isset($_REQUEST['id_budaya']))
                {
                    $id_budaya = $_REQUEST['id_budaya'];
                    $query = mysqli_query($connection, "SELECT * FROM tb_budaya WHERE id_budaya = '$id_budaya'") or die (mysqli_error($connection));
                    $data = mysqli_fetch_array($query);
                }

            ?>

            <h2 align = "Center" > input budaya </h2>

            <form action = "budaya_proses.php" method = "POST" enctype = "multipart/form-data"> 
                    <?php
                        if(isset($_GET['id_budaya']))
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
                                <td>ID BUDAYA</td>
                                <td>:</td>
                                <td><input type = "text" name = "id_budaya" maxlength = "11" size = "11" value = "<?php echo @$budaya_edit['id_budaya']; ?>"></td>
                            </tr>

                            <tr>
                                <td>BUDAYA</td>
                                <td>:</td>
                                <td><input type = "text" name = "budaya" maxlength = "500" size = "500"  value = "<?php echo @$budaya_edit['budaya']; ?>" ></td>
                            </tr>

                                <td>GAMBAR</td>
                                <td>:</td>
                            <td>
                                <?php
                                if(isset($_REQUEST['id_budaya']) && $budaya_edit)
                                {
                                    echo "<img src = '{$budaya_edit['gambar']}' width = 100 height = 100>";
                                }
                                ?>
                                </br>
                                <input type = "file" name = "gambar">
                                <?php 
                                    if(isset($_REQUEST['id_budaya']))
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