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


$cancel = $empruntManager->delete($_GET['book']); 

$retour = $bookManager->retour($_GET['book']);

echo 'retour effectué';