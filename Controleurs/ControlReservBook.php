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


$id = $_SESSION['bookToReserv'];
$read = $bookManager->read($id);
$titre = $read->getTitre();
$statut = $read->getStatut();

$dispo = $bookManager->emprunt($id);


$emprunt = new Emprunt();
$empruntManager = new EmpruntManager();


$emprunt->setUtilisateurId($_SESSION['id'])  
    ->setBookid($_SESSION['bookToReserv'])
    ->setDateResa(date('d/m/Y'))
    ->setDateFinResa(date('d/m/Y', strtotime ('+4 days')))
    ->setDateEmprunt('réservé')
    ->setDateRetour('réservé');


$resa = $empruntManager->create($emprunt); 
