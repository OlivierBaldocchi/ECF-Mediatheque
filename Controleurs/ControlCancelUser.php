<?php
session_start();
$token = $_SESSION['token']; 
require_once '../Modeles/Token.php';

require_once '../Modeles/UserManager.php';

use Modeles\UserManager; 

if ($_SESSION['role'] === 'ADMIN') {
    

    $id = $_SESSION['idToCancel'];

    $userManager = new UserManager;

    $delete = $userManager->delete($id);

    if($delete) {
        echo 'le compte a été supprimé';
    } else {
        echo 'suppression impossible';
    }
} else {
    echo 'Vous n\êtes pas autorisé à entrer sur cette page';
}

