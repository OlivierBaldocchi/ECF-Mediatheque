<?php

require_once '../Modeles/Book.php';
require_once '../Modeles/BookManager.php';
require_once '../Modeles/Emprunt.php';
require_once '../Modeles/EmpruntManager.php';

use Modeles\Book; 
use Modeles\BookManager; 

use Modeles\Emprunt; 
use Modeles\EmpruntManager; 

$book = new Book();
$bookManager = new BookManager();

$emprunt = new Emprunt();
$empruntManager = new EmpruntManager();


$emprunt->setUtilisateurId($_GET['user'])  
    ->setDateResa('emprunté')
    ->setDateFinResa('emprunté')
    ->setDateEmprunt(date('d/m/Y'))
    ->setDateRetour(date('d/m/Y', strtotime ('+21 days')));


$resa = $empruntManager->update($emprunt, $_GET['book']); 

echo 'emprunt effectué';