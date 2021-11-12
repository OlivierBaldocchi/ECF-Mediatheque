<?php
require_once '../Controllers/controller.php';
$books = controlBookJava();

try {
    $titres = [];
    foreach ($books as $book) {
        $titre = $book->getTitre();  
        $titres[] = $titre; 
    } 
    return $titres;        
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des livres';
}
