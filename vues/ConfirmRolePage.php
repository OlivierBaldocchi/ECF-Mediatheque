<?php

session_start();

if ($_SESSION['role'] === 'ADMIN') {

    require_once '../Controleurs/ControlConfirmRole.php';
    

    if ($createOk) {
        echo 'Bravo! le rôle ' . $_POST['role'] . ' a été attribué';
    } else {
        echo 'Impossible d\'ajouter le rôle';
    }
} else { 
    echo ("Vous n'êtes pas autorisé à accéder à cette page");
}
  
