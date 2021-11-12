<?php

require 'controller.php';

if(isset($_POST['route'])) {
    if($_POST['route'] === 'booklist') {
        controlBook();
    }
    
    if($_POST['route'] === 'booklistjava') {
        controlBookJava();
    }
    
    if($_POST['route'] === 'readbytitre') {
        readBookByTitre();
    }
    
    if($_POST['route'] === 'reserv') {
        reserv();
    }

    if($_POST['route'] === 'connexion') {
        connect();
    }
    
    if($_POST['route'] === 'createbook') {
        createBook();
    }

    if($_POST['route'] === 'confirmuser') {
        session_start();
        readUser();
    }

    if($_POST['route'] === 'searchuser') {
        searchUser();
    }

    if($_POST['route'] === 'seeuser') {
        session_start();
        readInfosUser();
    }

    if($_POST['route'] === 'createuser') {
        createUser();
    }

    if($_POST['route'] === 'canceluser') {
        session_start();
        cancelUser();
    }

} elseif(isset($_GET['route'])) {
    
    if($_GET['route'] === 'infosbook') {
        readBook();
    }

    if($_GET['route'] === 'infouser') {
        session_start();
        readInfosUser();
    }

    if($_GET['route'] === 'emprunt') {
        emprunt();
    }

    if($_GET['route'] === 'retour') {
        retour();
    }
}
