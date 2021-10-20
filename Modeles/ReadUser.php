<?php

if ($read) {
    echo 'Numéro d\'enregistré :' .$read->getId() .'<br>';
    echo 'Nom: ' .$read->getNom() .'<br>';
    echo 'Prenom :' .$read->getPrenom() .'<br>';
    echo 'Date de naissance :' .$read->getDateNaissance() .'<br>';
    echo 'Email :' .$read->getEmail() .'<br>';
    echo 'Adresse :' .$read->getAdresse() .'<br>';
    echo 'Rôle :' .$read->getRole() .'<br>';
} 
