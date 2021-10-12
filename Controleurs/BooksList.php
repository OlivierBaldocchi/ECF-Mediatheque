<?php

require_once '../Modeles/Book.php';
require_once '../Modeles/BookManager.php';

use Modeles\Book; 
use Modeles\BookManager; 


$bookManager = new BookManager();

try {
    $books = $bookManager->readAll();
    $titres = [];
    foreach ($books as $book) {
        $titre = $book->getTitre();  
        $titres[] = $titre; 
    } 
    return $titres;        
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des livres';
}

