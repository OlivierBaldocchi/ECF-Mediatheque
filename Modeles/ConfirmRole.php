<?php

session_start();

if ($_SESSION['role'] === 'EMPL') {

    require_once '../Controleurs/ControlConfirmRole.php';
    

    if ($createOk) {
        echo 'Bravo! le compte est confirmé';
    } else {
        echo 'Impossible de confirmer le compte';
    }
} else { 
    echo ("Vous n'êtes pas autorisé à accéder à cette page");
}
  
