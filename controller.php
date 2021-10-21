<?php

require_once 'Classes/User.php';
require_once 'Classes/UserManager.php';
require_once 'Classes/Book.php';
require_once 'Classes/BookManager.php';
require_once 'Classes/Emprunt.php';
require_once 'Classes/EmpruntManager.php';

use Classes\User; 
use Classes\UserManager; 

use Classes\Book; 
use Classes\BookManager; 

use Classes\Emprunt; 
use Classes\EmpruntManager; 


function automaticChecks() {
    $emprunt = new Emprunt();
    $empruntManager = new EmpruntManager();
    $resas = $empruntManager->checkFinResaDate();
    return $resas;
}

function controlBook() {
    $bookManager = new BookManager();
    $books = $bookManager->readAll();
    require_once 'Vues/BooksListPage.php';
}

function controlBookJava() {
    $bookManager = new BookManager();
    $books = $bookManager->readAll();
    return $books;
}

function readBookByTitre() {
    $bookManager = new BookManager();
    $titre = $_POST['book'];
    $read = $bookManager->readByTitre($titre);  
    require_once 'Vues/BookInfosByTitrePage.php'; 
}

function reserv() {
    $book = new Book();
    $bookManager = new BookManager();
    session_start();
    $id = $_SESSION['bookToReserv'];
    $read = $bookManager->read($id);
    $titre = $read->getTitre();
    $statut = $read->getStatut();

    $dispo = $bookManager->emprunt($id);

    $emprunt = new Emprunt();
    $empruntManager = new EmpruntManager();

    $emprunt->setUtilisateurId($_SESSION['id'])  
        ->setBookid($_SESSION['bookToReserv'])
        ->setDateResa(date('d/m/Y'))
        ->setDateFinResa(date('d/m/Y', strtotime ('+4 days')))
        ->setDateEmprunt('réservé')
        ->setDateRetour('réservé');

    $resa = $empruntManager->create($emprunt); 
    require_once 'Vues/ReservBookPage.php';
}

function readBook() {
    $bookManager = new BookManager();
    $id = $_GET['id'];
    $read = $bookManager->read($id);   
    require_once 'Vues/BookInfosPage.php';
}

function connect() {
    $user = new User();
    $userManager = new UserManager();
    require_once 'Modeles/Connection.php';
}

function createBook() {
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
}    

function waitingList() {
    $user = new User();
    $userManager = new UserManager();
    $users = $userManager->readAll();
    return $users;
}    

function reservedBooks() {
    $emprunt = new Emprunt();
    $empruntManager = new EmpruntManager();
    $list = $empruntManager->readAll();
    return $list;
}

function readUser() {
    $userManager = new UserManager();
    $email = $_POST['list_email'];
    $read = $userManager->read($email); 
    return $read; 
    require_once 'Vues/ConfirmUserPage.php';
}

function readInfosUser() {
    $userManager = new UserManager();
    $email = $_SESSION['emailToRead'];
    $read = $userManager->read($email);  
    require_once 'Vues/ReadUserPage.php';
}

function readProfilUser() {
    $user = new User();
    $userManager = new UserManager();
    $email = $_SESSION['emailToRead'];
    $read = $userManager->read($email);  
    return $read;
}

function readAllUsers() {
    $userManager = new UserManager();
    $users = $userManager->readAll();
    return $users;
}

function confirmRole() {
    $user = new User();
    $userManager = new UserManager();
    $id = $_SESSION['IdToChange'];
    $createOk = $userManager->confirmRole($id); 
    return $createOk;
} 

function cancelBook() {
    $id = $_SESSION['bookToCancel'];
    $bookManager = new BookManager;
    $delete = $bookManager->delete($id);
    return $delete;
}

function searchUser() {
    $useManager = new UserManager();
    $finds = $useManager->search($_POST['email'].'%');
}

function userReservedBooks($id) {
    $book = new Book();
    $bookManager = new BookManager();
    $emprunt = new Emprunt();
    $empruntManager = new EmpruntManager();
    $empruntManager = new EmpruntManager();
    $list = $empruntManager->read($id);
    return $list;
}

function emprunt() {
    $emprunt = new Emprunt();
    $empruntManager = new EmpruntManager();

    $emprunt->setUtilisateurId($_GET['user'])  
        ->setDateResa('emprunté')
        ->setDateFinResa('emprunté')
        ->setDateEmprunt(date('Y/m/d'))
        ->setDateRetour(date('Y/m/d', strtotime ('+21 days')));

    $resa = $empruntManager->update($emprunt, $_GET['book']); 
    if ($resa) {
        echo 'emprunt réalisé avec succés';
    } 
}    

function retour() {
    $bookManager = new BookManager();
    $empruntManager = new EmpruntManager();

    $cancel = $empruntManager->delete($_GET['book']); 
    $retour = $bookManager->retour($_GET['book']);
    echo 'retour effectué';    
}

function createUser() { 
    $user = new User();
        
    $user->setNom(htmlspecialchars($_POST['nom'], ENT_QUOTES))
        ->setPrenom(htmlspecialchars($_POST['prenom'], ENT_QUOTES))
        ->setDateNaissance(htmlspecialchars($_POST['date_naissance'], ENT_QUOTES))
        ->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES))
        ->setMdp($_POST['password'])
        ->setAdresse(htmlspecialchars($_POST['adresse'], ENT_QUOTES));
    if(isset($_POST['role'])) {
        $user->setRole(htmlspecialchars($_POST['role'], ENT_QUOTES));
    } else {
        $user->setRole('En attente');
    }
        
    $userManager = new UserManager();
    $createOk = $userManager->create($user); 
    
    if(isset($_POST['role'])) {
       require_once 'Modeles/UserCreated.php';        
    } else {
        return $createOk;
    }
}

function cancelUser() {      
    if ($_SESSION['role'] === 'ADMIN') {
        
        $id = $_SESSION['idToCancel'];
    
        $userManager = new UserManager;
        $delete = $userManager->delete($id);
    
        if($delete) {
            echo 'le compte a été supprimé';
        } else {
            echo 'suppression impossible';
        }
    } else {
        echo 'Vous n\êtes pas autorisé à entrer sur cette page';
    }
}