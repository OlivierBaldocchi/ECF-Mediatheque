<?php
session_start();
$token = $_SESSION['token']; 
require_once '../Modeles/Token.php';

require_once '../Modeles/BookManager.php';

use Modeles\BookManager; 

if ($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'EMPL') {
    
    $id = $_SESSION['bookToCancel'];

    $bookManager = new BookManager;

    $delete = $bookManager->delete($id);

    if($delete) {
        echo 'le livre a été supprimé';
    } else {
        echo 'suppression impossible';
    }
} else {
    echo 'Vous n\êtes pas autorisé à entrer sur cette page';
}

