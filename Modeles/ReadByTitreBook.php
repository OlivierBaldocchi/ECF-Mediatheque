<?php

if ($read) {                            
    echo '<u>Titre</u> :' .'<br>'. $read->getTitre() .'<br>';
    echo '<br>';
    echo '<u>Année de parution</u> :' .'<br>'. $read->getParution() .'<br>';
    echo '<br>';
    echo '<u>Résumé</u> :' .'<br>'.$read->getDescription() .'<br>';
    echo '<br>';
    echo '<u>Auteur</u> :' .'<br>'. $read->getAuteur() .'<br>';
    echo '<br>';
    echo '<u>Genre</u> :' .'<br>'. $read->getGenre() .'<br>';
    $dispo = $read->getStatut();
    $id = $read->getId();
}                  