<?php

if (isset($user)) { 
    echo ' <img style="width:100%; height:auto" src= " '.$read->getImage().' " /> ';
    echo '<br>';
    echo '<br>';                           
    echo '<u>Titre</u> :' .'<br>'. $read->getTitre() .'<br>';
    echo '<br>';
    echo '<u>Année de parution</u> :' .'<br>'. $read->getParution() .'<br>';
    echo '<br>';
    echo '<u>Résumé</u> :' .'<br>'.$read->getDescription() .'<br>';
    echo '<br>';
    echo '<u>Auteur</u> :' .'<br>'. $read->getAuteur() .'<br>';
    echo '<br>';
    echo '<u>Genre</u> :' .'<br>'. $read->getGenre() .'<br>';
}     


if (isset($read)) {   
    echo ' <img style="width:100%; height:auto" src= " '.$read->getImage().' " /> ';
    echo '<br>';
    echo '<br>';
    echo '<u>Titre</u> :' .'<br>'. $read->getTitre() .'<br>';
    echo '<br>';
    echo '<u>Année de parution</u> :' .'<br>'. $read->getParution() .'<br>';
    echo '<br>';
    echo '<u>Résumé</u> :' .'<br>'.$read->getDescription() .'<br>';
    echo '<br>';
    echo '<u>Auteur</u> :' .'<br>'. $read->getAuteur() .'<br>';
    echo '<br>';
    echo '<u>Genre</u> :' .'<br>'. $read->getGenre() .'<br>';
}  