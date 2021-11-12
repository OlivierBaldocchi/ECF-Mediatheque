<?php

require_once '../Controllers/controller.php';
$list = reservedBooks();

try {
    foreach ($list as $book) {
        if ($book->getDateEmprunt() === 'réservé'){
            echo '- ' . $book->titre .', réservé par: '. $book->email .'<br>';                                                                       
        }                                                                       
    }         
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des livres';
}