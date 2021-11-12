<?php

session_start();
$token = $_SESSION['token']; 

if ($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'EMPL') {
    require_once '../Controllers/controller.php';
    $delete = cancelBook();
    if($delete) {
        echo 'le livre a été supprimé';
    } else {
        echo 'suppression impossible';
    }
    include_once '../Vues/ButtonLogOut.php'; 
    include_once '../Vues/ButtonBack.php'; 
} else {
    echo 'Vous n\êtes pas autorisé à entrer sur cette page';
}
