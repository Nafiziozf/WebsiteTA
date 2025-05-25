<?php
    if (isset($_GET['page'])) 
    {
        SWITCH ($_GET['page']) 
        {
        case 'negara_tampil':
            include "negara_tampil.php";
            break;
        case 'negara_proses':
            include "negara_proses.php";
            break;

        case 'negara_input':
            include "negara_input.php";
            break;

        case 'budaya_tampil':
            include "budaya_tampil.php";
            break;

        case 'budaya_proses':
            include "budaya_proses.php";
            break;

        case 'budaya_input':
            include "budaya_input.php";
            break;
        
        case 'makanan_tampil':
            include "makanan_tampil.php";
            break;
        case 'makanan_proses':
            include "makanan_proses.php";
            break;
        case 'makanan_input':
            include "makanan_input.php";
            break;

        case 'minuman_tampil':
            include "minuman_tampil.php";
            break;
        case 'minuman_proses':
            include "minuman_proses.php";
            break;
        case 'minuman_input':
            include "minuman_input.php";
            break;
        case 'gamepc_tampil':
            include "gamepc_tampil.php";
            break;
        case 'gamepc_proses':
            include "gamepc_proses.php";
            break;
        case 'gamepc_input':  
            include "gamepc_input.php";
            break;
        case 'gamehp_tampil':
            include "gamehp_tampil.php";
            break;
        case 'gamehp_proses':
            include "gamehp_proses.php";
            break;
        case 'gamehp_input':
            include "gamehp_input.php";
            break;
        case 'cardgame_tampil':
            include "cardgame_tampil.php";
            break;
        case 'cardgame_proses':
            include "cardgame_proses.php";
            break;
        case 'cardgame_input':
            include "cardgame_input.php";
            break;
        }
    }
?>
