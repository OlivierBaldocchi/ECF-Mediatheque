<?php

require_once '../Controleurs/ControlBook.php';

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