<span>
    WELCOME
    <br></br>
    <img src="<?php echo $_SESSION['foto_admin']; ?>" width="75px" 
    style="border-radius: 75px; -moz-border-radius: 75px;" />
        <br>
    </br>
    <?php echo $_SESSION['nama_admin']; ?>
</span>
 
<div class="container-menu">
    <a class="admin-menu" href="admin.php?page=negara_tampil">Negara</a>
    <a class="admin-menu" href="admin.php?page=budaya_tampil">Budaya</a>
    <a class="admin-menu" href="admin.php?page=makanan_tampil">Makanan</a>
    <a class="admin-menu" href="admin.php?page=minuman_tampil">Minuman</a>
    <a class="admin-menu" href="admin.php?page=gamehp_tampil">Game HP</a>
    <a class="admin-menu" href="admin.php?page=gamepc_tampil">Game PC</a>
</div>

<span class="logout-button">
    <input type="button" value="Logout" onclick="window.location.href='logout.php'">
</span>

    
