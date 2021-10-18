<?php

require_once '../Modeles/Book.php';
require_once '../Modeles/BookManager.php';

use Modeles\Book; 
use Modeles\BookManager; 

$book = new Book();
    
$book->setTitre($_POST['titre'])
    ->setParution($_POST['parution'])
    ->setDescription($_POST['description'])
    ->setAuteur($_POST['auteur'])
    ->setGenre($_POST['genre']);
    
$bookmanager = new bookManager();

$createOk = $bookmanager->create($book);     

if($createOk) {
    echo 'Bravo le nouveau livre est enregistré.';
}