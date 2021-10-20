<?php

session_start();
$token = $_SESSION['token']; 

if ($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'EMPL') {
    require_once '../controller.php';
    $delete = cancelBook();
    if($delete) {
        echo 'le livre a été supprimé';
    } else {
        echo 'suppression impossible';
    }
} else {
    echo 'Vous n\êtes pas autorisé à entrer sur cette page';
}
