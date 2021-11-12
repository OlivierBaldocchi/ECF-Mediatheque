<?php

session_start();
if ($_SESSION['role'] === 'EMPL') {
    require_once '../Controllers/controller.php';
    $createOk = confirmRole();

    if ($createOk) {
        echo 'Bravo! le compte est confirmé';
    } else {
        echo 'Impossible de confirmer le compte';
    }
    include_once '../Vues/ButtonLogOut.php'; 
    include_once '../Vues/ButtonBack.php'; 
} else { 
    echo ("Vous n'êtes pas autorisé à accéder à cette page");
}
  