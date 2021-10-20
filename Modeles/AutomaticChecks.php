<?php
require_once 'controller.php';
$resas = automaticChecks();

try {
    

    foreach ($resas as $resa) {
        $date = $resa->getDateFinResa();
        $book = $resa->getBookid();
        if ($date < date('d/m/Y')) {
            $empruntManager->delete($book);
            $bookManager->retour($book);
        } 
    }         
} catch (PDOException $e) {
    echo 'Impossible de mettre à jour les réservations';
}

